<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");
    $id_articulo = $_POST['id_art'];
    $email = $_POST['id_cliente'];

    $quer = "SELECT id_cliente FROM cliente WHERE correo_electronico = '$email'";

    $resul = mysqli_query($conexion,$quer);
    if($resul){
        $aidi = mysqli_fetch_array($resul);
        $id_cliente = $aidi[0];
    }

    $uwu = "SELECT id_articulo FROM favoritos WHERE id_cliente = $id_cliente";
    $res = mysqli_query($conexion,$uwu);

    if($res){
        $ide = mysqli_fetch_all($res);
        for ($i=0; $i < count($ide); $i++) {
            if($ide[$i][0] == $id_articulo ){
                $query = "DELETE FROM favoritos WHERE id_cliente = $id_cliente AND id_articulo = $id_articulo";
                $result = mysqli_query($conexion,$query);
                if($result){
                    $_SESSION['mensa'] = "Se ha borrado";
                    header("Location: ../favoritos.php");
                    mysqli_close($conexion);
                    return;
                }
            }
            else {
                $_SESSION['mensa'] = "Ha habido un problema";
            }
        }
    }
?>