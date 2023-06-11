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
                                <button type=\"submit\" class=\"btn btn-info my-3 btn-circle btn-white\" name=\"favorite\"><img src=\"assets/favoritos.png\" alt=\"Favoritos\"></button>
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
        
        <script>
        // Agregar evento de clic a los botones
        var buttons = document.querySelectorAll('.btn-circle');
        buttons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Evita que el formulario se envíe automáticamente
                button.classList.toggle('active'); // Alternar la clase 'active' en el botón clicado
                button.blur(); // Quitar el enfoque del botón para evitar la apariencia de selección
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
        $(this).closest('form').submit(); // Envía el formulario más cercano al botón clicado
        $(this).addClass('active'); // Agrega la clase 'active' al botón clicado
    });
});
</script>