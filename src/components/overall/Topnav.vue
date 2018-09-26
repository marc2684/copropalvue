<template>
  <header>
    <nav>
      <div class="logo">
        COPROPAL
      </div>
      <ul class="menu mb-0">
        <template v-if="!isLogged">
          <li><router-link to="/login" exact>Login</router-link></li>
          <li><router-link to="/register" exact>Registro</router-link></li>
        </template>
        <template v-else>
          <li>Hola, <strong>{{ ownerUser.name }}</strong></li>
          <li><logout>Cerrar Sesión</logout></li>
        </template>
      </ul>
    </nav>
    <nav class="submenu">
      <ul class="mb-0">
        <template v-if="isLogged">
          <li><router-link to="/login" exact>Home</router-link></li>
          <li><router-link to="/catalogos" exact>Catalogos</router-link></li>
          <li><router-link to="/produccion" exact>Producción</router-link></li>
          <li><router-link to="/inventario" exact>Inventario</router-link></li>
        </template>
      </ul>
    </nav>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav> -->
  </header>
</template>

<script>
import Logout from "./Logout";

export default {
  name: "Topnav",
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
};
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
          color: white !important;
          text-decoration: none;

          &:hover,
          &:focus,
          &.router-link-active {
            opacity: 1;
          }
        }
      }
    }
  }

  .submenu {
    background: #ddd;

    ul {
      li {
        a {
          color: black !important;
        }
      }
    }
  }
}
</style>
