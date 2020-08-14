import getters from "../store/tweet/getters"
import mutations from "../store/tweet/mutations"
import actions from "../store/tweet/actions"

export default {
    namespaced: true,

    state: {
        tweets: []
    },

    getters,

    mutations,

    actions,
};
