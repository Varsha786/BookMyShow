<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$comments = $_REQUEST['comments'];
$subject = $_REQUEST['subject'];

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('Asia/Kolkata');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

/*$body             = file_get_contents('contents.html');
$body             = preg_replace('/[\]/','',$body);*/

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port = 465;                   // set the SMTP port for the GMAIL server
$mail->Username = "tania.vmmteachers23@gmail.com";  // GMAIL username
$mail->Password = "Teachers@123";            // GMAIL password

$mail->SetFrom('tania.vmmteachers23@gmail.com', 'VMM Education');

$mail->AddReplyTo("tania.vmmteachers23@gmail.com", "VMM Education");

$mail->Subject = $subject;

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$body = "A New Enquiry Name: " . $name . "<br>Email: ".$email."<br>Phone: " . $phone . "<br>Message: " . $comments;
$mail->MsgHTML($body);

$address = "sinugahlot@gmail.com";
$mail->AddAddress($address, "John Doe");

/*$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); */// attachment

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

