<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>REGISTRO DE USUARIO A LA TIENDA</title>
    <link rel="stylesheet" href="/css/formulario.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--SweetAlert-->
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 40px;
            background-color: black;
            z-index: 9999;
        }

        .container-form {
            padding-top: 40px;
        }
    </style>
</head>

    <body>
        <div class="navbar"></div>
        <div class="container-form sign-up">
            <div class="welcome-back">
                <div class="message">
                    <div class="logo">
                        <img src="/assets/logo.jpg" width="170" height="170">
                    </div>
                    <h2>CHIC VENUE</h2>
                    <p class="letra-texto">¿Ya es parte de Chic Venue? Inicie sesión aquí</p>
                    <button class="letra-texto" type="button" onclick="go_login()" id="regreso" value="Atras">Iniciar Sesión</button>
                    <!--<button id="boton-alerta">Try me</button>-->
                </div>
            </div>
            <form class="formulario" id="registro" action="/php/registro.php" method= "POST" enctype="multipart/form-data">
                <h2 class="create-account">R E G I S T R O</h2>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="nombre">
                    <input type="text" class="letra-texto" name="nombre" placeholder="Nombre*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="apellido">
                    <input type="text" class="letra-texto" name="apellido" placeholder="Apellido*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="email">
                    <input type="email"  class="letra-texto" name="email" placeholder="Correo electrónico*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="pass">
                    <input type="password"  class="letra-texto" name="contrasena" placeholder="Contraseña*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="pass">
                    <input type="password"  class="letra-texto" name="contrasena" placeholder="Confirmar Contraseña*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <button class="boton_registro" class="letra-texto" type="submit" name="registro" id="regis">Registrarme</button>
                <br><br>
                <?php
                if (isset($_SESSION['mensaje'])) {
                    $mensaje = $_SESSION['mensaje'];
                    ?>
                    <div><h3 id="mensaje" style="display: none;"><?php echo "$mensaje";?></h3></div>
                    <?php
                    unset($_SESSION['mensaje']); // Limpiamos la variable de sesión
                }
                ?>
            </form>
        </div>
        <!--Cuadro de validaciones-->
        <form class="campo_validaciones" >
        <div class="contenedor" id="cont_nom" style="display: none;" >
                <div id="uwu1"><h3 class="letra-texto" >El nombre requiere:</h3></div>
                <div id="nomb"><h4 class="letra-texto text_validaciones">Tienen que ser solamente letras</h4></div>
            </div>
            <div class="contenedor" id="cont_ape" style="display: none;" >
                <div id="uwu1"><h3 class="letra-texto" >El apellido requiere:</h3></div>
                <div id="nomb"><h4 class="letra-texto text_validaciones">Tienen que ser solamente letras</h4></div>
            </div>

            <div class="contenedor" id="cont_cor" style="display: none;" >
                <div id="uwu1"><h3 class="letra-texto" >El correo requiere:</h3></div>
                <ul class="text_validaciones" id="lista1">
                    <div id="arroba"><li><h4 class="letra-texto">Le falta el arroba (@)</h4></li></div>
                    <div id="punto"><li><h4 class="letra-texto">Le falta el punto</h4></li></div>
                </ul>
            </div>

            <div class="contenedor" id="contenedor" style="display:none;">
                <div id="uwu"><h3 class="letra-texto" >La contraseña requiere:</h3></div>
                <div id="texcorrec" style="display: none;"><h4 class="letra-texto">La contraseña cumple con<br>los requerimentos</h4></div>
                <ul class="text_validaciones" id="lista">
                    <div id="carac"><li><h4 class="letra-texto">8 caracteres</h4></li></div>
                    <div id="mayus"><li><h4 class="letra-texto">1 mayúscula</h4></li></div>
                    <div id="minus"><li><h4 class="letra-texto">1 minúscula</h4></li></div>
                    <div id="car"><li><h4 class="letra-texto">1 caracter especial</h4></li></div>
                    <div id="num"><li><h4 class="letra-texto">1 número</h4></li></div>
                </ul>
    
        </form>
        <script src="js/registro_verificar.js"></script>
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