<?php

  session_start();

  if(isset($_GET['valor'])){
    $valor = $_GET['valor'];
  }
  else{
    $valor = $_SESSION['valor'];
  }

  if(isset($_COOKIE['usuario'])){
    $_SESSION['user'] = $_COOKIE['usuario'];
    $_SESSION['email'] = $_COOKIE['email'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
  }
  elseif(isset($_SESSION['email'])){
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
  }
  elseif($valor == 0){
    $user = "No";
    $email = "No";  
  }
  elseif($valor == 1){
    $user = ":v";
    $email = ":v";
  }
  else{
    $valor = 1;
    $_SESSION['valor'] = $valor;
  }
  
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
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <link href="/css/formulario.css" rel="stylesheet">
    <style>
      .carousel-control-prev .slider-icon,
      .carousel-control-next .slider-icon {
        width: 100px;
        height: 100px;
      }
  </style>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    <!-- LINEA NEGRA -->
    <nav class="navbar bg-dark" data-bs-theme="dark">
       <div class="container-fluid">
      <?php
        if($_SESSION['email'] != "No" && $_SESSION['user'] != "No"){
          ?>
          <h3 class="text_user" style="display:none;">Hola, <?php echo "$user";?></h1>
          <?php
          if($valor == 0 ){
            if($_GET['valor'] == 0){
              setcookie('usuario', "", time()-86400, '/');
              setcookie('email', "", time()-86400, '/');
              unset($_SESSION['email']);
              unset($_SESSION['user']);
              $_SESSION['valor'] = 1;
              header("Location: products.php?valor=1");
            }
          }
        }
      ?>
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
          &nbsp;&nbsp;&nbsp;&nbsp;
          <ul class="nav">
            <li class="nav-item">
               <a class="navbar-brand" href="#">
               <img src="assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
             <li class="nav-item">
              <?php
              if($email != ":v" && $user != ":v"){

                ?>

                  <h3 id="usuario" style="display:none;"> <?php echo "$user";?></h3>
                  <h3 id="correo" style="display:none;"> <?php echo "$email";?></h3>
                  <a class="navbar-brand" onclick="user()" id="change"> <!-- INCIAR SESION -->
                    <img src="assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                  </a>
                  
                  <?php
                  
                
              }
              else{
                ?>
                <a class="navbar-brand" href="log-in.php"> <!-- INCIAR SESION -->
                <img src="assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
            </li>
            <li class="nav-item">
               <a class="navbar-brand" href="#">
               <img src="assets/favoritos.JPG" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#">
              <img src="assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
             </a>
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>

<!-- Carrusel de imágenes -->
<?php
$query = "SELECT COUNT(imagen) AS num_images FROM articulo";
$result = mysqli_query($database->con, $query);
$row = mysqli_fetch_assoc($result);
$num_images = $row['num_images'];
?>
<br>
<br>
<!-- Carrusel de imágenes -->
<!-- Carrusel de imágenes -->
<div id="manualCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $result = $database->getData();
    $count = 0;

    // Obtener todas las imágenes
    $images = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $img_id = $row['id_articulo'];
      $img_name = $row['nombre_articulo'];
      $img_description = $row['descripcion'];
      $img_price = $row['precio'];
      $img_url = $row['imagen'];

      $images[] = array(
        'id' => $img_id,
        'name' => $img_name,
        'description' => $img_description,
        'price' => $img_price,
        'url' => $img_url
      );
    }

    // Mostrar las imágenes en grupos de 3
    $num_images = count($images);
    for ($i = 0; $i < $num_images; $i += 3) {
      echo '<div class="carousel-item' . ($i == 0 ? ' active' : '') . '">';
      echo '<div class="container">';
      echo '<div class="row text-center py-5 justify-content-center">';

      // Mostrar las imágenes en el grupo actual
      for ($j = $i; $j < min($i + 3, $num_images); $j++) {
        component($images[$j]['id'], $images[$j]['price'], $images[$j]['name'], $images[$j]['description'], $images[$j]['url']);
      }

      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>

  <?php
  if ($num_images > 3) {
    echo '
    <button class="carousel-control-prev" type="button" data-bs-target="#manualCarousel" data-bs-slide="prev">
      <img src="assets/slider_izq.png" class="slider-icon" alt="Slider Izquierdo">
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#manualCarousel" data-bs-slide="next">
      <img src="assets/slider_der.png" class="slider-icon" alt="Slider Derecho">
      <span class="visually-hidden">Siguiente</span>
    </button>';
  }
  ?>
</div>

<script>
  // Activar el carrusel automáticamente
  var carousel = document.querySelector('#manualCarousel');
  var carouselInstance = new bootstrap.Carousel(carousel, {
    interval: 5000, // Cambiar a 5000 (5 segundos)
    wrap: true, // Permitir repetir las imágenes
    perPage: 3 // Mostrar 3 imágenes a la vez
  });
</script>


    <script src="/js/products.js"></script>
  
  
  </body>
</html>
    
    <!-- FIN MENU DE NAVEGACIÓN -->