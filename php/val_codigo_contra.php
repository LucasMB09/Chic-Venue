<?php
    session_start();

    if(isset($_SESSION['codigo'])){
        $codigopag = $_SESSION['codigo'];
    }


    $codigousu = $_POST['cod'];
    if($codigopag == $codigousu){
        $_SESSION['mensaje']  = "codigo valido";
        $email = $_SESSION['email'];
        
        header("Location: ../contraseña_dos.php");
    }
    else{
        $_SESSION['mensaje'] = "Los códigos no coinciden";
        
        header("Location: cod_contra.php");
    }
    

?>