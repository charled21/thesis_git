<?php 

require_once('PHPMailer\vendor\phpmailer\phpmailer\src\PHPMailer.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = "motortrade.test@gmail.com";
$mail->Password = "6b7822be50893a39276e71e36ecaee22c27dd90f";
$mail->SetFrom('no-reply@motortrade.com.ph');
$mail->Subject = "00-00-2021 Examination";
$mail->Body = "You've passed the examination!";
$mail->AddAddress('craigtrecher@gmail.com');

$mail->Send();

?>