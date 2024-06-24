<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collecting data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // email detail
    $to = "thderonne@gmail.com";
    $subject = "Un nouveau message du Portfolio";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html\r\n";

    // email content
    $email_content = "
    <html>
    <head>
        <title>Contact Message</title>
    </head>
    <body>
        <h2>New Contact Message</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong> {$message}</p>
    </body>
    </html>";

    // Sending email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>