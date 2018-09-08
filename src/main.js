import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import {routes} from './routes'
import {store} from './store/store'
import { sync } from 'vuex-router-sync'
import './assets/sass/main.scss'

// Usar el enrutador
Vue.use(VueRouter);

// Establecer las rutas
const router = new VueRouter({
  routes
});

// Sincronizar el router con el store
const unsync = sync(store, router)

// Iniciar la app
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
