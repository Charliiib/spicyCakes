<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'charliiiiib@gmail.com';                     // SMTP username
    $mail->Password   = 'Creneb1993';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('charliiiiib@gmail.com', 'CharliB');
    $mail->addAddress('kaarliitoox26@gmail.com');     // Add a recipient




    // Content
    $mail->isHTML(true);    // Set email format to HTML   
    $mail->CharSet = 'UTF-8';                             
    $mail->Subject = $_POST['asunto'];
    $mail->Body    = '<b>Nombre: </b>'.$_POST['nombre'].
                        '<br><b>Apellido: </b>'.$_POST['apellido'].
                        '<br><b>Telefono: </b>'.$_POST['telefono'].
                        '<br><b>Email: </b>'.$_POST['email'].
                        '<br><b>Mensaje: </b>'.$_POST['mensaje'];


    $mail->send();
  echo "<script>
                alert('El correo se envio correctamente');
                document.location.href = 'home.php';   
          
        </script>";
 
   
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}