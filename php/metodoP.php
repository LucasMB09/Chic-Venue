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

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title class="titulo">Chic Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/metodoP/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <link href="/css/formulario.css" rel="stylesheet">


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

<style>
    .caja{
        width: 100%; height:100%; border:1px; margin:0 auto ;display:flex;
    }

    .col1{
        width: 80%; height:300px; background-color:rgb(255, 255, 255); float:left;
        border:1px;
        border-radius:2%;
        padding:0px;
        margin:5px;

    }
    .col2{
        width: 50%; height:300px; background-color:rgb(192, 212, 253); float:left;
        border:1px;
        border-radius:2px;
        padding: 0px;
        margin:5px;

    }

</style>


    
    <!-- Custom styles for this template -->
    <link href="metodoP.css" rel="stylesheet">
  </head>
  <body class="p-3 m-0 border-0 bd-example">
 
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

<!-- <div class="container py-3"> -->
  <header>
    
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


    <div class=" flex-column flex-md-row align-items-center pb-6 mb-4 border-bottom">
      <!-- <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none"> -->
          
    <!-- MENU DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/logo.jpg" class="rounded mx-auto d-block"  alt="" width="82" height="70">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="letra-texto">
              <a class="nav-link " aria-current="page" href="../products.php">Novedades</a> <!-- PESTAÑA NOVEDADES -->
            </li>
            <li class="letra-texto">
              <a class="nav-link" href="../products.php">Rebajas</a> <!-- RESTAÑA REBAJAS -->
            </li>
            <li class="letra-texto">
              <a class="nav-link" href="../products.php">Un poco de todo </a> <!-- PESTAÑA PARA REVISAR ARTICULOS -->
            </li>
            <li class="letra-texto">
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
          <form class="d-flex" role="search" action="../products.php" >
            <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search" name="search"> <!-- input SEARCH con id="busqueda_text"-->
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
                <img src="/assets/filtro.png" alt="filtro" width="30" height="30" class="d-inline-block align-text-top">
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
             <li class="nav-item">
             <?php
              if($email != ":v" && $user != ":v"){

                ?>

                  <h3 id="usuario" style="display:none;"> <?php echo "$user";?></h3>
                  <h3 id="correo" style="display:none;"> <?php echo "$email";?></h3>
                  <a class="navbar-brand" onclick="user()" id="change"> <!-- INCIAR SESION -->
                    <img src="../assets/usuario.png" alt="inicioSesión" width="30" height="30" class="d-inline-block align-text-top">
                  </a>
                  
                  <?php
                  
                
              }
              else{
                ?>
                <a class="navbar-brand" href="../log-in.php"> <!-- INCIAR SESION -->
                <img src="../assets/usuario.png" alt="inicioSesión" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
            </li>
            <li class="nav-item">
               <a class="navbar-brand" href="../favoritos.php"> <!-- ACCEDER A FAVORITOS-->
               <img src="../assets/favoritos.PNG" alt="favoritos" width="30" height="30" class="d-inline-block align-text-top">
              </a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="../carrito.php"> <!-- ACCEDER AL CARRITO-->
              <img src="../assets/carrito.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
             </a>
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>

    
    <!-- FIN MENU DE NAVEGACIÓN -->
    </div>
  </header>

  <p class="letra-subtitulo">Hola, <?php echo "$user";?>.</p>
  
  <div class="caja">
    <div class="col1">
        <div class="barra-gris" >
            <h7 class="letra-subtitulo"><b> Selecciona método de pago</center></b></h7>
        </div>
        <div>
          <br>
        <p >
          <label class="custom-radio-checkbox">
         
              <input class="custom-radio-checkbox__input" type="radio" name="pago" value="credito">
             
              <span class="custom-radio-checkbox__show custom-radio-checkbox__show--radio"></span>

              <img class="tarjeta1" src="../assets/Cardb.png"  width="24" height="19" alt="tarjeta de credito" >
           
              <span class="custom-radio-checkbox__text">Nueva tarjeta de credito </span>
          </label>
      </p>
      <div class="linea-horizontal" ></div>
      <br>
    </div>
      <p>
          <label class="custom-radio-checkbox">
            
              <input class="custom-radio-checkbox__input" type="radio" name="pago" value="debito">
              
              <span class="custom-radio-checkbox__show custom-radio-checkbox__show--radio"></span>

              <img class="tarjeta2" src="../assets/Cardm.png"  width="24" height="19" alt="tarejta de debito" >
           
              <span class="custom-radio-checkbox__text">Nueva tarjeta de debito</span>
          </label>
      </p>
      <div class="linea-horizontal" ></div>
      <br>
      <p>
        <label class="custom-radio-checkbox">
            
            <input class="custom-radio-checkbox__input" type="radio" name="pago" value="tranferencia">
            
            <span class="custom-radio-checkbox__show custom-radio-checkbox__show--radio"></span>

            <img class="transferencia" src="../assets/transaction2.png"  width="24" height="19" alt="Tranferencia" >
            
            <span class="custom-radio-checkbox__text ">Tranferencia electronica</span>
        </label>
    </p>
    <div class="linea-horizontal" ></div>
    <br>
    <p>
      <label class="custom-radio-checkbox">
          <!-- Input oculto -->
          <input class="custom-radio-checkbox__input" type="radio" name="pago" value="puntos pago">
          <!-- Imagen en sustitucion -->
          <span class="custom-radio-checkbox__show custom-radio-checkbox__show--radio"></span>

          <img class="pago" src="../assets/paymant.png"  width="24" height="19" alt="Puntos pago" >
          <!-- Texto -->
          <span class="custom-radio-checkbox__text">Efectivo en puntos de pago</span>
      </label>
  </p>
    
      
    </div>
    <div class="col2">
        <h7 class="letra-subtitulo"><b><center>Resumen de compra</center></b></h7>
        <br>
        <p class="letra-texto"><b>Descripción</b></p>
        <ul class="lista-dos-columnas-dos">
          
          <li class="letra-texto">Envio</li>
          <li class="letra-texto">Total</li>
          <li class="letra-texto">$<?php echo $_POST['total']; $_SESSION['total'] = $_POST['total'];?>.00</li>
        </ul>
        <div class="linea-horizontal" ></div>
        <ul class="lista-dos-columnas-dos">
          <li class="letra-texto">Tu pago</li>
          <li class="letra-texto">$<?php echo $_POST['total'];?>.00</li>      
        </ul>
        

        <center><button onclick="redirecM();"><span>Continuar compra</span></button></center>
    </div>
    
    
  </div>      


<!-- Pie de pagina -->


  <footer class="pt-4 my-md-5 pt-md-5 border-top card-header py-3 container py-3">
    <div class="row">
      <div class="col-12 col-md">
        <img class="logo" src="../assets/logo_CA.PNG"  width="24" height="19" alt="Logotipo de Chic Avenue" >
        <small class="d-block mb-3 letra-texto">&copy; 2022–2023</small>
      </div>
      <div class="col-6 col-md">
        <h5 class="letra-texto"><b>Nosotros</b></h5>
        <ul class="list-unstyled text-small">
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#">Historia</a></li>
        </ul>
      </div>

      
      <div class="col-6 col-md"
        <h5 class="letra-texto"><b>Catalogo</b></h5>
        <ul class="list-unstyled text-small">
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#">Tendencia</a></li>
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#">Descuentos</a></li>
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#">Promociones</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5 class="letra-texto"><b>Atencion a cliente</b></h5>
        <ul class="list-unstyled text-small">
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#">Contactos</a></li>
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#">Ubicacion</a></li>
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#"></a></li>
          <li class="letra-texto"><a class="link-secondary text-decoration-none" href="#"></a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../js/metodP.js"></script>

    
  </body>
</html>
