<?php require_once 'model/sesion.php'; //traemos al documento sesion?>
<nav class="navbar navbar-expand-lg navbar-light  scrorev-nav-control bg-primary menu">
  <div class="container text-center">

    <a class="navbar-brand text-white" href="home"><img loading="lazy" src="<?=SERVIDOR?>img/favico.png" width="30px"
      height="30px"> LOGO</a>

    <!-- Boton de hamburgesa al cambiar el tamaño de pantalla -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-white"></i>
    </button>

    <!-- Opciones de barra de navegacion -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="btn btn-primary" href="home">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary" href="#">Lorem.</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary" href="#">Lorem, ipsum.</a>
        </li>        
      </ul>

      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <!-- imprimimos el resultado de funcion  obtener_sesion no se requiere un echo -->
          <?=Sesion::obtener_sesion()?>
        </li>
      </ul>
    </div>
  </div>
</nav>