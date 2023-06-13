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
$sql_editar = "UPDATE articulo SET nombre_articulo='$nombre_articulo', descripcion='$descripcion', precio='$precio', categoria='$categoria', imagen='$imagen' WHERE id_articulo like $id_articulo";
$rta = mysqli_query($conexion,$sql_editar);
if (!$rta){
    echo "Error al insertar"; //MENSAJE DE ERROR AL CREAR UN NUEVO PRODUCTO
}
else
    echo"<script>
    alert('Producto editado exitosamente');
    window.location.href='../CRUD.php';
    </script>"





?>