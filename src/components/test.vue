<template>
    <div>
      {{ t | k }}
    </div>
  </template>
  <script>
  export default {
    data() {
      return {
        test: [],
        t: 70
      };
    },
    filters: {
      k: function(value) {
        return value + "00";
      }
    }
  };
  </script>
  