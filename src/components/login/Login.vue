<template>
    <div class="box-ocrend">
        <form role="form" id="loginform" @submit.prevent="login">
            <div>
                <label>Email</label>
                <input type="email" name="email"  required />
            </div>
            <div>
                <label>Contraseña</label>
                <input type="password" name="pass" required />
            </div>
            <div>
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Login',
    beforeCreate() {
        this.$store.commit('onlyNotLogged', this.$router);
    },
    methods: {
        login() {
            let myForm = document.getElementById('loginform');
            let formData = new FormData(myForm);

            axios.post(this.$store.state.api + 'login',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                let data = response.data;
                alert(data.message);

                if(1 == data.success) {
                    // Almacenar en localstorage el id del usuario
                    localStorage.setItem('id_user', data.id_user);

                    // Iniciar sesión en vue
                    this.$store.dispatch('login', {
                        router : this.$router,
                        id_user : data.id_user
                    });
                }
            })
            .catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
