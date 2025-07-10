<?php
session_start();
session_unset();     // Optional: clears session variables
session_destroy();   // Destroys session data

header("Location: login.php"); // Redirect after logout
exit();
