<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
        <br><br>
        </div>
    </nav>

    <br>

    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="display: flex; align-items: center;">
        <img src="/assets/logo.jpg" class="rounded mx-3" alt="" width="82" height="70" style="margin: 0;">
        <h1 style="margin: 0;">Administrador</h1>
        </a>
    </div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $id_articulo = $_GET['id_articulo'];
    $nombre_articulo = $_GET['nombre_articulo'];
    $descripcion = $_GET['descripcion'];
    $precio = $_GET['precio'];
    $categoria = $_GET['categoria'];
    if (isset($_GET['color'])) {
        $color = $_GET['color'];
    } else {
        $color = ''; // o cualquier valor predeterminado que desees asignar
    }
    
    if (isset($_GET['talla'])) {
        $talla = $_GET['talla'];
    } else {
        $talla = ''; // o cualquier valor predeterminado que desees asignar
    }
    
    if (isset($_GET['stock'])) {
        $stock = $_GET['stock'];
    } else {
        $stock = ''; // o cualquier valor predeterminado que desees asignar
    }
    if (isset($_GET['descuento'])) {
        $descuento = $_GET['descuento'];
    } else {
        $stock = ''; // o cualquier valor predeterminado que desees asignar
    }
    $imagen = $_GET['imagen'];

    // Obtener la fecha actual
    $fechaActual = date('Y-m-d');
?>
<br>
<div class="container">
    <div class="row justify-content-center align-items-center minh-100">
        <h2>Editar producto</h2>
            <form id="create-product-form" action="/php/editar_producto.php" method="post">
            <table class="table table-responsive">
                <tr>
                    <td></td>
                    <td><input type="text" value="<?=$id_articulo?>" name="id_articulo" id="" style="visibility:hidden"></td>
                </tr>
                <tr>
                    <td>Nombre articulo:</td>
                    <td><input type="text" value="<?=$nombre_articulo?>" name="nombre_articulo" id=""></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><input type="text" value="<?=$descripcion?>" name="descripcion" id=""></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" value="<?=$precio?>" name="precio" id=""></td>
                </tr>
                <tr>
                    <td>Imagen:</td>
                    <td><input type="text" value="<?=$imagen?>" name="imagen" id=""></td>
                </tr>
                <!--AÑADIDO-->
                <tr>
                    <td>Color:</td>
                    <td><input type="text" value="<?=$color?>" name="color" id=""></td>
                </tr>
                <tr>
                    <td>Talla:</td>
                    <td>
                    <select name="talla" id="talla">
                        <option value="" disabled>Tallas</option>
                        <option value="S" <?php if ($talla == "S") echo "selected='selected'"; ?>>S</option>
                        <option value="M" <?php if ($talla == "M") echo "selected='selected'"; ?>>M</option>
                        <option value="X" <?php if ($talla == "X") echo "selected='selected'"; ?>>X</option>
                        <option value="XL" <?php if ($categoria == "Bluson") echo "selected='selected'"; ?>>XL</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Stock:</td>
                    <td><input type="text" value="<?=$stock?>" name="stock" id=""></td>
                </tr>

                <tr>
                    <td>Descuento:</td>
                    <td><input type="text" value="<?=$descuento?>" name="descuento" id=""></td>
                </tr>
                
                <tr>
                    <td>Categoría:</td>
                    <td>
                    <select name="categoria" id="categoria">
                        <option value="" disabled>Categoria</option>
                        <option value="Promociones" <?php if ($categoria == "Promociones") echo "selected='selected'"; ?>>Promociones</option>
                        <option value="Básicos" <?php if ($categoria == "Básicos") echo "selected='selected'"; ?>>Básicos</option>
                        <option value="Blusas" <?php if ($categoria == "Blusas") echo "selected='selected'"; ?>>Blusas</option>
                        <option value="Bluson" <?php if ($categoria == "Bluson") echo "selected='selected'"; ?>>Bluson</option>
                        <option value="Vestidos" <?php if ($categoria == "Vestidos") echo "selected='selected'"; ?>>Vestidos</option>
                        <option value="Conjuntos" <?php if ($categoria == "Conjuntos") echo "selected='selected'"; ?>>Conjuntos</option>
                        <option value="Novedades" <?php if ($categoria == "Novedades") echo "selected='selected'"; ?>>Novedades</option>
                        <option value="iTEMPORADA DE VERANO!" <?php if ($categoria == "iTEMPORADA DE VERANO!") echo "selected='selected'"; ?>>iTEMPORADA DE VERANO!</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><button class="btn btn-secondary" onclick='return confirmacionEditar()'>Confirmar</button></td>
            </table>
            </form>
    </div>
</div>
<script src="/js/confirmaciones_TEMPORAL.js"></script>
</body>
</html>