<template>
    <div class="box-ocrend">
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
        this.$store.commit('onlyNotLogged', this.$router);
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

<style lang="scss">
    // Generado en Register.vue
    form {
        max-width: 500px;
        width: 100%;

        label {
            display: block;
        }
        input {
            width: 100%;
            display: block;
            border-radius: 4px;
            border: 1px solid rgb(218, 216, 216);
            height: 30px;
            margin-bottom: 10px;
        }
        button {
            background-color: #041830;
            border: 1px solid #041830;
            color: white;
            padding: 10px;
            border-radius: 4px;
            display: block;
            margin: 0 auto;
            cursor: pointer;
            transition: all 0.4s;

            &:hover {
                background-color: #083163;
            }
        }
    }
</style>
