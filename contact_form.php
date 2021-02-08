<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'zay.betak@gmail.com';                     // SMTP username
    $mail->Password   = '01100882686';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('zay.betak@gmail.com', 'ahmed');

    $mail->addAddress('ahmedabubakr148@gmail.com');     // Add a recipient

    // $body = '<h1> hello from html</h1>';
    $subj = $_POST['subject'];
    $body = '<h1>' . $_POST['name']. ' wanted to contact us </h1><a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . ' </a> <span> is his email</span> <div style="font-famil="comic sans ms""> and he write : <br/>' . $_POST['message'] . '</div>' ;
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    $mail->Subject = $subj ;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
    header('location:sent.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}