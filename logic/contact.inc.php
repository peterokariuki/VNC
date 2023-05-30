<?php
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$msg = $_GET['message'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'victorrrayy@gmail.com';                     //SMTP username
    $mail->Password   = 'jgakdcrlmrerddlj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    $htmlContent = '
        <h2>Contact Request Submitted</h2></br>
        <p><b>Name: </b> ' . $fname . ' ' . $lname . '</p></br>
        <p><b>Email: </b> ' . $email . '</p></br>
        <p><b>Message: </b> ' . $msg . '</p></br>
    ';

    //Recipients
    $mail->setFrom('victorrrayy@gmail.com', 'VNC');
    $mail->addAddress('vvictorrayy@gmail.com', 'Victor');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message from VNC contact page';
    $mail->Body    = $htmlContent;

    $mail->send();
    echo json_encode(["msg" => "success"]);
} catch (Exception $e) {
    echo json_encode(["msg" => "error"]);
}