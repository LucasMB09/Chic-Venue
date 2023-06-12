<?php
    session_start();
    require 'PHPMailer/src/Exception.php';
    include("PHPMailer/class.phpmailer.php");
    include("PHPMailer/class.smtp.php");


    
    $email = $_POST['email'];
    $_SESSION['correo'] = $email;
    // Función para enviar correo de confirmación
    $mail = new PHPMailer(true);

    try {
        //  esto depende de como este su puerto ok por eso puede o no llegar a dar error si no cambian su puerto
        // igual les mando el video de donde lo hice y como modificar para que les jale
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Especifica tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = "cchicvenue@gmail.com"; // Especifica tu dirección de correo electrónico
        $mail->Password = "fmobmxhuobktfvky"; // Especifica tu contraseña
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        

        $mail->setFrom($mail->Username, 'ChicVenue');
        $mail->addAddress($email); // Agrega la dirección de correo electrónico del destinatario

        // Aqui solo seria darle estilo al correo de confirmación ok
        $mail->IsHTML(true);
        $codigo_confirmacion = rand(10000, 99999);
        $mail->Subject = 'Confirmación de cuenta';
        $mail->Body = 'Para recuperar tu cuenta ingresa el siguiente codigo: ' .
            '<h3>' . $codigo_confirmacion . '</h3><br><br>'.
            'Sino has sido tu, ignora este correo y cambia tu contraseña';

        $mail->send();
    } 
    catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}\n";
    }
    finally{
        $_SESSION['codigo'] = $codigo_confirmacion;
        // echo $email, " ", $codigo_confirmacion;
        header("Location: cod_contra.php");
    }

?>