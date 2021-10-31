<?php 

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    echo "<script>console.log(\"inside isset -> sendEmail.php\");</script>";

    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $body=$_POST['body'];
    $email2=$_POST['email2'];

    echo "<script>console.log(\"data = $name + $email + $subject + $body + $email2\");</script>";

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    
    
//stmp settings
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "motortrade.test@gmail.com";
$mail->Password = "xylophone6749";
$mail->Port = '465';
$mail->SMTPSecure = 'ssl';

//email settings
$mail->isHTML(true);
$mail->SetFrom($email, $name);
$mail->Subject = ("$email ($subject)");
$mail->Body = $body;
$mail->AddAddress($email2);

// if($mail->send()){
//     $status = "success";
//     $response = "Email is sent!";
// }
// else{
//     $status = "failed";
//     $response = "Something went wrong.....";
// }

// exit(json_encode(array("status" => $status, "response" => $response)));


$mail->send();

echo "<script>console.log(\"after mail ->send()\");</script>";

}


?>