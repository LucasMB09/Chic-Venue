<?php
     session_start();

     $email = trim($_POST["iemail"]);
     $pass = trim($_POST["ipass"]);
     $recuerda = $_POST["recuerda"];

     $mail = " ";
     $pas = " ";
     $conmail = 0;
     $con = 0;
     // Conexión a la base de datos
     $conexion = mysqli_connect("localhost", "root", "", "chicvenue");

     if($email == "root@root.com" && $pass == "Contr@s3creta"){
          header("Location: ../login_admin.php");
          return;
     }
     
     // Consulta SQL para obtener los valores de una columna
     $query = "SELECT correo_electronico FROM cliente";
     
     // Ejecutar consulta
     $resultado = mysqli_query($conexion, $query);

     // Verificar si la consulta fue exitosa
     if ($resultado) {
          // Obtener los valores de la columna
          while ($fila = mysqli_fetch_assoc($resultado)) {
               $valor = $fila['correo_electronico'];
               // Hacer algo con el valor obtenido
               //echo $valor."<br>";
               if($valor == $email){
                    $mail = $email;
                    $conmail = 1;
                    $query2 = "SELECT contraseña FROM cliente WHERE correo_electronico = '$valor'";
                    $resultado2 = mysqli_query($conexion, $query2);
                    /*while($fila2 = mysqli_fetch_assoc($resultado2)){
                         $valor2 = $fila2["contraseña"];*/
                    $query3 = "SELECT activado FROM cliente WHERE correo_electronico = '$valor'";
                    $resul = mysqli_query($conexion,$query3);

                    if($resul){
                         $activado = mysqli_fetch_array($resul);
                         $activado = $activado[0];
                    }

                    $fila2 = mysqli_fetch_array($resultado2);
                    $valor2 = $fila2[0];
                    //echo $valor2."<br>";
                    if($valor2 == $pass){
                         $pas = $pass;
                         $con = 1;
                         //break;
                    }
                    else{
                         $pas = "Incorrecta";
                         $con = 0;
                    }
                    //}

                    if($con == 1 or $conmail == 1){
                         break;
                    }
               }
               else{
                    $mail = "No hay";
                    $pas = "Unknown";
               }
          }
     } else {
          // Manejar el caso de consulta fallida
          echo "Error en la consulta: " . mysqli_error($conexion);
     }
     if($mail != "No hay" ){
     if($activado == 1){
               if($pas != "Incorrecta"){
                    /*echo "La cuenta existe"."<br>";
                    echo "Correo: $mail"."<br>";
                    echo "Contraseña: $pas"."<br>";*/
                    $_SESSION['mensaje']  = "Inicio de sesión exitoso";
                    $_SESSION['email'] = $mail;
                    $_SESSION['recuerda'] = $recuerda;
                    $querynombre = "SELECT nombre FROM cliente WHERE correo_electronico = '$valor'";
                    $resulnombre = mysqli_query($conexion, $querynombre);
     
                    if($resulnombre){
                         $fila3 = mysqli_fetch_array($resulnombre);
                         $valnom = $fila3[0];
                         $_SESSION['user'] = $valnom;
                         $_SESSION['valor']= 1;
                    }
                    else{
                         return;
                    }
                    
     
                    
                    header("Location: ../index.php");
                    // Liberar recursos y cerrar conexión
                    mysqli_free_result($resultado);
                    mysqli_close($conexion);
                    return;
               }
               else{
                    //echo "La contraseña no es correcta"."<br>";
                    $_SESSION['mensaje']  = "La contraseña es incorrecta";
                    header("Location: ../login_usuario.php");
                    // Liberar recursos y cerrar conexión
                    mysqli_free_result($resultado);
                    mysqli_close($conexion);
                    return;
               }
          }
          else{
               $_SESSION['mensaje']  = "No se ha activado la cuenta";
               $_SESSION['activado'] = $activado;
               header("Location: ../login_usuario.php");
               return;
          }
         

     }
     elseif($mail == "No hay"){
         //echo "No existe ninguna cuenta asociada a ese correo"."<br>";
         $_SESSION['mensaje']  = "No existe ninguna cuenta asociada a ese correo";
         header("Location: ../login_usuario.php");
         // Liberar recursos y cerrar conexión
         mysqli_free_result($resultado);
         mysqli_close($conexion);
         return;
     }
     else{
          $_SESSION['mensaje']  = "Hubo un error";
          header("Location: ../login_usuario.php");
          return;
     }

     

?>
