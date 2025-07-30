<?php 
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	// Sanitize input
	$accountnumber = trim($_GET['accountnumber']);
	
	// Prepare query
	$sql = "UPDATE business_applications SET bankeject='yes' WHERE accountnumber='$accountnumber'";
	
if ($mysqli->query($sql)) {

    echo "ejected successfully";
    header("Location: merchant_dashboard.php");

 }
    
    else {
		echo "❌ something went wrong.";
	}

	$mysqli->close();
}

?>