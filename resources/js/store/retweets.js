import axios from "axios";
import {without} from 'lodash'

export default {
    namespaced: true,

    state: {
        retweets: []
    },

    getters: {
        retweets(state) {
            return state.retweets;
        }
    },

    mutations: {
        PUSH_RETWEETS(state, data) {
            state.retweets.push(...data);
        },
        POP_RETWEET(state, data) {
            state.retweets = without(state.retweets, data);
        }
    },

    actions: {
        async likeTweet({ commit }, tweet) {
            await axios.post(`/api/tweets/${tweet.id}/retweets`);
        },
        async unlikeTweet({ commit }, tweet) {
            await axios.delete(`/api/tweets/${tweet.id}/retweets`);
        },
        syncLike({ commit, state }, { id }) {
            if (state.retweets.includes(id)) {
                commit("POP_RETWEET", id);
                return;
            }
            commit("PUSH_RETWEETS", [id]);
        }
    }
};
