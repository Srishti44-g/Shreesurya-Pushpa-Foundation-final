<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Requires Composer and PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@shreesurya.org'; // Replace with foundation email
        $mail->Password = 'your-password'; // Replace with email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('no-reply@shreesurya.org', 'Shreesurya Foundation');
        $mail->addAddress('srishtigauraha47@gmail.com'); // Foundation's receiving email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Volunteer Application';
        $mail->Body = buildEmailBody($_POST);

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Your application has been submitted successfully!']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
    }
}

function buildEmailBody($data) {
    return "
    <h2>New Volunteer Application</h2>
    <p><strong>Name:</strong> {$data['fullName']}</p>
    <p><strong>Email:</strong> {$data['email']}</p>
    <p><strong>Phone:</strong> {$data['phone']}</p>
    <p><strong>Age:</strong> {$data['age']}</p>
    <p><strong>Interests:</strong> " . implode(', ', $data['interests']) . "</p>
    <p><strong>Availability:</strong> {$data['availability']}</p>
    <p><strong>Message:</strong> {$data['message']}</p>
    ";
}
?>
