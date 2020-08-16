<template >
    <div>

        <div>
            parent
        </div>
        <div>
            <app-tweet
                v-if="tweet(id)"
                :tweet="tweet(id)"
                />
        </div>
        <div>

child
        </div>


    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

    export default {
        props: {
            id: {
                reqired: true,
                type: String
            }
        },

        computed: {
            ...mapGetters({
                tweet: 'conversation/tweet'
            }),
        },

        methods: {
            ...mapActions({
                getTweets:'conversation/getTweets'
            }),
        },
        mounted () {
            this.getTweets(`/api/tweets/${this.id}`)
        }
    }
</script>

