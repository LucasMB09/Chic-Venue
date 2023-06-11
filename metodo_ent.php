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
  
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="/docs/5.3/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/metodo_ent.css">
  <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
</head>
<title>Metodo de entrega</title>

<body class="p-3 m-0 border-0 bd-example">
  <!-- LINEA NEGRA -->
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <br><br>
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
            <input class="form-control me-2 " type="search" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
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

  <!-- FIN MENU DE NAVEGACIÓN -->

  <!--Seccion de metodo-->

  <section class="formulario">
    <h1 class="h1ME">Seleccione su método de entrega: </h1>


    <div class="contenidoform">
      <form action="procesar_entrega.php" method="post">


        <!--Seleccion de direccion de envio-->
        <label for="direccion">Dirección de envío:</label>
        <select id="opc_dir" name="opc_direccion">
          <option value="Seleccione una opción">Seleccione una opción</option>
          <option value="estandar">Casa</option>
          <option value="express">Casa Mamá</option>
          <option value="internacional">Trabajo</option>
          <option value="recogida">Recoger en tienda</option>
        </select>
        <div id="DirenvErrormessage" class="error-message"></div>

        <input type="button" onclick="redireccionar()" value="+ Añadir punto de entrega">

        <!--Seleccion de opcion de envio-->
        <label for="opcion_envio">Opción de envío:</label>
        <select id="opcion_envio" name="opcion_envio">
          <option value="Selecciona una opción">Seleccione una opción</option>
          <option value="estandar">Envío estándar</option>
          <option value="express">Envío exprés</option>
          <option value="internacional">Envío internacional</option>
          <option value="recogida">Recogida en tienda</option>
        </select>
        <div id="OpcenvErrormessage" class="error-message"></div>

        <!--Informacion adicional-->
        <label for="informacion_adicional">Instrucciones adicionales para el envio del paquete:</label>
        <textarea id="informacion_adicional" name="informacion_adicional"></textarea>
        <div id="InfoadErrormessage" class="error-message"></div>
        <div class="error"></div>

        <!--Metodo de pago-->
        <label for="metodo_pago">Método de pago:</label>
        <select id="metodo_pago" name="metodo_pago">
          <option value="Selecciona una opción">Seleccione una opción</option>
          <option value="tarjeta">Tarjeta de crédito</option>
          <option value="transferencia">Transferencia bancaria</option>
          <option value="paypal">PayPal</option>
        </select>
        <div id="MetpagErrormessage" class="error-message"></div>

        <!--Boton de continuar-->
        <div>
          <input type="submit" value="Continuar" id="continuarBtn">
        </div>
      </form>
    </div>
  </section>
  <script src="js/metodo_ent.js"></script>
  <script>

    //Redireccionamiento
    function redireccionar() {
      window.location.href = "puntoent.html";
    }

    // Seleccionar dirección de envío
    var opc_dir = document.getElementById("opc_dir");
    var DirenvErrormessage = document.getElementById("DirenvErrormessage");

    opc_dir.addEventListener("change", function () {
      if (opc_dir.value === 'Seleccione una opción') {
        DirenvErrormessage.textContent = 'Por favor, seleccione una opción';
      } else {
        DirenvErrormessage.textContent = '';
      }
    });

    // Seleccionar opción de envío
    var opcion_envio = document.getElementById("opcion_envio");
    var OpcenvErrormessage = document.getElementById("OpcenvErrormessage");

    opcion_envio.addEventListener("change", function () {
      if (opcion_envio.value === 'Selecciona una opción') {
        OpcenvErrormessage.textContent = 'Por favor, seleccione una opción';
      } else {
        OpcenvErrormessage.textContent = '';
      }
    });

    // Seleccionar método de pago
    var metodo_pago = document.getElementById("metodo_pago");
    var MetpagErrormessage = document.getElementById("MetpagErrormessage");

    metodo_pago.addEventListener("change", function () {
      if (metodo_pago.value === 'Selecciona una opción') {
        MetpagErrormessage.textContent = 'Por favor, seleccione una opción';
      } else {
        MetpagErrormessage.textContent = '';
      }
    });

    // Botón de continuar
    document.getElementById('continuarBtn').addEventListener('click', function (event) {
      event.preventDefault();

      var selectedOpt = opc_dir.value;
      var selectedOpcEnv = opcion_envio.value;
      var selectedMetPag = metodo_pago.value;

      var errorCount = 0; // Contador de errores

      if (selectedOpt === 'Seleccione una opción') {
        DirenvErrormessage.textContent = 'Por favor, seleccione una opción';
        errorCount++;
      } else {
        DirenvErrormessage.textContent = '';
      }

      if (selectedOpcEnv === 'Selecciona una opción') {
        OpcenvErrormessage.textContent = 'Por favor, seleccione una opción';
        errorCount++;
      } else {
        OpcenvErrormessage.textContent = '';
      }

      if (selectedMetPag === 'Selecciona una opción') {
        MetpagErrormessage.textContent = 'Por favor, seleccione una opción';
        errorCount++;
      } else {
        MetpagErrormessage.textContent = '';
      }

      if (errorCount === 0) {
        // No hay errores, puedes continuar con el proceso de envío
        // Aquí puedes agregar el código adicional que deseas ejecutar cuando no hay errores
      }

    });



  </script>
</body>

</html>