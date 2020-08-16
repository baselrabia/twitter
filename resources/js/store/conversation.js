import getters from "../store/tweet/getters";
import mutations from "../store/tweet/mutations";
import actions from "../store/tweet/actions";

export default {
    namespaced: true,

    state: {
        tweets: []
    },

    getters: {
        ...getters,
        parents(state) {
            return id =>
                state.tweets
                    .filter((t) => {
                        return t.id != id && !t.parents_ids.includes(parseInt(id)) })
                    .sort((a, b) => b.created_at - a.created_at);
        },
        replies(state){
             return id => state.tweets.filter(t => t.parent_id == id);
        }
    },

    mutations,

    actions
};
