
<?php
    session_start();
    
    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

    if(isset($_POST['id'])){
    $eliminar = $_POST['id'];
    echo $eliminar;
    $query = "DELETE FROM cliente WHERE id_cliente = '$eliminar'";
    mysqli_query($conexion,$query);
    }
    else{
        echo "NO MAMEEEEN";
    }

?>


