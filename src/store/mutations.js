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
    logoutUser(state, router) {
        localStorage.removeItem('id_user');
        state.is_logged = false;
        state.owner_user = null;
        router.push('/login')
    },

    /**
     * Si el usuario está conectado, lo envía al home
     * 
     * @param {*} state 
     * @param {*} router (this.$router) desde un beforeCreate() en el component 
     */
    onlyNotLogged(state, router) {
        if(state.is_logged) {
            router.push('/')
        }
    },

    /**
     * Si el usuario no está conectado, lo manda al login
     * 
     * @param {*} state 
     * @param {*} router (this.$router) desde un beforeCreate() en el component 
     */
    onlyLogged(state, router) {
        if(!state.is_logged) {
            router.push('/login')
        }
    }
}