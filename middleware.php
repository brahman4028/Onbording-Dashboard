<?php
session_start();

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$userRole = $_SESSION['user']['role'];
