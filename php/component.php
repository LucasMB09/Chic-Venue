<?php
function component($id_articulo, $precio, $nombre_articulo, $color, $talla, $stock, $categoria, $imagen, $email)
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
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin-top: 5px;
        }
    
        .price {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            margin-top: 5px;
        }
        
        .color {
            font-size: 12px;
            text-align: center;
            margin-top: 5px;
        }
        
        .talla {
            font-size: 12px;
            text-align: center;
            margin-top: 5px;
        }
        
        .stock {
            font-size: 12px;
            text-align: center;
            margin-top: 5px;
        }
        
        .categoria {
            font-size: 12px;
            text-align: center;
            margin-top: 5px;
        }
    
        </style>
    
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
            <h3 id=\"uwu\" style=\"display:none;\">$email</h3>
            <form id=\"registro\" method=\"POST\" enctype=\"multipart/form-data\">
                <div class=\"text-center\">
                    <div class=\"circle-container\">
                        <div class=\"circle\">
                            <img src=\"$imagen\" alt=\"Image1\">
                            <div class=\"overlay\">
                                <form action=\"/php/agregar_carrito.php\" id=\"carrito\" method=\"POST\" enctype=\"multipart/form-data\">
                                    <button type=\"submit\" data-arti=\"$id_articulo\" data-cliente=\"$email\" class=\"btn btn-warning my-3 btn-circle btn-white\" name=\"add\"><img src=\"assets/carrito.png\" alt=\"Carrito\"></button>
                                    <input type='hidden' name='id_art' value='$id_articulo'>
                                    <input type='hidden' name='id_cliente' value='$email'>
                                </form>
                                
                                <form action=\"/php/agregar_fav.php\" id=\"favo\" method=\"POST\" enctype=\"multipart/form-data\">
                                    <button type=\"submit\" data-arti=\"$id_articulo\" data-cliente=\"$email\" class=\"btn btn-info my-3 btn-circle btn-white\" name=\"favorite\" ><img src=\"assets/favoritos.png\" alt=\"Favoritos\"></button>
                                    <input type='hidden' name='id_art' value='$id_articulo'>
                                    <input type='hidden' name='id_cliente' value='$email'>
                                </form>
                            </div>
                        </div>
                        <h5 class=\"title\">$nombre_articulo</h5>
                        <h5 class=\"price\">
                            <span>$$precio</span>
                        </h5>
                        <h5 class=\"color\">
                            <span>Color: $color</span>
                        </h5>
                        <h5 class=\"talla\">
                            <span>Talla: $talla</span>
                        </h5>
                        <h5 class=\"stock\">
                            <span>Stock: $stock</span>
                        </h5>
                        <h5 class=\"categoria\">
                            <span>Categoría: $categoria</span>
                        </h5>
                    </div>
                </div>
                <div class=\"card-body text-center\">
                    <input type='hidden' name='product_id' value='$id_articulo'>
                </div>
            </form>
        </div>
        
        <script src=\"../js/component.js\"></script>
    ";
    echo $element;
}
?>