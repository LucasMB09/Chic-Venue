<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="../css/estilos.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');
        </style>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:wght@200&display=swap');
    </style>
        

</head>
<body>
    <div class="barra" style="background-color: black; height: 50px; width: 100%;">
    <?php 
        // echo $_SESSION['codigo'];
        if(isset($_SESSION['mensaje'])){
            $mensaje = $_SESSION['mensaje'];
            ?>
                <h3 id="uwu" style="display:none;" class="texto_blanco"><?php echo $mensaje;?></h3>
            <?php
        }
      ?>
    </div>
    
    <div class="container">
        <h1>Recuperar contraseña</h1>
        <h2 class="titulo">Ingrese el código que ha sido enviado a su correo electrónico</h2>
        <form action="val_codigo_contra.php" class="form" method="post">
            <div class="form__correo">
                <input type="text" placeholder="Ingrese el código" class="correo" name="cod">
            </div>
            <div class="form__button">
                <button class="enviar">Enviar Código</button>
            </div>
            
        </form>
        <!-- <h2><a href="log-in.php">Volver al inicio de sesión </a></h2>  -->
    </div>

    <script src="../js/codigo_contra.js"></script>
</body>
</html>