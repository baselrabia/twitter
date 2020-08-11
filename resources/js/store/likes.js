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
    },

    actions: {
        async likeTweet ({commit},tweet){
            await axios.post(`/api/tweets/${tweet.id}/likes`)
        },
        async unlikeTweet ({commit},tweet){
            await axios.delete(`/api/tweets/${tweet.id}/likes`)
        }
    }
};
