import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
// bootstrap 
import "bootstrap"
import "bootstrap/dist/css/bootstrap.min.css"
// font awesome 
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret)

createApp(App).component('font-awesome-icon', FontAwesomeIcon)

createApp(App).config.productionTip = false

createApp(App).use(store).use(router).mount('#app')
