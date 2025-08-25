<?php
include '../db.php';

require __DIR__ . '/../aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// AWS Config
$bucket    = "onboarding-plus";   // only bucket name
$region    = "ap-south-1";        // your bucket region
$awsKey    = "AKIA5FTY6UPGU5LZHY5T";
$awsSecret = "LwRHCaRKs9WjGR+nP7vnb75t87Y9zURKaZg2sQdP";

// Create S3 Client
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region,
    'credentials' => [
        'key'    => $awsKey,
        'secret' => $awsSecret,
    ],
]);


header('Content-Type: application/json');

// Sanitize input
$id = $mysqli->real_escape_string($_POST['id']);
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

        // 🧼 Get file extension
        $ext = pathinfo($originalName, PATHINFO_EXTENSION);

        // Default clean name (fallback)
        $alias = $field;

        // Map field → custom alias
        switch ($field) {
            case 'aadhaarfile':
                $alias = 'aadhaar';
                break;
            case 'personalpanfile':
                $alias = 'pan';
                break;
            case 'photograph':
                $alias = 'photo';
                break;
            case 'addressfile':
                $alias = 'address';
                break;
            case 'signatorysignfile':
                $alias = 'sign';
                break;
            case 'coifile':
                $alias = 'coa';
                break;
            case 'moafile':
                $alias = 'moa';
                break;
            case 'aoafile':
                $alias = 'aoa';
                break;
            case 'brfile':
                $alias = 'br';
                break;
            case 'udyamfile':
                $alias = 'udyam';
                break;
            case 'gstinfile':
                $alias = 'gstin';
                break;
            case 'bofile':
                $alias = 'bo';
                break;
            case 'rentfile':
                $alias = 'rent';
                break;
            case 'annexurebfile':
                $alias = 'annexureb';
                break;
            case 'cancelledchequefile':
                $alias = 'cancelledcheque';
                break;
            case 'aadhaaradnfile':
                $alias = 'aadhaar2';
                break;
            case 'personalpanadnfile':
                $alias = 'pan2';
                break;
            case 'signatoryphotoadnfile':
                $alias = 'photo2';
                break;
            case 'addressadnfile':
                $alias = 'address2';
                break;
            case 'signatorysignadnfile':
                $alias = 'sign2';
                break;
        }

        // 🔐 Final filename = uniqueID + alias + extension
        // $fileName = $uniqueID . "_" . $alias;
        $fileName = $uniqueID . "_" . $alias . "." . $ext;
        $targetPath = $uploadDir . $fileName;

        $uploadedFiles[$field] = 'uploads/'.$fileName; // save only filename
        try {
            $s3Result = $s3->putObject([
                'Bucket'     => $bucket,
                'Key'        => "IT_STARPAY/" . $fileName,
                'SourceFile' => $_FILES[$field]['tmp_name'], // directly from temp
                //'ACL'      => 'public-read',
            ]);
            
        } catch (AwsException $e) {
            echo "<p style='color:red;'>❌ S3 upload failed for {$field}: " . $e->getMessage() . "</p>";
            $uploadedFiles[$field] = ''; // fallback
        }

    } else {
        $uploadedFiles[$field] = '';
    }
}




//     foreach ($fileFields as $field) {
//     if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
//         $originalName = basename($_FILES[$field]['name']);

//         // 🧼 Sanitize filename (remove spaces and special characters)
//         $cleanName = preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $originalName);

//         // 🔐 Unique filename to avoid conflicts
//         $uniqueName = uniqid() . "_" . $cleanName;
//         $targetPath = $uploadDir . $uniqueName;

//         if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
//             $uploadedFiles[$field] = 'uploads/'.$uniqueName;
//         } else {
//             $uploadedFiles[$field] = '';
//         }
//     } else {
//         $uploadedFiles[$field] = '';
//     }
// }

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
