<template>
  <div id="app">
    <h1>{{ welcome_user }}</h1>
    <form v-on:submit="send_form">
      <!-- <div class="row"> -->
        <div class="col col-md-4 offset-4">
          <label for="username" class="form-label">Email or Username :</label>
          <input type="email" v-model.lazy="username" class="form-control" id="id_username" aria-describedby="emailHelp">
        </div>
        <div class="col col-md-4 offset-4">
          <label for="id_password" class="form-label">Password</label>
          <input type="password"  v-model.lazy="password" class="form-control" id="id_password">
        </div>
        <h2>dati login:{{ username}} | {{ password}}</h2>
        <!-- <div class="col col-md-6 offset-3">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    <!-- </div> -->
  </form>
    <!-- <h1>{{ message }}</h1> -->
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'app',
   data (){
     return {
      // message: 'Hello Vue!' , 
      welcome_user : 'Benvenuto utente esegui il login ' , 
      username:'',
      password :'',

    }
  },
  methods: {
    async send_form(e){
      e.preventDefault() // it prevent from page reload
      // console.log(this.name, this.price);
      window.console.log('form_mandato')
      const res = await fetch('/backend-api', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },

        // pass in the information from our form
        body: JSON.stringify({
          username: this.username,
          email: this.email,
          password: this.password,
        }) 
      });
      if (!res.ok) {
        const message = `An error has occured: ${res.status}`;
        throw new Error(message);
      }
    }
  },
}
</script>
