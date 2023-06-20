<?php
    session_start();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $eliminar = $_SESSION['id'];

    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

    $query = "UPDATE cliente SET nombre = '$nombre' WHERE id_cliente = $eliminar";
    $resultado= mysqli_query($conexion,$query);
    $query = "UPDATE cliente SET apellido = '$apellido' WHERE id_cliente = $eliminar";
    $resultado= mysqli_query($conexion,$query);

    if($resultado){
        $_SESSION['user'] = $nombre;
        $_SESSION['eliminado'] = "Cambio";
    }

    header('Location: ../perfil_usuario.php');
        

?>