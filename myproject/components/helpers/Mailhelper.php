<?php
namespace app\helpers;

use CComponent;
use Yii;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailhelper extends CComponent
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
            $mail->Username = '20311a1206@sreenidhi.edu.in'; // SMTP username
            $mail->Password = '20311A1206'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;
            $mail->setFrom("20311A1206@sreenidhi.edu.in");
            // $mail->Username = '20311a1206@sreenidhi.edu.in'; // SMTP username
            // $mail->Password = '20311A1206'; // SMTP password
            // $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            // $mail->Port = 587;
            // $mail->setFrom("20311A1206@sreenidhi.edu.in");
            $mail->addAddress($to);
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