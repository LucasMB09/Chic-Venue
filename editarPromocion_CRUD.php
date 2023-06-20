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
    $id_promocion = $_GET['id_promocion'];
    $nombre_promocion = $_GET['nombre_promocion'];
    $descripcion = $_GET['descripcion'];
    $descuento = $_GET['descuento'];
    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_final = $_GET['fecha_final'];
?>
<br>
<div class="container">
    <div class="row justify-content-center align-items-center minh-100">
        <h2>Editar promocion</h2>
            <form id="create-promotion-form" action="/php/editar_promocion.php" method="post">
            <table class="table table-responsive">
                <tr>
                    <td></td>
                    <td><input type="text" value="<?=$id_promocion?>" name="id_promocion" id="" style="visibility:hidden"></td>
                </tr>
                <tr>
                    <td>Nombre articulo:</td>
                    <td><input type="text" value="<?=$nombre_promocion?>" name="nombre_promocion" id=""></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><input type="text" value="<?=$descripcion?>" name="descripcion" id=""></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" value="<?=$descuento?>" name="descuento" id=""></td>
                </tr>
                <tr>
                    <td>Imagen:</td>
                    <td><input type="text" value="<?=$fecha_inicio?>" name="fecha_inicio" id=""></td>
                </tr>
                <!--AÑADIDO-->
                <tr>
                    <td>Color:</td>
                    <td><input type="text" value="<?=$fecha_final?>" name="fecha_final" id=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><button class="btn btn-secondary" onclick='return confirmacionEditar()'>Confirmar</button></td>
                </tr>
            </table>
            </form>
    </div>
</div>
<script src="/js/confirmaciones_TEMPORAL.js"></script>
</body>
</html>