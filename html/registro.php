<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>REGISTRO DE USUARIO A LA TIENDA</title>
</head>

<body>
    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <div class="logo">
                    <img src="/assets/logo_CA.PNG" width="170" height="170"> <!-- LOGO DE NUESTRA EMPRESA-->
                </div>
                <h2>CHIC AVENUE</h2>
                <p>¿Ya es parte de Chic Venue? Inicie sesión aquí </p>
                <a href="/html/log-in.html">
                <button class="sign-up-btn">Iniciar Sesion</button>  <!-- REDIRECCION A LA PAGINA DE INICIO-->
            </a>
            </div>
        </div>
        <form method="POST">
            <h2 class="create-account">R E G I S T R O</h2>
            <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre*"> <!--NOMBRRE-->
            <input type="text" id="apellido_usuario" name="apellido_usuario" placeholder="Apellido*"><!--APELLIDO -->
            <input type="email" id="correo_usuario" name="correo_Usuario" placeholder="Correo electrónico*"><!--CORREO -->
            <input type="password" id="contraseña" name="contrasena"placeholder="Contraseña*"> <!--CONTRASEÑA -->
            <input type="submit" id="registro" value="Registrarme"> <!-- BOTÓN SUBMIT -->
        </form>
        <?php
        include("aux_registro.php")
        ?>
    </div>
</body>

</html>



