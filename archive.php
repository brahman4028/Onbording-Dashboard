<?php
include 'db.php';

$id = intval($_GET['id']); // or from POST

// Step 1: Get current value
$result = mysqli_query($mysqli, "SELECT merchant_trash FROM business_applications WHERE id = $id");

if ($row = mysqli_fetch_assoc($result)) {
    $current = $row['merchant_trash'];
    
    // Step 2: Decide new value and destination
    if ($current === 'y') {
        $newValue = 'n';
        $redirect = 'merchants-list.php';
    } else {
        $newValue = 'y';
        $redirect = 'delete_confirm.php';
    }

    // Step 3: Update and redirect
    $update = "UPDATE business_applications SET merchant_trash = '$newValue' WHERE id = $id";
    if (mysqli_query($mysqli, $update)) {
        header("Location: merchants-list.php");
        exit;
    } else {
        echo "❌ Update failed: " . mysqli_error($mysqli);
    }
} else {
    echo "❌ Application not found.";
}
?>
