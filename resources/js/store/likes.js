import axios from "axios";

export default {
    namespaced: true,

    state: {
        likes: []
    },

    getters: {
        likes(state) {
            return state.likes
        }
    },

    mutations: {
        PUSH_LIKES(state, data) {
            state.likes.push(...data)
        }
    }
};
