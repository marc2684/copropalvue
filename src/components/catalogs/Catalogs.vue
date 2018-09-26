<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body bg-info text-white">
            Materia Prima
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            Formulas
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            Presentaciones
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            Formulas
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Catalogs",
  data() {
    return {
      mprima: [],
      formulas: [],
      presentaciones: []
    };
  },
  beforeCreate() {
    this.$store.commit("onlyLogged");
  },
  mounted() {}
};
</script>


<style lang="scss" scoped>
img {
  height: 130px;
  margin-bottom: 30px;
}
</style>
