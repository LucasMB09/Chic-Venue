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
        <form action="" class="form">
            <div class="form__correo">
                <input type="email" placeholder="Ingrese su correo electrónico" class="correo">
            </div>
            <div class="form__button">
                <button class="enviar">Enviar Código</button>
            </div>
            
        </form>
        <h2><a href="log-in.php">Volver al inicio de sesión </a></h2> 
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var enviarButton = document.querySelector(".enviar");
            enviarButton.addEventListener("click", function(event) {
                event.preventDefault();

                var correoInput = document.querySelector(".correo");
                var correoValue = correoInput.value.trim();

                var errorElement = document.createElement("p");
                errorElement.className = "error-message";

                var correoContainer = document.querySelector(".form__correo");
                var existingError = document.querySelector(".error-message");

                if (correoValue === "") {
                    Swal.fire({
            title: '¡Error!',
            text: 'Se deben completar todos los campos obligatorios.',
            icon: 'error',
            showConfirmButton: 'Aceptar'
                            });
                    if (!existingError) {
                        correoContainer.appendChild(errorElement);
                        
                    }
                } else if (!isValidEmail(correoValue)) {
                    Swal.fire({
                                title: '¡Error!',
                                text: 'Correo inválido o no registrado',
                                icon: 'error',
                                showConfirmButton: 'Aceptar'
                            });
                    if (!existingError) {
                        correoContainer.appendChild(errorElement);
                    }
                } else if (existingError) {
                    existingError.remove();
                    showSuccessMessage();
                } else {
                    showSuccessMessage();
                }
            });
        });

        function isValidEmail(email) {
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function showSuccessMessage() {
            var successMessage = document.createElement("div");
            successMessage.className = "success-message";
            successMessage.textContent = "Le enviamos un correo electrónico con la información necesaria para restablecer su contraseña. El correo electrónico puede tardar un par de minutos en llegar.";

            var container = document.querySelector(".container");
            container.insertBefore(successMessage, container.firstChild);

            var closeButton = document.createElement("button");
            closeButton.className = "close-button";
            closeButton.textContent = "X";
    
            successMessage.appendChild(closeButton);
    
            closeButton.addEventListener("click", function() {
                successMessage.remove();
            });
        }
    </script>
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