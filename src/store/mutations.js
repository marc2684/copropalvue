import { router } from '../main'

export const mutations = {
    /**
     * Modifica el estado de login de un usuario, y su data
     * 
     * @param {*} state 
     * @param {*} userinfo 
     */
    loginUser(state, userinfo) {
        state.is_logged = true;
        state.owner_user = userinfo;
    },

    /**
     * Cierra sesión
     * 
     * @param {*} state 
     */
    logoutUser(state) {
        localStorage.removeItem('id_user');
        state.is_logged = false;
        state.owner_user = null;
        router.push('/login')
    },

    /**
     * Si el usuario está conectado, lo envía al home
     * 
     * @param {*} state 
     */
    onlyNotLogged(state) {
        if(state.is_logged) {
            router.push('/')
        }
    },

    /**
     * Si el usuario no está conectado, lo manda al login
     * 
     * @param {*} state 
     */
    onlyLogged(state) {
        if(!state.is_logged) {
           router.push('/login')
        }
    }
}