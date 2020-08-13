<template>
  <div>
    <app-tweet-retweet-compose
      :tweet="tweet"
      @success="$emit('close')"
    />

    <component
      v-if="tweet"
      class="border border-gray-700 rounded-lg mt-4 p-4"
      :is="`app-tweet-variant-${tweet.type}`"
      :tweet="tweet"
    />
  </div>
</template>

<script>
  export default {
    props: {
      tweet: {
        required: true,
        type: Object
      }
    }
  }
</script>
