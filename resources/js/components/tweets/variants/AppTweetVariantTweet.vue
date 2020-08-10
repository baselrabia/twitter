<template>
        <div class="flex w-full">
            <div class="mr-3">
                <img :src="tweet.user.avatar" class="w-12 rounded-full" >
            </div>
            <div>
            <app-tweet-username :user="tweet.user" />
                <p class="text-gray-300 Whitespace-pre-wrap">
                    {{tweet.body}}
                </p>
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
