<?php
    include("con_db.php");

    if(isset($_POST['registro'])){
        if(strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contrasena']) >= 1 ){
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $email = trim($_POST['email']);
            $contrasena = trim($_POST['contrasena']);
            $consulta = "INSERT INTO usuario(nombre,apellido,correo_electronico,contraseña) VALUES ('$nombre','$apellido','$email','$contrasena')";
            $resultado = mysqli_query($conex,$consulta);
            if($resultado){
                ?>
                <h3 class="ok">¡Te has registrado correctamente!</h3>
                <?php
            } else {
                ?>
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                <?php
            } 
        } else {
            ?>
            <h3 class="bad">¡Por favor completa los campos!</h3>
            <?php
        }
    }

?>