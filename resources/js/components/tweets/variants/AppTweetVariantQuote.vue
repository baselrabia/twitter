<template>
        <div class="flex w-full">
            <img :src="tweet.user.avatar" class="w-12 h-12 rounded-full mr-3" >

            <div class="flex-grow">
            <app-tweet-username :user="tweet.user" />
                <p class="text-gray-300 Whitespace-pre-wrap">
                    {{tweet.body}}
                </p>

                <app-tweet
                class="border border-gray-700 rounded-lg mt-4"
                :tweet="tweet.original_tweet"
                />
                <app-tweet-action-group
                :tweet="tweet"
                />

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
        }
    }
</script>
