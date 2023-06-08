<?php
    session_start();
    
    $conexion = mysqli_connect("localhost", "root", "", "chicvenue");
    $mail = "";
    $conmail = 0;



    if(isset($_POST['registro'])){
        if(strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contrasena']) >= 1 ){
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $email = trim($_POST['email']);
            $contrasena = trim($_POST['contrasena']);
            $query = "SELECT correo_electronico FROM cliente";
            $resul = mysqli_query($conexion,$query);
            if($resul){
                while ($fila = mysqli_fetch_assoc($resul)) {
                    $valor = $fila['correo_electronico'];
                    if($valor == $email ){
                        $mail = $email;
                        $conmail = 1;
                        break;
                    }
                    else{
                        $mail = "No hay";
                    }
                }
            }
            
            if($conmail == 1){
                /*?>
                <h3 class="bad">¡Este correo ya esta asociado a una cuenta!</h3>
                <?php*/
                $_SESSION['mensaje']  = "¡Este correo ya esta asociado a una cuenta!";
                header("Location: ../registro.php");
                return;
            }
            
            $consulta = "INSERT INTO cliente(nombre,apellido,correo_electronico,contraseña) VALUES ('$nombre','$apellido','$email','$contrasena')";
            $resultado = mysqli_query($conexion,$consulta);
            if($resultado){
                /*?>
                <h3 class="ok">¡Te has registrado correctamente!</h3>
                <?php*/
                $_SESSION['mensaje']  = "¡Te has registrado correctamente!";
                
                header("Location: ../log-in.php");
                //include "../registro.php";
            } else {
                /*?>
                <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                <?php*/
                $_SESSION['mensaje']  = "¡Ups ha ocurrido un error!";
                header("Location: ../registro.php");
                
            }
        } else {
            /*?>
            <h3 class="bad">¡Por favor completa los campos!</h3>
            <?php*/
        }
    }

?>