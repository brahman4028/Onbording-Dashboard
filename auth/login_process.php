<?php
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$stmt = $mysqli->prepare("SELECT username, password FROM users WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($username, $hashed_password);
		$stmt->fetch();

		if (password_verify($password, $hashed_password)) {
			$_SESSION['user'] = $username;
			header("Location: ../index.php");
			exit;
		} else {
			echo "❌ Incorrect password.";
		}
	} else {
		echo "❌ Email not found.";
	}
}
