<?php
    session_start();
    
<<<<<<< HEAD
    $conexion = mysqli_connect("localhost:3307", "root", "", "chicvenue");
 


        $eliminar = $_GET['id'];

        $query = "DELETE FROM cliente WHERE id_cliente = $eliminar";
        $resultado= mysqli_query($conexion,$query);

        header('Location: ../log-in.php');
        

    
=======
    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");
>>>>>>> 4328405498f25e470aad3a169bfe18ca51bfb508


?>


