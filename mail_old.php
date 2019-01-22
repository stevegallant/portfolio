<?php

    // put your desired email address inside the quotes
    $to = 'sjgallant@hotmail.com';
    $name = $_POST["contact-name"];
    $email= $_POST["contact-email"];
    $text= $_POST["contact-message"];

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">

        <tr><td>'.$name.'</td></tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>Message: '.$text.'</td></tr>

    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }

?>
