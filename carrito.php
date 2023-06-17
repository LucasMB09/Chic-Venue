<?php
  session_start();

  if(isset($_GET['valor'])){
    $valor = $_GET['valor'];
  }
  elseif(isset($_SESSION['valor'])){
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
  
 
?>

<!DOCTYPE html>
<html>
<!--hola-->
<head>
  <title>Carrito de compras</title>
  <link rel="stylesheet" type="text/css" href="/css/style2.css">

  <!-- MENU ENCABEZADO DE LA PAGINA Modificado  ijoj-->
  <script src="/docs/5.3/assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Chic Venue</title>
        <link href="/css/formulario.css" rel="stylesheet">
        <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>

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
        <img src="/assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Novedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Rebajas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Básicos</a>
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

        <form class="d-flex" role="search" action="/products.php" >
            <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search" name="search"> <!-- input SEARCH con id="busqueda_text"-->
            <button class="btn btn-outline-success" id="busqueda" type="submit">Buscar</button> <!-- Botón para buscar -->
          </form>
        &nbsp;&nbsp;&nbsp;
        <ul class="nav">
        <li class="nav-item">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                 <!--   <a class="navbar-brand" href="#">  ACCEDER AL FILTRO
                   <img src="/assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                  </a> -
                  <button type="button" style="background-image: url('/assets/filtro.png'); width: 10px; height: 10px;" data-toggle="modal" data-target="#exampleModalLong">
                  </button>-->
                  <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModalLong"> 
                    <img src="/assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
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
          <?php
              if($email != ":v" && $user != ":v"){

                ?>

                  <h3 id="usuario" style="display:none;"> <?php echo "$user";?></h3>
                  <h3 id="correo" style="display:none;"> <?php echo "$email";?></h3>
                  <a class="navbar-brand" onclick="user()" id="change"> <!-- INCIAR SESION -->
                    <img src="assets/usuario.png" alt="inicioSesión" width="30" height="30" class="d-inline-block align-text-top">
                  </a>
                  
                  <?php
                  
                
              }
              else{
                ?>
                <a class="navbar-brand" href="log-in.php"> <!-- INCIAR SESION -->
                <img src="assets/usuario.png" alt="inicioSesión" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
          </li>
          <li class="nav-item">
             <a class="navbar-brand" href="favoritos.php">
             <img src="/assets/favoritos.PNG" alt="favoritos" width="30" height="30" class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="carrito.php">
            <img src="/assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
           </a>
          </li>
        </ul>
        </div>
      </div>
  </nav>
  <!-- FIN MENU DE NAVEGACIÓN -->


  <!-- --------------------------------------------------------------------------------------------------- -->
<!-- PARTE IZQUIERDA CARRITO DE COMPRAS -->
  <div class="container">
    <div class="left-column">
      <h2>Carrito de compras</h2>
      <table>
        <thead>
          <tr>
            <th>Producto</th>
            <th> </th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>

<!-- COLUMNA PRODUCTO -->
        <tbody>
          <tr>
            <td>
              <img src="/assets/producto1.jpg" alt="Producto 1">
            </td>
            <td>
              <div class="product-details">
                <p><strong>Camiseta juvenil</strong></p>
                <p>Color: Azul</p>
                <p>Talla: M </p>
              </div>
            </td>

<!-- COLUMNA PRECIO -->
            <td>
              <p><span class="price-text"><p>$25.00</p></span></p>
              <div class="save-button">
                <p><button class="favorite-button" title="Añadir a favoritos">
                    <p><img src="/assets/favoritos.JPG" alt="Guardar en favoritos" class="favorite-icon"></p>
                  </button></p>
              </div>
            </td>

<!-- COLUMNA CANTIDAD -->
            <td>
              <div class="quantity-control">
                <button class="decrease-button">-</button>
                <input type="text" class="quantity-input" value="1">
                <button class="increase-button">+</button>
                <p><button class="edit-button">Editar</button></p>
              </div>
            </td>

<!-- COLUMNA SUBTOTAL -->
            <td>
              <div class="subtotal-container">
                <p><span class="subtotal-amount"><p>$25.00</p></span></p>
                <p><button class="delete-button"><p>Eliminar</p></button></p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

<!-- PARTE DERECHA "RESUMEN DEL PEDIDO" -->
    <div class="right-column">
      <h2>Resumen del pedido</h2>
      <p>Subtotal: $29.99</p>
      <p>Costo de envío: $50</p>
      <hr>
      <p class="total">Total a pagar: $79.99</p>
      <div class="buy-button-container">
        <button class="buy-button">Comprar</button>
      </div>
    </div>
  </div>


  <script src="/js/carrito.js"></script>

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
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="../products.php">Tendencia</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Descuentos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="./products.php">Promociones</a></li>
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