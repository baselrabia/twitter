<template>
    <div >
            <div class="border-b-8 border-gray-800 p-4 w-full">
                <app-tweet-compose />
            </div>

        <app-tweet
        v-for="tweet in tweets"
        :key="tweet.id"
        :tweet="tweet"
        />

        <div v-if="tweets.length"
            v-observe-visibility="{
                callback: visibilityChanged
            }">
        </div>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex'

    export default {
         data() {return {
                page: 1,
                lastPage: 1,
            }},
        computed: {
            ...mapGetters({
                tweets: "timeline/tweets"
            }),
            urlWithPage() {
                return `/api/timeline?page=${this.page}`
            }
        },
        methods: {
            ...mapActions({
                getTweets:'timeline/getTweets'
            }),

            loadTweets(){
            this.getTweets(this.urlWithPage).then((response) => {
                this.lastPage = response.data.meta.last_page
            })
            },

             visibilityChanged (isVisible) {
                if(!isVisible){
                     return
                }
                if(this.lastPage === this.page){
                    return
                }
                    console.log(isVisible);

                this.page++;
                this.loadTweets();
            },
        },
        mounted(){
            this.loadTweets();
        }
    }
</script>
