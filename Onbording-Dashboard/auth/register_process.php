<?php
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $username, $email, $password);

	if ($stmt->execute()) {
		$_SESSION['user'] = $username;

		// Show message, then redirect after 3 seconds
		echo "<!DOCTYPE html>
		<html>
		<head>
			<title>Registration Successful</title>
			<meta http-equiv='refresh' content='3;url=../dashboard.php' />
			<style>
				body { font-family: Arial; text-align: center; padding-top: 100px; }
				.message { font-size: 24px; color: green; }
			</style>
		</head>
		<body>
			<div class='message'>🎉 Registration Successful! Redirecting to your dashboard...</div>
		</body>
		</html>";
		exit;
	} else {
		echo "Registration failed: " . $stmt->error;
	}
}
