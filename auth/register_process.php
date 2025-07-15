<?php
session_start();
require_once './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$role = $_POST['role']; // 'user' or 'admin'

	// Optional: validate role
	if (!in_array($role, ['user', 'admin'])) {
		die("Invalid role selected.");
	}

	// Check if email or username exists
	$check = $mysqli->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
	$check->bind_param("ss", $email, $username);
	$check->execute();
	$check->store_result();

	if ($check->num_rows > 0) {
		echo "⚠️ Username or email already exists.";
		exit;
	}

	// Insert user with role
	$stmt = $mysqli->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $username, $email, $password, $role);

	if ($stmt->execute()) {
		// Store full user info in session
		$_SESSION['user'] = [
			'id' => $mysqli->insert_id,
			'username' => $username,
			'email' => $email,
			'role' => $role
		];

		// Show message, then redirect
		echo "<!DOCTYPE html>
		<html>
		<head>
			<title>Registration Successful</title>
			<meta http-equiv='refresh' content='3;url=../index.php' />
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
		echo "❌ Registration failed: " . $stmt->error;
	}

	$stmt->close();
	$check->close();
	$mysqli->close();
}
