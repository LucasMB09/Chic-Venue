<?php
    session_start();

    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

    $contra = $_POST['contra1'];

    $query = "UPDATE cliente SET activado = '1' WHERE correo_electronico = '$email'";

?>