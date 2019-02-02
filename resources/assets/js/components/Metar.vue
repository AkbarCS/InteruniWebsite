<template>
  <tt>
    <vue-typer :text=metar :repeat='0' :type-delay='25'></vue-typer>
  </tt>
</template>

<script>
export default {
  props: {
    icao: {
      type: String,
      default: 'EGVO'
    },
  },
  data() {
    return {
      'metar': ' ',
    }
  },
  beforeMount() {
    self = this;
    axios.get(`https://avwx.rest/api/metar/${self.icao}`)
    .then(response => {
      self.metar = response.data['Raw-Report'];
    });
  }
}
</script>

<style>
.vue-typer {
  font-family: inherit;
}

.vue-typer .custom.char.typed {
  color: inherit;
}

.vue-typer .custom.caret {
  display: none;
}
</style>
