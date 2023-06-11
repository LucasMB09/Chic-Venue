<?php

function component($id_articulo, $precio, $nombre_articulo, $descripcion, $imagen)
{
    $element = "
        <style>
        .circle-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
        .circle {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
        }
    
        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
    
        .circle:hover .overlay {
            opacity: 1;
        }
    
        .btn-circle {
            border-radius: 50%;
            margin: 5px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.3);
            border: none;
            transition: background-color 0.3s ease;
        }
    
        .btn-circle img {
            width: 24px;
            height: 24px;
        }
    
        .btn-circle:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .btn-circle.active {
            background-color: white;
            color: black;
            border-color: white;
        }
        
        .btn-circle.active:hover {
            background-color: white;
        }
        
        .title {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
    
        .price {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        
        </style>
    
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
            <form action=\"index.php\" method=\"post\">
                <div class=\"text-center\">
                    <div class=\"circle-container\">
                        <div class=\"circle\" onmouseover=\"showButtons(this)\" onmouseout=\"hideButtons(this)\">
                            <img src=\"$imagen\" alt=\"Image1\">
                            <div class=\"overlay\">
                                <button type=\"submit\" class=\"btn btn-warning my-3 btn-circle btn-white\" name=\"add\"><img src=\"assets/carrito.png\" alt=\"Carrito\"></button>
                                <button type=\"button\" class=\"btn btn-info my-3 btn-circle btn-white\" name=\"favorite\" onClick=\"favoriteClicked(event, '$nombre_articulo', $precio)\"><img src=\"assets/favoritos.png\" alt=\"Favoritos\"></button>
                            </div>
                        </div>
                        <h5 class=\"title\">$nombre_articulo</h5>
                        <h5 class=\"price\">
                            <span>$$precio</span>
                        </h5>
                    </div>
                </div>
                <div class=\"card-body text-center\">
                    <input type='hidden' name='product_id' value='$id_articulo'>
                </div>
            </form>
        </div>
        
        <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
        
        <script>
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
            return false; // Cambia esto con tu lógica real
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
                    alert('Redirigir al usuario a la página de inicio de sesión.');
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
                    alert('Redirigir al usuario a la página de inicio de sesión.');
                }
            });
        }
        
        // Función para manejar el evento de clic en el botón de favoritos
        function favoriteClicked(event, nombre, precio) {
            event.stopPropagation(); // Evitar que el evento de clic se propague a la imagen y muestre los botones nuevamente
            showAddToCartAlert();
        }
        </script>
    ";
    echo $element;
}

?>

<!-- Asegúrate de incluir jQuery en tu página -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.btn-circle').click(function(e) {
        e.preventDefault(); // Evita que el formulario se envíe automáticamente
        if (!isLoggedIn()) {
            showAlert();
        } else {
            $(this).closest('form').submit(); // Envía el formulario más cercano al botón clicado
            $(this).addClass('active'); // Agrega la clase 'active' al botón clicado
        }
    });
});
</script>