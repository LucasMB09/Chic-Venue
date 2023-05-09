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
                    <img src="/assets/logo.jpg" width="170" height="170">
                </div>
                <h2>CHIC AVENUE</h2>
                <p>¿Ya es parte de Chic Venue? Inicie sesión aquí </p>
                <button class="sign-up-btn">Iniciar Sesion</button>
            </div>
        </div>
        <form class="formulario">
            <h2 class="create-account">R E G I S T R O</h2>
            <input type="text" name="nombre" placeholder="Nombre*">
            <input type="text" name="apellido" placeholder="Apellido*">
            <input type="email" name="email" placeholder="Correo electrónico*">
            <input type="password" name="contrasena" placeholder="Contraseña*">
            <button class="boton_registro" type="submit" name="registro">Registrarme</button>
            <?php
            include("aux_registro.php")
            ?>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>



