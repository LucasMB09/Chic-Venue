<?php

$nombre_promocion = $_POST['nombre_promocion'];
$descripcion = $_POST['descripcion'];
$descuento = $_POST['descuento'];
// Obtener fecha del formulario
$fecha_inicio = $_POST['fecha_inicio'];

$fecha_final = $_POST['fecha_final'];


$conexion = mysqli_connect("localhost","root","","chicvenue");
$sql_crear = "INSERT INTO promocion VALUES ('NULL', '$nombre_promocion', '$descripcion', '$descuento', '$fecha_inicio', '$fecha_final')";
$rta = mysqli_query($conexion,$sql_crear);
if (!$rta){
    echo "Error al insertar"; //MENSAJE DE ERROR AL CREAR UN NUEVO PRODUCTO
}
else
    echo"<script>
    alert('Promocion añadido exitosamente');
    window.location.href='../CRUD.php';
    </script>"

?>