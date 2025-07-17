<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    function clean($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }
    $application_id = intval($_POST['id']);
    if (!$application_id) {
        die("❌ Application ID missing.");
    }

    // ========== Collect and sanitize all fields ==========
    $fields = [ 'businessname','applicantname','entity','doi','nob','businesscategory','businesssubcategory','gstin','pan',
        'registeredbsuiness','operatingaddress','url','businessnumber','alternnumber','supportemail',
        'fullname','designation','number','personalemail','aadhaarnumber','pannumber',
        'fullnameadn','designationadn','numberadn','personalemailadn','aadhaarnumberadn','pannumberadn',
        'accountname','bankname','branchname','accountnumber','ifsccode','accounttype',
        'totalvolume','numberofusers','sixmonthprojectionamount','sixmonthprojectionuser',
        'numoftransactions','disbursedamount','mintransaction','maxtransaction','thresholdlimit' , 'status', 'coment' , 'placevalue'
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

    $updateApp = "UPDATE business_applications SET " . implode(', ', $setApp) . " WHERE id = $application_id";
    mysqli_query($mysqli, $updateApp);


    // ========== Handle file uploads and update business_documents ==========
    $uploadDir = 'uploads/';
    $fileFields = [
        'aadhaarfile','personalpanfile','photograph','addressfile','coifile',
        'moafile','aoafile','brfile','udyamfile','gstinfile','bofile','rentfile',
        'annexurebfile','cancelledchequefile', 'aadhaaradnfile' , 'personalpanadnfile' , 'signatoryphotoadnfile' , 'addressadnfile' , 'signatorysignfile' , 'signatorysignadnfile'
    ];

    $updateFileParts = [];

    foreach ($fileFields as $field) {
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($_FILES[$field]['name']);
            $cleanName = preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $originalName);
            $uniqueName = uniqid() . "_" . $cleanName;
            $targetPath = $uploadDir . $uniqueName;

            if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
                $safePath = $mysqli->real_escape_string($targetPath);
                $updateFileParts[] = "$field = '$safePath'";
            }
        }
    }

    if (!empty($updateFileParts)) {
        $updateFilesQuery = "UPDATE business_documents SET " . implode(', ', $updateFileParts) . " WHERE application_id = $application_id";
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
?>
