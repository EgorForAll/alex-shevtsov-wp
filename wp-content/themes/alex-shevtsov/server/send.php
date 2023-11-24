<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';

$body = '<h1>Этот клиент отправил заявку с сайта:</h1>';

if (trim(!empty($_POST['name']))) {
    $body .= '<p><strong>Вам отправил зяавку: </strong>' . $_POST['name'] . '</p>';
}

if (trim(!empty($_POST['telephone']))) {
    $body .= '<p><strong>Позвоните по телефону: </strong>' . $_POST['telephone'] . '</p>';
}


$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->isHTML(true);
$mail->Host = 'smtp.mail.ru';                                                                                              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->XMailer = ' ';
$mail->Username = 'top-7.test@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'hxurduGtwVM439txbwBh'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('top-7.test@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('eia.web.ss@gmail.com', 'Admin');
$mail->addAddress('eia.web22@gmail.com', 'Director');

$mail->Subject = 'Заявка с сайта ALEX.SHEVTSOV';
$mail->Body = $body;
$mail->AltBody = '';

if (!$mail->send()) {
    echo 'Error';
} else {
    echo 'Success';
}
