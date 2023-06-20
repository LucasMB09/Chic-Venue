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
  <link rel="stylesheet" href="css/puntoent.css">
  <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>


</head>
<title>Nueva dirección</title>

<body>
  <!-- LINEA NEGRA-->
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
              header("Location: index.php?valor=1");
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
        <img src="/assets/logo.jpg" class="rounded mx-auto d-block" alt="" width="82" height="70">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="products.php">Novedades</a>
            <!-- PESTAÑA NOVEDADES -->
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
            <ul class="dropdown-menu">
              <!-- PARA MOSTRAR DISTINTAS CATEGORIAS -->
              <li><a class="dropdown-item" href="#">Mezclilla</a></li>
              <!---->
              <li><a class="dropdown-item" href="#">Sudaderas</a></li>
              <li><a class="dropdown-item" href="#">Vestidos</a></li>
              <li><a class="dropdown-item" href="#">Conjuntos</a></li>
              <li><a class="dropdown-item" href="#">Ropa de descanso</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">¡TEMPORADA DE VERANO!</a></li> <!-- TEMPORADAS -->
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" action="/products.php" >
            <input class="form-control me-2" type="search" id="busqueda_text" placeholder="" aria-label="Search" name="search"> <!-- input SEARCH con id="busqueda_text"-->
            <button class="btn btn-outline-success" id="busqueda" type="submit">Buscar</button> <!-- Botón para buscar -->
          </form>
        <ul class="nav">
          <li class="nav-item">
                <!--   <a class="navbar-brand" href="#">  
                  <img src="/assets/filtro.png" alt="carrito" width="30" height="30" class="d-inline-block align-text-top">
                  </a> -
                  <button type="button" style="background-image: url('/assets/filtro.png'); width: 10px; height: 10px;" data-toggle="modal" data-target="#exampleModalLong">
                  </button>-->
                  <a class="navbar-brand" href="#" data-toggle="modal" data-target="#exampleModalLong"> 
                    <img src="assets/filtro.png" alt="filtro" width="30" height="30" class="d-inline-block align-text-top">
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
                    <img src="assets/usuario.png" alt="inicio" width="30" height="30" class="d-inline-block align-text-top">
                  </a>
                  <?php
              }
              else{
                ?>
                <a class="navbar-brand" href="log-in.php"> <!-- INCIAR SESION -->
                <img src="assets/usuario.png" alt="inicio" width="30" height="30" class="d-inline-block align-text-top">
                </a>
                <?php
              }
              ?>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="favoritos.php">
              <!-- ACCEDER A FAVORITOS-->
              <img src="../assets/favoritos.JPG" alt="favoritos" width="30" height="30"
                class="d-inline-block align-text-top">
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="carrito.php">
              <!-- ACCEDER AL CARRITO-->
              <img src="../assets/carrito.png" alt="carrito" width="30" height="30"
                class="d-inline-block align-text-top">
            </a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>


  <!-- FIN MENU DE NAVEGACIÓN -->

  <!--Seccion de punto de entrega-->

  <section class="formulario">
    <h3 class="h1ME">¿Desea añadir una nueva direccion? </h3>
    <div class="contenidoform">
      <p>Porfavor ayudanos llenando los siguientes campos</p>
      <form action="agregar_punto_entrega.php" method="post">

        <!--Nombre del punto de entrega-->
        <label for="nombre_punto">Nombre del punto de entrega*:</label>
        <input type="text" id="nombre_punto" name="nombre_punto" required>
        <div id="NombrepuntErrormessage" class="error-message"></div>
        <div class="error"></div>

        <!--Nombre destinatario-->
        <label for="nombre_destinatario">Nombre del destinatario*:</label>
        <input type="text" id="nombre_destinatario" name="nombre_destinatario" required>
        <div id="NombdesErrormessage" class="error-message"></div>
        <div class="error"></div>
        <div id="NombdesErrormessage" class="error-message"></div>

        <!--Direccion del punto de entrega-->
        <label for="direccion">Dirección del punto de entrega*:</label>
        <input type="text" id="calle" name="calle" placeholder="Calle" required>
        <!--Calle-->
        <div id="CalleErrormessage" class="error-message"></div>
        <div class="error"></div>
        <!--Numero-->
        <input type="text" id="numero" name="numero" placeholder="Número" required>
        <div id="NumdirErrormessage" class="error-message"></div>
        <div class="error"></div>
        <!--Colonia-->
        <input type="text" id="colonia" name="colonia" placeholder="Colonia" required>
        <div id="ColoniaErrormessage" class="error-message"></div>
        <div class="error"></div>
        <!--Ciudad-->
        <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad" required>
        <div id="CiudadErrormessage" class="error-message"></div>
        <div class="error"></div>
        <!--Estado-->
        <select id="estado" name="estado">
          <option value="Estado/Provincia">Estado/Provincia</option>
          <option value="Aguascalientes">Aguascalientes</option>
          <option value="Baja California">Baja California</option>
          <option value="Baja California Sur">Baja California Sur</option>
          <option value="Campeche">Campeche</option>
          <option value="Chiapas">Chiapas</option>
          <option value="Chihuahua">Chihuahua</option>
          <option value="Ciudad de México">Ciudad de México</option>
          <option value="Coahuila">Coahuila</option>
          <option value="Colima">Colima</option>
          <option value="Durango">Durango</option>
          <option value="Estado de México">Estado de México</option>
          <option value="Guanajuato">Guanajuato</option>
          <option value="Guerrero">Guerrero</option>
          <option value="Hidalgo">Hidalgo</option>
          <option value="Jalisco">Jalisco</option>
          <option value="Michoacán">Michoacán</option>
          <option value="Morelos">Morelos</option>
          <option value="Nayarit">Nayarit</option>
          <option value="Nuevo León">Nuevo León</option>
          <option value="Oaxaca">Oaxaca</option>
          <option value="Puebla">Puebla</option>
          <option value="Querétaro">Querétaro</option>
          <option value="Quintana Roo">Quintana Roo</option>
          <option value="San Luis Potosí">San Luis Potosí</option>
          <option value="Sinaloa">Sinaloa</option>
          <option value="Sonora">Sonora</option>
          <option value="Tabasco">Tabasco</option>
          <option value="Tamaulipas">Tamaulipas</option>
          <option value="Tlaxcala">Tlaxcala</option>
          <option value="Veracruz">Veracruz</option>
          <option value="Yucatán">Yucatán</option>
          <option value="Zacatecas">Zacatecas</option>
        </select>
        <div id="EstadoErrormessage" class="error-message"></div>
        <div class="error"></div>
        <!--Codigo Postal-->
        <input type="text" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" required>
        <div id="CPErrormessage" class="error-message"></div>
        <div class="error"></div>

        <!--Informacion adicional-->
        <label for="informacion_adicional">Información adicional:</label>
        <textarea id="informacion_adicional" name="informacion_adicional"></textarea>

        <!--Contacto de destinatario-->
        <label for="contacto">Contacto del punto de entrega:</label>
        <!--Numero de telefono-->
        <input type="tel" id="telefono" name="telefono" placeholder="Telefono" required maxlength="10">
        <div id="TelefonoErrormessage" class="error-message"></div>
        <div class="error"></div>
        <!--Email-->
        <input type="email" id="email" name="email" placeholder="  Correo Electrónico" required>
        <div id="MailErrormessage" class="error-message"></div>
        <div class="error"></div>

        <div>
          <input type="submit" value="Agregar punto de entrega" id="agregarBtn">
        </div>
      </form>
    </div>
  </section>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="/js/inicio_sesion.js"></script>
  <script>
    // Nombre del punto de entrega
    var nombrePuntoentInput = document.getElementById('nombre_punto');
    var nombrePuntoentErrorMessage = document.getElementById('NombrepuntErrormessage');

    nombrePuntoentInput.addEventListener('input', function () {
      var nombrePuntoent = nombrePuntoentInput.value.trim();
      var regex = /^[A-Za-z\s]+$/; // Expresión regular para letras y espacios

      if (!regex.test(nombrePuntoent)) {
        nombrePuntoentInput.value = nombrePuntoent.replace(/[^A-Za-z\s]/g, ''); // Eliminar caracteres no permitidos
      }
    });

    // Nombre del destinatario
    var nombreDestinatarioInput = document.getElementById('nombre_destinatario');
    var nombreDestinatarioErrorMessage = document.getElementById('NombdesErrormessage');

    nombreDestinatarioInput.addEventListener('input', function () {
      var nombreDestinatario = nombreDestinatarioInput.value.trim();
      var regex = /^[A-Za-z\s]+$/; // Expresión regular para letras y espacios

      if (!regex.test(nombreDestinatario)) {
        nombreDestinatarioInput.value = nombreDestinatario.replace(/[^A-Za-z\s]/g, ''); // Eliminar caracteres no permitidos
      }
    });

    //Direccion del punto de entrega
    //Calle
    var CalleInput = document.getElementById('calle');
    var CalleErrorMessage = document.getElementById('CalleErrormessage');

    CalleInput.addEventListener('input', function () {
      var Calle = CalleInput.value.trim();
      var regex = /^[A-Za-z0-9\s]+$/; // Expresión regular para letras, números y espacios

      if (!regex.test(Calle)) {
        CalleInput.value = Calle.replace(/[^A-Za-z0-9\s]/g, ''); // Eliminar caracteres no permitidos
      }
    });
    //Colonia
    var coloniaInput = document.getElementById('colonia');
    var ColoniaErrorMessage = document.getElementById('ColoniaErrormessage');

    coloniaInput.addEventListener('input', function () {
      var colonia = coloniaInput.value.trim();
      var regex = /^[A-Za-z0-9\s]+$/; // Expresión regular para letras, números y espacios

      if (!regex.test(colonia)) {
        coloniaInput.value = colonia.replace(/[^A-Za-z\s]/g, ''); // Eliminar caracteres no permitidos
      }
    });
    //Ciudad
    var ciudadInput = document.getElementById('ciudad');
    var CiudadErrorMessage = document.getElementById('CiudadErrormessage');

    ciudadInput.addEventListener('input', function () {
      var ciudad = ciudadInput.value.trim();
      var regex = /^[A-Za-z0-9\s]+$/; // Expresión regular para letras, números y espacios

      if (!regex.test(ciudad)) {
        ciudadInput.value = ciudad.replace(/[^A-Za-z\s]/g, ''); // Eliminar caracteres no permitidos
      }
    });
    //Estado
    var estado = document.getElementById("estado");
    var EstadoErrormessage = document.getElementById("EstadoErrormessage");

    estado.addEventListener("change", function () {
      if (estado.value === 'Estado/Provincia') {
        EstadoErrormessage.textContent = 'Por favor, seleccione una opción';
      } else {
        EstadoErrormessage.textContent = '';
      }
    });
    var codigoInput = document.getElementById('codigo_postal');
    var CPErrormessage = document.getElementById('CPErrormessage');

    codigoInput.addEventListener('input', function () {
      var codigo = codigoInput.value.trim();
      var numericCodigo = codigo.replace(/\D/g, '');

      if (numericCodigo.length === 6) {
        codigoInput.value = numericCodigo;
        CPErrormessage.textContent = '';
      } else {
        codigoInput.value = numericCodigo;
        if (numericCodigo.length > 0) {
          CPErrormessage.textContent = 'Debe tener 6 dígitos';
        } else {
          CPErrormessage.textContent = '';
        }
      }
    });


    // Numero telefonico
    var telefonoInput = document.getElementById('telefono');
    var telefonoErrorMessage = document.getElementById('TelefonoErrormessage');

    telefonoInput.addEventListener('input', function () {
      var telefono = telefonoInput.value.trim();
      var numericTelefono = telefono.replace(/\D/g, '');

      if (numericTelefono.length === 10) {
        telefonoInput.value = numericTelefono;
        telefonoErrorMessage.textContent = '';
      } else {
        telefonoInput.value = numericTelefono;
        telefonoErrorMessage.textContent = 'Debe tener 10 dígitos';
      }
    });

    //Email
    var mailInput = document.getElementById('email');
    var MailErrormessage = document.getElementById('MailErrormessage');

    mailInput.addEventListener('input', function () {
      var mail = mailInput.value.trim();
      var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar el formato del correo electrónico

      if (mail === '') {
        MailErrormessage.textContent = ''; // No se muestra mensaje de error si el campo está vacío
      } else if (regex.test(mail)) {
        MailErrormessage.textContent = ''; // Formato de correo electrónico válido
      } else {
        MailErrormessage.textContent = 'Formato de correo electrónico incorrecto';
      }
    });



    document.getElementById('agregarBtn').addEventListener('click', function (event) {
      event.preventDefault();

      var nombrePuntoent = nombrePuntoentInput.value.trim();
      var nombreDestinatario = nombreDestinatarioInput.value.trim();
      var telefono = telefonoInput.value.trim();
      var calle = CalleInput.value.trim();
      var colonia = coloniaInput.value.trim();
      var ciudad = ciudadInput.value.trim();
      var estadopt = estado.value;
      var codigo = codigoInput.value.trim();

      var errorCount = 0; // Contador de errores

      if (nombrePuntoent === '') {
        nombrePuntoentErrorMessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        nombrePuntoentErrorMessage.textContent = '';
      }

      if (nombreDestinatario === '') {
        nombreDestinatarioErrorMessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        nombreDestinatarioErrorMessage.textContent = '';
      }

      if (calle === '') {
        CalleErrorMessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        CalleErrorMessage.textContent = '';
      }

      if (colonia === '') {
        ColoniaErrorMessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        ColoniaErrorMessage.textContent = '';
      }

      if (ciudad === '') {
        CiudadErrorMessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        CiudadErrorMessage.textContent = '';
      }

      if (estadopt === 'Estado/Provincia') {
        EstadoErrormessage.textContent = 'Por favor, seleccione una opción';
        errorCount++;
      } else {
        EstadoErrormessage.textContent = '';
      }

      if (codigo === '') {
        CPErrormessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        CPErrormessage.textContent = '';
      }

      if (telefono === '') {
        telefonoErrorMessage.textContent = 'Campo requerido';
        errorCount++;
      } else {
        telefonoErrorMessage.textContent = '';
      }

      if (errorCount === 0) {
        // No hay errores, puedes continuar con el proceso de envío
        // Aquí puedes agregar el código adicional que deseas ejecutar cuando no hay errores
      }
    });
  </script>


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