<?php
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$phoneNumber = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zip'];
$message = $_POST['text'];
$serviceType = $_POST['service'];
$address = $_POST['address'];

$outgoingMessage = "Hi, my name is " . $firstName . " " . $lastName . ". \r\n My phone number is " . $phoneNumber . ". \r\n My email address is " . $email . ". \r\n I live at " . $address . " in " . $city . ", " . $state . " " . $zipCode . ". \r\n I need help with a " . $serviceType . ". \r\n Also, I wanted to let you know: \r\n" . $message;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '/usr/share/php/libphp-phpmailer/src/Exception.php';
require_once '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';
require_once '/usr/share/php/libphp-phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = ''; // YOUR gmail email
    $mail->Password = ''; // YOUR gmail password
    //$mail->Password = ''; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('', 'Delaware Pool Service Mailer');
    $mail->addAddress('', 'whatever I want to write');
    // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "New business inquiry from " . $firstName . " " . $lastName . "!";
    $mail->Body = $outgoingMessage;
    $mail->AltBody = $outgoingMessage;

    $mail->send();
    // echo "Email message sent.";
    // header('Location: http://delawarepoolservice.com');
    header('Location: https://www.delawarepoolservice.com/thanks.html');
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

?>
