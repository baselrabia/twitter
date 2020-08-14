<template>
  <div class="flex w-full border-b border-gray-800">
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
    }
  }
</script>
