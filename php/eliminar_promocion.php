<?php

$id_promocion = $_GET['id_promocion'];

$conexion = mysqli_connect("localhost","root","","chicvenue");
$sql_eliminar = "DELETE FROM promocion where id_promocion like $id_promocion";
$rta = mysqli_query($conexion,$sql_eliminar);
if (!$rta){
    echo 'alert("Error al eliminar")'; //MENSAJE DE ERROR AL ELIMINAR UN NUEVO PROMOCION
}
else
    echo"<script>
    alert('Promocion eliminado exitosamente');
    window.location.href='../CRUD.php';
    </script>"

?>