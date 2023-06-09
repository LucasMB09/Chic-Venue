<?php
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    include("con_db.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Función para enviar correo de confirmación
    function enviarCorreoConfirmacion($email, $codigo_confirmacion)
    {
        $mail = new PHPMailer(true);

        try {
            //  esto depende de como este su puerto ok por eso puede o no llegar a dar error si no cambian su puerto
            // igual les mando el video de donde lo hice y como modificar para que les jale
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Especifica tu servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'cchicvenue@gmail.com'; // Especifica tu dirección de correo electrónico
            $mail->Password = 'fmobmxhuobktfvky'; // Especifica tu contraseña
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('cchicvenue@gmail.com', 'Nombre remitente');
            $mail->addAddress($email); // Agrega la dirección de correo electrónico del destinatario

            $mail->isHTML(true);
            // Aqui solo seria darle estilo al correo de confirmación ok
            $mail->Subject = 'Confirmación de cuenta';
            $mail->Body = '¡Gracias por registrarte en nuestro sitio! Haz clic en el siguiente enlace para confirmar tu cuenta: ' .
                '<a href="http://localhost/chic-venue/log-in.php#' . $codigo_confirmacion . '">Confirmar cuenta</a>';

            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

?>