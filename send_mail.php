<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "arellanokurt848@gmail.com";
    $subject = "New Appointment Request";

    // Sanitize input to avoid XSS and malicious code
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare email body
    $body = "You have received a new appointment request.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h2>Thank you! Your appointment request has been sent.</h2>";
    } else {
        echo "<h2>Sorry, something went wrong. Please try again later.</h2>";
    }
} else {
    header("Location: appointments.html");
    exit;
}
?>
