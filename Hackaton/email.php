 <?php
 
$sender = 'From: ralezemoshake@gmail.com';
$recipient = 'ralezemoshake@gmail.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}

?>