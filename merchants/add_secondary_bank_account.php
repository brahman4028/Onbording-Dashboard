<?php
include '../db.php';
header('Content-Type: application/json');

// Sanitize input
$id= $mysqli->real_escape_string($_POST['id']);
$accountnameadn = $mysqli->real_escape_string($_POST['accountnameadn']);
$banknameadn  = $mysqli->real_escape_string($_POST['banknameadn']);

$branchnameadn = $mysqli->real_escape_string($_POST['branchnameadn']);
$accountnumberadn = $mysqli->real_escape_string($_POST['accountnumberadn']);
$ifsccodeadn = $mysqli->real_escape_string($_POST['ifsccodeadn']);
$accounttypeadn = $mysqli->real_escape_string($_POST['accounttypeadn']);
// $cancelledchequefileadn = $mysqli->real_escape_string($_POST['cancelledchequefileadn']);



// Optional: Check if user exists, then update — you can change logic here


    $sql = "UPDATE business_applications SET accountnameadn='$accountnameadn',banknameadn='$banknameadn',branchnameadn='$branchnameadn',accountnumberadn='$accountnumberadn',ifsccodeadn='$ifsccodeadn',accounttypeadn='$accounttypeadn' WHERE id='$id' "; // Adjust WHERE clause

      // File Uploads
    $uploadDir = '../uploads/';
    // echo $uploadDir;
// exit;
//     if (!is_dir($uploadDir)) {
//     mkdir($uploadDir, 0777, true);
// }

    $uploadedFiles = [];
    $fileFields = [
        'cancelledchequefileadn'

    ];




    foreach ($fileFields as $field) {
    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
        $originalName = basename($_FILES[$field]['name']);

        // 🧼 Sanitize filename (remove spaces and special characters)
        $cleanName = preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $originalName);

        // 🔐 Unique filename to avoid conflicts
        $uniqueName = uniqid() . "_" . $cleanName;
        $targetPath = $uploadDir . $uniqueName;

        if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
            $uploadedFiles[$field] = 'uploads/'.$uniqueName;
        } else {
            $uploadedFiles[$field] = '';
        }
    } else {
        $uploadedFiles[$field] = '';
    }
}

$cancelledChequePath = $uploadedFiles['cancelledchequefileadn'];
// echo $cancelledChequePath;
// echo "TMP: " . $_FILES['cancelledchequefileadn']['tmp_name'] . "<br>";
// echo "ERR: " . $_FILES['cancelledchequefileadn']['error'] . "<br>";
// echo "NAME: " . $_FILES['cancelledchequefileadn']['name'] . "<br>";
// exit;

// exit;

   $sql2 = "UPDATE business_documents SET cancelledchequefileadn='$cancelledChequePath' WHERE application_id='$id' "; // Adjust WHERE clause
 

if ($mysqli->query($sql)) {
    if ($uploadedFiles['cancelledchequefileadn']) {
        if ($mysqli->query($sql2)) {
            $response = [
                "status" => "success",
                "message" => "Profile and file updated successfully"
            ];
        } else {
            $response = [
                "status" => "partial",
                "message" => "Profile updated but file info not saved to DB"
            ];
        }
    } else {
        $response = [
            "status" => "partial",
            "message" => "Profile updated but file was not uploaded"
        ];
    }
} else {
    $response = [
        "status" => "error",
        "message" => "Failed to update profile"
    ];
}
echo json_encode($response);

?>
