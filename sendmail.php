<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "collectivenfg@gmail.com"; // Skift til din e-mail
    $subject = "New message from andysworld.com";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please complete the form correctly.";
        exit;
    }

    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $name <$email>";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
