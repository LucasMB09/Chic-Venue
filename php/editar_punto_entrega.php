<?php
session_start();

$nom_punto = $_POST['nombre_punto'];
$nom_desti = $_POST['nombre_destinatario'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['codigo_postal'];
$info_adi = $_POST['informacion_adicional'];
$telefono = $_POST['telefono'];
$correo = $_POST['email'];

$nom_pun = $_SESSION['nom_pun'];
$email = $_SESSION['email'];

$conexion = mysqli_connect("localhost","root","","chicvenue");

$query_noCliente = "SELECT id_cliente FROM cliente where correo_electronico = '$email'";
$resultado = mysqli_query($conexion,$query_noCliente);
if($resultado){
    $num = mysqli_fetch_array($resultado);
    $num_cliente = $num[0];
}

$query = "UPDATE direccion SET 
        nom_punto = '$nom_punto',
        nom_desti = '$nom_desti',
        calle = '$calle',
        numero = '$numero',
        colonia = '$colonia',
        ciudad = '$ciudad',
        estado = '$estado',
        cp = '$cp',
        info_adi = '$info_adi',
        telefono = '$telefono',
        correo = '$correo'
        WHERE id_cliente = '$num_cliente' AND nom_punto = '$nom_pun' ";
        

$result = mysqli_query($conexion,$query);

header("Location: ../perfil_usuario.php");
$_SESSION['eliminado'] = "Dir modifi"; 
return;

?>