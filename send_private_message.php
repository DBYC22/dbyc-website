<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['private_message'];
    $email = $_POST['email'];

    $mail = new PHPMailer(true);
    try {
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dreambuildersyouthcollective@gmail.com'; 
        $mail->Password   = 'dctb jxeo acxg myuu';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
        $mail->Port       = 587;

        $mail->setFrom('your-email@gmail.com', 'DBYC');
        $mail->addAddress('dreambuildersyouthcollective@gmail.com', 'DBYC');  

        $mail->isHTML(true);
        $mail->Subject = 'New Private Message';
        $mail->Body    = "Message: " . nl2br($message) . "<br>From: " . ($email ? $email : "Anonymous");

        $mail->send();
        echo "Your message has been sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send your message. Error: {$mail->ErrorInfo}";
    }
}
?>
