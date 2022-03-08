<template>
  <div id="app">
    <h1>{{ welcome_user }}</h1>
    <form v-on:submit.prevent="send_form()">
      <!-- <div class="row"> -->
        <div class="col col-md-4 offset-4">
          <label for="username" class="form-label">Email or Username :</label>
          <input type="email" v-model.lazy="username" class="form-control" id="id_username" aria-describedby="emailHelp">
        </div>
        <div class="col col-md-4 offset-4">
          <label for="id_password" class="form-label">Password</label>
          <input type="password"  v-model.lazy="password" class="form-control" id="id_password">
        </div>
        <h2>dati login:{{ username }} | {{ password }}</h2>
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

import axios from 'axios';

export default {
  name: 'app',
   data (){
     return {
      // message: 'Hello Vue!' , 
      welcome_user : 'Benvenuto utente esegui il login ' , 
      username:'',
      password :'',
      link_php_page_login : 'http://localhost:8080/project_vue2_documentation/vue_cdn/vue_crud/back_end_api.php?action=login' ,
    }
  },
  methods: {
    send_form(){
      /* il fetch non consente di usare il nome password cambia la variabile del this   */
      window.console.log('form_mandato');

      var formdata = this.toFormData({
        email : this.username  , 
        password : this.password , 
      });
      
      axios.post(this.link_php_page_login , formdata 
      ).then( response => {
          console.log(response)
          if(response.data.error){
            this.ErrorMsg = response.data.message;
          }else{
            this.SuccessMsg = response.data;
            window.console.log(response);
            if(this.SuccessMsg == true ){
              window.location.href="http://localhost:8080/#/Crud";
            }
          }
      });
     
    },
    toFormData(obj){
      var fd = new FormData();
      for(var i in obj){
        fd.append(i,obj[i]);
      }
      return fd;
    },
  },
}
// TODO: la richiesta viene fatta ma bisogna passare da toFormData per madnare i dati 
</script>
