<?php
session_start();

error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/PHPMailer.php';

$email = $_POST['email'];

// Generate 4-digit OTP

// $otp = $_POST['otp'];
$otp = (string) rand(1000, 9999);

// Store OTP in session
$_SESSION['otp'] = $otp;

// Send OTP via PHPMailer
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->isHTML(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'brahman4028@gmail.com';                     //SMTP username
    $mail->Password   = 'ibeqkrrdrqoiiajq';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('brahman4028@gmail.com', 'Staar Payout Private Limited');
    $mail->addAddress($email);

    $mail->Subject = $otp . ' Your OTP Code';
    $mail->Body = "
<html>
<body style='font-family: Arial, sans-serif; color: #333;'>
    <p>Hello,</p>
    <p>Your OTP for verification is:</p>
    <h2 style='text-align:center; letter-spacing: 5px;'>$otp</h2>
    <p>Please use this code to complete your verification.</p>
    <p style='font-size: 0.8rem; color: #555;'>Staar Payout Private Limited</p>
    <p>Best Regards,<br>
       Staar Payout Private Limited<br>
       Email: info@itstarpay.com<br>
       Address: A-1/2, First Floor, Shakti Nagar Extension, Ashok Vihar, North Delhi, Delhi, India, 110052
    </p>
</body>
</html>";


    $mail->send();
    echo json_encode(['status'=>'success']);
} catch (Exception $e) {
    echo json_encode(['status'=>'error', 'message'=>$mail->ErrorInfo]);
}
