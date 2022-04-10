import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Progetto from '../views/Progettoview.vue'
import Progettoview_2_wait from '../views/Progettoview_2_wait.vue'
import Login from '../views/Login.vue'
import Crud from '../views/Crud.vue'


const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/Progettoview',
    name: 'Progetto',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: Progetto
  },
  {
    path: '/Progettoview_2_wait',
    name: 'Progettoview_2_wait',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: Progettoview_2_wait
  },
  {
    path: '/Home',
    name: 'Home',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: Home
  },
  {
    path: '/Crud',
    name: 'Crud',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: Crud
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
