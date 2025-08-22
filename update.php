<?php
include 'db.php';

require __DIR__ . '/aws/aws-autoloader.php';

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $status = trim($_POST['emailorphone']);


    function clean($data)
    {
        return htmlspecialchars(strip_tags(trim($data)));
    }
    $application_id = $_POST['id'];
    $uniqueID = $application_id;
    if (!$application_id) {
        die("❌ Application ID missing.");
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // ========== Collect and sanitize all fields ==========
    $fields = [
        'businessname',
        'applicantname',
        'entity',
        'doi',
        'nob',
        'businesscategory',
        'businesssubcategory',
        'gstin',
        'pan',
        'registeredbsuiness',
        'operatingaddress',
        'url',
        'businessnumber',
        'alternnumber',
        'supportemail',
        'fullname',
        'designation',
        'number',
        'personalemail',
        'aadhaarnumber',
        'pannumber',
        'fullnameadn',
        'designationadn',
        'numberadn',
        'personalemailadn',
        'aadhaarnumberadn',
        'pannumberadn',
        'accountname',
        'bankname',
        'branchname',
        'accountnumber',
        'ifsccode',
        'accounttype',
        'totalvolume',
        'numberofusers',
        'sixmonthprojectionamount',
        'sixmonthprojectionuser',
        'numoftransactions',
        'disbursedamount',
        'mintransaction',
        'maxtransaction',
        'thresholdlimit',
        'status',
        'coment',
        'placevalue',
        'kycverification',
        'documentsverification',
        'bankverification',
        'kyccomment',
        'documentscomment',
        'bankcomment'
    ];

    foreach ($fields as $field) {
        $$field = clean($_POST[$field] ?? '');
    }

    // ========== Update business_applications table ==========
    $setApp = [];
    foreach ($fields as $field) {
        $val = $mysqli->real_escape_string($$field);
        $setApp[] = "$field = '$val'";
    }

    $updateApp = "UPDATE business_applications SET " . implode(', ', $setApp) . " WHERE id = '$application_id'";
    mysqli_query($mysqli, $updateApp);


    // ========== Handle file uploads and update business_documents ==========
    $uploadDir = 'uploads/';
    $fileFields = [
        'aadhaarfile',
        'personalpanfile',
        'photograph',
        'addressfile',
        'coifile',
        'moafile',
        'aoafile',
        'brfile',
        'udyamfile',
        'gstinfile',
        'bofile',
        'rentfile',
        'annexurebfile',
        'cancelledchequefile',
        'aadhaaradnfile',
        'personalpanadnfile',
        'signatoryphotoadnfile',
        'addressadnfile',
        'signatorysignfile',
        'signatorysignadnfile'
    ];

    $updateFileParts = [];

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
                    $alias = 'aadhaar_new';
                    break;
                case 'personalpanfile':
                    $alias = 'pan_new';
                    break;
                case 'photograph':
                    $alias = 'photo_new';
                    break;
                case 'addressfile':
                    $alias = 'address_new';
                    break;
                case 'signatorysignfile_new':
                    $alias = 'sign_new';
                    break;
                case 'coifile':
                    $alias = 'coa_new';
                    break;
                case 'moafile':
                    $alias = 'moa_new';
                    break;
                case 'aoafile':
                    $alias = 'aoa_new';
                    break;
                case 'brfile':
                    $alias = 'br_new';
                    break;
                case 'udyamfile':
                    $alias = 'udyam_new';
                    break;
                case 'gstinfile':
                    $alias = 'gstin_new';
                    break;
                case 'bofile':
                    $alias = 'bo_new';
                    break;
                case 'rentfile':
                    $alias = 'rent_new';
                    break;
                case 'annexurebfile':
                    $alias = 'annexureb_new';
                    break;
                case 'cancelledchequefile':
                    $alias = 'cancelledcheque_new';
                    break;
                case 'aadhaaradnfile':
                    $alias = 'aadhaar2_new';
                    break;
                case 'personalpanadnfile':
                    $alias = 'pan2_new';
                    break;
                case 'signatoryphotoadnfile':
                    $alias = 'photo2_new';
                    break;
                case 'addressadnfile':
                    $alias = 'address2_new';
                    break;
                case 'signatorysignadnfile':
                    $alias = 'sign2_new';
                    break;
            }

            // 🔐 Final filename = uniqueID + alias + extension
            // $fileName = $uniqueID . "_" . $alias;
            $fileName = $uniqueID . "_" . $alias . "." . $ext;
            $targetPath = $uploadDir . $fileName;

            // $cleanName = preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $originalName);
            // $uniqueName = uniqid() . "_" . $cleanName;
            // $targetPath = $uploadDir . $uniqueName;

            // if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
            //     $safePath = $mysqli->real_escape_string($targetPath);
            //     $updateFileParts[] = "$field = '$safePath'";

            // }
            if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
                try {
                    // Upload to AWS S3
                    $s3Result = $s3->putObject([
                        'Bucket'     => $bucket,
                        'Key'        => "IT_STARPAY/" . $fileName,
                        'SourceFile' => $targetPath,
                        //'ACL'      => 'public-read',
                    ]);

                    // Save S3 URL
                    $safePath = $mysqli->real_escape_string($s3Result['ObjectURL']);
                    $updateFileParts[] = "$field = '$safePath'";
                    $uploadedFiles[$field] = $s3Result['ObjectURL'];
                } catch (AwsException $e) {
                    echo "<p style='color:red;'>❌ S3 upload failed for {$field}: " . $e->getMessage() . "</p>";

                    // Fallback: keep local path
                    $safePath = $mysqli->real_escape_string($targetPath);
                    $updateFileParts[] = "$field = '$safePath'";
                    $uploadedFiles[$field] = $targetPath;
                }
            } else {
                $uploadedFiles[$field] = '';
            }
        } else {
            $uploadedFiles[$field] = '';
        }
    }

    if (!empty($updateFileParts)) {
        $updateFilesQuery = "UPDATE business_documents SET " . implode(', ', $updateFileParts) . " WHERE application_id = '$application_id'";
        mysqli_query($mysqli, $updateFilesQuery);
    }

    //     echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    // Redirect or display message







    header("Location: update_confirm.php?id=$application_id");
    exit;
} else {
    echo "❌ Invalid request method.";
}
