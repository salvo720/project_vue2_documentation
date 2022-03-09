<template>
  <div id="nav">
    <router-link to="/">Home</router-link> |
    <router-link to="/Progettoview">Progetto</router-link> |
    <router-link to="/Login">Login</router-link> | 
    <router-link to="/Crud">Crud</router-link> | 
    <router-link to="/about">About</router-link>
    <router-view/>
  </div>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>


<script>
import fontawesome from "@fortawesome/fontawesome";
import solid from "@fortawesome/fontawesome-free-solid";
import brands from "@fortawesome/fontawesome-free-brands";

// import FontAwesomeIcon from "@fortawesome/vue-fontawesome";

fontawesome.library.add( brands , solid);

export default {
  name: "App",
  
};
</script>
