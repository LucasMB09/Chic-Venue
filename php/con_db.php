<<<<<<< HEAD
<?php
     session_start();

     $email = trim($_POST["iemail"]);
     $pass = trim($_POST["ipass"]);

     $mail = " ";
     $pas = " ";
     $conmail = 0;
     $con = 0;
     // Conexión a la base de datos
     $conexion = mysqli_connect("localhost", "root", "", "chic_venue");

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
          if($pas != "Incorrecta"){
               echo "La cuenta existe"."<br>";
               echo "Correo: $mail"."<br>";
               echo "Contraseña: $pas"."<br>";
          }
          else{
               echo "La contraseña no es correcta"."<br>";
          }
     }
     else{
          echo "No existe ninguna cuenta asociada a ese correo"."<br>";
     }

     // Liberar recursos y cerrar conexión
     mysqli_free_result($resultado);
     mysqli_close($conexion);
     

=======
<?php
     session_start();

     $email = trim($_POST["iemail"]);
     $pass = trim($_POST["ipass"]);

     $mail = " ";
     $pas = " ";
     $conmail = 0;
     $con = 0;
     // Conexión a la base de datos
     $conexion = mysqli_connect("localhost", "root", "", "chic_venue");

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
          if($pas != "Incorrecta"){
               echo "La cuenta existe"."<br>";
               echo "Correo: $mail"."<br>";
               echo "Contraseña: $pas"."<br>";
          }
          else{
               echo "La contraseña no es correcta"."<br>";
          }
     }
     else{
          echo "No existe ninguna cuenta asociada a ese correo"."<br>";
     }

     // Liberar recursos y cerrar conexión
     mysqli_free_result($resultado);
     mysqli_close($conexion);
     

>>>>>>> origin/main
?>