<?php

$id_promocion = $_POST['id_promocion'];
$nombre_promocion = $_POST['nombre_promocion'];
$descripcion = $_POST['descripcion'];
$descuento = $_POST['descuento'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];


// Obtener la fecha actual
$fechaActual = date('Y-m-d');


$conexion = mysqli_connect("localhost","root","","chicvenue");
$sql_crear = "UPDATE promocion SET nombre_promocion='$nombre_promocion', descripcion='$descripcion', descuento='$descuento', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final' WHERE id_promocion LIKE $id_promocion";
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