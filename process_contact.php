<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $to = "shreesurya.pushpa.foundation@gmail.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $emailBody = "
        <h3>New Contact Form Submission</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong><br>$message</p>
    ";
    
    if(mail($to, "Contact Form: $subject", $emailBody, $headers)) {
        echo json_encode(["status" => "success", "message" => "Thank you for contacting us!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to send message."]);
    }
}
?>
