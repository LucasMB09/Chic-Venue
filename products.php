<?php
  

 
  require_once ('./php/CreateDb.php');
  require_once ('./php/component.php');
  $database = new CreateDb("chicvenue","articulo");


?>


<!doctype html>
<html lang="en">
  <head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    <title>Chic Venue</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    <!-- LINEA NEGRA -->
    <nav class="navbar bg-dark" data-bs-theme="dark">
       <div class="container-fluid">
      <br><br>
    </div>
    </nav>
    <!--FIN LINEA NEGRA -->


    <!-- MENU DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Novedades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Rebajas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Básicos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ropa
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Mezclilla</a></li> <!---->
                <li><a class="dropdown-item" href="#">Sudaderas</a></li>
                <li><a class="dropdown-item" href="#">Vestidos</a></li>
                <li><a class="dropdown-item" href="#">Conjuntos</a></li>
                <li><a class="dropdown-item" href="#">Ropa de descanso</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">¡TEMPORADA DE VERANO!</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <ul class="nav">
            <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;
               <a class="navbar-brand" href="#">
               <img src="assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
             <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;
               <a class="navbar-brand" href="log-in.html">
               <img src="assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;
               <a class="navbar-brand" href="#">
               <img src="assets/favoritos.JPG" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a class="navbar-brand" href="#">
              <img src="assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
             </a>
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['id_articulo'], $row['precio'], $row['nombre_articulo'], $row['descripcion'],$row['imagen']);
                }
            ?>
        </div>
    </div>


    
    <!-- FIN MENU DE NAVEGACIÓN -->