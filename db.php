<?php
$mysqli = new mysqli("localhost", "root", "", "onboarding_merchants");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


// <!-- server db -->

// $mysqli = new mysqli("localhost", "u800867687_onboardingpage", "Onboarding@4028", "u800867687_onboardingpage");

// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }


?>

