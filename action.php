<?php

include 'db.php';

include 'phpmailer.php';

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

$prefix = "ITSTAR";

do {
    // generate random 5-digit number padded with zeros
    $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
    // $uniqueID = $prefix . "_" . $randomNumber;
    $uniqueID = $prefix . $randomNumber;

    // check if this ID already exists in DB
    $merQuery = "SELECT id FROM business_applications WHERE id = '$uniqueID' LIMIT 1";
    $merResult = mysqli_query($mysqli, $merQuery);
} while (mysqli_num_rows($merResult) > 0);


$trackingLink = "https://itstarpay.com/onboarding/merchants/dashboard.php";
$itstaremail = "info@itstarpay.com";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Helper function to sanitize input
    function clean($data)
    {
        return htmlspecialchars(strip_tags(trim($data)));
    }
    // merchantuseremail
    $merchantemail = clean($_POST['merchantemail']);
    $merchantname  = clean($_POST['merchantname']);

    // Text fields
    $businessname = clean($_POST['businessname']);
    $applicantname = clean($_POST['applicantname']);
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


    $accountname = clean($_POST['accountname']);
    $bankname = clean($_POST['bankname']);
    $branchname = clean($_POST['branchname']);
    $accountnumber = clean($_POST['accountnumber']);
    $ifsccode = clean($_POST['ifsccode']);
    $accounttype = clean($_POST['accounttype']);



    $totalvolume = clean($_POST['totalvolume']);
    $numberofusers = clean($_POST['numberofusers']);
    $sixmonthprojectionamount = clean($_POST['sixmonthprojectionamount']);
    $sixmonthprojectionuser = clean($_POST['sixmonthprojectionuser']);
    $numoftransactions = clean($_POST['numoftransactions']);
    $disbursedamount = clean($_POST['disbursedamount']);
    $mintransaction = clean($_POST['mintransaction']);
    $maxtransaction = clean($_POST['maxtransaction']);
    $thresholdlimit = clean($_POST['thresholdlimit']);
    $placevalue = clean($_POST['placevalue']);

    if (
        empty($entity) || empty($doi) || empty($nob) || empty($gstin) || empty($pan) ||
        empty($fullname) || empty($number) || empty($aadhaarnumber) || empty($totalvolume)
    ) {
        echo "<h4>Error: Required fields are missing. Please fill all mandatory fields.</h4>";
        exit;
    }

    $logoPath = 'assets/images/logo-img.png';

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
        'annexurebfile',
        'cancelledchequefile',
        'aadhaaradnfile',
        'personalpanadnfile',
        'signatoryphotoadnfile',
        'addressadnfile',
        'signatorysignfile',
        'signatorysignadnfile'


    ];

    //    foreach ($fileFields as $field) {
    //     if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
    //         $originalName = basename($_FILES[$field]['name']);

    //         // 🧼 Sanitize filename (remove spaces and special characters)
    //         $cleanName = preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $originalName);

    //         // 🔐 Unique name = Application ID + uniqid() + original name
    //         $fileName = $uniqueID . "_" . uniqid() . "_" . $cleanName;
    //         $targetPath = $uploadDir . $fileName;

    //         if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
    //             $uploadedFiles[$field] = $targetPath;
    //         } else {4
    //             $uploadedFiles[$field] = '';
    //         }
    //     } else {
    //         $uploadedFiles[$field] = '';
    //     }
    // }

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

            if(1==1){
                 try {
                    $s3Result = $s3->putObject([
                        'Bucket'     => $bucket,
                        'Key'        => "IT_STARPAY/" . $fileName,
                        'SourceFile' => $targetPath,
                    ]);

                    $safePath = $mysqli->real_escape_string($s3Result['ObjectURL']);
                    $updateFileParts[] = "$field = '$safePath'";
                    $uploadedFiles[$field] = $s3Result['ObjectURL'];
                } catch (Exception $e) {
                    error_log("S3 Upload Failed: " . $e->getMessage());
                }
            }
            }
            else {
            $uploadedFiles[$field] = '';
        }
    }

    // Example output (you can replace this with DB insert logic)
    echo "<h3>Form Submitted Successfully</h3><pre>";
    print_r([
        'businessname' => $businessname,
        'applicantname' => $applicantname,
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
        'accountname' => $accountname,
        'bankname' => $bankname,
        'accountnumber' => $accountnumber,
        'ifsccode' => $ifsccode,
        'accounttype' => $accounttype,
        'totalvolume' => $totalvolume,
        'numberofusers' => $numberofusers,
        'sixmonthprojectionamount' => $sixmonthprojectionamount,
        'sixmonthprojectionuser' => $sixmonthprojectionuser,
        'numoftransactions' => $numoftransactions,
        'disbursedamount' => $disbursedamount,
        'mintransaction' => $mintransaction,
        'maxtransaction' => $maxtransaction,
        'thresholdlimit' => $thresholdlimit,
        'placevalue' => $placevalue,
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
    $query = "INSERT INTO business_applications ( id, 
        businessname, applicantname, entity, doi, nob, businesscategory, businesssubcategory, gstin, pan,
        registeredbsuiness, operatingaddress, url, businessnumber, alternnumber, supportemail,
        fullname, designation, number, personalemail, aadhaarnumber, pannumber,
        fullnameadn, designationadn, numberadn, personalemailadn, aadhaarnumberadn, pannumberadn,
        totalvolume, numberofusers, sixmonthprojectionamount, sixmonthprojectionuser,
        numoftransactions, disbursedamount, mintransaction, maxtransaction, thresholdlimit , accountname , bankname , branchname , accountnumber , ifsccode , accounttype , placevalue
    ) VALUES (
        '$uniqueID', '$businessname','$applicantname', '$entity', '$doi', '$nob', '$businesscategory', '$businesssubcategory', '$gstin', '$pan',
        '$registeredbsuiness', '$operatingaddress', '$url', '$businessnumber', '$alternnumber', '$supportemail',
        '$fullname', '$designation', '$number', '$personalemail', '$aadhaarnumber', '$pannumber',
        '$fullnameadn', '$designationadn', '$numberadn', '$personalemailadn', '$aadhaarnumberadn', '$pannumberadn',
        '$totalvolume', '$numberofusers', '$sixmonthprojectionamount', '$sixmonthprojectionuser',
        '$numoftransactions', '$disbursedamount', '$mintransaction', '$maxtransaction', '$thresholdlimit' , '$accountname' , '$bankname' , '$branchname' , '$accountnumber' , '$ifsccode' ,'$accounttype' , '$placevalue'
    )";

    if (mysqli_query($mysqli, $query)) {
        echo "<div style='padding:12px; background:#d1e7dd; color:#0f5132;'>✅ Application submitted successfully.</div>";
        // header("Location: thankyou.php?");
    } else {
        echo "<div style='padding:12px; background:#f8d7da; color:#842029;'>❌ Error: " . mysqli_error($mysqli) . "</div>";
    }



    $application_id = $mysqli->insert_id;
    $merchant_id = $mysqli->insert_id;

    $sql = "INSERT INTO business_documents (
    application_id, aadhaarfile, personalpanfile, photograph, addressfile,
    coifile, moafile, aoafile, brfile, udyamfile,
    gstinfile, bofile, rentfile, annexurebfile, cancelledchequefile, aadhaaradnfile, personalpanadnfile, signatoryphotoadnfile, addressadnfile, signatorysignfile,  signatorysignadnfile
) VALUES (
    '$uniqueID',
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
    '$uploadedFiles[annexurebfile]',
    '$uploadedFiles[cancelledchequefile]',
    '$uploadedFiles[aadhaaradnfile]',
    '$uploadedFiles[personalpanadnfile]',
    '$uploadedFiles[signatoryphotoadnfile]',
    '$uploadedFiles[addressadnfile]',
    '$uploadedFiles[signatorysignfile]',
    '$uploadedFiles[signatorysignadnfile]'
)";


    // insert application id to merchant_id 

    $sql2 = "UPDATE merchant_info SET application_id = '$uniqueID' WHERE email = '$merchantemail'";
    $result = mysqli_query($mysqli, $sql);
    $result2 = mysqli_query($mysqli, $sql2);


    if ($result) {

        if ($result2) {
            echo "<div style='padding:12px; background:#d1e7dd; color:#0f5132;'>✅ Business documents saved successfully!</div>";

            try {

                $mail->isHTML(true);
                $mail->AddEmbeddedImage('assets/images/logo-img.png', 'logo_cid');

                $mail->addAddress($merchantemail, $merchantname);
                $mail->addAddress($supportemail, $businessname);
                $mail->Subject = 'Thank You for Registering – Your Application is in Progress';
                $mail->Body    = '
<div style="font-family:Arial,Helvetica,sans-serif; color:#222; line-height:1.6; max-width:620px; margin:0 auto; padding:24px; border:1px solid #eee; border-radius:10px; background:#fff;">
  <!-- Logo -->
  <div style="text-align:center; margin-bottom:16px;">
    <img src="cid:logo_cid" alt="Staar Payout Private Limited" style="max-height:56px; display:inline-block;">
  </div>

  <!-- Title -->
  <h2 style="margin:0 0 8px; font-size:20px; color:#111; text-align:center;">Thanks for registering, ' . $merchantemail . '!</h2>
  <p style="margin:0 0 16px; text-align:center; color:#555;">
    Great news — we’ve received your onboarding form and your application is under review.
  </p>

  <!-- Details card -->
  <div style="background:#f8fafc; border:1px solid #e6e6e6; border-radius:8px; padding:14px 16px; margin:16px 0;">
    <div style="font-size:14px; color:#111; margin-bottom:8px;"><strong>Your submitted details</strong></div>
    <div style="font-size:14px; color:#333; margin:4px 0;"><strong>Business Name:</strong> ' . $businessname . '</div>
    <div style="font-size:14px; color:#333; margin:4px 0;"><strong>GST Number:</strong> ' . $gstin . '</div>
    <div style="font-size:14px; color:#333; margin:4px 0;"><strong>PAN Number:</strong> ' . $pan . '</div>
  </div>

  <!-- CTA -->
  <div style="text-align:center; margin:18px 0 6px;">
    <a href="' . $trackingLink . '" style="background:#0d6efd; color:#fff; text-decoration:none; padding:10px 18px; border-radius:6px; display:inline-block; font-size:14px;">
      Track Your Application
    </a>
  </div>

  <p style="font-size:14px; color:#555; margin:16px 0;">
    Need help? Reach us at <a href="mailto:' . $itstaremail . '" style="color:#0d6efd; text-decoration:none;">' . $itstaremail . '</a> — we’re here to help.
  </p>

  <hr style="border:none; border-top:1px solid #eee; margin:18px 0;">

  <!-- Signature -->
  <div style="font-size:13px; color:#666;">
    <div style="margin:0 0 2px;"><strong>Best Regards,</strong></div>
    <div style="margin:0 0 6px;"><strong>Staar Payout Private Limited</strong></div>
    <div style="margin:0 0 2px;">Email: <a href="mailto:info@itstarpay.com" style="color:#0d6efd; text-decoration:none;">info@itstarpay.com</a></div>
    <div style="margin:0;">Address: A-1/2, First Floor, Shakti Nagar Extension, Ashok Vihar, North West Delhi, Delhi, India, 110052</div>
  </div>
</div>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Email sent';
                header("Location: thankyou.php?id={$uniqueID}&gstin={$gstin}&pan={$pan}");
                echo "<script>window.location.href='thankyou.php?id={$uniqueID}&gstin={$gstin}&pan={$pan}';</script>";
                exit;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "failed to update merchant";
        }
    } else {
        // echo "❌ Error: " . mysqli_error($mysqli);
        echo "<div style='padding:12px; background:#f8d7da; color:#842029;'>❌ Error: " . mysqli_error($mysqli) . "</div>";
    }
} else {
    echo "<h4>Invalid request method.</h4>";
}
