<?php
namespace App\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

class MailerController{
    public static function sendMail($email,$subject,$message){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username = "soufianboushaba12@gmail.com";
        $mail->Password = "fmgzrtgindjfpnit";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->setFrom('soufianboushaba12@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject= $subject;
        $mail->Body = $message;
        $mail->send();
    }
}
?>