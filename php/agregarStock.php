<?php
    session_start();
    $id_cliente = $_SESSION['aidCliente'];
    $conexion = mysqli_connect("localhost","root","","chicvenue");
    $canti = $_POST['products']; 
    $_SESSION['total'] = $_POST['total'];
    for ($i=0; $i < $canti; $i++) { 
        $sto = 'stock-'.$i;
        $stock = $_POST[$sto];
        $aid = 'prod-'.$i;
        $id_art = $_POST[$aid];
       echo $query = "UPDATE carrito SET stock = '$stock' WHERE id_cliente = '$id_cliente' AND id_articulo = '$id_art' ";
        $result = mysqli_query($conexion,$query);
        if($result){
            header("Location: metodoP.php");
            return;
        }
    }


?>