<?php
  session_start();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Enlaces a los archivos CSS y JavaScript de Font Awesome alojados en línea -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
 

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
        background-color: rgba(0, 0, 0, .1);
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

  </head>

  <body>
  <div class="barra fixed-top" style="background-color: black; height: 40px; width: 100%;">
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
            <div class="cont">
          <div class="form sign-in ">
         <form id="login" action="php/con_db.php" method= "POST" enctype="multipart/form-data">
        <a class="navbar-brand" href="/index.php">
            <img class="rounded mx-auto d-block" src="../assets/logo_CA.PNG" alt="LOGO" width="82" height="70">
            
    </a><br>
        <h1 class="texto">Inicio de sesión</h1>
        
        <!--Correo Electronico-->
            <label>
            <span for="floatingInput">Correo electr&oacute;nico</span>
            <div class="form-floating formulario_grupo formulario_grupo-input" id="email">
            <i class="formulacion_validacion-estado fas fa-times-circle"></i>
              <input type="email" class="form-control" id="iemail" placeholder="name@example.com" name="iemail">
              
            </div>
        </label>
        <!--Contraseña-->
            <label>
            <span for="floatingPassword">Contraseña</span>
            <div class="form-floating formulario_grupo formulario_grupo-input" id="pass">
            <i class="formulacion_validacion-estado fas fa-times-circle"></i>
              <input type="password" class="form-control" id="ipass" placeholder="Password" name="ipass">
            </div>
            </label>
        <!-- Checkbox Recuerdame y Enlace "Olvidé mi contraseña" -->
        <div class="checkbox mb-3">
        </label>
                        <label for="recuerda">
                            <span>Recordar mi cuenta</span>
                        <input type="checkbox" name="recuerda" value="remember-me" id="recuerda">

                        </label>
                       <label> 
                            <a href="contraseña.php" class="font-weight-bold text-decoration-none text-dark">Olvidé mi contraseña</a>
                       </label>
        </div>

        <!-- Botón Iniciar sesión -->
        <button class="submit" type="submit" id="log">Iniciar sesión</button>
        <p class="mt-5 mb-3 text-body-secondary"></p>
        <!--<div class="formulario_mensaje" id="formulario_mensaje">
          <p><i class="fas fa-exclamation-triangle"></i> <b>Error: </b>Se deben completar todos los campos obligatorios.</p>
        </div>-->
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
                <div class="sub-cont">
                    <div class="img">
                    <div class="img__text m--up">
                        <h2>¿Aún no tienes cuenta?</h2>
                        <p>¡Registrate ahora y se parte de Chic Venue!</p>
                    </div>
                    <div class="img__text m--in">
                        <h2>¿Ya eres parte de Chic Venue?</h2>
                        <p>¡Inicia sesión y sigamos brillando!</p>
                    </div>
                    <div class="img__btn">
                    
                    <h2><a class="nav-link" href="registro.php"><strong>Crea una nueva cuenta</strong></a></h2>
                    </div>
                    </div>

                    <div class="form sign-up">
                
                </div>
                </div>
            </div>

       <script src="/js/login_verificar.js"></script>

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
        <small class="d-block mb-3 text-body-secondary">&copy; 2022-2023</small>
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

