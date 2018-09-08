import Vue from 'vue'
import Vuex from 'vuex'
import {mutations} from './mutations'
import {actions} from './actions'

Vue.use(Vuex);

// Globalización
export const store = new Vuex.Store({
    state: {

        /**
         * Utilizado para saber si el usuario actual está conectado o no.
         * 
         * @var bool
         */
        is_logged : false,

        /**
         * Utilizado para tener la data del usuario conectado
         * 
         * @var object
         */
        owner_user : null
    },
    mutations,
    actions
});