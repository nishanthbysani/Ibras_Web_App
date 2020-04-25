<?php
$to      = 'testuser@ibras.com';
$subject = 'Thank you for registering with Ibras';
$message = 'Hello. This is to confirm that we have successfully created your account.';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
try{
    echo mail($to, $subject, $message, $headers);
}
catch(Exception $e)
{
    echo $e." :Error Message";
}
