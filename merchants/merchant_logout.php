<?php
session_start();
session_unset();     // Optional: clears session variables
session_destroy();   // Destroys session data

header("Location: merchant_login.php"); // Redirect after logout
exit();
