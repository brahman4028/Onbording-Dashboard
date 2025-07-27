<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../db.php';

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

	$stmt->close();
	$check->close();
	$mysqli->close();
}
