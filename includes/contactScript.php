<?php
if (isset($_POST['contactus'])) {
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $message = $_POST['txtMsg'];

    if (empty($name) || empty($email) || empty($message)) {
        header("Location : contact.php?msg=allrequired");
        exit();
    } else {
        $recipient = "ptubuddy@booknerd.in";
        $subject = "New contact from $name";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        mail($recipient, $subject, $email_content, $email_headers);
        header("Location : contact.php");
        exit();
    }
}
