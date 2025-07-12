<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Helper function to sanitize input
    function clean($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    // Text fields
    $entity = clean($_POST['entity']);
    $doi = clean($_POST['doi']);
    $nob = clean($_POST['nob']);
    $businesscategory = clean($_POST['businesscategory']);
    $businesssubcategory = clean($_POST['businesssubcategory']);
    $gstin = clean($_POST['gstin']);
    $pan = clean($_POST['pan']);
    $registeredbsuiness = clean($_POST['registeredbsuiness']);
    $operatingaddress = clean($_POST['operatingaddress']);
    $url = clean($_POST['url']);
    $businessnumber = clean($_POST['businessnumber']);
    $alternnumber = clean($_POST['alternnumber']);
    $supportemail = clean($_POST['supportemail']);

    $fullname = clean($_POST['fullname']);
    $designation = clean($_POST['designation']);
    $number = clean($_POST['number']);
    $personalemail = clean($_POST['personalemail']);
    $aadhaarnumber = clean($_POST['aadhaarnumber']);
    $pannumber = clean($_POST['pannumber']);

    $fullnameadn = clean($_POST['fullnameadn']);
    $designationadn = clean($_POST['designationadn']);
    $numberadn = clean($_POST['numberadn']);
    $personalemailadn = clean($_POST['personalemailadn']);
    $aadhaarnumberadn = clean($_POST['aadhaarnumberadn']);
    $pannumberadn = clean($_POST['pannumberadn']);

    $totalvolume = clean($_POST['totalvolume']);
    $numberofusers = clean($_POST['numberofusers']);
    $sixmonthprojectionamount = clean($_POST['sixmonthprojectionamount']);
    $sixmonthprojectionuser = clean($_POST['sixmonthprojectionuser']);
    $numoftransactions = clean($_POST['numoftransactions']);
    $disbursedamount = clean($_POST['disbursedamount']);
    $mintransaction = clean($_POST['mintransaction']);
    $maxtransaction = clean($_POST['maxtransaction']);
    $thresholdlimit = clean($_POST['thresholdlimit']);

    // File Uploads
    $uploadDir = 'uploads/';
    $uploadedFiles = [];
    $fileFields = [
        'aadhaarfile', 'personalpanfile', 'photograph', 'addressfile', 'coifile', 'moafile',
        'aoafile', 'brfile', 'udyamfile', 'gstinfile', 'bofile', 'rentfile', 'annexurebfile'
    ];

    foreach ($fileFields as $field) {
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES[$field]['name']);
            $targetPath = $uploadDir . uniqid() . "_" . $filename;
            if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
                $uploadedFiles[$field] = $targetPath;
            } else {
                $uploadedFiles[$field] = 'Upload failed';
            }
        } else {
            $uploadedFiles[$field] = 'No file or error';
        }
    }

    // Example output (you can replace this with DB insert logic)
    echo "<h3>Form Submitted Successfully</h3><pre>";
    print_r([
        'entity' => $entity,
        'doi' => $doi,
        'nob' => $nob,
        'businesscategory' => $businesscategory,
        'businesssubcategory' => $businesssubcategory,
        'gstin' => $gstin,
        'pan' => $pan,
        'registeredbsuiness' => $registeredbsuiness,
        'operatingaddress' => $operatingaddress,
        'url' => $url,
        'businessnumber' => $businessnumber,
        'alternnumber' => $alternnumber,
        'supportemail' => $supportemail,
        'fullname' => $fullname,
        'designation' => $designation,
        'number' => $number,
        'personalemail' => $personalemail,
        'aadhaarnumber' => $aadhaarnumber,
        'pannumber' => $pannumber,
        'fullnameadn' => $fullnameadn,
        'designationadn' => $designationadn,
        'numberadn' => $numberadn,
        'personalemailadn' => $personalemailadn,
        'aadhaarnumberadn' => $aadhaarnumberadn,
        'pannumberadn' => $pannumberadn,
        'totalvolume' => $totalvolume,
        'numberofusers' => $numberofusers,
        'sixmonthprojectionamount' => $sixmonthprojectionamount,
        'sixmonthprojectionuser' => $sixmonthprojectionuser,
        'numoftransactions' => $numoftransactions,
        'disbursedamount' => $disbursedamount,
        'mintransaction' => $mintransaction,
        'maxtransaction' => $maxtransaction,
        'thresholdlimit' => $thresholdlimit,
        'uploadedFiles' => $uploadedFiles
    ]);
    echo "</pre>";
} else {
    echo "<h4>Invalid request method.</h4>";
}



?>