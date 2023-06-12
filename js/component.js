// Agregar evento de clic a los botones
var buttons = document.querySelectorAll('.btn-circle');
buttons.forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe automáticamente
        if (!isLoggedIn()) {
            if (button.getAttribute('name') === 'add') {
                showAddToCartAlert();
            } else if (button.getAttribute('name') === 'favorite') {
                showAddToFavoritesAlert();
            }
        } else {
            button.classList.toggle('active'); // Alternar la clase 'active' en el botón clicado
            button.blur(); // Quitar el enfoque del botón para evitar la apariencia de selección
        }
    });
});

// Función para mostrar los botones al pasar el cursor sobre la imagen
function showButtons(element) {
    var overlay = element.querySelector('.overlay');
    overlay.style.opacity = 1;
}

// Función para ocultar los botones al quitar el cursor de la imagen
function hideButtons(element) {
    var overlay = element.querySelector('.overlay');
    overlay.style.opacity = 0;
}

// Función para verificar si el usuario ha iniciado sesión
function isLoggedIn() {
    // Aquí debes agregar tu lógica para verificar si el usuario ha iniciado sesión
    // Por ejemplo, puedes utilizar una variable de sesión o comprobar si el usuario tiene una cookie de autenticación
    // Retorna true si el usuario ha iniciado sesión, de lo contrario retorna false
    const email = document.getElementById("uwu");
    if((email.textContent).length > 0 && email.textContent != ":v" ){
        return true; // Cambia esto con tu lógica real
    }
    else{
        console.log(email.textContent);
        return false;
    }
}

// Función para mostrar la alerta de agregar a carrito
function showAddToCartAlert() {
    Swal.fire({
        title: 'Alerta',
        text: 'Se requiere iniciar sesión con una cuenta activada para realizar una compra.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iniciar sesión'
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí puedes agregar la lógica para redirigir al usuario a la página de inicio de sesión
            // Por ejemplo, puedes utilizar window.location.href = 'ruta-de-inicio-de-sesion';
            // alert('Redirigir al usuario a la página de inicio de sesión.');
            location.href = "log-in.php";
        }
    });
}

// Función para mostrar la alerta de agregar a favoritos
function showAddToFavoritesAlert() {
    Swal.fire({
        title: 'Alerta',
        text: 'Se requiere iniciar sesión con una cuenta activada para añadir a favoritos.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iniciar sesión'
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí puedes agregar la lógica para redirigir al usuario a la página de inicio de sesión
            // Por ejemplo, puedes utilizar window.location.href = 'ruta-de-inicio-de-sesion';
            // alert('Redirigir al usuario a la página de inicio de sesión.');
            location.href = "log-in.php";
        }
    });
}

// Función para manejar el evento de clic en el botón de favoritos
function favoriteClicked(event, nombre, precio) {
    event.stopPropagation(); // Evitar que el evento de clic se propague a la imagen y muestre los botones nuevamente
    showAddToCartAlert();
}