<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;   
$body = file_get_contents('email.html');
$username = "noreply@localhost";
$password = "1";
$from = "noreply@mail.local";
$fromName = "No Reply";
$mail->SMTPAuth   = true;  

$to = "user@mail.local";
$toName = "User";
$host = "localhost";
$subject = "Test Email";

$mail->IsSMTP();                    // send via SMTP
$mail->Host     = $host; 
$mail->SMTPAuth = true;             // turn on SMTP authentication
$mail->Username = $username;  
$mail->Password = $password; 

$mail->From     = $from;
$mail->FromName = $fromName;

$mail->CharSet = "UTF-8";

$mail->AddAddress($to , $toName);


$mail->IsHTML(true);  
$mail->Subject  =  $subject;
$mail->Body     =  $body;

if(!$mail->Send())
{
   echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
   echo "Message has been sent";
}