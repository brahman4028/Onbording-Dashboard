<?php

include 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Helper function to sanitize input
    function clean($data)
    {
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

    if (
        empty($entity) || empty($doi) || empty($nob) || empty($gstin) || empty($pan) ||
        empty($fullname) || empty($number) || empty($aadhaarnumber) || empty($totalvolume)
    ) {
        echo "<h4>Error: Required fields are missing. Please fill all mandatory fields.</h4>";
        exit;
    }

    // File Uploads
    $uploadDir = 'uploads/';
    $uploadedFiles = [];
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
        'annexurebfile'
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


    $dupCheck = $mysqli->query("
    SELECT id FROM business_applications 
    WHERE gstin = '$gstin' 
       OR pan = '$pan' 
       OR supportemail = '$supportemail'
       OR personalemail = '$personalemail'
       OR aadhaarnumberadn = '$aadhaarnumberadn'
       OR number = '$number'
       OR pannumber = '$pannumber'
");

    if ($dupCheck->num_rows > 0) {
        echo "<div style='padding:12px; background:#f8d7da; color:#842029;'>⚠️ Duplicate data found. Please check GSTIN, PAN, Email, Aadhaar or Contact numbers.</div>";
        
        exit;
    }


    $query = "INSERT INTO business_applications (
        entity, doi, nob, businesscategory, businesssubcategory, gstin, pan,
        registeredbsuiness, operatingaddress, url, businessnumber, alternnumber, supportemail,
        fullname, designation, number, personalemail, aadhaarnumber, pannumber,
        fullnameadn, designationadn, numberadn, personalemailadn, aadhaarnumberadn, pannumberadn,
        totalvolume, numberofusers, sixmonthprojectionamount, sixmonthprojectionuser,
        numoftransactions, disbursedamount, mintransaction, maxtransaction, thresholdlimit
    ) VALUES (
        '$entity', '$doi', '$nob', '$businesscategory', '$businesssubcategory', '$gstin', '$pan',
        '$registeredbsuiness', '$operatingaddress', '$url', '$businessnumber', '$alternnumber', '$supportemail',
        '$fullname', '$designation', '$number', '$personalemail', '$aadhaarnumber', '$pannumber',
        '$fullnameadn', '$designationadn', '$numberadn', '$personalemailadn', '$aadhaarnumberadn', '$pannumberadn',
        '$totalvolume', '$numberofusers', '$sixmonthprojectionamount', '$sixmonthprojectionuser',
        '$numoftransactions', '$disbursedamount', '$mintransaction', '$maxtransaction', '$thresholdlimit'
    )";

    if (mysqli_query($mysqli, $query)) {
        echo "<div style='padding:12px; background:#d1e7dd; color:#0f5132;'>✅ Application submitted successfully.</div>";
        header("Location: thankyou.html");
    } else {
        echo "<div style='padding:12px; background:#f8d7da; color:#842029;'>❌ Error: " . mysqli_error($mysqli) . "</div>";
    }

    $application_id = $mysqli->insert_id;

    $sql = "INSERT INTO business_documents (
    application_id, aadhaarfile, personalpanfile, photograph, addressfile,
    coifile, moafile, aoafile, brfile, udyamfile,
    gstinfile, bofile, rentfile, annexurebfile
) VALUES (
    '$application_id',
    '$uploadedFiles[aadhaarfile]',
    '$uploadedFiles[personalpanfile]',
    '$uploadedFiles[photograph]',
    '$uploadedFiles[addressfile]',
    '$uploadedFiles[coifile]',
    '$uploadedFiles[moafile]',
    '$uploadedFiles[aoafile]',
    '$uploadedFiles[brfile]',
    '$uploadedFiles[udyamfile]',
    '$uploadedFiles[gstinfile]',
    '$uploadedFiles[bofile]',
    '$uploadedFiles[rentfile]',
    '$uploadedFiles[annexurebfile]'
)";

    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        echo "<div style='padding:12px; background:#d1e7dd; color:#0f5132;'>✅ Business documents saved successfully!</div>";
    } else {
        // echo "❌ Error: " . mysqli_error($mysqli);
        echo "<div style='padding:12px; background:#f8d7da; color:#842029;'>❌ Error: " . mysqli_error($mysqli) . "</div>";
    }
} else {
    echo "<h4>Invalid request method.</h4>";
}
