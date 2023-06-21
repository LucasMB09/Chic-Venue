<?php

$nombre_articulo = $_POST['nombre_articulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
//AÑADIDO
$color = $_POST['color'];
$talla = $_POST['talla'];
$stock = $_POST['stock'];
$descuento = $_POST['descuento'];
// Obtener la fecha actual
$fechaActual = date('Y-m-d');

$conexion = mysqli_connect("localhost","root","","chicvenue");
$sql_crear = "INSERT INTO articulo VALUES ('NULL', '1', '$precio', '$nombre_articulo', '$descripcion', '$fechaActual', '$color', '$talla', '$stock', '$descuento', '$categoria', '$imagen')";
$rta = mysqli_query($conexion,$sql_crear);
if (!$rta){
    echo "Error al insertar"; //MENSAJE DE ERROR AL CREAR UN NUEVO PRODUCTO
}
else
    echo"<script>
    alert('Producto añadido exitosamente');
    window.location.href='../CRUD.php';
    </script>"

?>