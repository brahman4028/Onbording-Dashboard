<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: ./merchants/merchant_login.php");
    exit();
}

$userRole = $_SESSION['user']['role'];
