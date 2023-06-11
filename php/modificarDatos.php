<?php
    session_start();
    
    $conexion = mysqli_connect("localhost:3307", "root", "", "chicvenue");
 


        $eliminar = $_GET['id'];

        $query = "DELETE FROM cliente WHERE id_cliente = $eliminar";
        $resultado= mysqli_query($conexion,$query);

        header('Location: ../log-in.php');
        

    


?>


