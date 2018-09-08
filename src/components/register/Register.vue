<template>
    <div class="box-ocrend">
        <h1>Registro</h1>
        <hr>
        <form role="form" id="registerform" @submit.prevent="register">
            <div>
                <label>Nombre</label>
                <input type="text" name="name" required />
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" autocomplete="email"  required />
            </div>
            <div>
                <label>Contraseña</label>
                <input type="password" name="pass" autocomplete="new-password" required />
            </div>
            <div>
                <label>Repetir Contraseña</label>
                <input type="password" name="pass_repeat" autocomplete="new-password"  required />
            </div>
            <div>
                <button type="submit">Registrarme</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Register',
    beforeCreate() {
        this.$store.commit('onlyNotLogged');
    },
    methods: {
        register() {
            let myForm = document.getElementById('registerform');
            let formData = new FormData(myForm);

            axios.post(this.$store.state.api + 'register',formData,{
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

<style lang="scss">

</style>
