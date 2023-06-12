document.addEventListener("DOMContentLoaded", function() {
    var enviarButton = document.querySelector(".enviar");
    enviarButton.addEventListener("click", function(event) {

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
        event.preventDefault();
            
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
            // showSuccessMessage();
        } else {
            // showSuccessMessage();
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