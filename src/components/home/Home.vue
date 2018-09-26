<template>
    <div class="box-ocrend">
      <img :src="require('../../assets/img/biotecap_logo.png')" :alt="welcome" />
      <h2 v-text="welcome"></h2>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Home",
  data() {
    return {
      welcome: null
    };
  },
  beforeCreate() {
    this.$store.commit("onlyLogged");
  },
  mounted() {
    axios
      .get(this.$store.state.api)
      .then(response => {
        console.log(response);
        this.welcome = response.data.message;
      })
      .catch(error => {
        console.log(error);
      });
  }
};
</script>


<style lang="scss" scoped>
img {
  height: 130px;
  margin-bottom: 30px;
}
</style>
