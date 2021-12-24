<template>
  <span v-text="formatearFecha"></span>
</template>

<script>
export default {
  props: ["fecha"],
  computed: {
    formatearFecha() {
      return moment(this.fecha).locale("es").format("DD [de] MMM [del] YYYY");
    },
  },
};
</script>

<style>
</style>