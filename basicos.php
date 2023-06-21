<?php

  session_start();

  if (isset($_GET['checkSession']) && $_GET['checkSession'] === 'true') {
    // Verificar el estado de inicio de sesión y activación del usuario
    $response = array(
      'loggedIn' => false,
      'activated' => false
    );
  
    // Lógica para verificar el inicio de sesión y la activación del usuario
    // Reemplaza las siguientes líneas con tu propia lógica de verificación
    // Ejemplo: Comprueba si el usuario ha iniciado sesión y está activado
    // Si es verdadero, actualiza los valores de loggedIn y activated en $response
    if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
      $response['loggedIn'] = true;
      $response['activated'] = true;
    }
  
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
  }

  if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
  } elseif (isset($_SESSION['valor'])) {
    $valor = $_SESSION['valor'];
  }

    $client_id = null;

  if (isset($_SESSION['client_id'])) {
      $client_id = $_SESSION['client_id'];
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
  elseif(isset($valor)){
    if($valor == 0){
      $user = "No";
      $email = "No";  
    }
    elseif($valor == 1){
      $user = ":v";
      $email = ":v";
   }
  }
  else{
    $valor = 1;
    $_SESSION['valor'] = $valor;
    $email = ":v";
    $user = ":v";
  }
  
  require_once ('./php/CreateDb.php');
  require_once ('./php/component.php');
  $database = new CreateDb("chicvenue","articulo");

  if(isset($_GET['color'])){
    $color = $_GET['color'];
    if($color == "todos"){
      $color = "*";
    }  
  }

  if(isset($_GET['talla'])){
    $talla = $_GET['talla'];
    if($talla == "todas"){
      $talla = "*";
    }  
  }

  if(isset($_GET['precio'])){
    $precio = $_GET['precio'];
    if($precio == "ninguno"){
      $precio = "*";
    }  
  }

  if(isset($_GET['ofertas'])){
    $ofertas = $_GET['ofertas'];
  }

  if(isset($_GET['search'])){
    $busqueda = $_GET['search'];
  }

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
       <br><br><br>
      <?php
        if(isset($_SESSION['email'])){
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
                header("Location: index.php?valor=1");
              }
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
              <a class="nav-link" aria-current="page" href="products.php">Novedades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="promociones.php">Promociones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="basicos.php">Básicos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ropa
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Blusas.php">Blusas</a></li>
                <li><a class="dropdown-item" href="Bluson.php">Bluson</a></li>
                <li><a class="dropdown-item" href="Vestidos.php">Vestidos</a></li>
                <li><a class="dropdown-item" href="Conjuntos.php">Conjuntos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="verano.php">¡TEMPORADA DE VERANO!</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search" action="/products.php" >
            <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search" name="search"> <!-- input SEARCH con id="busqueda_text"-->
            <button class="btn btn-outline-success" id="busqueda" type="submit">Buscar</button> <!-- Botón para buscar -->
          </form>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <ul class="nav">
          <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;
             <!--   <a class="navbar-brand" href="#">  
               <img src="/assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
              </a> -
              <button type="button" style="background-image: url('/assets/filtro.png'); width: 10px; height: 10px;" data-toggle="modal" data-target="#exampleModalLong">
              </button>-->
              <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModalLong"> 
                <img src="assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
               </a> 
             <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Buscas algo en especial?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group" id="filtro-form">
                          <form>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="color">Color</label>
                              </div>
                              <select class="custom-select" id="color">
                                <option value="todos">Todos</option>
                                <option value="verde">Verde</option>
                                <option value="azul">Azul</option>
                                <option value="blanco">Blanco</option>
                                <option value="negro">Negro</option>
                                <option value="rosa">Rosa</option>
                                <option value="café">Café</option>
                                <option value="morado">Morado</option>
                              </select>
                            </div>
                          
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="talla">Talla</label>
                              </div>
                              <select class="custom-select" id="talla">
                                <option value="todas">Todas</option>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                              </select>
                            </div>
                          
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="Precio">Precio</label>
                              </div>
                              <select class="custom-select" id="Precio">
                                <option value="ninguno">Ninguno</option>
                                <option value="ascendente">Del más barato al más caro</option>
                                <option value="descendente">Del más caro al más barato</option>
                              </select>
                            </div>
                          
                          
                            <input type="checkbox" id="ofertas">
                            <label for="ofertas">Mostrar solo ofertas/descuentos</label>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" id="busqueda_filtro" onclick="redirecFiltro()" class="btn btn-primary">Filtrar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
            </li>
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
                <a class="navbar-brand" href="login_usuario.php"> <!-- INCIAR SESION -->
                <img src="assets/usuario.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
            </li>
            <li class="nav-item">
              
                <a class="navbar-brand" href="favoritos.php"> <!-- ACCEDER A FAVORITOS-->
                <img src="assets/favoritos.JPG" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                </a>
              
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="carrito.php"><!-- ACCEDER A CARRITO-->
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
$query = "SELECT COUNT(imagen) AS num_images FROM articulo WHERE categoria = 'Básicos'";
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

    if (isset($busqueda)) {
        $result = $database->busqueda($busqueda);
    } elseif (isset($color) && $color != "*") {
        if (isset($talla) && $talla != "*") {
            if (isset($precio) && $precio != "*") {
                $result = $database->filtrado($color, $talla, $precio);
            } else {
                $result = $database->filtrado2($color, $talla);
            }
        } else {
            $result = $database->filtrado3($color);
        }
    } elseif (isset($talla) && $talla != "*") {
        if (isset($precio) && $precio != "*") {
            $result = $database->filtrado4($talla, $precio);
        } else {
            $result = $database->filtrado5($talla);
        }
    } elseif (isset($precio) && $precio != "*") {
        $result = $database->filtrado6($precio);
    } else {
      // Obtener solo los artículos de la categoría "perro"
      $query = "SELECT * FROM articulo WHERE categoria = 'Básicos'";
      $result = mysqli_query($database->con, $query);
    }
    $count = 0;

    if (isset($_SESSION['base']) && $_SESSION['base'] == "No hay") {
        ?>
        <h3 id="base" style="display: none;"><?php echo $_SESSION['base'];
                                            unset($_SESSION['base']); ?></h3>
    <?php
    } elseif (isset($_SESSION['base']) && $_SESSION['base'] == "No nombre") {
        ?>
        <h3 id="base" style="display: none;"><?php echo $_SESSION['base'];
                                            unset($_SESSION['base']); ?></h3>
    <?php
    } elseif (isset($_SESSION['base']) && $_SESSION['base'] == "Fav") {
      ?>
      <h3 id="base" style="display: none;"><?php echo $_SESSION['base'];unset($_SESSION['base']); ?></h3>
    <?php
    } elseif (isset($_SESSION['base']) && $_SESSION['base'] == "Ya esta") {
      ?>
      <h3 id="base" style="display: none;"><?php echo $_SESSION['base'];unset($_SESSION['base']); ?></h3>
    <?php
    }

    // Obtener todas las imágenes
    $images = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $img_id = $row['id_articulo'];
        $img_name = $row['nombre_articulo'];
        $img_description = $row['descripcion'];
        $img_price = $row['precio'];
        $img_url = $row['imagen'];
        $img_color = $row['color']; // Nuevo campo: color
        $img_talla = $row['talla']; // Nuevo campo: talla
        $img_stock = $row['stock']; // Nuevo campo: stock
        $img_categoria = $row['categoria']; // Nuevo campo: categoria
        $img_email = $email;


        $images[] = array(
            'id' => $img_id,
            'name' => $img_name,
            'description' => $img_description,
            'price' => $img_price,
            'url' => $img_url,
            'color' => $img_color,
            'talla' => $img_talla,
            'stock' => $img_stock,
            'categoria' => $img_categoria,
            'email' => $img_email

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
            $image = $images[$j];
            component(
                $image['id'],
                $image['price'],
                $image['name'],
                $image['color'], // Nuevo argumento: color
                $image['talla'], // Nuevo argumento: talla
                $image['stock'], // Nuevo argumento: stock
                $image['categoria'], // Nuevo argumento: categoria
                $image['url'],
                $image['email']

            );
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

  <script src="/js/products.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
</body>
   <!-- FOOTER -->
   <footer class="container">
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
    </div>
    </nav>
    <br>
    <div class="row">
      <div class="col-12 col-md">
        <img class="logo" src="/assets/logo_CA.PNG"  width="24" height="19" alt="Logotipo de Chic Avenue" >
        <small class="d-block mb-3 text-body-secondary">&copy; 2022–2023</small>
      </div>
      <div class="col-6 col-md">
        <h5>Nosotros</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./preguntas.php">Preguntas frecuentes</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Random feature</a></li>

        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Catálogo</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="products.php">Tendencia</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Descuentos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="promociones.php">Promociones</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Atención a cliente</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./preguntas.php">Contactos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./preguntas.php">Ubicación</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#"></a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#"></a></li>
        </ul>
      </div>
    </div></footer>
</html>
    
    <!-- FIN MENU DE NAVEGACIÓN -->