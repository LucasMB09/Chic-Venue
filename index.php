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
  
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Chic Venue</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <link href="/css/formulario.css" rel="stylesheet">
  </head>
  <body class="p-3 m-0 border-0 bd-example">
    <!-- LINEA NEGRA -->
    <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <br><br>
      <?php
      if ($_SESSION['mensaje'] == "Inicio de sesión exitoso") {
        $mensaje = $_SESSION['mensaje'];
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];
        if(isset($_SESSION['recuerda'])){
          $recuerda = $_SESSION['recuerda'];
          setcookie('usuario', $user, time()+86400, '/');
          setcookie('email', $email, time()+86400, '/');
        }  
        ?>
        <div><h3 id="mensaje" style="display: none;"><?php echo "$mensaje";?></h3></div>
        <h3 class="text_user" style="display:none;">Hola, <?php echo "$user";?></h1>
        <?php
        unset($_SESSION['mensaje']); // Limpiamos la variable de sesión
      }
      elseif($_SESSION['email'] != "No" && $_SESSION['user'] != "No"){
        ?>
        <h3 class="text_user" style="display:none;">Hola, <?php echo "$user";?></h1>
        <?php
        if($valor == 0 ){
          if($_GET['valor'] == 0){
            setcookie('usuario', "", time()-86400, '/');
            setcookie('email', "", time()-86400, '/');
            $_SESSION['valor'] = 1;
            header("Location: index.php?valor=1");
          }
        }
        else{
          
        }
      }
      
      ?>
    </div>
    </nav>
    <!--FIN LINEA NEGRA -->
<!-- diego estuvo aqui  de nuevo-->

    <!-- MENU DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="products.php">Novedades</a> <!-- PESTAÑA NOVEDADES -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Rebajas</a> <!-- RESTAÑA REBAJAS -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Un poco de todo </a> <!-- PESTAÑA PARA REVISAR ARTICULOS -->
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ropa
              </a>
              <ul class="dropdown-menu"> <!-- PARA MOSTRAR DISTINTAS CATEGORIAS -->
                <li><a class="dropdown-item" href="#">Mezclilla</a></li> <!---->
                <li><a class="dropdown-item" href="#">Sudaderas</a></li>
                <li><a class="dropdown-item" href="#">Vestidos</a></li>
                <li><a class="dropdown-item" href="#">Conjuntos</a></li>
                <li><a class="dropdown-item" href="#">Ropa de descanso</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">¡TEMPORADA DE VERANO!</a></li> <!-- TEMPORADAS -->
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search"> <!-- input SEARCH con id="busqueda_text"-->
            <button class="btn btn-outline-success" id="busqueda" type="submit">Buscar</button> <!-- Botón para buscar -->
          </form>
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
                        <button type="button" id="busqueda_filtro" class="btn btn-primary">Filtrar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
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
              
                <a class="navbar-brand" href="#"> <!-- ACCEDER A FAVORITOS-->
                <img src="assets/favoritos.JPG" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                </a>
              
            </li>
            <li class="nav-item">
              
                <a class="navbar-brand" href="#"> <!-- ACCEDER AL CARRITO-->
                <img src="assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                </a>
              
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>

    
    <!-- FIN MENU DE NAVEGACIÓN -->
    <main>
    <!-- CARRUSEL -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="assets/generic1.jpg" alt="Baner1">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="assets/generic2.jpg" alt="Baner2">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="assets/generic3.jpg" alt="Baner3">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- FIN CARRUSEL -->
  </main>
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Volver al inicio</a></p>
    <p>&copy; 2023 Chic Venue, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos</a></p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="/js/index.js"></script>
</body>

</html>


