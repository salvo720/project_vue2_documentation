<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="../assets/logo.png"
            alt="logo.png"
            style="height: 40px; width: 40px"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/#/Crud">
                Utenti
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#/link"> Link </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> -->
            <!-- <li class="nav-item">
              <a
                class="nav-link disabled"
                href="#"
                tabindex="-1"
                aria-disabled="true"
                >Disabled</a
              >
            </li> -->
          </ul>
        </div>
        <div>
          <button type="button" class="btn btn-danger" v-on:click="log_out">
            <i class="fas fa-sign-out-alt"></i>
          </button>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "#app",
  data() {
    return {};
  },
  created: function () {},
  mounted: function () {
    // mettere la chiamata alla funzione qui dentro fara in modo che vue js andra a prendere i dati al mount
  },
  methods: {
    log_out() {
      // window.console.error(localStorage);
      if (localStorage.token) {
        localStorage.token = ""; //equivalente di false nell'if
        this.$router.push("/");
      }
    },
  },
};
</script>