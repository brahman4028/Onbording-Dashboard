<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
	<meta http-equiv="refresh" content="3;url=dashboard.php" />
	<style>
		body { font-family: Arial; text-align: center; padding-top: 100px; }
		.message { font-size: 24px; color: green; }
	</style>
</head>
<body>
	<div class="message">🎉 Registration Successful! Redirecting to Dashboard...</div>
</body>
</html>
