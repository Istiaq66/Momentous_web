<?php
include './conn.php';
$query = "select * from admin where name = 'admin' ";

$query_run = mysqli_query($con, $query);
$count = mysqli_num_rows($query_run);

while ($row = mysqli_fetch_assoc($query_run)) {
    $_SESSION['email'] = $row['email'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$username = "Momentous CLick";
$useremail = $_SESSION['email'];
$subject = "Password recovery";
$message = "Password = 123456";



$body = "";
$body .= "From: " . $username . "\r\n";
$body .=  $message . "\r\n";



require("PHPMailer/Exception.php");
require("PHPMailer/PHPMailer.php");
require("PHPMailer/SMTP.php");




//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'slayerboby5@gmail.com';                     //SMTP username
    $mail->Password   = 'ty3YTMWfa;XM';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('slayerboby5@gmail.com', $username);
    $mail->addAddress($useremail, 'Contact Form');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;


    $mail->send();
} catch (Exception $e) {
    //  $message_sent = false;
}

echo '<script type="text/javascript">';
echo 'alert("Check your email....");';
echo 'window.location.href = "index.php";';
echo '</script>';
