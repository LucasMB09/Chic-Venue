<?php
  session_start();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Chic Avenue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <!-- Enlaces a los archivos CSS y JavaScript de Font Awesome alojados en línea -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formulario.css">
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    

    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

  

    
    <!-- Custom styles for this template -->
    <link href="/css/sign-in.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div class="barra fixed-top" style="background-color: black; height: 40px; width: 100%;">
    <br>
    <br>
    
   <!-- <div class="container">
      <div class="row">
        <div class="col"><img class="rounded float-left" src="assets/generic1.jpg"  width="200%" height="200%"alt="Baner1"></div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
      </div>
    -->
    <main class="form-signin w-100 m-auto">
      <!--Empieza formulario-->
      <form id="login" action="php/ver_admin.php" method= "POST" enctype="multipart/form-data">
        <img class="Logo de Chic Avenue" src="../assets/logo_CA.PNG" alt="LOGO" width="82" height="70">
       <br>
       <br>
        <h1 class="texto">Inicio de sesión</h1>
        <h3 class="texto">Modo Administrador</h3>
        <br>
        <!--Correo Electronico-->
        <div class="form-floating formulario_grupo formulario_grupo-input" id="email">
          <input type="email" class="form-control" id="iemail" placeholder="name@example.com" name="iemail">
          <i class="formulacion_validacion-estado fas fa-times-circle"></i>
          <label for="floatingInput">Correo electr&oacute;nico</label>
        </div>
        <!--Contraseña-->
        <div class="form-floating formulario_grupo formulario_grupo-input" id="pass">
          <input type="password" class="form-control" id="ipass" placeholder="Password" name="ipass">
          <i class="formulacion_validacion-estado fas fa-times-circle"></i>
          <label for="floatingPassword">Contraseña</label>
        </div>
        <!-- Checkbox Recuerdame y Enlace "Olvidé mi contraseña" -->
        
        <div class="d-flex align-items-center"></div>
        <br>
        <!-- Botón Iniciar sesión -->
        <button class="w-100 btn btn-lg btn-primary bg-black" type="submit" id="log">Iniciar sesión</button>
        <p class="mt-5 mb-3 text-body-secondary"></p>
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
      <div>
        <button class="boton_regreso" onclick="go_login()" type="submit">Cancelar</button>
        <p class="mt-5 mb-3 text-body-secondary"></p>
      </div>
      
  </main>
    
    <script src="/js/admin_verify.js"></script>
  </body>

</html>
