<?php include '../db.php';

session_start();

$application_id = '';

if (!isset($_SESSION['merchant_info']) || !isset($_SESSION['merchant_info']['username'])) {
    // Redirect to registration page
    header("Location: merchant_login.php");
    exit();
}
// Redirect if user is not logged in
// if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }

// Redirect if user is not admin



if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing ID.");
}

$application_id = intval($_GET['id']);

// Validate and retrieve 'gstin'
if (!isset($_GET['gstin']) || empty($_GET['gstin'])) {
    die("Missing GSTIN.");
}
$gstin = $_GET['gstin'];

// Validate and retrieve 'pan'
if (!isset($_GET['pan']) || empty($_GET['pan'])) {
    die("Missing PAN.");
}




$pan = $_GET['pan'];

// Now you can use $id, $gstin, and $pan in your code

// Fetch business_application data
$appQuery = "SELECT * FROM business_applications WHERE id = $application_id AND gstin = '$gstin' AND pan = '$pan' ";
$appResult = mysqli_query($mysqli, $appQuery);

if (!$appResult || mysqli_num_rows($appResult) === 0) {
    die("No record found with ID: $application_id");
}

$appData = mysqli_fetch_assoc($appResult);

// Fetch business_documents data
$docQuery = "SELECT * FROM business_documents WHERE application_id = $application_id";
$docResult = mysqli_query($mysqli, $docQuery);
$docData = $docResult ? mysqli_fetch_assoc($docResult) : [];


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/starfav.png" type="image/png" />
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bs-stepper/css/bs-stepper.css" rel="stylesheet" />
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../assets/css/header-colors.css" />
    <title>Stepper Form</title>
    <style>
        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid rgb(90, 90, 90) !important;
            /* solid black border */
            border-collapse: collapse;
            page-break-inside: avoid !important;
        }

        tr,
        td {
            break-inside: avoid;
            padding: 6px 8px;
            vertical-align: top;
            border: 1px solid rgb(90, 90, 90) !important;
            font-size: 14px;
        }

        .declaration-section {
            page-break-inside: avoid;
            break-inside: avoid;
            padding-bottom: 10px;
        }

        .declaration-section ul li {
            padding: 6px 0;
            font-size: 13px;
            color: #333;
            line-height: 1.4;
        }

        .pdfdisplay canvas {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
            page-break-after: always;
            border: 1px solid #ddd;
        }

        .autth-img-cover-login {
            background-image: url('../assets/images/sales13.jpg');
            background-size: cover;
            background-position: right center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            /* or set a fixed height like 400px if needed */
        }

        .blr {
            background-color: rgba(254, 254, 254, 0.8) !important;
            backdrop-filter: blur(20px) !important;

        }

        .previewstruct td {
            background-color: rgba(254, 254, 254, 0.8) !important;
            backdrop-filter: blur(20px) !important;
        }
    </style>
</head>

