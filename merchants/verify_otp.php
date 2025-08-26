<?php 
// verify_otp.php
session_start();
header('Content-Type: application/json');

$userOTP = $_POST['otp'] ?? '';
$correctOTP = $_SESSION['otp'] ?? '';

if ($userOTP === $correctOTP) {
    unset($_SESSION['otp']); // optional
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error','message'=>'Invalid OTP']);
}


?>