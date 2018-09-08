<template>
    <div class="box-ocrend">
      <img :src="require('../../assets/img/vueandocrend.png')" :alt="welcome" />
      <h1 v-text="welcome"></h1>
      <p>Bienvenido ¡empecemos a programar!</p>
      <div>
        <a href="https://framework.ocrend.com" target="_blank">Documentación Ocrend Framework</a>
        <span>-</span>
        <a href="https://framework.ocrend.com/donaciones" target="_blank">Donaciones</a>
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Home',
    data() {
      return {
        welcome : null
      }
    },
    mounted() {
      axios.get(this.$store.state.api)
        .then((response) => {
          console.log(response);
          this.welcome = response.data.message;
        })
        .catch((error) => {
          console.log(error)
        })
    }
}
</script>


<style lang="scss" scoped>
  img {
    height: 130px;
    margin-bottom: 30px;
  }
</style>
