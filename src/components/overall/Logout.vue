<template>
    <a href="javascript:void(0)" @click="logout"><slot></slot></a>
</template>

<script>
export default {
    name: 'Logout',
    methods: {
        logout() {
            this.$store.commit('logoutUser');
        }
    }    
}
</script>

<style lang="scss" scoped>

</style>
