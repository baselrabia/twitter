<template>
  <div>
    <component
      v-if="tweet"
      :is="`app-tweet-variant-${tweet.type}`"
      class="mb-4"
      :tweet="tweet"
    />

    <app-tweet-reply-compose
      v-if="tweet"
      :tweet="tweet"
      @success="$emit('close')"
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
