import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import { routes } from './routes'
import { store } from './store/store'
import './assets/sass/main.scss'
import './assets/css/bootstrap.min.css'

// Usar el enrutador
Vue.use(VueRouter);

// Establecer las rutas
export const router = new VueRouter({
  routes
});

// Iniciar la app
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
