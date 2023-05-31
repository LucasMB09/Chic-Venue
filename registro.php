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
    </head>

    <body>
        <div class="container-form sign-up">
            <div class="welcome-back">
                <div class="message">
                    <div class="logo">
                        <img src="/assets/logo.jpg" width="170" height="170">
                    </div>
                    <h2>CHIC VENUE</h2>
                    <p>¿Ya es parte de Chic Venue? Inicie sesión aquí</p>
                    <button class="sign-up-btn" type="button" onclick="go_login()" id="regreso" value="Atras">Iniciar Sesion</button>
                    <!--<button id="boton-alerta">Try me</button>-->
                </div>
            </div>
            <form class="formulario" id="registro" action="/php/registro.php" method= "POST" enctype="multipart/form-data">
                <h2 class="create-account">R E G I S T R O</h2>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="nombre">
                    <input type="text" name="nombre" placeholder="Nombre*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="apellido">
                    <input type="text" name="apellido" placeholder="Apellido*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="email">
                    <input type="email" name="email" placeholder="Correo electrónico*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <div class="form-floating formulario_grupo formulario_grupo-input" id="pass">
                    <input type="password" name="contrasena" placeholder="Contraseña*">
                    <i class="formulacion_validacion-estado fas fa-times-circle"></i>
                </div>
                <button class="boton_registro" type="submit" name="registro" id="regis">Registrarme</button>
                <br><br>
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
        <!--Cuadro de validaciones-->
        <form class="campo_validaciones" >
            <div class="contenedor" id="contenedor">
            <div id="uwu"><h3 >La contraseña requiere:</h3></div>
            <div id="texcorrec" style="display: none;"><h4 class="text_correc">La contraseña cumple con<br>los requerimentos</h4></div>
            <ul class="text_validaciones" id="lista">
                <div id="carac"><li><h4 class="text_validaciones">8 carácteres</h4></li></div>
                <div id="mayus"><li><h4 class="text_validaciones">1 mayúscula</h4></li></div>
                <div id="minus"><li><h4 class="text_validaciones">1 minúscula</h4></li></div>
                <div id="car"><li><h4 class="text_validaciones">1 carácter especial</h4></li></div>
                <div id="num"><li><h4 class="text_validaciones">1 número</h4></li></div>
            </ul>
            
            </div>
            

            
        </form>
        <script src="js/registro_verificar.js"></script>
    </body>
</html>