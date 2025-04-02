<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $to = "info@ShreesuryaPushpaFoundation.in";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $email_content = "Name: $name<br>";
    $email_content .= "Email: $email<br>";
    $email_content .= "Subject: $subject<br><br>";
    $email_content .= "Message:<br>$message";
    
    mail($to, "Contact Form: $subject", $email_content, $headers);
    
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
