import axios from 'axios'

export const actions = {
    /**
     * Inicia la sesión de un usuario en todo el sistema.
     * 
     * @param {*} data : { router , otra data... }
     */
    login({ commit, state }, data) {
        axios.get(state.api + 'users/' + data.id_user)
        .then((response) => {
            state.$router.push('/')
            commit('loginUser', response.data);
        })
        .catch((error) => {
          console.log(error)
        });
    },
    
    /**
     * Refresca la información del usuario conectado, sólo si está conectado
     * 
     * @param {*} data : { router , otra data... }
     */
    refreshOwnerUser({ commit, state }, data) {
        let id_user = localStorage.getItem('id_user');

        // Si existe algo en localstorage actualizamos la información
        if(null != id_user) {
            axios.get(state.api + 'users/' + id_user)
            .then((response) => {
                commit('loginUser', response.data);
            })
            .catch((error) => {
                console.log(error)
            });
        } 
        
        // Si no existe nada en localstorage, deslogeamos
        else {
            commit('logoutUser');
        }
    }
}