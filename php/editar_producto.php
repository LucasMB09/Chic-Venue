<?php

$id_articulo = $_POST['id_articulo'];
$nombre_articulo = $_POST['nombre_articulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
// Obtener la fecha actual
$fechaActual = date('Y-m-d');


$conexion = mysqli_connect("localhost","root","","chicvenue");
$sql_crear = "UPDATE articulo SET nombre_articulo='$nombre_articulo', descripcion='$descripcion', precio='$precio', categoria='$categoria', imagen='$imagen', fecha='$fechaActual' WHERE id_articulo LIKE $id_articulo";
$rta = mysqli_query($conexion,$sql_crear);
if (!$rta){
    echo "Error al insertar"; //MENSAJE DE ERROR AL CREAR UN NUEVO PRODUCTO
}
else
    echo"<script>
    alert('Producto editado exitosamente');
    window.location.href='../CRUD.php';
    </script>"





?>