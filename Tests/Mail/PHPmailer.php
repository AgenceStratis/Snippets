<?php

// composer require phpmailer/phpmailer

require 'vendor/autoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;     // Enable verbose debug output

$mail->isSMTP();      // Set mailer to use SMTP
$mail->Host = 'localhost';      // Specify main and backup SMTP servers
$mail->Port = 25;     // TCP port to connect to

# $mail->SMTPAuth = true;     // Enable SMTP authentication
# $mail->Username = '';     // SMTP username
# $mail->Password = '';     // SMTP password
# $mail->SMTPSecure = 'tls';     // Enable TLS encryption, `ssl` also accepted

$mail->setFrom('FROM@EMAIL', 'Serveur de test');
$mail->addAddress('TO@EMAIL', 'NAME');     // Add a recipient
$mail->addBCC('TOBCC@EMAIL');

$mail->isHTML(true);     // Set email format to HTML

$mail->Subject = "Email test from server";
$mail->Body    = "Lorem ipsum";
$mail->AltBody = "Lorem ipsum";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo PHP_EOL;
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

echo PHP_EOL;
