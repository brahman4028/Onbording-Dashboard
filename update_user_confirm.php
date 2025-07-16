<?php
session_start(); // Required to access session data

include 'db.php'; // Database connection

// ✅ Get email from already-running session
$sessionemail = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : null;

echo "$sessionemail";

// Optional: handle case where session is missing
if (!$sessionemail) {
// print_r($_SESSION);
    die("Session email not found. Please log in first.");
}

// ✅ No need to set session again here:
// $_SESSION['email'] = $sessionemail; ❌ remove this

// Get user ID (from hidden input)
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "ID received: $id<br>";


if ($_SERVER["REQUEST_METHOD"] == "POST" && $id > 0) {
    // Get form data

    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $role = trim($_POST['role']);

    // ✅ Prepare and execute update query
    $stmt = $mysqli->prepare("UPDATE users SET username = ?, email = ?, role = ?, created_by = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $username, $email, $role, $sessionemail, $id);

    if ($stmt->execute()) {
        echo "User updated successfully.<br><br>";

        // echo "Username: $username<br>";
        // echo "Email: $email<br>";
        // echo "Password: $password<br>";
        // echo "Role: $role<br>";
        // echo "Created By: $sessionemail<br>";
        header("Location: user.php");

    } else {
        echo "Error updating user: " . $stmt->error;
    }

    $stmt->close();
}
?>

