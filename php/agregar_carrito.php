<?php
    session_start();

    $id_arti = $_POST['id_art'];
    $email = $_POST['id_cliente'];

    // echo $email, "",$id_arti;
    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

    
    $quer = "SELECT id_cliente FROM cliente WHERE correo_electronico = '$email'";

    $resul = mysqli_query($conexion,$quer);
    if($resul){
        $aidi = mysqli_fetch_array($resul);
        $id_cliente = $aidi[0];
    }

    $uwu = "SELECT id_articulo FROM carrito WHERE id_cliente = '$id_cliente'";
    $res = mysqli_query($conexion,$uwu);

    if($res){
        $ide = mysqli_fetch_all($res);
        for ($i=0; $i < count($ide); $i++) {
            // echo $id_arti, "\n", $ide[$i][0];
            $id_base = $ide[$i][0];
            if($id_base == $id_arti ){
                header("Location: ../products.php");
                $_SESSION['base'] = "Ya carrito";
                echo $_SESSION['base'];
                mysqli_close($conexion);
                return;
            }
            else{
                echo "No esta";
            }
        }
    }
    else{
        echo "Hubo un error";
    }

    $query = "INSERT INTO carrito values ($id_cliente,$id_arti,'1')";

    $result = mysqli_query($conexion,$query);

    if($result){
        header("Location: ../products.php");
        // Liberar recursos y cerrar conexión
        $_SESSION['base'] = "Car";
        mysqli_free_result($resultado);         
        mysqli_close($conexion);
        return;
    }
?>