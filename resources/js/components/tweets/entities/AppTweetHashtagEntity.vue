<template>
  <a :href="`/hashtags/${body.substring(1)}`">{{ body }}</a>
</template>

<script>
  export default {
    props: {
      body: {
        required: true,
        type: String
      }
    }
  }
</script>
