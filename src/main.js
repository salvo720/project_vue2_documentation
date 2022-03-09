import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
// bootstrap 
import "bootstrap"
import "bootstrap/dist/css/bootstrap.min.css"
// font awesome 5 
import fontawesome from "@fortawesome/fontawesome";
import solid from "@fortawesome/fontawesome-free-solid";
import brands from "@fortawesome/fontawesome-free-brands";

fontawesome.library.add( brands , solid);

createApp(App).use(store).use(router).mount('#app')
