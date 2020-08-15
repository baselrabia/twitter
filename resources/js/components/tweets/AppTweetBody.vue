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
                    'template' : `<div> ${this.replaceEntities(this.tweet.body)}</div>`
                }
            },

            entities () {
                return this.tweet.entities.data.sort((a,b) => b.start - a.start)
            }

        },

        methods: {
            replaceEntities (body) {
                this.entities.forEach(entity => {
                    body = body.substring(0,entity.start) + `<app-tweet-${entity.type}-entity body="${entity.body}"/>` + body.substring(entity.end)
                });

                return body;
            }
        }
    }
</script>
