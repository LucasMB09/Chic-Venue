<?php

$id_articulo = $_GET['id_articulo'];

$conexion = mysqli_connect("localhost","root","","chicvenue");
$sql_eliminar = "DELETE FROM articulo where id_articulo like $id_articulo";
$rta = mysqli_query($conexion,$sql_eliminar);
if (!$rta){
    echo "Error al eliminar"; //MENSAJE DE ERROR AL ELIMINAR UN NUEVO PRODUCTO
}
else
    echo"<script>
    alert('Producto eliminado exitosamente');
    window.location.href='../CRUD.php';
    </script>"

?>