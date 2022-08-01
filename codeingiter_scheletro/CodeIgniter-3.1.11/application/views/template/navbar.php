<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="navbar-brand">Navbar</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Elementi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo site_url('Elementi_Crud_Controller/index') ?>">Tabella Elementi</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('Elementi_Crud_Controller/new_element') ?>">Nuovo Elemento</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produttori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo site_url('Produttori_Crud_Controller/index') ?>">Tabella Produttori</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('Produttori_Crud_Controller/new_productor') ?>">Nuovo Produttore</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo site_url('Welcome/index') ?>">Welcome controller </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            API | end-point
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- List API or endpoint  -->
            <li><a class="dropdown-item" href="<?php echo site_url('API_Controller/index') ?>">elementi api</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('API_Controller/index_injson') ?>">elementi API dati</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('API_Controller/produttori') ?>">produttori api</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('API_Controller/produttori_injson') ?>">produttori API dati </a></li>


            <!-- <li><a class="dropdown-item" href="<?php echo site_url('Produttori_Crud_Controller/new_productor') ?>">Nuovo Produttore</a></li> -->
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
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
      </ul>
    </div>
  </div>
</nav>