<?php

    // Get the form fields, removes html tags and whitespace.
    $first_name = strip_tags(trim($_POST["first-name"]));
    $first_name = str_replace(array("\r","\n"),array(" "," "),$first_name);
    $last_name = strip_tags(trim($_POST["last-name"]));
    $last_name = str_replace(array("\r","\n"),array(" "," "),$last_name);
    $subject = strip_tags(trim($_POST["subject"]));
    $subject = str_replace(array("\r","\n"),array(" "," "),$subject);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check the data.
    if (empty($first_name) OR empty($last_name) OR empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.farzanhaq.com/index.php?success=-1#form");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "farzan.haq@mail.utoronto.ca";

    // Set the email subject.
    $title = "New contact from $first_name $last_name";

    // Build the email content.
    $email_content = "First Name: $first_name\n";
    $email_content .= "Last Name: $last_name\n\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $first_name $last_name <$email>";

    // Send the email.
    mail($recipient, $title, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: http://www.farzanhaq.com/index.php?success=1#form");

?>