import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        loggedIn: false
    },
    mutations: {
        logIn (state) {
            state.loggedIn = true
        },
        logOut (state) {
            state.loggedIn = false
        }
    },
    getters: {
        getLoginInfo: (state) => {
            return state.loggedIn
        }
    }
})

export default store