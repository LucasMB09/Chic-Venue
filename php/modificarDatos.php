<?php
    session_start();
    
    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");
        $eliminar = $_SESSION['id'];

        $query = "DELETE FROM cliente WHERE id_cliente = $eliminar";
        $resultado= mysqli_query($conexion,$query);

        header('Location: ../log-in.php');
        

?>


