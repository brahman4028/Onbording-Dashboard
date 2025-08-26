<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../phpmailer.php';

session_start();
require_once '../db.php';

 $logoPath = '../assets/images/logo-img.png';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Received POST request.<br>";
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	// Check if email or username exists
	$check = $mysqli->prepare("SELECT merchant_id FROM merchant_info WHERE email = ? OR phone = ?");
	$check->bind_param("ss", $email, $phone);
	$check->execute();
	$check->store_result();

	if ($check->num_rows > 0) {
		echo "⚠️ Username or email already exists.";
		exit;
	}

	// Insert user with role
	$stmt = $mysqli->prepare("INSERT INTO merchant_info (username, email, phone, password) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $username, $email, $phone, $password);

	if ($stmt->execute()) {
		// Store full user info in session
		// $_SESSION['merchant_info'] = [
		// 	'merchant_id' => $mysqli->insert_id,
		// 	'username' => $username,
		// 	'email' => $email
		// ];

		// Show message, then redirect
		echo "<!DOCTYPE html>
		<html>
		<head>
			<title>Registration Successful</title>
			<meta http-equiv='refresh' content='3;url=merchant_login.php' />
			<style>
				body { font-family: Arial; text-align: center; padding-top: 100px; }
				.message { font-size: 24px; color: green; }
			</style>
		</head>
		<body>
			<div class='message'>🎉 Registration Successful! Redirecting to your login page...</div>
		</body>
		</html>";
		exit;
	} else {
		echo "❌ Registration failed: " . $stmt->error;
	}


	 try {

                $mail->addAddress($email, $username);
                // $mail->addAddress($supportemail, $businessname);
                $mail->Subject = 'Welcome to Staar Payout Private Limited! Your Registration is Complete';
                $mail->Body    = "
    <html>
    <head>
        <style>
            .container { width: 100%; max-width: 600px; margin: auto; font-family: Arial, sans-serif; }
            .header { background: #007bff; color: #fff; padding: 20px; text-align: center; border-radius: 5px 5px 0 0;}
            .content { padding: 20px; background: #f9f9f9; }
            .footer { text-align: center; font-size: 12px; color: #888; padding: 10px; }
            .btn { display: inline-block; background: #28a745; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='cid:logo_cid' alt='ItStarPay Logo' style='width:120px;'><br>
                <h1>Welcome to ItStarPay!</h1>
            </div>
            <div class='content'>
                <p>Hi <strong>{$username}</strong>,</p>
                <p>Thank you for registering with ItStarPay. We’re thrilled to have you onboard.</p>
                <p>Your registered email is: <strong>{$email}</strong></p>
                <p>Get started by logging into your account and exploring our services.</p>
                <a href='https://itstarpay.com/' class='btn'>Login Now</a>
            </div>
			<div style='margin:15px 0; padding:10px; background:#f0f8ff; border-radius:5px; text-align:center; font-size:14px; color:#333;'>
    🚀 Begin your onboarding journey today! 
    <br>
    <a href='https://itstarpay.com/onboarding' style='display:inline-block; margin-top:8px; padding:8px 15px; background:#007bff; color:#fff; text-decoration:none; border-radius:4px;'>Start Onboarding</a>
</div>

			$logopath
                                Best Regards,
                                Staar Payout Private Limited
                                Email: info@itstarpay.com
                                Address: A-1/2, First Floor, Shakti Nagar Extension, Ashok Vihar, North West Delhi, Delhi, India, 110052
            <div class='footer'>
                &copy; ".date('Y')." ItStarPay. All rights reserved.
            </div>
        </div>
    </body>
    </html>
    ";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Email sent';
                header("Location: thankyou.php?id=$uniqueID&gstin={$gstin}&pan={$pan}");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

	$stmt->close();
	$check->close();
	$mysqli->close();



}
