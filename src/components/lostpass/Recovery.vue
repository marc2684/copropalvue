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
        this.$store.commit('onlyNotLogged');
    },
    mounted() {
        // Verificar props
        if(this.token != undefined && this.user != undefined) {
            
            axios.get(this.$store.state.api + 'lostpass/recovery?token=' + this.token + '&user=' + this.user,{
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then((response) => {
                if(response.data.success) {
                    this.message = 'Contraseña cambiada, ahora puede iniciar sesión.';
                    setTimeout(() => {
                        this.$router.push('/login');
                    }, 3500);  
                }  
                
                else {
                    this.message = 'El enlace ha caducado';
                    setTimeout(() => {
                        this.$router.push('/');
                    }, 3500);                 
                }
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
