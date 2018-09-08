<template>
  <main>
    <topnav></topnav>
    <router-view></router-view>
  </main>
</template>

<script>
import Topnav from './components/overall/Topnav.vue'

export default {
  name: 'app',
  beforeCreate() {
    let id_user = localStorage.getItem('id_user');

    if(null != id_user) {
      this.$store.dispatch('login', {
        router : this.$router,
        id_user
      });
    }
    
  },
  components: {
    Topnav
  }
}
</script>

<style lang="scss">

</style>
