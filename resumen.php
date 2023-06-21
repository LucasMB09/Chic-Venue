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
  
 
  $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

  $quer = "SELECT id_cliente FROM cliente WHERE correo_electronico = '$email'";

  $resul = mysqli_query($conexion,$quer);
  if($resul){
      $aidi = mysqli_fetch_array($resul);
      $id_cliente = $aidi[0];
  }
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Chic Avenue</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(172, 15, 15, 0.1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

<style>
  ul {
    list-style-type: none;
  }
</style>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap');
  </style>


    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body class="p-3 m-0 border-0 bd-example">
  <div class="barra-negra">
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <br><br><br>
      <?php
      if(isset($_SESSION['mensaje'])){ 
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
      }
      elseif(isset($_SESSION['email'])){
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
</div>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    <!-- MENU DE NAVEGACION -->
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="/assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="products.php">Novedades</a>
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

    <div class="pricing-header">
      <p class="fs-7 text-body-secondary"><?php echo $user;?>. Se ha realizado su compra con exito.</p>
    </div>
  </header>

  <main>
<!-- cuadro 1 -->
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-lg" style= "width: 97%; height: 50%;" >
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal ">Producto(s)</h4>
          </div>
          <div class="card-body">
            <h3 class="card-title pricing-card-title">Compraste</h3>
            <table>
              <?php 
              $uwu = "SELECT id_articulo FROM carrito WHERE id_cliente = $id_cliente";
              $res = mysqli_query($conexion,$uwu);
              
              if($res){
                  $ide = mysqli_fetch_all($res);
                  for ($i=0; $i < count($ide); $i++) {
                    $id_base = $ide[$i][0];
                    $query = "SELECT imagen FROM articulo WHERE id_articulo = $id_base";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $ima = mysqli_fetch_array($resul);
                      $imagen = $ima[0];
                    }
                    $query = "SELECT nombre_articulo FROM articulo WHERE id_articulo = $id_base";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $nom = mysqli_fetch_array($resul);
                      $nombre_articulo = $nom[0];
                    }
                    
                    $query = "SELECT color FROM articulo WHERE id_articulo = $id_base";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $col = mysqli_fetch_array($resul);
                      $color = $col[0];
                    }
              
                    $query = "SELECT talla FROM articulo WHERE id_articulo = $id_base";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $tal = mysqli_fetch_array($resul);
                      $talla = $tal[0];
                    }
                    
                    $query = "SELECT precio FROM articulo WHERE id_articulo = $id_base";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $prec = mysqli_fetch_array($resul);
                      $precio = $prec[0];
                    }
                    
                    $query = "SELECT color FROM articulo WHERE id_articulo = $id_base";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $col = mysqli_fetch_array($resul);
                      $color = $col[0];
                    }
                    
                    $query = "DELETE FROM carrito WHERE id_articulo = $id_base AND id_cliente = $id_cliente";
                    $resul = mysqli_query($conexion,$query);
                    if($resul){
                      $query = "INSERT INTO compra (id_cliente, id_articulo, fecha, monto) VALUES ('$id_cliente', '$id_base', '2023-06-21', '$precio')";
                      $resul = mysqli_query($conexion,$query);
                      if($resul){
                        
                      }  
                    }
                    
              ?>
              <th>
                <td>
                  <img class="logo" src="<?php echo $imagen;?>"  width="150" height="210" alt="imagen del producto" style="float: bottom" >
                </td>
                <td>
                  <li class="letra"><?php echo $nombre_articulo;?></li>
                  <li>Color: <?php echo $color;?> | Tela 100% Algodón</li>
                  <li>Talla <?php echo $talla;?></li>
                  <li>$<?php echo $precio;?> x unidad</li>
                </td>
              </th>
              <?php
            }

            if(count($ide)==0){
              ?>
              <h3><?php echo "No hay articulos en el carrito";?></h3>
              <?php
            }
          }
          ?>
            </table>
          </div>
        </div>
      </div>

<!-- cuadro 2 -->
<?php 
  $total = $_SESSION['total'];
?>
    <div class="row">
      <div class="row ">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Resumen de compra</h4>
          </div>
          <div class="card-body">
            <h7>21 de Junio| #3453637386</h7>
            <br>
            <br>
            <ul class="lista-dos-columnas">
              <li>Descripción del producto</li>
              <li>Envio</li>
              <li>Subtotal</li>
              <li>$<?php echo $total;?></li>
            </ul>
            <div class="linea-horizontal" ></div>
            <ul class="lista-dos-columnas">
              <li>Tu pago</li>
              <li>$<?php echo $total;?></li>      
            </ul>
            <br>
            <i class="fas fa-check"></i>
            <h7>Usted solicito una factura correctamente.</h7> 
          </div>
        </div>
      </div>
    </div>

 

    <!-- cuadro 3 -->
      <div class="row ">
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">Información de pago</h4>
            </div>

            <div class="card-body">
              <h6 class="card-title pricing-card-title">Nombre de la tarjeta terminada en *345</h6>
              <div class="contenedor">
              <img class="filtro" src="../assets/tarjeta.png"  width="60" height="40" alt="filtro" >
              <ul class="lista">
                <li>Transacción acreditada por BBVA  </li>
                <li>Pago #3453637386 del 21 de Junio </li> 
              </ul>
            
          </div>
        </div>
      
      </div>
<!-- Pie de pagina -->
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="logo" src="../assets/logo_CA.PNG"  width="24" height="19" alt="Logotipo de Chic Avenue" >
        <small class="d-block mb-3 text-body-secondary">&copy; 2022–2023</small>
      </div>
      <div class="col-6 col-md">
        <h5>Nosotros</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Historia</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Random feature</a></li>

        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Catalogo</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Tendencia</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Descuentos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Promociones</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Atencion a cliente</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Contactos</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Ubicacion</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#"></a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#"></a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
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