<body>
    <div class="wrapper" style="display: flex; flex-direction:column; height:100vh; ">
        <header class="login-header shadow ">
            <nav class="navbar navbar-expand-lg navbar-light rounded-0 bg-white  rounded-0 shadow-none border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../assets/images/logo-img.png" width="140" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav ms-auto mb- mb-lg-0" style="font-size: 16px;">
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                                <li class="nav-item me-2 d-flex f-column justify-content-center align-items-center"> <a class="nav-link d-flex column justify-content-center align-items-center" href="edit_applications.php?id=<?= $appData['id'] ?>" target="_blank"><i class='bx  bx-edit-alt fs-3'></i>Edit Application</a>
                                </li>
                            <?php endif; ?>
                            <button type="button" class="btn btn-primary  d-flex column justify-content-center align-items-center fs-7 b" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;"><i class='bx me-1'></i><span><a href="merchant_dashboard.php" style="color:white !important;">Go to Dashboard </a></span>
                                <div class="text-light ms-1">
                            </button>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <!-- for passing the id field -->
            <input type="text" hidden name="businame" id="businame" value="<?= $appData['businessname'] ?>">
            <!-- ///////// -->
            <div style=" margin-bottom:0px !important; flex:1; height:100%;">
                <div class="card" style="height: 100%; box-shadow:none !important;">
                    <div class="card-body blr" style="padding: 0px;">
                        <div id="stepper3" class="bs-stepper gap-0 vertical blr" style="height: 100%; ">
                            <div style="height: 100%; display:flex; flex-direction:column; justify-content:space-between;" class="blr">
                                <!-- route line -->
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test-vl-1">
                                        <div class="step-trigger" role="tab" id="stepper3trigger1" aria-controls="test-vl-1">
                                            <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
                                            <div>
                                                <h5 class=" mt-4 text-center" style="color:rgba(15, 15, 15, 1)">
                                                    <?= htmlspecialchars($appData['businessname']) ?>'s Application
                                                </h5>
                                                <p class="mb-0 steper-sub-title">Just a file Preview</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative autth-img-cover-login" style="width: 100% ; height:100%;">

                                <!-- welcome -->
                                <!-- welcome screen page  -->


                                <div class="bs-stepper-content px-5 py-5 " style="height: 750px; overflow-y: scroll !important;">
                                    <!-- business details -->

                                    <!-- authorization details -->

                                    <!-- Bank Account details -->

                                    <!-- document submission -->

                                    <!-- declarations -->

                                    <!-- submission form -->
                                    <div id="test-vl-1" role="tabpanel" class="bs-stepper-pane content fade wrapper " aria-labelledby="stepper3trigger1">

                                        <!-- pdf html template -->
                                        <div class="container border p-4 bg-white blr" id="kycPreview" style="
                                            width: 210mm;
                                            height: auto;
                                            overflow-y: scroll;
                                            padding: 15mm 10mm;
                                            background: white;
                                            border-radius:10px;
                                            
                                            font-size: 12px; h4,
                                            h5 {
                                               page-break-after: avoid;
                                               margin-top: 24px;
                                               font-weight: bold;
                                               color:rgb(1, 60, 123);
                                            } ">

                                            <!-- timestamp -->
                                            <table class="table" id="kycPreview" style="border: none !important;">
                                                <thead style="border: none !important;">
                                                    <tr style="border: none !important;">
                                                        <td colspan="2" class="text-end" style="border: none !important; background:none">
                                                            <strong>Date & Time:</strong> <span id=""><input type="text" style="border: none;" value="<?= htmlspecialchars($appData['created_at']) ?>" disabled></span>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <!-- rest of your table rows go here... -->
                                            </table>




                                            <!--  -->


                                            <div class="text-center mb-4" style="margin-top:-75px">
                                                <img src="../assets/images/itstarlogo.png" alt="Logo" style="max-height: 65px;">
                                                <h4 class="text-medium">Staar Payout Private Limited</h4>
                                                <h5 class="mt-2 fw-bold " style="color:rgb(3, 106, 216);">MERCHANT ONBOARDING FORM</h5>
                                            </div>

                                            <!-- 1. Business Details -->
                                            <h5 class="fw-bold " style="color:rgb(3, 106, 216); margin-top:-15px">1. Business Details</h5>
                                            <table class="table table-bordered align-middle">
                                                <tr>
                                                    <td style="width: 40%;">Business Name</td>
                                                    <td style="width: 60%;"><span id="businessname"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Type of Entity</td>
                                                    <td><span id="entity"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Incorporation</td>
                                                    <td><span id="doi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Nature of Business</td>
                                                    <td><span id="nob"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business Category</td>
                                                    <td><span id="businesscategory"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business Sub-Category</td>
                                                    <td><span id="businesssubcategory"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>GSTIN</td>
                                                    <td><span id="gstin"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business PAN Number</td>
                                                    <td><span id="pan"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Registered Business Address</td>
                                                    <td><span id="registeredbsuiness"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Operating Address (if different)</td>
                                                    <td><span id="operatingaddress"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Website URL</td>
                                                    <td><span id="url"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Application Name</td>
                                                    <td><span id="applicantname"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business Contact Number</td>
                                                    <td><span id="businessnumber"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Support Email ID</td>
                                                    <td><span id="supportemail"></span></td>
                                                </tr>
                                            </table>

                                            <!-- 2. Authorized Signatory -->
                                            <div>
                                                <h5 class="fw-bold  mt-1" style="color:rgb(3, 106, 216); page-break-before: always;">2. Authorized Signatory Details</h5>
                                                <table class="table table-bordered align-middle">
                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td><span id="fullname"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation</td>
                                                        <td><span id="designation"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><span id="number"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email ID</td>
                                                        <td><span id="personalemail"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aadhaar Number</td>
                                                        <td><span id="aadhaarnumber"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PAN Number</td>
                                                        <td><span id="pannumber"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Passport-size Photograph</td>
                                                        <td>TO BE ATTACHED SEPARATELY</td>
                                                    </tr>
                                                </table>
                                            </div><br>

                                            <!-- 3. Authorized Signatory 2 -->
                                            <div>
                                                <h5 class="fw-bold mt-2" style="color:rgb(3, 106, 216);">3. Authorized Signatory Details 2 (If any)</h5>
                                                <table class="table table-bordered align-middle">
                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td><span id="fullnameadn"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation</td>
                                                        <td><span id="designationadn"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><span id="numberadn"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email ID</td>
                                                        <td><span id="personalemailadn"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aadhaar Number</td>
                                                        <td><span id="aadhaarnumberadn"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PAN Number</td>
                                                        <td><span id="pannumberadn"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Passport-size Photograph</td>
                                                        <td>TO BE ATTACHED SEPARATELY</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <!-- 4. Bank Account Details -->
                                            <h6 class="fw-bold  mt-4" style="color:rgb(3, 106, 216);"> Secondary Bank Account Details</h6>
                                            <table class="table table-bordered align-middle">
                                                <tr>
                                                    <td>Account Holder Name</td>
                                                    <td><span id="accountname"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Bank Name</td>
                                                    <td><span id="bankname"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Branch Name</td>
                                                    <td><span id="branchname"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Number</td>
                                                    <td><span id="accountnumber"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>IFSC Code</td>
                                                    <td><span id="ifsccode"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Type</td>
                                                    <td><span id="accounttype"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Cancelled Cheque</td>
                                                    <td>TO BE ATTACHED SEPARATELY</td>
                                                </tr>
                                            </table>

                                            <table class="table table-bordered align-middle">
                                                <tr>
                                                    <td>Account Holder Name</td>
                                                    <td><span id="accountnameadn"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Bank Name</td>
                                                    <td><span id="banknameadn"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Branch Name</td>
                                                    <td><span id="branchnameadn"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Number</td>
                                                    <td><span id="accountnumberadn"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>IFSC Code</td>
                                                    <td><span id="ifsccodeadn"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Type</td>
                                                    <td><span id="accounttypeadn"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Cancelled Cheque</td>
                                                    <td>TO BE ATTACHED SEPARATELY</td>
                                                </tr>
                                            </table>
                                            <!-- document -->

                                            <h5 class="fw-bold  " style="color:rgb(3, 106, 216); page-break-before: always; margin-top: 15px">5. Documents uploaded</h5>
                                            <table class="table table-bordered mt-4">
                                                <thead>
                                                    <tr>
                                                        <th>Document</th>
                                                        <th>Uploaded File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- //////////// -->
                                                    <tr>
                                                        <td colspan="2" class="text-primary" style="margin-bottom: -10px;">Authorized Director 1</td>
                                                    <tr>
                                                        <td>Aadhaar Card</td>
                                                        <td>
                                                            <div id="aadhaarpreview"> <?php if (!empty($docData['aadhaarfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['aadhaarfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>PAN Card</td>
                                                        <td>
                                                            <div id="personalpanpreview"><?php if (!empty($docData['personalpanfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['personalpanfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Photograph</td>
                                                        <td>
                                                            <div id="photographpreview"><?php if (!empty($docData['photograph'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['photograph'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <td>Signature</td>
                                                    <td>
                                                        <div id="signatoryphotoadnfilepreview"><?php if (!empty($docData['signatoryphotoadnfile'])): ?>
                                                                <p>
                                                                    <a href="../<?= $docData['signatoryphotoadnfile'] ?>" target="_blank">
                                                                        View uploaded file
                                                                    </a>
                                                                </p>
                                                            <?php else: ?>
                                                                <p style="color: #888;">No file uploaded</p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</td>
                                                        <td>
                                                            <div id="addressfilepreview"><?php if (!empty($docData['addressfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['addressfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>Cancelled Cheque</td>
                                                        <td>
                                                            <div id="cancelledchequefile"><?php if (!empty($docData['cancelledchequefile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['cancelledchequefile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- for signatory 2 -->
                                                    <tr>
                                                        <td colspan="2" class="text-primary" style="margin-bottom: -10px;">Authorized Director 2</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aadhaar Card</td>
                                                        <td>
                                                            <div id="aadhaaradnfilepreview"><?php if (!empty($docData['aadhaaradnfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['aadhaaradnfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>PAN Card</td>
                                                        <td>
                                                            <div id="personalpanadnfilepreview"><?php if (!empty($docData['personalpanadnfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['personalpanadnfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Photograph</td>
                                                        <td>
                                                            <div id="signatoryphotoadnfilepreview"><?php if (!empty($docData['signatoryphotoadnfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['signatoryphotoadnfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Signature</td>
                                                        <td>
                                                            <div id="signatorysignadnfilepreview"><?php if (!empty($docData['signatorysignadnfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['signatorysignadnfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</td>
                                                        <td>
                                                            <div id="addressadnfilepreview"><?php if (!empty($docData['addressadnfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['addressadnfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>Cancelled Cheque</td>
                                                        <td>
                                                            <div id="cancelledchequefileadn"><?php if (!empty($docData['cancelledchequefileadn'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['cancelledchequefileadn'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- //////////// -->
                                                    <tr>
                                                        <td colspan="2" class="text-primary fw-bold" style="color:rgb(3, 106, 216);">Business Documents</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Certificate of Incorporation (COI) / Business Registration Certificate</td>
                                                        <td>
                                                            <div id="coifilepreview"><?php if (!empty($docData['coifile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['coifile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Memorandum of Association (MOA)</td>
                                                        <td>
                                                            <div id="moafilepreview"><?php if (!empty($docData['moafile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['moafile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Articles of Association (AOA) </td>
                                                        <td>
                                                            <div id="aoafilepreview"><?php if (!empty($docData['aoafile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['aoafile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Board Resolution (BR) / Letter of Authorization for Signatory</td>
                                                        <td>
                                                            <div id="brfilepreview"><?php if (!empty($docData['brfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['brfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>UDYAM Registration Certificate (If Available)</td>
                                                        <td>
                                                            <div id="udyamfilepreview"><?php if (!empty($docData['udyamfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['udyamfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GSTIN Certificate</td>
                                                        <td>
                                                            <div id="gstinfilepreview"><?php if (!empty($docData['gstinfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['gstinfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>List of Directors/Partners/Beneficial Ownership (BO)</td>
                                                        <td>
                                                            <div id="bofilepreview"><?php if (!empty($docData['bofile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['bofile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td>Rent Agreement / Lease Agreement / Property Tax Receipt (Mandatory if there is a change in address of Principal Place Of Business ) *</td>
                                                        <td>
                                                            <div id="rentfilepreview"><?php if (!empty($docData['rentfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['rentfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ANNEXURE B Form with Signature and Stamp</td>
                                                        <td>
                                                            <div id="annexurebfilepreview"><?php if (!empty($docData['annexurebfile'])): ?>
                                                                    <p>
                                                                        <a href="../<?= $docData['annexurebfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!-- aanexure a -->

                                            <div style="page-break-before: always;"></div>

                                            <h5 class="fw-bold text-primary mb-3">Annexure A</h5>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-semibold">1. Total Volumes in amount and number of users</td>
                                                        <td>
                                                            a. Volumes in amount: <span id="totalvolume"></span><br>
                                                            b. Number of users: <span id="numberofusers"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">2. Projections for the next six months</td>
                                                        <td>
                                                            a. Amount: <span id="sixmonthprojectionamount"></span><br>
                                                            b. Number of users: <span id="sixmonthprojectionuser"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">3. Number of transactions / frequencies in a day</td>
                                                        <td><span id="numoftransactions"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">4. Volume of total amount disbursed / distributed in a day</td>
                                                        <td><span id="disbursedamount"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">5. Minimum and Maximum transaction amount</td>
                                                        <td>
                                                            a. Minimum Amount: <span id="mintransaction"></span><br>
                                                            b. Maximum Amount: <span id="maxtransaction"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">6. Threshold limit and/or daily payout that can be fixed</td>
                                                        <td><span id="thresholdlimit"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <!-- documents preview -->

                                            <!-- <h5 class="mt-5 text-primary"> Attched Documents</h5>
                                            <div id="documentsPreviewSection" style="border:1px solid #ddd; padding:15px; margin-top:15px;">
                                                <div class="mb-3">
                                                    <strong>Aadhaar Card:</strong><br>
                                                    <div class="pdfpreview" id="aadhaardisplay" class="mt-2"></div>
                                                </div>

                                                <div class="mb-3">
                                                    <strong>PAN Card:</strong><br>
                                                    <div id="pandisplay" class="mt-2"></div>
                                                </div>

                                                <div class="mb-3">
                                                    <strong>Photograph:</strong><br>
                                                    <div id="photodisplay" class="mt-2"></div>
                                                </div>
                                            </div> -->

                                            <!-- 5. Declaration -->
                                            <div>
                                                <h5 class="fw-bold  mt-5 declaration-section" style="color:rgb(3, 106, 216); list-style:none;      page-break-inside: avoid;">5. Declarations</h5>
                                                <ul style="list-style: none;">
                                                    <li class="d-flex align-items-center" style="margin-top: -5px;"><i id="check1" style="font-size:16px;" class='bx bx-check-square'></i> I/We confirm that the information provided is true and accurate.</li>
                                                    <li class="d-flex align-items-center" style="margin-top: 5px;"><i id="check2" style="font-size:16px;" class='bx bx-check-square'></i> I/We authorize ITSTARPAY to verify the submitted information and documents.</li>
                                                    <li class="d-flex align-items-center" style="margin-top: 5px;"><i id="check3" style="font-size:16px;" class='bx bx-check-square'></i> I/We agree to comply with all applicable RBI, AML, and KYC guidelines.</li>
                                                    <li class="d-flex align-items-center" style="margin-top: 5px;"></li>

                                                </ul>
                                                <div class="col-12 col-lg-6 mb-3">
                                                    <label class="form-label ">Place : <span id="placevalue"></span></label>
                                                </div>
                                            </div>

                                            <!-- section for signatory photo and sign -->
                                            <table border="1" cellpadding="10" style="width: 100%; text-align: center; margin-bottom:190px;">
                                                <tr>
                                                    <th>Authorized Signatory 1</th>
                                                    <th>Authorized Signatory 2</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <!-- Photo placeholder -->
                                                        <span id="signphoto1"><?php if (!empty($docData['photograph'])): ?>
                                                                <div style="margin-top: 10px;">
                                                                    <img src="../<?= htmlspecialchars($docData['photograph']) ?>"
                                                                        alt="Uploaded Image Preview"
                                                                        style="max-width: 150px; border: 1px solid #ccc;" />
                                                                </div>
                                                            <?php else: ?>
                                                                <p style="color: #888;">No file uploaded</p>
                                                            <?php endif; ?>
                                                        </span><br><br>
                                                        <!-- Signature placeholder -->
                                                        <span id="sign1"><?php if (!empty($docData['signatorysignfile'])): ?>
                                                                <div style="margin-top: 10px;">
                                                                    <img src="../<?= htmlspecialchars($docData['signatorysignfile']) ?>"
                                                                        alt="Uploaded Image Preview"
                                                                        style="max-width: 150px; border: 1px solid #ccc;" />
                                                                </div>
                                                            <?php else: ?>
                                                                <p style="color: #888;">No file uploaded</p>
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <!-- Photo placeholder -->
                                                        <span id="signphoto2"><?php if (!empty($docData['signatoryphotoadnfile'])): ?>
                                                                <div style="margin-top: 10px;">
                                                                    <img src="../<?= htmlspecialchars($docData['signatoryphotoadnfile']) ?>"
                                                                        alt="Uploaded Image Preview"
                                                                        style="max-width: 150px; border: 1px solid #ccc;" />
                                                                </div>
                                                            <?php else: ?>
                                                                <p style="color: #888;">No file uploaded</p>
                                                            <?php endif; ?>
                                                        </span><br><br>
                                                        <!-- Signature placeholder -->
                                                        <span id="sign2"><?php if (!empty($docData['signatorysignadnfile'])): ?>
                                                                <div style="margin-top: 10px;">
                                                                    <img src="../<?= htmlspecialchars($docData['signatorysignadnfile']) ?>"
                                                                        alt="Uploaded Image Preview"
                                                                        style="max-width: 150px; border: 1px solid #ccc;" />
                                                                </div>
                                                            <?php else: ?>
                                                                <p style="color: #888;">No file uploaded</p>
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <!-- preview file -->


                                        <div style="width: 780px; margin:auto;" class="previewstruct">

                                            <table class="table table-bordered mt-4 text-center" class="blr">
                                                <!-- preview authorized 1 -->
                                                <tr>
                                                    <td class="text-primary" style="margin-bottom: -10px;">Authorized Director 1</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="blr">
                                                        <strong>Aadhaar Card</strong><br>

                                                        <?php if (!empty($docData['aadhaarfile'])): ?>
                                                            <a href="../<?= $docData['aadhaarfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="aadhaarfilepreview" data-fileurl="../<?= $docData['aadhaarfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>PAN Card</strong><br>

                                                        <?php if (!empty($docData['personalpanfile'])): ?>
                                                            <a href="../<?= $docData['personalpanfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="personalpanfilepreview" data-fileurl="../<?= $docData['personalpanfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Photograph</strong><br>

                                                        <?php if (!empty($docData['photograph'])): ?>
                                                            <a href="../<?= $docData['photograph'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="photographpreview" data-fileurl="../<?= $docData['photograph'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Signature</strong><br>

                                                        <?php if (!empty($docData['signatorysignfile'])): ?>
                                                            <a href="../<?= $docData['signatorysignfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="signatorysignfilepreview" data-fileurl="../<?= $docData['signatorysignfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</strong><br>

                                                        <?php if (!empty($docData['addressfile'])): ?>
                                                            <a href="../<?= $docData['addressfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="addressfilepreview" data-fileurl="../<?= $docData['addressfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Cancelled Cheque (Authorised Signatory 1)</strong><br>

                                                        <?php if (!empty($docData['cancelledchequefile'])): ?>
                                                            <a href="../<?= $docData['cancelledchequefile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="cancelledchequefilepreview" data-fileurl="../<?= $docData['cancelledchequefile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <!-- preview authorized 2 -->
                                                <tr>
                                                    <td class="text-primary" style="margin-bottom: -10px;">Authorized Director 2</td>
                                                </tr>

                                                <tr class="">
                                                    <td class="blr">
                                                        <strong>Aadhaar Card</strong><br>

                                                        <?php if (!empty($docData['aadhaaradnfile'])): ?>
                                                            <a href="../<?= $docData['aadhaaradnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="aadhaaradnfilepreview" data-fileurl="../<?= $docData['aadhaaradnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>PAN Card</strong><br>

                                                        <?php if (!empty($docData['personaladnpanfile'])): ?>
                                                            <a href="../<?= $docData['personaladnpanfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="personalpanadnfilepreview" data-fileurl="../<?= $docData['personalpanadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Photograph</strong><br>

                                                        <?php if (!empty($docData['signatoryphotoadnfile'])): ?>
                                                            <a href="../<?= $docData['signatoryphotoadnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="signatoryphotoadnfilepreview" data-fileurl="../<?= $docData['signatoryphotoadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Signature</strong><br>

                                                        <?php if (!empty($docData['signatorysignadnfile'])): ?>
                                                            <a href="../<?= $docData['signatorysignadnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="signatorysignadnfilepreview" data-fileurl="../<?= $docData['signatorysignadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</strong><br>

                                                        <?php if (!empty($docData['addressadnfile'])): ?>
                                                            <a href="../<?= $docData['addressadnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="addressadnfilepreview" data-fileurl="../<?= $docData['addressadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Cancelled Cheque (Authorised Signatory 2)</strong><br>

                                                        <?php if (!empty($docData['cancelledchequefileadn'])): ?>
                                                            <a href="../<?= $docData['cancelledchequefileadn'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="cancelledchequefileadnpreview" data-fileurl="../<?= $docData['cancelledchequefileadn'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <strong>Certificate of Incorporation (COI) / Business Registration Certificate</strong><br>

                                                        <?php if (!empty($docData['coifile'])): ?>
                                                            <a href="../<?= $docData['coifile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="coifilepreview" data-fileurl="../<?= $docData['coifile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Memorandum of Association (MOA)</strong><br>

                                                        <?php if (!empty($docData['moafile'])): ?>
                                                            <a href="../<?= $docData['moafile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="moafilepreview" data-fileurl="../<?= $docData['moafile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Board Resolution (BR) / Letter of Authorization for Signatory</strong><br>

                                                        <?php if (!empty($docData['brfile'])): ?>
                                                            <a href="../<?= $docData['brfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="brfilepreview" data-fileurl="../<?= $docData['brfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>UDYAM Registration Certificate (If Available)</strong><br>

                                                        <?php if (!empty($docData['udyamfile'])): ?>
                                                            <a href="../<?= $docData['udyamfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="udyamfilepreview" data-fileurl="../<?= $docData['udyamfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>GSTIN Certificate</strong><br>

                                                        <?php if (!empty($docData['gstinfile'])): ?>
                                                            <a href="../<?= $docData['gstinfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="gstinfilepreview" data-fileurl="../<?= $docData['gstinfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>List of Directors/Partners/Beneficial Ownership (BO)</strong><br>

                                                        <?php if (!empty($docData['bofile'])): ?>
                                                            <a href="../<?= $docData['bofile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="bofilepreview" data-fileurl="../<?= $docData['bofile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Cancelled Cheque</strong><br>

                                                        <?php if (!empty($docData['cancelledchequefile'])): ?>
                                                            <a href="../<?= $docData['cancelledchequefile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="cancelledchequefilepreview" data-fileurl=../<?= $docData['cancelledchequefile'] ?>></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Rent Agreement / Lease Agreement / Property Tax Receipt (Mandatory if there is a change in address of Principal Place Of Business ) *</strong><br>

                                                        <?php if (!empty($docData['rentfile'])): ?>
                                                            <a href="../<?= $docData['rentfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="rentfilepreview" data-fileurl="../<?= $docData['rentfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>ANNEXURE B Form with Signature and Stamp</strong><br>

                                                        <?php if (!empty($docData['annexurebfile'])): ?>
                                                            <a href="../<?= $docData['annexurebfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="annexurebfilepreview" data-fileurl="../<?= $docData['annexurebfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                        <!-- /////////////// -->
                                        <div class="d-flex justify-content-center align-items-center" style="flex-direction: column; color:white;">
                                            <p class="mb-2 mt-3"> File will be downloaded with your attached Documents * </p>
                                            <button type="button" class="btn text-center btn-success mb-4" style="box-shadow: 0 0.5rem 1rem rgba(13, 253, 137, 0.62); border-radius:30px;" onclick="downloadKYC()">Download KYC PDF</button>
                                        </div>
                                        <div>

                                        </div>


                                        <!--  -->
                                        <!-- declaration points -->
                                        <div class="row g-3 mt-4 blr p-4 m-auto" style="max-width: 780px; border-radius:10px">
                                            <div class="nav-item me-2 d-flex f-column justify-content-between align-items-center">
                                                <p class=" text-muted">
                                                    Merchant's application status.*
                                                </p>

                                                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                                                    <p class="nav-item me-2 d-flex f-column justify-content-center align-items-center"> <a class="nav-link d-flex column justify-content-center align-items-center text-primary" href="edit_applications.php?id=<?= $appData['id'] ?>" target="_blank"><i class='bx  bx-edit-alt fs-3'></i>Edit Application</a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>

                                            <!-- application status -->
                                            <div class="col-md-6 ">
                                                <?php $selectedEntity3 = $appData['status'] ?? ''; ?>
                                                <label class="form-label">Appplication Status</label>
                                                <select class="form-select" name="status" onblur="setPreviewValue(this, 'statusvalue')" disabled>
                                                    <option value="" disabled>-- please select -- </option>
                                                    <option value="In Review" <?= $selectedEntity3 === 'In Review' ? 'selected' : '' ?>>In Review</option>
                                                    <option value="Verified" <?= $selectedEntity3 === 'Verified' ? 'selected' : '' ?>>Verified</option>
                                                    <option value="Cancelled" <?= $selectedEntity3 === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                    <option value="Pending" <?= $selectedEntity3 === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                    <option value="Documents not completed" <?= $selectedEntity3 === 'Documents not completed' ? 'selected' : '' ?>>Documents not completed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">Comment</label>
                                                <input type="text" class="form-control" name="coment" id="coment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['coment']) ?>" disabled>
                                            </div>

                                            <!-- Kyc Status -->
                                            <div class="row g-3 mt-4">
                                                <p class=" text-muted">
                                                    Kindly update merchant's KYC status.*
                                                </p>
                                                <div class="col-md-6 ">
                                                    <?php $selectedEntity3 = $appData['kycverification'] ?? ''; ?>
                                                    <label class="form-label">KYC Status</label>
                                                    <select class="form-select" name="kycverification" onblur="setPreviewValue(this, 'statusvalue')" disabled>
                                                        <option value="" disabled>-- please select -- </option>
                                                        <option value="In Review" <?= $selectedEntity3 === 'In Review' ? 'selected' : '' ?>>In Review</option>
                                                        <option value="Verified" <?= $selectedEntity3 === 'Verified' ? 'selected' : '' ?>>Verified</option>
                                                        <option value="Cancelled" <?= $selectedEntity3 === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                        <option value="Pending" <?= $selectedEntity3 === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                        <option value="Documents not completed" <?= $selectedEntity3 === 'Documents not completed' ? 'selected' : '' ?>>Documents not completed</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="form-label">KYC Comment</label>
                                                    <input type="text" class="form-control" disabled name="kyccomment" id="kyccomment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['kyccomment']) ?>">
                                                </div>

                                            </div>

                                            <!-- Documents Status -->
                                            <div class="row g-3 mt-4">
                                                <p class=" text-muted">
                                                    Kindly update merchant's Documents status.*
                                                </p>
                                                <div class="col-md-6 ">
                                                    <?php $selectedEntity3 = $appData['documentsverification'] ?? ''; ?>
                                                    <label class="form-label">Documents Status</label>
                                                    <select class="form-select" name="documentsverification" onblur="setPreviewValue(this, 'statusvalue')" disabled>
                                                        <option value="" disabled>-- please select -- </option>
                                                        <option value="In Review" <?= $selectedEntity3 === 'In Review' ? 'selected' : '' ?>>In Review</option>
                                                        <option value="Verified" <?= $selectedEntity3 === 'Verified' ? 'selected' : '' ?>>Verified</option>
                                                        <option value="Cancelled" <?= $selectedEntity3 === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                        <option value="Pending" <?= $selectedEntity3 === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                        <option value="Documents not completed" <?= $selectedEntity3 === 'Documents not completed' ? 'selected' : '' ?>>Documents not completed</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="form-label">Comment</label>
                                                    <input type="text" class="form-control" disabled name="documentscomment" id="documentscomment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['documentscomment']) ?>">
                                                </div>

                                            </div>
                                            <!-- Bank Status -->
                                            <div class="row g-3 mt-4">
                                                <p class=" text-muted">
                                                    Kindly update merchant's bank account Status.*
                                                </p>
                                                <div class="col-md-6 ">
                                                    <?php $selectedEntity3 = $appData['bankverification'] ?? ''; ?>
                                                    <label class="form-label">Bank Account Status</label>
                                                    <select class="form-select" name="bankverification" onblur="setPreviewValue(this, 'statusvalue')" disabled>
                                                        <option value="" disabled>-- please select -- </option>
                                                        <option value="In Review" <?= $selectedEntity3 === 'In Review' ? 'selected' : '' ?>>In Review</option>
                                                        <option value="Verified" <?= $selectedEntity3 === 'Verified' ? 'selected' : '' ?>>Verified</option>
                                                        <option value="Cancelled" <?= $selectedEntity3 === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                        <option value="Pending" <?= $selectedEntity3 === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                        <option value="Documents not completed" <?= $selectedEntity3 === 'Documents not completed' ? 'selected' : '' ?>>Documents not completed</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="form-label">Comment</label>
                                                    <input type="text" class="form-control" disabled name="bankcomment" id="bankcomment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['bankcomment']) ?>">
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>

    <!-- footer -->

    <footer class="bg- text-center text-muted py-2 border-top" style="background-color: white;">
        © 2025 Staar Payout Private Limited. All rights reserved.
    </footer>

    </div>



    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>

    <!-- html2pdf for converting HTML to PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- pdf-lib for merging PDFs/images -->
    <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/chartjs/js/chart.js"></script>
    <script src="../assets/js/index.js"></script>
    <!--app JS-->
    <script src="../assets/js/app.js"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>


    <!-- select dropdowndown script -->
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const entity = "<?= $appData['entity'] ?? '' ?>";
            const select = document.getElementById('entity');
            if (select && entity) {
                select.value = entity;
                setPreviewValue(select, 'entityvalue');
            }
        });
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const entity = "<?= $appData['accounttype'] ?? '' ?>";
            const select = document.getElementById('accounttype');
            if (select && entity) {
                select.value = entity;
                setPreviewValue(select, 'accounttypevalue');
            }
        });
    </script>


    <!-- preview files -->


    <!-- ///////////////////// -->


    <!--  -->

    <script>
        $(function() {
            $(".dark-mode").on("click", function() {

                if ($(".dark-mode-icon i").attr("class") == 'bx bx-sun') {
                    $(".dark-mode-icon i").attr("class", "bx bx-moon");
                    $("html").attr("class", "light-theme")
                } else {
                    $(".dark-mode-icon i").attr("class", "bx bx-sun");
                    $("html").attr("class", "dark-theme")
                }

            })

        });
    </script>

    <!-- image validation and pdf merger -->


    <!-- image validation and pdf merger -->

    <script>
        const uploadedFiles = {}; // Globally track files by 'name'

        function validateFile(input, msgId, previewId) {
            const file = input.files[0];
            const msg = document.getElementById(msgId);
            const preview = document.getElementById(previewId);
            const inputKey = input.name;

            msg.innerText = '';
            preview.innerHTML = '';

            const allowedTypes = ["application/pdf", "image/jpeg", "image/jpg", "image/png", "image/webp"];
            const maxSize = 2 * 1024 * 1024;

            if (!file || !allowedTypes.includes(file.type) || file.size > maxSize) {
                msg.innerText = "❌ Invalid or too large file.";
                msg.style.color = "red";
                input.value = '';
                return;
            }

            // ✅ Sanitize file name
            const sanitizedFileName = file.name.replace(/[^a-zA-Z0-9.\-_]/g, '_');
            const sanitizedFile = new File([file], sanitizedFileName, {
                type: file.type
            });
            uploadedFiles[inputKey] = sanitizedFile;

            msg.innerText = "✅ File is valid.";
            msg.style.color = "green";
            preview.innerHTML = `<strong>${sanitizedFileName}</strong><br>`;

            if (file.type === "application/pdf") {
                const iframe = document.createElement("iframe");
                iframe.src = URL.createObjectURL(sanitizedFile);
                iframe.style.width = "100%";
                iframe.style.height = "400px";
                iframe.style.border = "1px solid #ccc";
                preview.appendChild(iframe);
            } else if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100%";
                    img.style.border = "1px solid #ccc";
                    img.style.marginTop = "10px";
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }

        async function downloadKYC() {
            console.log("hellpo");
            const element = document.getElementById('kycPreview');
            const businessName = document.getElementById('businame')?.value.trim() || 'KYC';
            console.log(businessName);
            const cleanName = businessName.replace(/[^a-zA-Z0-9]/g, '_');

            const previewIds = [
                'aadhaarpreview', 'personalpanpreview', 'photographpreview',
                'addressfilepreview', 'coifilepreview', 'moafilepreview',
                'aoafilepreview', 'brfilepreview', 'udyamfilepreview',
                'gstinfilepreview', 'bofilepreview', 'rentfilepreview',
                'annexurebfilepreview', 'cancelledchequefile','cancelledchequefileadn', 'aadhaaradnfilepreview', 'personalpanadnfilepreview', 'signatoryphotoadnfilepreview', 'addressadnfilepreview', 'signatorysignfilepreview', 'signatorysignadnfilepreview', 'signphoto1', 'signphoto2', 'sign1', 'sign2'
            ];

            // 🧼 Step 1: Remove preview images/iframes (but keep names/links)
            previewIds.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    [...el.children].forEach(child => {
                        if (child.tagName === "IFRAME" || child.tagName === "IMG") {
                            el.removeChild(child);
                        }
                    });
                }
            });

            // 📄 Step 2: Generate PDF from HTML
            const htmlBlob = await html2pdf()
                .set({
                    margin: 0.8,
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                })
                .from(element)
                .outputPdf('blob');

            const htmlBytes = await htmlBlob.arrayBuffer();
            const finalPdf = await PDFLib.PDFDocument.create();
            const htmlDoc = await PDFLib.PDFDocument.load(htmlBytes);
            const pages = await finalPdf.copyPages(htmlDoc, htmlDoc.getPageIndices());
            pages.forEach(p => finalPdf.addPage(p));

            // ➕ Step 3: Add uploaded files
            for (const key in uploadedFiles) {
                const file = uploadedFiles[key];
                const bytes = await file.arrayBuffer();

                if (file.type === 'application/pdf') {
                    const extDoc = await PDFLib.PDFDocument.load(bytes);
                    const extPages = await finalPdf.copyPages(extDoc, extDoc.getPageIndices());
                    extPages.forEach(p => finalPdf.addPage(p));
                } else if (file.type.startsWith('image/')) {
                    const imgBytes = new Uint8Array(bytes);
                    const embedded = file.type.includes('png') ?
                        await finalPdf.embedPng(imgBytes) :
                        await finalPdf.embedJpg(imgBytes);

                    const page = finalPdf.addPage();
                    const pageWidth = page.getWidth();
                    const pageHeight = page.getHeight();

                    const margin = 100; // 100px margin on both left and right
                    const availableWidth = pageWidth - 2 * margin;

                    const originalWidth = embedded.width;
                    const originalHeight = embedded.height;
                    const aspectRatio = originalHeight / originalWidth;

                    const targetWidth = availableWidth;
                    const targetHeight = targetWidth * aspectRatio;

                    page.drawImage(embedded, {
                        x: margin,
                        y: pageHeight - targetHeight - margin, // top margin
                        width: targetWidth,
                        height: targetHeight
                    });
                }

            }

            // 🔽 Step 4: Download
            const finalBytes = await finalPdf.save();
            const blob = new Blob([finalBytes], {
                type: 'application/pdf'
            });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `${cleanName}-KYC-Onboarding.pdf`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // ✅ Auto-trigger validateFile() on page load and bind blur
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type="file"]').forEach(input => {
                const msgId = input.getAttribute('data-msg-id');
                const previewId = input.getAttribute('data-preview-id');

                // Run on page load if file is already selected (browser may retain)
                if (input.files.length > 0) {
                    validateFile(input, msgId, previewId);
                }

                // Also trigger on blur
                input.addEventListener('blur', function() {
                    validateFile(this, msgId, previewId);
                });
            });
        });
    </script>

    <!-- reflecting pdf on onload -->

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const fileDivIds = [
                'aadhaarpreview', 'personalpanpreview', 'photographpreview',
                'addressfilepreview', 'coifilepreview', 'moafilepreview',
                'aoafilepreview', 'brfilepreview', 'udyamfilepreview',
                'gstinfilepreview', 'bofilepreview', 'rentfilepreview',
                'annexurebfilepreview', 'cancelledchequefile', 'aadhaaradnfilepreview', 'personalpanadnfilepreview', 'signatoryphotoadnfilepreview', 'addressadnfilepreview', 'signatorysignfilepreview', 'signatorysignadnfilepreview', 'signphoto1', 'signphoto2', 'sign1', 'sign2'
            ];

            fileDivIds.forEach(id => {
                const container = document.getElementById(id);
                if (!container) return;

                const link = container.querySelector('a');
                if (!link) return;

                const fileUrl = link.href;
                const fileName = fileUrl.split('/').pop();
                const inputName = id.replace('preview', ''); // assume name is like 'aadhaarfile'

                fetch(fileUrl)
                    .then(response => response.blob())
                    .then(blob => {
                        const file = new File([blob], fileName, {
                            type: blob.type
                        });
                        uploadedFiles[inputName] = file;
                        console.log(`✅ File loaded: ${fileName} (${inputName})`);
                    })
                    .catch(err => {
                        console.warn(`❌ Could not fetch: ${fileUrl}`, err);
                    });
            });
        });
    </script>


    <!-- /////////////// -->

    <!-- reflecting value on onload function -->

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            // 👉 1. For normal inputs (text/date/email etc.)
            document.querySelectorAll('input[name]:not([type="file"]), select[name], textarea[name]').forEach(el => {
                const name = el.name;
                const targetId = name + 'value';
                const target = document.getElementById(targetId);
                let value = el.value?.trim() || '—';

                // Format date as DD/MM/YYYY if applicable
                if (el.type === 'date' && value.includes('-')) {
                    const parts = value.split("-");
                    if (parts.length === 3) {
                        value = `${parts[2]}/${parts[1]}/${parts[0]}`;
                    }
                }

                if (target) target.textContent = value;
            });

            // 👉 2. For file inputs — we show just the filename in preview
            document.querySelectorAll('input[type="file"][name]').forEach(input => {
                const name = input.name; // e.g., 'aadhaarfile'
                const previewId = name + 'preview'; // e.g., 'aadhaarpreview'
                const preview = document.getElementById(previewId);

                consol.log("ds")

                // Extract filename if already filled (from server-rendered value)
                const fileName = input.defaultValue || input.getAttribute('value') || ''; // fallback
                if (preview && fileName) {
                    const base = fileName.split(/[\\/]/).pop(); // clean up path if present
                    preview.innerHTML = `<strong>${base}</strong>`;
                }
            });
        });
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[onblur]').forEach(el => {
                const attr = el.getAttribute('onblur');

                // Look for validatePAN(this, 'error-id', 'target-id')
                const match = attr.match(/validatePAN\(this,\s*'[^']+',\s*'([^']+)'\)/);
                if (match && match[1]) {
                    const targetId = match[1];
                    const target = document.getElementById(targetId);
                    const value = el.value?.trim() || '—';

                    if (target) target.textContent = value;
                }
            });
        });
    </script>

    <!-- Step 1: Pass PHP array to JavaScript -->
    <script>
        const uploadedFileData = <?= json_encode($appData ?? []); ?>; // From PHP e.g. ['aadhaarfile' => 'aadhaar.pdf']
    </script>

    <!-- Step 2: Show all uploaded files in their respective preview divs -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            if (!uploadedFileData || typeof uploadedFileData !== 'object') return;

            Object.entries(uploadedFileData).forEach(([key, fileName]) => {
                if (!fileName || typeof fileName !== 'string') return;

                // Transform 'aadhaarfile' => 'aadhaarpreview', 'panfile' => 'panpreview'
                const previewId = key.replace('file', 'preview');
                const previewDiv = document.getElementById(previewId);
                const fileUrl = `uploads/${fileName}`; // Adjust if your upload path is different

                if (previewDiv) {
                    previewDiv.innerHTML = ''; // Clear any old content

                    const ext = fileName.split('.').pop().toLowerCase();
                    const isImage = ['jpg', 'jpeg', 'png', 'webp'].includes(ext);

                    if (ext === 'pdf') {
                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.textContent = `📄 ${fileName}`;
                        link.target = '_blank';
                        link.style.display = 'inline-block';
                        link.style.marginTop = '6px';
                        link.style.color = '#0d6efd';
                        previewDiv.appendChild(link);
                    } else if (isImage) {
                        const img = document.createElement('img');
                        img.src = fileUrl;
                        img.alt = fileName;
                        img.style.maxWidth = '150px';
                        img.style.border = '1px solid #ccc';
                        img.style.marginTop = '6px';
                        previewDiv.appendChild(img);
                    } else {
                        previewDiv.textContent = fileName; // fallback plain name
                    }
                }
            });
        });
    </script>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const fileFields = [
                'aadhaarfile', 'panfile', 'photograph', 'addressfile', 'coifile',
                'moafile', 'aoafile', 'brfile', 'udyamfile', 'gstinfile',
                'bofile', 'cancelledchequefile', 'rentfile', 'annexurebfile', 'aadhaaradnfile', 'personalpanadnfile', 'signatoryphotoadnfile', 'addressadnfile', 'signatorysignfile', 'signatorysignadnfile', 'signphoto1', 'signphoto2', 'sign1', 'sign2'
            ];

            fileFields.forEach(field => {
                const previewId = field + 'preview';
                const previewEl = document.getElementById(previewId);

                if (!previewEl) return;

                // Look for anchor tag (already added by PHP)
                const linkEl = document.querySelector(`a[href*="${field}"]`);
                if (!linkEl) return;

                const fileUrl = linkEl.getAttribute('href');
                const fileName = fileUrl.split('/').pop();

                // Show file name and working preview link
                previewEl.innerHTML = `
            <strong>${fileName}</strong><br>
            <a href="${fileUrl}" target="_blank">📄 View File</a>
        `;
            });
        });
    </script>




    <!-- //////////////// -->


    <!-- timestamp for pdf -->
    <!-- <script>
        window.onload = function() {
            const now = new Date();
            const formatted = now.toLocaleString('en-IN', {
                dateStyle: 'medium',
                timeStyle: 'short'
            });

            document.getElementById('currentDateTime').textContent = formatted;
        };
    </script> -->

    <!--  -->

    <!-- //////////// -->

    <!-- value transfer to pdf elements -->
    <script>
        function setPreviewValue(el, targetId) {
            const target = document.getElementById(targetId);
            let value = el.value?.trim(); // remove extra spaces



            // Check if value exists
            if (!value) return;

            // Optional: Format date if type="date"
            if (el.type === "date" && value.includes("-")) {
                const parts = value.split("-");
                if (parts.length === 3) {
                    value = `${parts[2]}/${parts[1]}/${parts[0]}`; // DD/MM/YYYY
                }
            }

            if (target) {
                target.textContent = value;
            }
        }
    </script>

    <!-- check box code -->

    <script>
        function updateIcon(el, iconId) {
            const icon = document.getElementById(iconId);
            if (!icon) return;

            if (el.checked) {
                icon.classList.remove('bx-checkbox');
                icon.classList.add('bx-check-square');
            } else {
                icon.classList.remove('bx-check-square');
                icon.classList.add('bx-checkbox');
            }
        }
    </script>



    <script>
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // ❌ This blocks it always!
            if (!form.checkValidity()) {
                pos3_warning_noti();
                return;
            }
            form.submit(); // ✅ Add this if using preventDefault
        });
    </script>

    <script>
        function startOnboardingProcess() {
            // Hide the target div

            document.getElementById('startonboardingpage').classList.add('d-none');

            // Trigger the click on startonboarding button
            document.getElementById('stepper3trigger1').click();
        }
    </script>

    <!-- gsti validation message -->
    <!-- <script>
        async function validateGSTIN() {
            const gstinEl = document.getElementById('gstin');
            const errorEl = document.getElementById('gstin-error');
            const infoDiv = document.getElementById('gstin-info');
            const companyNameEl = document.getElementById('companyName');
            const gstinStatusEl = document.getElementById('gstinStatus');

            const gstin = gstinEl.value.trim().toUpperCase();
            if (gstin.length !== 15) {
                errorEl.textContent = '⚠️ GSTIN must be 15 characters';
                errorEl.classList.remove('d-none');
                infoDiv.classList.add('d-none');
                return;
            }
            errorEl.classList.add('d-none');

            try {
                const response = await fetch('https://api.cleartax.in/gst/api/v0.2/returns/gstin/gstin-verification', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Cleartax-Auth-Token': 'YOUR_CLEARTAX_TOKEN'
                    },
                    body: JSON.stringify({
                        gstin
                    })
                });

                if (!response.ok) throw new Error('API error');

                const data = await response.json();

                companyNameEl.textContent = data.lgnm || data.legal_name || 'Not available';
                gstinStatusEl.textContent = data.sts || data.status || 'Unknown';
                infoDiv.classList.remove('d-none');
            } catch (err) {
                console.error('GST fetch error:', err);
                errorEl.textContent = '⚠️ Error verifying GST details';
                errorEl.classList.remove('d-none');
                infoDiv.classList.add('d-none');
            }
        }
    </script> -->

    <!-- ////////////////// -->



    <!-- //////////////  image validation-->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.stepper3 = new Stepper(document.querySelector("#stepper3"), {
                linear: false,
                animation: true
            });
        });


        // function validateFile(fileInput, spanId, previewId) {
        //     const messageSpan = document.getElementById(spanId);
        //     const previewDiv = document.getElementById(previewId);
        //     const file = fileInput.files[0];

        //     messageSpan.innerText = '';
        //     previewDiv.innerHTML = '';


        //     const allowedTypes = ["application/pdf", "image/jpeg", "image/jpg", "image/png", "image/webp"];
        //     const maxSize = 2 * 1024 * 1024; // 2 MB

        //     if (!file) {
        //         messageSpan.innerText = "❌ No file selected.";
        //         messageSpan.style.color = "red";
        //         return false;
        //     }

        //     if (!allowedTypes.includes(file.type)) {
        //         messageSpan.innerText = "❌ Invalid file type.";
        //         messageSpan.style.color = "red";
        //         fileInput.value = "";
        //         return false;
        //     }

        //     if (file.size > maxSize) {
        //         messageSpan.innerText = "❌ File size exceeds 2MB.";
        //         messageSpan.style.color = "red";
        //         fileInput.value = "";
        //         return false;
        //     }

        //     messageSpan.innerText = "✅ File is valid.";
        //     messageSpan.style.color = "green";



        //     const fileURL = URL.createObjectURL(file);

        //     // Show Preview
        //     if (file.type.startsWith("image/")) {
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             const img = document.createElement('img');
        //             img.src = e.target.result;
        //             img.style.maxWidth = '60%';
        //             img.style.border = '1px solid #ccc';
        //             img.style.marginTop = '8px';
        //             previewDiv.appendChild(img);
        //         };
        //         reader.readAsDataURL(file);
        //     } else if (file.type === "application/pdf") {
        //         const link = document.createElement('a');
        //         link.href = URL.createObjectURL(file);
        //         link.target = "_blank";
        //         link.innerHTML = `📄 ${file.name}`;
        //         link.style.display = "inline-block";
        //         link.style.marginTop = "8px";
        //         previewDiv.appendChild(link);

        //     }





        //     return true;




        // }
    </script>

    <!-- on file preview code -->

    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('div[id$="preview"]').forEach(container => {
                const link = container.querySelector('a');
                if (link) {
                    const url = link.href;

                    // Remove duplicate previews if already added
                    const existingIframe = container.querySelector('iframe');
                    const existingImg = container.querySelector('img');
                    if (existingIframe || existingImg) return;

                    if (url.match(/\.pdf$/i)) {
                        const iframe = document.createElement('iframe');
                        iframe.src = url;
                        iframe.style.width = '100%';
                        iframe.style.height = '800px';
                        iframe.style.border = '1px solid #ccc';
                        container.appendChild(iframe);
                    } else if (url.match(/\.(jpe?g|png|webp)$/i)) {
                        const img = document.createElement('img');
                        img.src = url;
                        img.style.maxWidth = '60%';
                        img.style.border = '1px solid #ccc';
                        img.style.marginTop = '10px';
                        container.appendChild(img);
                    }
                }
            });
        });
    </script> -->


    <!-- reflecting value on onload function -->

    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            // 👉 1. For normal inputs (text/date/email etc.)
            document.querySelectorAll('input[name]:not([type="file"]), select[name], textarea[name]').forEach(el => {
                const name = el.name;
                const targetId = name + 'value';
                const target = document.getElementById(targetId);
                let value = el.value?.trim() || '—';

                // Format date as DD/MM/YYYY if applicable
                if (el.type === 'date' && value.includes('-')) {
                    const parts = value.split("-");
                    if (parts.length === 3) {
                        value = `${parts[2]}/${parts[1]}/${parts[0]}`;
                    }
                }

                if (target) target.textContent = value;
            });

            // 👉 2. For file inputs — we show just the filename in preview
            document.querySelectorAll('input[type="file"][name]').forEach(input => {
                const name = input.name; // e.g., 'aadhaarfile'
                const previewId = name + 'preview'; // e.g., 'aadhaarpreview'
                const preview = document.getElementById(previewId);

                consol.log("ds")

                // Extract filename if already filled (from server-rendered value)
                const fileName = input.defaultValue || input.getAttribute('value') || ''; // fallback
                if (preview && fileName) {
                    const base = fileName.split(/[\\/]/).pop(); // clean up path if present
                    preview.innerHTML = `<strong>${base}</strong>`;
                }
            });
        });
    </script> -->

    <!-- Step 2: Show all uploaded files in their respective preview divs -->
    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            if (!uploadedFileData || typeof uploadedFileData !== 'object') return;

            Object.entries(uploadedFileData).forEach(([key, fileName]) => {
                if (!fileName || typeof fileName !== 'string') return;

                // Transform 'aadhaarfile' => 'aadhaarpreview', 'panfile' => 'panpreview'
                const previewId = key.replace('file', 'preview');
                const previewDiv = document.getElementById(previewId);
                const fileUrl = `uploads/${fileName}`; // Adjust if your upload path is different

                if (previewDiv) {
                    previewDiv.innerHTML = ''; // Clear any old content

                    const ext = fileName.split('.').pop().toLowerCase();
                    const isImage = ['jpg', 'jpeg', 'png', 'webp'].includes(ext);

                    if (ext === 'pdf') {
                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.textContent = `📄 ${fileName}`;
                        link.target = '_blank';
                        link.style.display = 'inline-block';
                        link.style.marginTop = '6px';
                        link.style.color = '#0d6efd';
                        previewDiv.appendChild(link);
                    } else if (isImage) {
                        const img = document.createElement('img');
                        img.src = fileUrl;
                        img.alt = fileName;
                        img.style.maxWidth = '150px';
                        img.style.border = '1px solid #ccc';
                        img.style.marginTop = '6px';
                        previewDiv.appendChild(img);
                    } else {
                        previewDiv.textContent = fileName; // fallback plain name
                    }
                }
            });
        });
    </script> -->

    <!-- main end preview code -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('div[id$="preview"]').forEach(container => {
                const fileUrl = container.dataset.fileurl;

                if (!fileUrl) return;

                if (fileUrl.match(/\.pdf$/i)) {
                    const iframe = document.createElement('iframe');
                    iframe.src = fileUrl;
                    iframe.style.width = '100%';
                    iframe.style.height = '700px';
                    iframe.style.border = '1px solid #ccc';
                    iframe.style.marginTop = '10px';
                    container.appendChild(iframe);
                } else if (fileUrl.match(/\.(jpe?g|png|webp)$/i)) {
                    const img = document.createElement('img');
                    img.src = fileUrl;
                    img.style.maxWidth = '60%';
                    img.style.border = '1px solid #ccc';
                    img.style.marginTop = '10px';
                    container.appendChild(img);
                }
            });
        });
    </script>

</body>

</html>