<template >
    <div>


        <div>

            <app-tweet
                v-for="parent in parents(id)"
                :tweet="parent"
                :key="parent.id"
                />
        </div>
        <div class="text-lg border-b-8 border-t-8 border-gray-800">

            <app-tweet
                v-if="tweet(id)"
                :tweet="tweet(id)"
                />
        </div>
        <div>
              <app-tweet
                v-for="replie in replies(id)"
                :tweet="replie"
                :key="replie.id"
                />

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
                tweets: 'conversation/tweets',
                tweet: 'conversation/tweet',
                parents: 'conversation/parents',
                replies: 'conversation/replies',

            }),
        },

        methods: {
            ...mapActions({
                getTweets:'conversation/getTweets'
            }),
        },
        mounted () {
            this.getTweets(`/api/tweets/${this.id}`)
            this.getTweets(`/api/tweets/${this.id}/replies`)

        }
    }
</script>

