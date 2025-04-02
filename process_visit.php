<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "srishtigauraha47@gmail.com";
    $subject = "New Visit Schedule Request";
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $preferred_date = $_POST['preferred_date'];
    $preferred_time = $_POST['preferred_time'];
    
    $message = "New visit schedule request details:\n\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Phone: " . $phone . "\n";
    $message .= "Preferred Date: " . $preferred_date . "\n";
    $message .= "Preferred Time: " . $preferred_time . "\n";
    
    $headers = "From: " . $email;
    
    if(mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Thank you for scheduling a visit. We will contact you soon.');
        window.location.href='donate.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error. Please try again.');
        window.location.href='donate.html';</script>";
    }
}
?>
