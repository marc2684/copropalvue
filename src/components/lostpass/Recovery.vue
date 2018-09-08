<template>
    <div class="box-ocrend">
        <p v-text="message"></p>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['token', 'user'],
    name : 'Recovery',
    beforeCreate() {
        this.$store.commit('onlyNotLogged', this.$router);
    },
    mounted() {
        // Verificar props
        if(this.token != undefined && this.user != undefined) {
            
            axios.put(this.$store.state.api + 'lostpass/recovery',{
                token : this.token,
                user: this.user
            },{
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then((response) => {
                console.log(response);              
            })
            .catch((error) => {
                console.log(error)
            })
        }

        // Sacar
        else {
            this.$router.push('/');
        }
    },
    data() {
        return {
            message : 'Verificando el enlace...'
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
