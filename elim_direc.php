<?php
session_start();

$nom_punto = $_POST['nom_punto'];

$aidi = $_POST['id_cliente'];

$conexion = mysqli_connect("localhost","root","","chicvenue");

$query = "DELETE FROM direccion WHERE id_cliente = '$aidi' AND nom_punto = '$nom_punto' ";
        
$result = mysqli_query($conexion,$query);

header("Location: ../perfil_usuario.php");
$_SESSION['eliminado'] = "Dir elim"; 
return;

?>