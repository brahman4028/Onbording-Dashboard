<?php 
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	// Sanitize input
	$accountnumberadn = trim($_GET['accountnumberadn']);
	
	// Prepare query
	$sql = "UPDATE business_applications SET bankejectadn='yes' WHERE accountnumberadn='$accountnumberadn'";
	
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