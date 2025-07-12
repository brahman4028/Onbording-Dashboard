<?php
$mysqli = new mysqli("localhost", "root", "", "onboarding_merchants");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>