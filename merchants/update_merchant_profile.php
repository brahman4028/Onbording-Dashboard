<?php
include '../db.php';
header('Content-Type: application/json');

// Sanitize input
$merchant_id = $mysqli->real_escape_string($_POST['merchant_id']);
$username  = $mysqli->real_escape_string($_POST['username']);

$email = $mysqli->real_escape_string($_POST['email']);
$phone = $mysqli->real_escape_string($_POST['phone']);
$address = $mysqli->real_escape_string($_POST['address']);
$password = $mysqli->real_escape_string($_POST['password']);
$finalpassword = '';
if($password != ''){
   $finalpassword = password_hash($password, PASSWORD_BCRYPT); 
}


// Optional: Check if user exists, then update — you can change logic here

if($password == ''){
    $sql = "UPDATE merchant_info SET username='$username', email='$email', phone = '$phone', address = '$address'  WHERE merchant_id='$merchant_id' "; // Adjust WHERE clause
}
elseif($password != ''){
    $sql = "UPDATE merchant_info SET username='$username', email='$email', phone = '$phone', address = '$address', password='$finalpassword' WHERE merchant_id='$merchant_id' "; // Adjust WHERE clause
}


if ($mysqli->query($sql)) {

 $response = [
    "status" => "success",
    "message" => "Profile updated successfully"
];

// Tell browser this is JSON
header('Content-Type: application/json');

// Send JSON back
echo json_encode($response);
}

?>
