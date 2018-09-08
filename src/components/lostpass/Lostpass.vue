<template>
    <div class="box-ocrend">
        <h1>Recuperar Contraseña</h1>
        <hr>
        <form role="form" id="lostpass" @submit.prevent="lostpass">
            <div>
                <label>Email</label>
                <input type="email" name="email" v-model="email" required />
            </div>
            <div>
                <button type="submit">Recuperar</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name : 'Lostpass',
    beforeCreate() {
        this.$store.commit('onlyNotLogged');
    },
    data() {
        return {
            email : null
        }
    },
    methods : {
        lostpass() {
            let myForm = document.getElementById('lostpass');
            let formData = new FormData(myForm);

            axios.post(this.$store.state.api + 'lostpass/send',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                let data = response.data;
                alert(data.message);

                if(1 == data.success) {
                   this.email = null;
                }
            })
            .catch((error) => {
                console.log(error.response)
            })
        }
    } 
}
</script>

<style lang="scss" scoped>

</style>
