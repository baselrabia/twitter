import axios from "axios";
import { get } from "lodash";

export default {
    namespaced: true,

    state: {
        notifications: []
    },

    getters: {
        notifications(state) {
            return state.notifications.sort((a, b) => b.created_at - a.created_at);
        }
    },

    mutations: {
        PUSH_NOTIFICATIONS(state, data) {
            state.notifications.push(...data);
        },

    },

    actions: {
        async getNotifications({ commit }, url) {
            let response = await axios.get(url);
            commit("PUSH_NOTIFICATIONS", response.data.data);

            return response;
        },

    }
};
