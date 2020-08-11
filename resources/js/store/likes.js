import axios from "axios";
import {without} from 'lodash'

export default {
    namespaced: true,

    state: {
        likes: []
    },

    getters: {
        likes(state) {
            return state.likes;
        }
    },

    mutations: {
        PUSH_LIKES(state, data) {
            state.likes.push(...data);
        },
        POP_LIKE(state, data) {
            state.likes = without(state.likes ,data);
        }
    },

    actions: {
        async likeTweet({ commit }, tweet) {
            await axios.post(`/api/tweets/${tweet.id}/likes`);
        },
        async unlikeTweet({ commit }, tweet) {
            await axios.delete(`/api/tweets/${tweet.id}/likes`);
        },
        syncLike({ commit,state }, {id}) {

        if (state.likes.includes(id)) {
            commit('POP_LIKE',id)
            return;
        }
            commit("PUSH_LIKES", [id])
        }
    }
};
