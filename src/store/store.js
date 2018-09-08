import Vue from 'vue'
import Vuex from 'vuex'
import {mutations} from './mutations'
import {actions} from './actions'

Vue.use(Vuex);

// Globalización
export const store = new Vuex.Store({
    state: {

        /**
         * Path de ocrend framework.
         * Debe ser modificado por la url absoluta en donde opere.
         * 
         * @var string
         */
        api : 'http://localhost/OCREND/vue-ocrend-framework/api/'
    },
    mutations,
    actions
});