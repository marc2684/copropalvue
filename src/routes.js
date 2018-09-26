import Home from './components/home/Home.vue'
import PageNotFound from './components/error/PageNotFound.vue'
import Login from './components/login/Login.vue'
import Register from './components/register/Register.vue'
import Lostpass from './components/lostpass/Lostpass.vue'
import Recovery from './components/lostpass/Recovery.vue'
import Catalogs from './components/catalogs/Catalogs.vue'

export const routes = [
    { path: '/', component: Home },
    { path: '*', component: PageNotFound },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/lostpass', component: Lostpass },
    {
        path: '/recovery',
        component: Recovery,
        props: (route) => ({
            token: route.query.token,
            user: route.query.user
        })
    },
    { path: '/catalogos', component: Catalogs }
]