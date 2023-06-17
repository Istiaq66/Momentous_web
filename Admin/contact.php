<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$message_sent = false;
if (isset($_POST['email']) && $_POST['email'] != '') {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {  //submit the form




        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        // $username = "Stamasoft Technologies";
        // $useremail = "noreply@stamasoft.com";
        // $subject = "Success!";
        // $message = "Congratulations Your Aplication for Scholarship has been submitted. We will Contact you soon";

        $body = "";
        $body .= "From: " . $username . "\r\n";
        $body .= "Email: " . $useremail . "\r\n";
        $body .= "Message: " . $message . "\r\n";



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
            $mail->setFrom($useremail, $username);
            $mail->addAddress('slayerboby5@gmail.com', 'Contact Form');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;


            $mail->send();
        } catch (Exception $e) {
            //  $message_sent = false;
        }
        $message_sent = true;
    } else {
        $invalied_class_name = "form invalied";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
</head>

<body>

    <?php
    if ($message_sent) :
    ?>

        <h3> Thanks, We will be in touch </h3>

    <?php
    else :
    ?>



        <div class="container">
            <form action="" method="POST" class="form">
                <h1 style="color: cadetblue;">Contact Form</h1>
                <div class="form-group">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Karim" tabindex="1" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" <?= $invalied_class_name ?? "" ?> class="form-control" id="email" name="email" placeholder="Karim@gmail.com" tabindex="2" required>
                </div>
                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" tabindex="3" required>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn">Send Message!</button>
                </div>
            </form>
        </div>

    <?php
    endif;
    ?>

</body>


</html>