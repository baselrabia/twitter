<template>

<p class="text-gray-300 Whitespace-pre-wrap">
    <component :is="body" />
</p>


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
            body() {
                return {
                    'template' : `<div> ${this.tweet.body}</div>`
                }
            }

        }
    }
</script>
