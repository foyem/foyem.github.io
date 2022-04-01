<?php

require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge


 $name = $_POST['name']; // form field
 $email = $_POST['email']; // form field
 $message = $_POST['message']; // form field
 $phone = $_POST['phone']; // form field
 $state = $_POST['state']; // form field
 
 if ($_POST['submit']){


 $from = "foyemgit@foyem.com"; //enter your email address
 $to = "anifowose.adeyemi@gmail.com"; //enter the email address of the contact your sending to
 $subject = "You have received a new message from your website contact form"; // subject of your email

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);

$text = ''; // text versions of email.
$html = "<html><body>Name: $name <br> Email: $email <br>Message: $message <br>Phone: $phone <br>State: $state <br></body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
$mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "https://foyem.com/"; // all scripts must use localhost
 $username = "foyemgit@foyem.com"; //  your email address (same as webmail username)
 $password = "uIDdpvrG#OJh"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo("<p>Message successfully sent!</p>");
// header("Location: http://www.example.com/");
}
  }

 ?>
 
 