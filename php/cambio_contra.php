<?php
    session_start();

    $conexion = mysqli_connect("localhost:3307", "root", "", "chicvenue");

    $contra = $_POST['contra1'];
    $correo = $_SESSION['correo'];

    $query = "UPDATE cliente SET contraseña = '$contra' WHERE correo_electronico = '$correo'";
    $resul = mysqli_query($conexion,$query);

    if($resul){
        unset($_SESSION['user']);
        unset($_SESSION['email']);
        $_SESSION['mensaje'] = "Contraseña cambiada";
        header("Location: ../index.php");
    }
    else{
        $_SESSION['mensaje']  = "Ha habido un problema";
        header("Location: ../contraseña_dos.php");
    }
?>