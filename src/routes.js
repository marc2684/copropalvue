import Home from './components/home/Home.vue'
import PageNotFound from './components/error/PageNotFound.vue'
import Login from './components/login/Login.vue'
import Register from './components/register/Register.vue'

export const routes = [
    { path: '/', component: Home },
    { path: '*', component: PageNotFound },
    { path: '/login', component: Login },
    { path: '/register', component: Register }
]