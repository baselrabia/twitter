<template>
  <textarea
    class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2"
    :placeholder="placeholder"
    autofocus
    @input="$emit('input', $event.target.value); resize($event)"
    :value="value"
  ></textarea>
</template>

<script>
  export default {
    props: {
      value: {
        required: false
      },

      placeholder: {
        required: false,
        type: String
      }
    },

    methods: {
      resize (e) {
        e.target.style.height = 'auto'
        e.target.style.height = `${e.target.scrollHeight}px`
      }
    }
  }
</script>
