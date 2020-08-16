<template>
        <div class="flex w-full">
            <img :src="tweet.user.avatar" class="w-12 h-12 rounded-full mr-3" >

            <div class="flex-grow">
                <app-tweet-username :user="tweet.user" />

                <div v-if="tweet.replying_to" class="text-gray-600 mb-2" >
                    Replying to <a :href="`/user/${tweet.replying_to}`" >@{{tweet.replying_to}}</a>
                </div>

                <app-tweet-body :tweet="tweet" />

            <div class="flex flex-wrap mb-4 mt-4" v-if="images.length" >
                <div
                class="w-6/12 flex-grow"
                v-for="(image,index) in images"
                :key="index"
                >
                    <img :src="image.url" class="rounded-lg">
                </div>
            </div>

             <div class="mb-4 mt-4" v-if="video" >
                <video :src="video.url" controls class="rounded-lg"></video>
            </div>

                <app-tweet-action-group
                :tweet="tweet" />
            </div>

        </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                reqired: true,
                type: Object
            }
        },
        computed: {
            images(){
                return this.tweet.media.data.filter(m=>m.type ==='image')
            },
            video(){
                return this.tweet.media.data.filter(m=>m.type ==='video')[0]
            }
        }
    }
</script>
