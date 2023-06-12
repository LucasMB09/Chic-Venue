<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chic Avenue</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosdos.css">
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:wght@200&display=swap');
    </style>

    <style>
        /* Estilos para el mensaje de éxito */
        #mensajeExito {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #c2c2c2;
            color: #3b3b3b;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            z-index: 9999;
        }
    </style>

</head>

<body>

    <div class="barra" style="background-color: black; height: 50px; width: 100%;">
    <?php
          if (isset($_SESSION['mensaje'])) {
              $mensaje = $_SESSION['mensaje'];
              ?>
              <div><h3 id="mensaje" style="display: none;"><?php echo "$mensaje";?></h3></div>
              <?php
              unset($_SESSION['mensaje']); // Limpiamos la variable de sesión
          }
        ?>
    </div>
    <div class="container">
        <h1>Generar nueva contraseña</h1>
        <form action="/php/cambio_contra.php" method="post" class="form" id="formulario">
            <div style="color: gray;" id="contenedor">
                <div id="uwu"><p>La contraseña requiere:</p></div>
                <ul id="lista">
                    <div id="carac"><li><p class="letra-texto">8 caracteres</p></li></div>
                    <div id="mayus"><li><p class="letra-texto">1 mayúscula</p></li></div>
                    <div id="minus"><li><p class="letra-texto">1 minúscula</p></li></div>
                    <div id="car"><li><p class="letra-texto">1 caracter especial</p></li></div>
                    <div id="num"><li><p class="letra-texto">1 número</p></li></div>
                </ul>
            </div>
            <div class="form__correo" style="margin-top: 20px;" id="pass1">
                <input type="password" placeholder="Nueva contraseña" name="contra1" id="con1" class="correo">
                <i class="formulacion_validacion-estado fas fa-times-circle"></i>
            </div>
            <div class="form__correo" style="margin-top: 20px;" id="pass2">
                <input type="password" placeholder="Repetir contraseña" name="contra2" id="con2" class="correo">
                <i class="formulacion_validacion-estado fas fa-times-circle"></i>
            </div>
            <div class="form__button">
                <button class="enviar" type="submit">Cambiar contraseña</button>
            </div>
        </form>
        <!-- <h2><a href="perfil_usuario.php">Volver</a></h2> -->
        <div id="mensajeExito">Modificación de contraseña exitosa</div>
    </div>

    <script src="/js/contraseña_dos.js"></script>

</body>


</html>
