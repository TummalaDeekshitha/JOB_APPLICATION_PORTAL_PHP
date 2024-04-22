<?php
// namespace app\helpers;
 
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailHelper
{
    public static function sendMail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();
            $mail->Host ='smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = Yii::app()->params["email"]; // SMTP username
            $mail->Password = Yii::app()->params["password"] ; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;
            $mail->setFrom(Yii::app()->params["email"]);
            
            $mail->addAddress($to);
            // $mail->addAttachments('/path')
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
 
            $mail->send();
           return true;
        } catch (Exception $e) {
           return false;
        }
    }
}