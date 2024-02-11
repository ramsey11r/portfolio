<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address (replace with your own email address)
    $to = "ramzirihane0@gmail.com";

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Construct email message with form data
    $email_message = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
    ";

    // Send email
    $success = mail($to, $subject, $email_message, $headers);

    if ($success) {
        // If the email is sent successfully, send a success message
        echo "success";
    } else {
        // If there is an error in sending the email, send an error message
        echo "error";
    }
} else {
    // If the form is not submitted using POST method, redirect to the form page
    header("Location: ../your-form-page.html");
}
?>
