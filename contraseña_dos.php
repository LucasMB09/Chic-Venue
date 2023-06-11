<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chic Avenue</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
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
    </div>
    <div class="container">
        <h1>Generar nueva contraseña</h1>
        <form action="" class="form">

            <p id="mensajeValidacion" style="color: gray;">La contraseña requiere:<br>- 8 caracteres<br>- Una
                mayúscula<br>- Una minúscula<br>- Un carácter especial<br>- Un número</p>
            <div class="form__correo" style="margin-top: 20px;">
                <input type="password" placeholder="Nueva contraseña" id="contrasena1" class="correo"
                    onkeyup="verificarContrasena()">
            </div>
            <div class="form__correo" style="margin-top: 20px;">
                <input type="password" placeholder="Repetir contraseña" id="contrasena2" class="correo">
                <p id="mensajeError"></p>
            </div>
            <div class="form__button">
                <button class="enviar" onclick="return verificarContrasenas()">Cambiar contraseña</button>
            </div>
        </form>
        <h2><a href="perfil_usuario.php">Volver</a></h2>
        <div id="mensajeExito">Modificación de contraseña exitosa</div>
    </div>

    <script>
        function verificarContrasena() {
            var contrasena = document.getElementById("contrasena1").value;
            var mensajeValidacion = document.getElementById("mensajeValidacion");
            var contrasenaValida = true;

            // Verificar longitud mínima
            if (contrasena.length < 8) {
                mensajeValidacion.style.color = "red";
                contrasenaValida = false;
            } else {
                mensajeValidacion.style.color = "gray";
            }

            // Verificar si hay una mayúscula
            if (!/[A-Z]/.test(contrasena)) {
                contrasenaValida = false;
            }

            // Verificar si hay una minúscula
            if (!/[a-z]/.test(contrasena)) {
                contrasenaValida = false;
            }

            // Verificar si hay un carácter especial
            if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(contrasena)) {
                contrasenaValida = false;
            }

            // Verificar si hay un número
            if (!/\d/.test(contrasena)) {
                contrasenaValida = false;
            }

            if (contrasenaValida) {
                mensajeValidacion.style.color = "green";
            } else {
                mensajeValidacion.style.color = "red";
            }
        }

        function verificarContrasenas() {
            var contrasena1 = document.getElementById("contrasena1").value;
            var contrasena2 = document.getElementById("contrasena2").value;
            var mensajeError = document.getElementById("mensajeError");
            var mensajeExito = document.getElementById("mensajeExito");
            if(contrasena1=='' || contrasena2=='')
            {
                Swal.fire({
                title: '¡Error!',
                text: 'Se deben completar todos los campos obligatorios',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
            return false;
            }
            else{
            if (contrasena1 !== contrasena2) {
             //   mensajeError.textContent = "Las contraseñas no coinciden";
             //   mensajeError.style.color = "red";
             //   mensajeExito.style.display = "none"; 
             Swal.fire({
                title: '¡Error!',
                text: 'Las contraseñas no coinciden',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
                return false;
            }
        
            // Verificar condiciones adicionales
            verificarContrasena();
        
            var mensajeValidacion = document.getElementById("mensajeValidacion");
            var contrasenaValida = mensajeValidacion.style.color !== "red";
        
            if (!contrasenaValida) {
               // mensajeExito.style.display = 'none';
               Swal.fire({
                title: '¡Error!',
                text: 'Formato de contraseña incorrecto',
                icon: 'error',
                showConfirmButton: 'Aceptar'
            });
                return false;
            }
     
            mensajeExito.style.display = "block";
            setTimeout(function () {
                mensajeExito.style.display = "none";
            }, 3500);
            document.getElementById("contrasena1").value = ""; 
            document.getElementById("contrasena2").value = ""; 
        
            return false;
        }
    }
    </script>

</body>


</html>
