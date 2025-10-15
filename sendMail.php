<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mthimunyemduduzi404@gmail.com';
    $mail->Password   = 'tkpg zqqw wmxm hdgj';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('mthimunyemduduzi404@gmail.com', 'JNS');
    $mail->addAddress('jnsalphagroup.tech@gmail.com', 'JNS');
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Message';
    $mail->Body    = "<strong>Name:</strong> {$_POST['name']}<br>
                      <strong>Email:</strong> {$_POST['email']}<br>
                      <strong>Message:</strong><br>" . nl2br($_POST['message']);
    $mail->AltBody = "Name: {$_POST['name']}\nEmail: {$_POST['email']}\nMessage:\n{$_POST['message']}";

    $mail->send();

    // Redirect to status page on success
    header('Location: status.php?type=success&message=' . urlencode('Your message has been sent successfully!'));
    exit;

} catch (Exception $e) {
    // Redirect to status page on failure
    $errorMessage = $mail->ErrorInfo ?: 'Unknown error';
    header('Location: status.php?type=error&message=' . urlencode("Failed to send message. Error: $errorMessage"));
    exit;
}
