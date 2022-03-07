<style>
  .green-color{ 
    color:green !important
  }
  .red-color{ 
    color:red !important
  }

    .padding_bottom_200px{
      padding: 0 0 200px 0;
    }
    #overlay{
      position : fixed;
      top : 0;
      bottom:0 ;
      left : 0;
      right : 0;
      background : rgba( 0 ,0,0, 0.6);
    }
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
    }
</style>
<template>
  <div id="app" >
    <!-- Nav bar  -->
    <Navbar>
    </Navbar>

    <div class="container-fluid">
      <div class="row bg-dark">
        <div class="col-lg-12">
          <div class="text-center text-light display-4 pt-2" style="font-size:25px"> Crup application VUE.JS , PHP & MYSQL </div>
        </div>
      </div>


      <div class="container-fluid">
        <div class="row mt-3">
        <div class="col-lg-6">
          <h3 class="text-info float-start">Registra Utente</h3>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-info float-end" @click="showAddModal=true">
          <i class="fas fa-user" />&nbsp;&nbsp; ADD New User
        </button>
        </div>
      </div>
      <hr class="bg-info" >
      <div class="alert alert-danger" v-if="ErrorMsg">
        {{ ErrorMsg }}
      </div>
      <div class="alert alert-success" v-if="SuccessMsg">
        {{ SuccessMsg }}
      </div>

      <!-- Dispay Records  -->
      <div class="row">
        <div class="col col-lg-12">
          <table class="table table-border table-striped">
            <thead>
              <tr class="text-center bg-info text-light">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody class="text-center" v-for="user in users" v-bind:key="user.id">
              <!-- <pre>{{ users }}</pre> -->
              <tr>
                <td> {{ user.id }} </td>
                <td> {{ user.name }} </td>
                <td> {{ user.email }} </td>
                <td> {{ user.phone }} </td>
                <td><button class="btn" @click="showEditModal=true; selectUser(user);"> <i class="fas fa-edit green-color"  /> </button></td>
                <td><button class="btn" @click="showDeleteModal=true; selectUser(user);"> <i class="fas fa-trash red-color" /> </button></td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
      </div>

      <!-- Add New User Model  -->
      <div id="overlay" v-if="showAddModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New User </h5>
              <button type="button" class="close" @click="showAddModal=false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-4">
              <form action="#" method="POST">
                
                <div class="form-group">
                  <input v-model="newUser.name" type="text" name="name" class="form-control form-control-lg" placeholder="Name">
                </div>

                <div class="form-group">
                  <input v-model="newUser.email" type="text" name="email" class="form-control form-control-lg" placeholder="email">
                </div>

                <div class="form-group">
                  <input v-model="newUser.phone" type="number" name="phone" class="form-control form-control-lg" placeholder="phone">
                </div>

                <div class="form-group">
                  <button type="button" class="btn btn-info btn-block btn-lg" @click="showAddModal=false; addUser(); clearMsg();"> Add User </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit New User Model  -->
      <div id="overlay" v-if="showEditModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Edit User </h5>
              <button type="button" class="close" @click="showEditModal=false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-4">
              <form action="#" method="POST">
                
                <div class="form-group">
                  <input v-model="currentUser.name" type="text" name="name" class="form-control form-control-lg" placeholder="Name">
                </div>

                <div class="form-group">
                  <input v-model="currentUser.email" type="text" name="email" class="form-control form-control-lg" placeholder="email">
                </div>

                <div class="form-group">
                  <input v-model="currentUser.phone" type="number" name="phone" class="form-control form-control-lg" placeholder="phone">
                </div>

                <div class="form-group">
                  <button type="button" class="btn btn-info btn-block btn-lg" @click="showEditModal=false; updateUser(); clearMsg();"> Upload User </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete User Model  -->
      <div id="overlay" v-if="showDeleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Delete User </h5>
              <button type="button" class="close" @click="showDeleteModal=false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-4">
              <h4 class="text-danger"> Are you sure want to delete this user?</h4>
              <h5> You are deleting '{{ currentUser.name }}'</h5>
              <hr>
              <button class="btn btn-danger btn-lg" @click="showDeleteModal=false; deleteUser(); clearMsg();"> Yes </button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-success btn-lg" @click="showDeleteModal=false"> No </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<!-- script vue -->
<script>
/* component navbar  */
import Navbar from '@/components/Navbar.vue'
// axios 
import axios from 'axios';

export default {
  name: '#app',
  data () {
    return {
      ErrorMsg : "" ,
      SuccessMsg : "" ,
      showAddModal : false ,
      showEditModal : false ,
      showDeleteModal : false ,
      link_php_page_read : 'http://localhost:8080/project_vue2_documentation/vue_cdn/vue_crud_2/process.php?action=read' ,
      link_php_page_create : 'http://localhost:8080/project_vue2_documentation/vue_cdn/vue_crud_2/process.php?action=create' ,
      link_php_page_update : 'http://localhost:8080/project_vue2_documentation/vue_cdn/vue_crud_2/process.php?action=update' ,
      link_php_page_delete : 'http://localhost:8080/project_vue2_documentation/vue_cdn/vue_crud_2/process.php?action=delete' ,
      users : [] ,
      newUser : { name: "" , email : "" , phone : "" },
      currentUser : {},
    }
  },
  created: function () {
  },
  mounted : function(){
    // mettere la chiamata alla funzione qui dentro fara in modo che vue js andra a prendere i dati al mount 
    this.getAllUsers();
  },
  components: {
    Navbar // Register a new component
  },
  methods : {
    getAllUsers(){
      axios.get(this.link_php_page_read 
      ).then(response  => {
        console.log(response)
        if(response.data.error){
          this.ErrorMsg = response.data.message;
        }else{
          this.users = response.data.users;
          console.log('2',response.data.users)
        }
      })
    },
    addUser(){
      var formData = this.toFormData(this.newUser);
      axios.post(this.link_php_page_create, formData
      ).then( response => {
        console.log(response)
        this.newUser= { name: "" , email : "" , phone : "" };
        if(response.data.error){
          this.ErrorMsg = response.data.message;
        }else{
          this.SuccessMsg = response.data.message;
          this.getAllUsers();
        }
      })
    },
    updateUser(){
      var formData = this.toFormData(this.currentUser);
      axios.post(this.link_php_page_update, formData
      ).then( response => {
        console.log(response)
        this.currentUser= { name: "" , email : "" , phone : "" };
        if(response.data.error){
          this.ErrorMsg = response.data.message;
        }else{
          this.SuccessMsg = response.data.message;
          this.getAllUsers();
        }
      })
    },
    deleteUser(){
      var formData = this.toFormData(this.currentUser);
      axios.post(this.link_php_page_delete, formData
      ).then( response => {
        console.log(response)
        this.currentUser= { name: "" , email : "" , phone : "" };
        if(response.data.error){
          this.ErrorMsg = response.data.message;
        }else{
          this.SuccessMsg = response.data.message;
          this.getAllUsers();
        }
      })
    },
    toFormData(obj){
      var fd = new FormData();
      for(var i in obj){
        fd.append(i,obj[i]);
      }
      return fd;
    },
    selectUser(user){
      this.currentUser = user;
    },
    clearMsg(){
      this.ErrorMsg = "" ;
      this.SuccessMsg = "" ;
    }

  }
}

</script> 
