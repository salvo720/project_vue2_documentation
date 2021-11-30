<template>
  <div id="app">
    <h1>{{ welcome_user }}</h1>
    <form>
      <!-- <div class="row"> -->
        <div class="col col-md-4 offset-4">
          <label for="username" class="form-label">Email or Username :</label>
          <input type="email" class="form-control" id="id_username" aria-describedby="emailHelp">
        </div>
        <div class="col col-md-4 offset-4">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="col col-md-6 offset-3">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <!-- </div> -->
  </form>
    <h1>{{ message }}</h1>
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'app',
   data (){
     return {
      message: 'Hello Vue!' , 
      welcome_user : 'Benvenuto utente esegui il login ' , 
     }
  }
}
</script>
