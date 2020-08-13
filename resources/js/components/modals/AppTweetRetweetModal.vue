<template>
  <div>
    {{tweet}}
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
