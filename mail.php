<?php

/* get variables from form */
$name = filter_var($_POST['contact-name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['contact-email'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['contact-message'], FILTER_SANITIZE_STRING);

// load PHPMailer classes (manual)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'src/Exception.php';

/* The main PHPMailer class. */
require 'src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'chimail.midphase.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'post@sgallant.us';                 // SMTP username
    $mail->Password = '49T3>8fiT%';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('post@sgallant.us', 'Portfolio Contact Form');
    $mail->addAddress('sjgallant@hotmail.com');     // Add a recipient Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Portfolio contact form message from ' . $name;
    $mail->Body    = nl2br('Name: ' . $name . "\r\nEmail: " . $email . "\r\nMessage: " . $message);
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    header("location: ../index.html#contact?sentOK");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



?>
