<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</html>
<?php
    session_start();
    
    $conexion = mysqli_connect("localhost:3307", "root", "", "chicvenue");
    $mail = "";
    $conmail = 0;
    $activado = 0;

    
    $eliminar = $_POST['id'];
    echo $eliminar;
    $query = "DELETE FROM cliente WHERE id_cliente = $eliminar";
    mysqli_query($conexion,$query);


?>


