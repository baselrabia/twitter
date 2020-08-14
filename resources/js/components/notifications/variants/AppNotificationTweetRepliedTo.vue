<template>
  <div class="p-4 flex-grow">
      {{notification.id}}
  </div>
</template>

<script>

  export default {
    props: {
      notification: {
        required: true,
        type: Object
      }
    },

  }
</script>
