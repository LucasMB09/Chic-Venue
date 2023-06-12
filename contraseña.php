<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chic Avenue</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="css/estilos.css">
    <script src="/sweetalert/dist/sweetalert2.all.min.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');
        </style>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:wght@200&display=swap');
    </style>
        

</head>
<body>
    <div class="barra" style="background-color: black; height: 50px; width: 100%;">
    </div>
    
    <div class="container">
        <h1>Recuperar contraseña</h1>
        <h2 class="titulo">Ingrese la dirección de correo electrónico y se enviarán instrucciones para restablecer la contraseña.</h2>
        <form action="/php/correo_contra.php" class="form" method="POST" id="formu" enctype="multipart/form-data">
            <div class="form__correo">
                <input type="email" placeholder="Ingrese su correo electrónico" class="correo" name="email">
            </div>
            <div class="form__button">
                <button class="enviar" type="submit">Enviar Código</button>
            </div>
            
        </form>
        <!-- <h2><a href="log-in.php">Volver al inicio de sesión </a></h2>  -->
    </div>

    <script src="/js/contraseña.js"></script>
</body>
 
</html>