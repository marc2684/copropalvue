import Home from './components/home/Home.vue'
import PageNotFound from './components/error/PageNotFound.vue'

export const routes = [
    { path: '/', component: Home },
    { path: '*', component: PageNotFound }
]