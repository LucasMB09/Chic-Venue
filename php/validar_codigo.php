<?php
    session_start();
    $conexion = mysqli_connect("localhost:3307", "root", "", "chicvenue");

    if(isset($_SESSION['codigo'])){
        $codigopag = $_SESSION['codigo'];
    }


    $codigousu = $_POST['cod'];
    if($codigopag == $codigousu){
        $_SESSION['mensaje']  = "¡Te has registrado correctamente!";
        $email = $_SESSION['email'];
        
        $query = "UPDATE cliente SET activado = '1' WHERE correo_electronico = '$email'";
        
        $resul = mysqli_query($conexion,$query);
        echo $resul;
        if($resul){
            unset($_SESSION['user']);
            unset($_SESSION['email']);
            header("Location: ../activacion.php");
        }
        else{
            $_SESSION['mensaje']  = "Ha habido un problema";
            header("Location: cod_correo.php");
        }
    }
    else{
        $_SESSION['mensaje'] = "Los códigos no coinciden";
        
        header("Location: cod_correo.php");
    }
    

?>