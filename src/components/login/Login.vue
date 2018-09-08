<template>
    <div class="box-ocrend">
        <p>Login</p>
    </div>
</template>

<script>
export default {
    name: 'Login',
    beforeCreate() {
        this.$store.commit('onlyNotLogged', this.$router);
    }
}
</script>

<style lang="scss" scoped>

</style>
