<template>
    <header>
        <nav>
            <div class="logo">
                SPA
            </div>
            <ul class="menu">
                <template v-if="!isLogged">
                    <li><router-link to="/login" exact>Iniciar</router-link></li>
                    <li><router-link to="/register" exact>Registro</router-link></li>
                </template>
                <template v-else>
                    <li>Hola, <strong>{{ ownerUser.name }}</strong></li>
                    <li><logout>Cerrar Sesión</logout></li>
                </template>
            </ul>
        </nav>
    </header>
</template>

<script>
import Logout from './Logout'

export default {
    name: 'Topnav',
    computed: {
        isLogged() {
            return this.$store.state.is_logged;
        },
        ownerUser() {
            return this.$store.state.owner_user;
        }
    },
    components: {
        Logout
    }
}
</script>

<style lang="scss" scoped>
    header {
        width: 100%;
        z-index: 9999;
        position: fixed;

        nav {
            background-color: #041830;
            padding: 0 40px;
            height: 35px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-content: center;
            align-items: center;

            .logo {
                color: white;
            }

            ul {
                list-style: none;
                padding: 0;
                display: flex;

                li {
                    margin-left: 20px;
                    color: white;

                    a {
                        display: block;
                        opacity: 0.7;
                        transition: opacity 0.4s;
                        color: white!important;
                        text-decoration: none;

                        &:hover, &:focus, &.router-link-active {
                            opacity: 1;
                        }
                    }
                }
            }
        }
    }
</style>
