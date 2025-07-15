<?php
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Sanitize input
	$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
	$password = $_POST['password'];

	// Prepare query
	$stmt = $mysqli->prepare("SELECT id, username, email, password, role FROM users WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		// Bind result variables
		$stmt->bind_result($id, $username, $db_email, $hashed_password, $role);
		$stmt->fetch();

		if (password_verify($password, $hashed_password)) {
			// Set session with full user data
			$_SESSION['user'] = [
				'username' => $username,
				'email' => $email,
				'role' => $role,
				'id' => $id
			];


			header("Location: ../index.php");
			exit;
		} else {
			echo "❌ Incorrect password.";
		}
	} else {
		echo "❌ Email not found.";
	}

	$stmt->close();
	$mysqli->close();
}
