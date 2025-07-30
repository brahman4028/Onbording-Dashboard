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
    $uploadDir = '../test/';
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
            $uploadedFiles[$field] = $targetPath;
        } else {
            $uploadedFiles[$field] = '';
        }
    } else {
        $uploadedFiles[$field] = '';
    }
}


   $sql2 = "UPDATE business_documents SET cancelledchequefileadn='$uploadedFiles[cancelledchequefileadn]' WHERE application_id='$id' "; // Adjust WHERE clause
 

if ($mysqli->query($sql) && $mysqli->query($sql2)) {

 $response = [
    "status" => "success",
    "message" => "Profile updated successfully"
];

// Tell browser this is JSON

// Send JSON back
echo json_encode($response);
}

?>
