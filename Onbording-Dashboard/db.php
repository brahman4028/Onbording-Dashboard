<?php
$mysqli = new mysqli("localhost", "root", "", "business_applications");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>