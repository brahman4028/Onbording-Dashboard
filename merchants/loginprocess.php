<?php
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Sanitize input
	$emailorphone = trim($_POST['emailorphone']);
	$password = $_POST['password'];

	// Prepare query
	$stmt = $mysqli->prepare("SELECT merchant_id, application_id, username, email, phone, password FROM merchant_info WHERE email = ?");
	$stmt->bind_param("s", $emailorphone);
	$stmt->execute();
	$stmt->store_result();


    $stmt2 = $mysqli->prepare("SELECT merchant_id, application_id, username, email, phone, password FROM merchant_info WHERE phone = ?");
	$stmt2->bind_param("s", $emailorphone);
	$stmt2->execute();
	$stmt2->store_result();

	if ($stmt->num_rows > 0) {
		// Bind result variables
		$stmt->bind_result($merchant_id, $application_id, $username, $email, $phone, $hashed_password,);
		$stmt->fetch();

		if (password_verify($password, $hashed_password)) {
			// Set session with full user data
			$_SESSION['merchant_info'] = [
				'username' => $username,
				'email' => $emailorphone,
				'phone' => $phone,
				'merchant_id' => $merchant_id,
				'application_id' => $application_id
			];

            echo "login done";

			header("Location: dashboard.php");
			exit;
		} else {
			echo "❌ Incorrect password.";
		}
	} 

    if ($stmt2->num_rows > 0) {
		// Bind result variables
		$stmt2->bind_result($merchant_id, $application_id, $username, $email, $phone, $hashed_password,);
		$stmt2->fetch();

		if (password_verify($password, $hashed_password)) {
			// Set session with full user data
			$_SESSION['merchant_info'] = [
				'username' => $username,
				'email' => $emailorphone,
				'phone' => $phone,
				'merchant_id' => $merchant_id,
				'application_id' => $application_id
			];

            echo "login done";
			header("Location: merchant_dashboard.php");
			exit;
		} else {
			echo "❌ Incorrect password. stm2";
		}
	} 
    

    
    
    else {
		echo "❌ Email not found.";
	}

	$stmt->close();
	$mysqli->close();
}
