<?php include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing ID.");
}

$application_id = intval($_GET['id']);

// Fetch business_application data
$appQuery = "SELECT * FROM business_applications WHERE id = $application_id";
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
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/bs-stepper/css/bs-stepper.css" rel="stylesheet" />
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
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
    </style>
</head>

<body>
    <div class="wrapper" style="display: flex; flex-direction:column; height:100vh; ">
        <header class="login-header shadow ">
            <nav class="navbar navbar-expand-lg navbar-light rounded-0 bg-white  rounded-0 shadow-none border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo-img.png" width="140" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav ms-auto mb- mb-lg-0" style="font-size: 16px;">
                            <li class="nav-item me-2 d-flex f-column justify-content-center align-items-center"> <a class="nav-link d-flex column justify-content-center align-items-center" href="https://itstarpay.com/contact-us"><i class='stepper-circle bx bx-user-plus me-1 fs-3'></i>Add new Merchant</a>
                            </li>

                            <button type="button" class="btn btn-primary  d-flex column justify-content-center align-items-center fs-7 b" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;"><i class='bx me-1'></i><span>Go to Dashboard </span>
                                <div class="text-light ms-1">
                            </button>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <form action="action.php" method="POST" enctype="multipart/form-data">
            <div style=" margin-bottom:0px !important; flex:1; height:100%;">
                <div class="card" style="height: 100%; box-shadow:none !important;">
                    <div class="card-body" style="padding: 0px;">
                        <div id="stepper3" class="bs-stepper gap-0 vertical" style="height: 100%; ">
                            <div style="height: 100%; display:flex; flex-direction:column; justify-content:space-between;">
                                <!-- route line -->
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test-vl-1">
                                        <div class="step-trigger" role="tab" id="stepper3trigger1" aria-controls="test-vl-1">
                                            <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Business Details</h5>
                                                <p class="mb-0 steper-sub-title">Edit business info</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-2">
                                        <div class="step-trigger" role="tab" id="stepper3trigger2" aria-controls="test-vl-2">
                                            <div class="bs-stepper-circle"><i class='bx bx-user fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Authorized Signatory Details</h5>
                                                <p class="mb-0 steper-sub-title">Edit signatory details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-3">
                                        <div class="step-trigger" role="tab" id="stepper3trigger3" aria-controls="test-vl-3">
                                            <div class="bs-stepper-circle"><i class='bx bxs-bank fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Bank Account Details</h5>
                                                <p class="mb-0 steper-sub-title">Edit Account Info</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-4">
                                        <div class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-vl-4">
                                            <div class="bs-stepper-circle"><i class='bx bx-file fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Documents Upload</h5>
                                                <p class="mb-0 steper-sub-title">Edit required docs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-5">
                                        <div class="step-trigger" role="tab" id="stepper3trigger5" aria-controls="test-vl-5">
                                            <div class="bs-stepper-circle"><i class='bx  bx-user-check fs-4'></i> </div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Declarations</h5>
                                                <p class="mb-0 steper-sub-title">Edit declarations</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-6">
                                        <div class="step-trigger" role="tab" id="stepper3trigger6" aria-controls="test-vl-6">
                                            <div class="bs-stepper-circle"><i class='bx  bx-badge-check fs-4'></i> </div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Update Merchant Info</h5>
                                                <p class="mb-0 steper-sub-title">Update Merchant application</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative" style="width: 100% ; height:100%;">

                                <!-- welcome -->
                                <!-- welcome screen page  -->


                                <div class="bs-stepper-content px-5 py-5 " style="height: 750px; overflow-y: scroll !important;">
                                    <!-- business details -->
                                    <div id="test-vl-1" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger1">
                                        <h2 class="fs-2 " style="color:rgb(7, 104, 231)"><i class='bx  bx-edit-alt'></i> Edit Business Profile</h2>
                                        <div class="" style="margin-right: 300px;">
                                            <p class="mb-4 text-muted ">Please fill in your business information to help us verify your identity and activate features like vendor payouts, salary disbursements, and invoice management & so more.</p>
                                        </div>
                                        <hr class="my-4">

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Business Name</label>
                                                <input type="text" class="form-control" name="businessname" id="nob" onblur="setPreviewValue(this, 'businessnamevalue')" value="<?= htmlspecialchars($appData['businessname']) ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <?php $selectedEntity = $appData['entity'] ?? ''; ?>
                                                <label class="form-label">Type of Entity</label>
                                                <select class="form-select" name="entity" onblur="setPreviewValue(this, 'entityvalue')">
                                                    <option selected disabled <?= $selectedEntity === '' ? 'selected' : '' ?>>--Select--</option>
                                                    <option value="Proprietorship" <?= $selectedEntity === 'Proprietorship' ? 'selected' : '' ?>>Proprietorship</option>
                                                    <option value="Partnership" <?= $selectedEntity === 'Partnership' ? 'selected' : '' ?>>Partnership</option>
                                                    <option value="Pvt. Ltd." <?= $selectedEntity === 'Pvt. Ltd.' ? 'selected' : '' ?>>Pvt. Ltd.</option>
                                                    <option value="LLP" <?= $selectedEntity === 'LLP' ? 'selected' : '' ?>>LLP</option>
                                                    <option value="Public Ltd." <?= $selectedEntity === 'Public Ltd.' ? 'selected' : '' ?>>Public Ltd.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date of Incorporation</label>
                                                <input type="date" class="form-control" name="doi" placeholder="Enter Date in DD/MM/YYYY format" onblur="setPreviewValue(this, 'doivalue')" value="<?= htmlspecialchars($appData['doi']) ?>"><br>
                                                <small class="text-muted">Enter date in DD/MM/YYYY format</small>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Nature of Business</label>
                                                <input type="text" class="form-control" name="nob" onblur="setPreviewValue(this, 'nobvalue')" value="<?= htmlspecialchars($appData['nob']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Business Category</label>
                                                <input type="text" class="form-control" name="businesscategory" onblur="setPreviewValue(this, 'businesscategoryvalue')" value="<?= htmlspecialchars($appData['businesscategory']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Business Sub-Category</label>
                                                <input type="text" class="form-control" name="businesssubcategory" onblur="setPreviewValue(this, 'businesssubcategoryvalue')" value="<?= htmlspecialchars($appData['businesssubcategory']) ?>">
                                            </div>
                                            <!-- <div class="col-md-6">
                                            <label class="form-label">GSTIN</label>
                                            <input type="text" class="form-control" name="gstin">
                                        </div> -->
                                            <div class="col-md-6">
                                                <label for="gstin" class="form-label">GSTIN</label>
                                                <input type="text" class="form-control" id="gstin" name="gstin" onblur="setPreviewValue(this, 'gstinvalue')" value="<?= htmlspecialchars($appData['gstin']) ?>">
                                                <div id="gstin-error" class="text-danger mt-1 d-none">❌ Enter a valid 15-character GSTIN</div>
                                                <div class=" d-none" id="gstin-info">
                                                    <label class="form-label">Company Info</label>
                                                    <div class="p-2 border rounded bg-light">
                                                        <p class="mb-1"><strong>Company Name:</strong> <span id="companyName">—</span></p>
                                                        <p class="mb-0"><strong>Status:</strong> <span id="gstinStatus">—</span></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 d-none" id="gstin-info">
                                                <label class="form-label">Company Info</label>
                                                <div class="p-2 border rounded bg-light">
                                                    <p class="mb-1"><strong>Company Name:</strong> <span id="companyName">—</span></p>
                                                    <p class="mb-0"><strong>Status:</strong> <span id="gstinStatus">—</span></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Business PAN Number</label>
                                                <input type="text" class="form-control " name="pan" id="businesspan" onblur="validatePAN(this, 'error-businesspan','businesspanvalue')" placeholder="ABCDE1234F" value="<?= htmlspecialchars($appData['pan']) ?>">
                                                <div class="text-danger mt-1 d-none" id="error-businesspan">Invalid PAN format (e.g., AAAAA9999A)</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Registered Business Address</label>
                                                <input type="text" class="form-control" name="registeredbsuiness" onblur="setPreviewValue(this, 'registeredbsuinessvalue')" value="<?= htmlspecialchars($appData['registeredbsuiness']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Operating Address</label>
                                                <input type="text" class="form-control" name="operatingaddress" onblur="setPreviewValue(this, 'operatingaddressvalue')" value="<?= htmlspecialchars($appData['operatingaddress']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Website URL</label>
                                                <input type="text" class="form-control" name="url" onblur="setPreviewValue(this, 'urlvalue')" value="<?= htmlspecialchars($appData['url']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Application Name</label>
                                                <input type="text" class="form-control" name="applicantname" onblur="setPreviewValue(this, 'applicantnamevalue')" value="<?= htmlspecialchars($appData['applicantname']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Business Contact Number</label>
                                                <input type="text" class="form-control" name="businessnumber" id="businessnumber" onblur="validatePhone(this, 'businessnumber-error', 'businessnumbervalue')" placeholder="9876543210" value="<?= htmlspecialchars($appData['businessnumber']) ?>">
                                                <div id="businessnumber-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Alternate Contact Number</label>
                                                <input type="text" class="form-control" name="alternnumber" id="alternnumber" onblur="validatePhone(this, 'alternnumber-error', 'alternnumbervalue')" placeholder="9876543210" value="<?= htmlspecialchars($appData['alternnumber']) ?>">
                                                <div id="alternnumber-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="supportemail" class="form-label">Support Email ID</label>
                                                <input type="email" class="form-control" id="supportemail" name="supportemail" onblur="validateEmail(this, 'supportemail-error', 'supportemailvalue')" placeholder="name@example.com" value="<?= htmlspecialchars($appData['supportemail']) ?>">
                                                <div id="supportemail-error" class="text-danger mt-1 d-none">
                                                    ❌ Please enter a valid email address
                                                </div>
                                            </div>





                                            <div class="col-12">
                                                <button type="button" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3);" class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- authorization details -->
                                    <div id="test-vl-2" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger2">

                                        <h2 class=" fs-2 " style="color:rgb(7, 104, 231)"><i class='bx  bx-edit-alt'></i> Authorized Signatory Details</h2>
                                        <div class="" style="margin-right: 300px;">
                                            <p class="mb-4 text-muted ">Please provide the details of the person authorized to sign documents and make decisions on behalf of the business. This is required for verification and legal compliance.</p>
                                        </div>
                                        <hr class="my-4">

                                        <h6 class="mt-2 text-primary"><i class='bx  bx-edit-alt'></i> Authorized Director 1</h6><br>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="fullname" onblur="setPreviewValue(this, 'fullnamevalue')" value="<?= htmlspecialchars($appData['fullname']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Designation</label>
                                                <input type="text" class="form-control" name="designation" onblur="setPreviewValue(this, 'designationvalue')" value="<?= htmlspecialchars($appData['designation']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="number" id="number" onblur="validatePhone(this, 'number-error', 'numbervalue')" placeholder="9876543210" value="<?= htmlspecialchars($appData['number']) ?>">
                                                <div id="number-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email ID</label>
                                                <input type="email" class="form-control" id="personalemail" name="personalemail" onblur="validateEmail(this, 'personalemail-error', 'personalemailvalue')" placeholder="name@example.com" value="<?= htmlspecialchars($appData['personalemail']) ?>">
                                                <div id="personalemail-error" class="text-danger mt-1 d-none">
                                                    ❌ Please enter a valid email address
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Aadhaar Number</label>
                                                <input type="text" class="form-control" name="aadhaarnumber" id="aadhaarnumber" placeholder="Enter 12-digit Aadhaar number" maxlength="12"
                                                    onblur="validateAadhaar(this, 'aadhaarnumber-error', 'aadhaarnumbervalue')" value="<?= htmlspecialchars($appData['aadhaarnumber']) ?>">
                                                <div id="aadhaarnumber-error" class="text-danger d-none">Please enter a valid 12-digit Aadhaar number.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">PAN Number</label>
                                                <input type="text" class="form-control" name="pannumber" id="pannumber" onblur="validatePAN(this, 'error-pannumber','pannumbervalue')" placeholder="ABCDE1234F" value="<?= htmlspecialchars($appData['pannumber']) ?>">
                                                <div class="text-danger mt-1 d-none" id="error-pannumber">Invalid PAN format (e.g., AAAAA9999A)</div>
                                            </div>

                                            <h6 class="mt-4 text-primary"><i class='bx  bx-edit-alt'></i> Authorized Director 2 (If any)</h6><br>

                                            <div class="col-md-6">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="fullnameadn" onblur="setPreviewValue(this, 'fullnameadnvalue')" value="<?= htmlspecialchars($appData['fullnameadn']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Designation</label>
                                                <input type="text" class="form-control" name="designationadn" onblur="setPreviewValue(this, 'designationadnvalue')" value="<?= htmlspecialchars($appData['designationadn']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="numberadn" id="numberadn" onblur="validatePhone(this, 'numberadn-error', 'numberadnvalue')" placeholder="9876543210" value="<?= htmlspecialchars($appData['numberadn']) ?>">
                                                <div id="numberadn-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email ID</label>
                                                <input type="email" class="form-control" id="personalemailadn" name="personalemailadn" onblur="validateEmail(this, 'personalemailadn-error', 'personalemailadnvalue')" placeholder="name@example.com" value="<?= htmlspecialchars($appData['personalemailadn']) ?>">
                                                <div id="personalemailadn-error" class="text-danger mt-1 d-none">
                                                    ❌ Please enter a valid email address
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Aadhaar Number</label>
                                                <input type="text" class="form-control" name="aadhaarnumberadn" id="aadhaarnumberadn" placeholder="Enter 12-digit Aadhaar number" maxlength="12"
                                                    onblur="validateAadhaar(this, 'aadhaarnumberadn-error', 'aadhaarnumberadnvalue')" value="<?= htmlspecialchars($appData['aadhaarnumberadn']) ?>">
                                                <div id="aadhaarnumberadn-error" class="text-danger d-none">Please enter a valid 12-digit Aadhaar number.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">PAN Number</label>
                                                <input type="text" class="form-control" name="pannumberadn" id="pannumberadn" onblur="validatePAN(this, 'error-pannumberadn','pannumberadnvalue')" placeholder="ABCDE1234F" value="<?= htmlspecialchars($appData['pannumberadn']) ?>">
                                                <div class="text-danger mt-1 d-none" id="error-pannumberadn">Invalid PAN format (e.g., AAAAA9999A)</div>
                                            </div>

                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="button" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3);" class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                            </div>
                                        </div>






                                    </div>
                                    <!-- Bank Account details -->
                                    <div id="test-vl-3" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger3">

                                        <h2 class=" fs-2 " style="color:rgb(7, 104, 231)"><i class='bx  bx-edit-alt'></i> Bank Account Details</h2>
                                        <div class="" style="margin-right: 300px;">
                                            <p class="mb-4 text-muted ">Provide your complete bank details—including account number, IFSC, and branch info—to ensure smooth payouts, secure transactions, and successful verification.</p>
                                        </div>
                                        <hr class="my-4">

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Account Holder Name</label>
                                                <input type="text" class="form-control" name="accountname" onblur="setPreviewValue(this, 'accountnamevalue')" placeholder="Amit John" value="<?= htmlspecialchars($appData['accountname']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" name="bankname" onblur="setPreviewValue(this, 'banknamevalue')" placeholder="ABC Bank" value="<?= htmlspecialchars($appData['bankname']) ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Branch Name</label>
                                                <input type="text" class="form-control" name="branchname" id="branchname" onblur="setPreviewValue(this, 'branchnamevalue')" value="<?= htmlspecialchars($appData['branchname']) ?>">

                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Account Number</label>
                                                <input type="text" class="form-control" id="accountnumber" name="accountnumber" onblur="setPreviewValue(this, 'accountnumbervalue')" placeholder="2300 0000 0049" value="<?= htmlspecialchars($appData['accountnumber']) ?>">

                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">IFSC Code</label>
                                                <input type="text" class="form-control" name="ifsccode" id="ifsccode" placeholder="Enter IFSC Code"
                                                    onblur="setPreviewValue(this, 'ifsccodevalue')" value="<?= htmlspecialchars($appData['ifsccode']) ?>">

                                            </div>
                                            <div class="col-md-6">
                                                <?php $selectedEntity1 = $appData['accounttype'] ?? ''; ?>
                                                <label class="form-label">Account Type</label>
                                                <select class="form-select" name="accounttype" onblur="setPreviewValue(this, 'accounttypevalue')">
                                                    <option selected disabled <?= $selectedEntity1 === '' ? 'selected' : '' ?>>--Select--</option>
                                                    <option value="Saving Account" <?= $selectedEntity1 === 'Saving Account' ? 'selected' : '' ?>>Saving Account</option>
                                                    <option value="Current Account" <?= $selectedEntity1 === 'Current Account' ? 'selected' : '' ?>>Current Account</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Cancelled Cheque</label>
                                                <div class="input-group mb-3 mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile017" onchange="validateFile(this, 'ChequeMsg','cancelledchequefile')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="cancelledchequefile" value="<?= htmlspecialchars($docData['cancelledchequefile']) ?>">
                                                    <label class="input-group-text" for="inputGroupFile017">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['cancelledchequefile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['cancelledchequefile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="ChequeMsg"></span>
                                            </div>



                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="button" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3);" class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                            </div>
                                        </div>






                                    </div>
                                    <!-- document submission -->
                                    <div id="test-vl-4" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">

                                        <h2 class="fs-2 " style="color:rgb(7, 104, 231)"><i class='bx  bx-edit-alt'></i> Submit Required Documents</h2>
                                        <div class="" style="margin-right: 300px;">
                                            <p class="mb-4 text-muted ">Submit valid business and identity documents to proceed. We keep your data safe and use it only for verification purposes.</p>
                                        </div>
                                        <hr class="my-4">
                                        <h6 class="mt-4 text-primary"><i class='bx  bx-edit-alt'></i> Personal identity</h6>

                                        <div class="row g-3">
                                            <!-- 1 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">1. Aadhaar Card :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" onchange="validateFile(this, 'AadhaarMsg','aadhaarpreview')" class="form-control" id="inputGroupFile01" accept=".pdf,.jpeg,.jpg,.png,.webp" name="aadhaarfile">
                                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>

                                                </div>
                                                <?php if (!empty($docData['aadhaarfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['aadhaarfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="AadhaarMsg"></span>

                                            </div>
                                            <!-- 2 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">2. Pan Card :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile02" onchange="validateFile(this, 'PanMsg','panpreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="personalpanfile">
                                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['personalpanfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['personalpanfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>

                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="PanMsg"></span>
                                            </div>
                                            <!-- 3 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">3. Photograph :</label>

                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile03" onchange="validateFile(this, 'PhotoMsg','photographpreview')" accept=".jpeg,.jpg,.png,.webp" name="photograph">
                                                    <label class="input-group-text" for="inputGroupFile03">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['photograph'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['photograph'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>

                                                <span id="PhotoMsg"></span>

                                            </div>
                                            <!-- 4 -->
                                            <div class="col-12 col-lg-6 mb-3">

                                                <label class="form-label fw-semibold">4. Address :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile04" onchange="validateFile(this, 'AddressMsg','addressfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="addressfile">
                                                    <label class="input-group-text" for="inputGroupFile04">Upload</label>
                                                </div> <?php if (!empty($docData['addressfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['addressfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <p class="" style="color:red">(Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bill/ Voter ID Card) Not older than 3 months </p>
                                                <span id="AddressMsg"></span>
                                            </div>

                                            <h6 class="mt-4 mb-2 text-primary"><i class='bx  bx-edit-alt'></i> Business identity</h6>
                                            <!-- 1 -->


                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold ">5. Certificate of Incorporation (COI) / Business Registration Certificate :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile05" onchange="validateFile(this, 'CoiMsg','coifilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="coifile">
                                                    <label class="input-group-text" for="inputGroupFile05">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['coifile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['coifile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="CoiMsg"></span>

                                            </div>
                                            <!-- 2 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">6. Memorandum of Association (MOA) :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile06" onchange="validateFile(this, 'MoaMsg','moafilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="moafile">
                                                    <label class="input-group-text" for="inputGroupFile06">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['moafile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['moafile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="MoaMsg"></span>

                                            </div>
                                            <!-- 3 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">7. Articles of Association (AOA) :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile07" onchange="validateFile(this, 'AoaMsg','aoafilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="aoafile">
                                                    <label class="input-group-text" for="inputGroupFile07">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['aoafile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['aoafile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="AoaMsg"></span>

                                            </div>
                                            <!-- 4 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">8. Board Resolution (BR) / Letter of Authorization for Signatory :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile08" onchange="validateFile(this, 'BrMsg','brfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="brfile">
                                                    <label class="input-group-text" for="inputGroupFile08">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['brfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['brfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="BrMsg"></span>

                                            </div>
                                            <!-- 5 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">9. UDYAM Registration Certificate (If Available) :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile09" onchange="validateFile(this, 'UdyamMsg','udyamfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="udyamfile">
                                                    <label class="input-group-text" for="inputGroupFile09">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['udyamfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['udyamfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="UdyamMsg"></span>

                                            </div>
                                            <!-- 6 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">10. GSTIN Certificate :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile010" onchange="validateFile(this, 'GstinMsg','gstinfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="gstinfile">
                                                    <label class="input-group-text" for="inputGroupFile010">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['gstinfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['gstinfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="GstinMsg"></span>

                                            </div>
                                            <!-- 7 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">11. List of Directors/Partners/Beneficial Ownership (BO) :</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile011" onchange="validateFile(this, 'BoMsg','bofilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="bofile">
                                                    <label class="input-group-text" for="inputGroupFile011">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['bofile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['bofile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <span id="BoMsg"></span>

                                            </div>
                                            <!-- 8 -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">12. Rent Agreement / Lease Agreement / Property Tax Receipt :</label>

                                                <div class="input-group mb-3 mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'RentMsg','rentfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="rentfile">
                                                    <label class="input-group-text" for="inputGroupFile012">Upload</label>
                                                </div>
                                                <?php if (!empty($docData['rentfile'])): ?>
                                                    <p>
                                                        <a href="<?= $docData['rentfile'] ?>" target="_blank">
                                                            View uploaded file
                                                        </a>
                                                    </p>
                                                <?php else: ?>
                                                    <p style="color: #888;">No file uploaded</p>
                                                <?php endif; ?>
                                                <p class="" style="color:red">(Mandatory if there is a change in address of Principal Place Of Business )</p>
                                                <span id="RentMsg"></span>

                                            </div>
                                            <!-- 9 -->



                                            <div class="col-12">
                                                <div class="d-flex gap-3">
                                                    <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                    <button type="button" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3);" class="btn btn-primary px-4" onclick="stepper3.next()">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- declarations -->
                                    <div id="test-vl-5" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger5">
                                        <h2 class="fs-2 " style="color:rgb(7, 104, 231)"><i class='bx  bx-edit-alt'></i> Authorized Declarations & Consent</h2>
                                        <div class="" style="margin-right: 300px;">
                                            <p class="mb-4 text-muted ">Read the following declarations carefully. These include your consent to data usage, identity verification, and acceptance of platform terms and conditions.</p>
                                        </div>
                                        <hr class="my-4">
                                        <h6 class="mt-4 text-primary mb-3">Annexure A</h6>
                                        <div class="row g-3">
                                            <!-- 1 -->

                                            <div class="col-12 col-lg-6">
                                                <label class="form-label fw-semibold ">1. Total Volumes in amount and number of users</label>
                                                <div class="d-flex gap-2 mt-1">
                                                    <div>
                                                        <p>a. Volumes in amount</p>
                                                        <input type="text" class="form-control mt-1" name="totalvolume" onblur="setPreviewValue(this, 'totalvolumevalue')" value="<?= htmlspecialchars($appData['totalvolume']) ?>">
                                                    </div>
                                                    <div>
                                                        <p>b. Number of users</p>
                                                        <input type="text" class="form-control mt-1" name="numberofusers" onblur="setPreviewValue(this, 'numberofusersvalue')" value="<?= htmlspecialchars($appData['numberofusers']) ?>">
                                                    </div>
                                                </div>
                                                <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                            </div>
                                            <!-- 2 -->

                                            <div class="col-12 col-lg-6">
                                                <label class="form-label fw-semibold ">2. Projections for the next six months</label>
                                                <div class="d-flex gap-2 mt-1">
                                                    <div>
                                                        <p>a. Amount</p>
                                                        <input type="text" class="form-control mt-1" name="sixmonthprojectionamount" onblur="setPreviewValue(this, 'sixmonthprojectionamountvalue')" value="<?= htmlspecialchars($appData['sixmonthprojectionamount']) ?>">
                                                    </div>
                                                    <div>
                                                        <p>b. Number of Users</p>
                                                        <input type="text" class="form-control mt-1" name="sixmonthprojectionuser" onblur="setPreviewValue(this, 'sixmonthprojectionuservalue')" value="<?= htmlspecialchars($appData['sixmonthprojectionuser']) ?>">
                                                    </div>
                                                </div>
                                                <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                            </div>

                                            <!-- 3 -->

                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">3. Number of transactions /frequencies in a day</label>
                                                <input type="text" class="form-control" placeholder="No. of transactions" name="numoftransactions" onblur="setPreviewValue(this, 'numoftransactionsvalue')" value="<?= htmlspecialchars($appData['numoftransactions']) ?>">
                                            </div>

                                            <!-- 4 -->

                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">4. Volume of total amount disbursed /distributed in a day</label>
                                                <input type="text" class="form-control" placeholder="Amount" name="disbursedamount" onblur="setPreviewValue(this, 'disbursedamountvalue')" value="<?= htmlspecialchars($appData['disbursedamount']) ?>">
                                            </div>

                                            <!-- 5 -->

                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold ">5. Minimum and Maximum transaction amount</label>
                                                <div class="d-flex gap-2 mt-1">
                                                    <div>
                                                        <p>a. Minimum Amount</p>
                                                        <input type="text" class="form-control mt-1" name="mintransaction" onblur="setPreviewValue(this, 'mintransactionvalue')" value="<?= htmlspecialchars($appData['mintransaction']) ?>">
                                                    </div>
                                                    <div>
                                                        <p>b. Maximum Amount</p>
                                                        <input type="text" class="form-control mt-1" name="maxtransaction" onblur="setPreviewValue(this, 'maxtransactionvalue')" value="<?= htmlspecialchars($appData['maxtransaction']) ?>">
                                                    </div>
                                                </div>
                                                <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                            </div>

                                            <!-- 6 -->

                                            <div class="col-12 col-lg-6">
                                                <label class="form-label fw-semibold">6. Threshold limit and/or daily payout that can be fixed</label>
                                                <input type="text" class="form-control" placeholder="" name="thresholdlimit" onblur="setPreviewValue(this, 'thresholdlimitvalue')" value="<?= htmlspecialchars($appData['thresholdlimit']) ?>">
                                            </div>


                                            <h6 class="mt-4 text-primary ">Annexure B</h6>
                                            <!-- /////////////////////////////////// -->
                                            <div class="col-12 col-lg-12 mb-3">
                                                <div class="card shadow-sm" style="max-width: 500px;">
                                                    <div class="card-body">


                                                        <!-- File Preview (PDF in iframe) -->
                                                        <div class="mb-3">
                                                            <?php if (!empty($docData['annexurebfile']) && file_exists($docData['annexurebfile'])): ?>
                                                                <iframe
                                                                    src="<?= htmlspecialchars($docData['annexurebfile']) ?>"
                                                                    width="100%"
                                                                    height="400px"
                                                                    style="border: 1px solid #ccc;"
                                                                    title="Annexure B Preview">
                                                                </iframe>
                                                            <?php else: ?>
                                                                <p style="color: #888;">No Annexure B file uploaded</p>
                                                            <?php endif; ?>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <!-- //////////////////////////////////////// -->

                                            <div class="col-12 col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">7. Download the form, add your signature and stamp, and upload it back here</label>

                                                <div class="input-group mb-3 mb-3">
                                                    <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'UploadtMsg','annexurebfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="annexurebfile">
                                                    <label class="input-group-text" for="inputGroupFile012">Upload</label>
                                                </div>
                                                <p class="text-secondary">Download the form, add your signature and stamp, and upload it back here.</p>
                                                <span id="UploadtMsg"></span>

                                            </div>


                                            <div class="col-12">
                                                <div class="d-flex gap-3">
                                                    <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                    <button type="button" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3);" class="btn btn-primary px-4" onclick="stepper3.next()">Next</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- submission form -->
                                    <div id="test-vl-6" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger6">

                                        <h2 class="fs-2 " style="color:rgb(7, 104, 231)"><i class='bx  bx-edit-alt'></i> Submit Your Application</h2>
                                        <div class="" style="margin-right: 300px;">
                                            <p class="mb-4 text-muted ">This is the final step. Ensure all fields are correctly filled and documents uploaded. After submission, you’ll receive a confirmation shortly.</p>
                                        </div>
                                        <hr class="my-4">
                                        <!-- pdf html template -->
                                        <div class="container border p-4 bg-white" id="kycPreview" style="
                                            width: 210mm;
                                            height: auto;
                                            overflow-y: scroll;
                                            padding: 15mm 10mm;
                                            background: white;
                                            
                                            font-size: 12px; h4,
                                            h5 {
                                               page-break-after: avoid;
                                               margin-top: 24px;
                                               font-weight: bold;
                                               color:rgb(1, 60, 123);
                                            }">

                                            <!-- timestamp -->
                                            <table class="table" id="kycPreview" style="border: none !important;">
                                                <thead style="border: none !important;">
                                                    <tr style="border: none !important;">
                                                        <td colspan="2" class="text-end" style="border: none !important;">
                                                            <strong>Date & Time:</strong> <span id="currentDateTime"></span>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <!-- rest of your table rows go here... -->
                                            </table>




                                            <!--  -->


                                            <div class="text-center mb-4" style="margin-top:-75px">
                                                <img src="./assets/images/itstarlogo.png" alt="Logo" style="max-height: 65px;">
                                                <h4 class="text-medium">Staar Payout Private Limited</h4>
                                                <h5 class="mt-2 fw-bold " style="color:rgb(3, 106, 216);">MERCHANT ONBOARDING FORM</h5>
                                            </div>

                                            <!-- 1. Business Details -->
                                            <h5 class="fw-bold " style="color:rgb(3, 106, 216); margin-top:-15px">1. Business Details</h5>
                                            <table class="table table-bordered align-middle">
                                                <tr>
                                                    <td style="width: 40%;">Business Name</td>
                                                    <td style="width: 60%;"><span id="businessnamevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Type of Entity</td>
                                                    <td><span id="entityvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Incorporation</td>
                                                    <td><span id="doivalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Nature of Business</td>
                                                    <td><span id="nobvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business Category</td>
                                                    <td><span id="businesscategoryvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business Sub-Category</td>
                                                    <td><span id="businesssubcategoryvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>GSTIN</td>
                                                    <td><span id="gstinvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business PAN Number</td>
                                                    <td><span id="businesspanvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Registered Business Address</td>
                                                    <td><span id="registeredbsuinessvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Operating Address (if different)</td>
                                                    <td><span id="operatingaddressvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Website URL</td>
                                                    <td><span id="urlvalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Application Name</td>
                                                    <td><span id="applicantnamevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Business Contact Number</td>
                                                    <td><span id="businessnumbervalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Support Email ID</td>
                                                    <td><span id="supportemailvalue"></span></td>
                                                </tr>
                                            </table>

                                            <!-- 2. Authorized Signatory -->
                                            <div>
                                                <h5 class="fw-bold  mt-1" style="color:rgb(3, 106, 216); page-break-before: always;">2. Authorized Signatory Details</h5>
                                                <table class="table table-bordered align-middle">
                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td><span id="fullnamevalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation</td>
                                                        <td><span id="designationvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><span id="numbervalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email ID</td>
                                                        <td><span id="personalemailvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aadhaar Number</td>
                                                        <td><span id="aadhaarnumbervalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PAN Number</td>
                                                        <td><span id="pannumbervalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Passport-size Photograph</td>
                                                        <td>TO BE ATTACHED SEPARATELY</td>
                                                    </tr>
                                                </table>
                                            </div><br>

                                            <!-- 3. Authorized Signatory 2 -->
                                            <div style="">
                                                <h5 class="fw-bold mt-2" style="color:rgb(3, 106, 216);">3. Authorized Signatory Details 2 (If any)</h5>
                                                <table class="table table-bordered align-middle">
                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td><span id="fullnameadnvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation</td>
                                                        <td><span id="designationadnvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><span id="numberadnvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email ID</td>
                                                        <td><span id="personalemailadnvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aadhaar Number</td>
                                                        <td><span id="aadhaarnumberadnvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PAN Number</td>
                                                        <td><span id="pannumberadnvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Passport-size Photograph</td>
                                                        <td>TO BE ATTACHED SEPARATELY</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <!-- 4. Bank Account Details -->
                                            <h5 class="fw-bold  mt-4" style="color:rgb(3, 106, 216);">4. Bank Account Details</h5>
                                            <table class="table table-bordered align-middle">
                                                <tr>
                                                    <td>Account Holder Name</td>
                                                    <td><span id="accountnamevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Bank Name</td>
                                                    <td><span id="banknamevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Branch Name</td>
                                                    <td><span id="branchnamevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Number</td>
                                                    <td><span id="accountnumbervalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>IFSC Code</td>
                                                    <td><span id="ifsccodevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Type</td>
                                                    <td><span id="accounttypevalue"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Cancelled Cheque</td>
                                                    <td>TO BE ATTACHED SEPARATELY</td>
                                                </tr>
                                            </table>

                                            <!-- document -->

                                            <h5 class="fw-bold  " style="color:rgb(3, 106, 216); page-break-before: always; margin-top:-15px">5. Documents uploaded</h5>
                                            <table class="table table-bordered mt-4">
                                                <thead>
                                                    <tr>
                                                        <th>Document</th>
                                                        <th>Uploaded File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aadhaar Card</td>
                                                        <td>
                                                            <div id="aadhaarpreview"> <?php if (!empty($docData['aadhaarfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['aadhaarfile'] ?>" target="_blank">
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
                                                            <div id="panpreview"><?php if (!empty($docData['pan'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['panfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Photograph</td>
                                                        <td>
                                                            <div id="photographpreview"><?php if (!empty($docData['photograph'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['photograph'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</td>
                                                        <td>
                                                            <div id="addressfilepreview"><?php if (!empty($docData['addressfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['addressfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Certificate of Incorporation (COI) / Business Registration Certificate</td>
                                                        <td>
                                                            <div id="coifilepreview"><?php if (!empty($docData['coifile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['coifile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Memorandum of Association (MOA)</td>
                                                        <td>
                                                            <div id="moafilepreview"><?php if (!empty($docData['moafile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['moafile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Articles of Association (AOA) </td>
                                                        <td>
                                                            <div id="aoafilepreview"><?php if (!empty($docData['aoafile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['aoafile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Board Resolution (BR) / Letter of Authorization for Signatory</td>
                                                        <td>
                                                            <div id="brfilepreview"><?php if (!empty($docData['brfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['brfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>UDYAM Registration Certificate (If Available)</td>
                                                        <td>
                                                            <div id="udyamfilepreview"><?php if (!empty($docData['udyamfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['udyamfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GSTIN Certificate</td>
                                                        <td>
                                                            <div id="gstinfilepreview"><?php if (!empty($docData['gstinfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['gstinfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>List of Directors/Partners/Beneficial Ownership (BO)</td>
                                                        <td>
                                                            <div id="bofilepreview"><?php if (!empty($docData['bofile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['bofile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <td>Cancelled Cheque</td>
                                                        <td>
                                                            <div id="cancelledchequefile"><?php if (!empty($docData['cancelledchequefile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['cancelledchequefile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rent Agreement / Lease Agreement / Property Tax Receipt (Mandatory if there is a change in address of Principal Place Of Business ) *</td>
                                                        <td>
                                                            <div id="rentfilepreview"><?php if (!empty($docData['rentfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['aadhaarrentfilefile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ANNEXURE B Form with Signature and Stamp</td>
                                                        <td>
                                                            <div id="annexurebfilepreview"><?php if (!empty($docData['annexurebfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['annexurebfile'] ?>" target="_blank">
                                                                            View uploaded file
                                                                        </a>
                                                                    </p>
                                                                <?php else: ?>
                                                                    <p style="color: #888;">No file uploaded</p>
                                                                <?php endif; ?></div>
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
                                                            a. Volumes in amount: <span id="totalvolumevalue"></span><br>
                                                            b. Number of users: <span id="numberofusersvalue"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">2. Projections for the next six months</td>
                                                        <td>
                                                            a. Amount: <span id="sixmonthprojectionamountvalue"></span><br>
                                                            b. Number of users: <span id="sixmonthprojectionuservalue"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">3. Number of transactions / frequencies in a day</td>
                                                        <td><span id="numoftransactionsvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">4. Volume of total amount disbursed / distributed in a day</td>
                                                        <td><span id="disbursedamountvalue"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">5. Minimum and Maximum transaction amount</td>
                                                        <td>
                                                            a. Minimum Amount: <span id="mintransactionvalue"></span><br>
                                                            b. Maximum Amount: <span id="maxtransactionvalue"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">6. Threshold limit and/or daily payout that can be fixed</td>
                                                        <td><span id="thresholdlimitvalue"></span></td>
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
                                                    <li class="d-flex align-items-center" style="margin-top: 95px;"></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
                                            <p class="mb-2 mt-3"> File will be downloaded with your attached Documents * </p>
                                            <button type="button" class="btn text-center btn-primary mb-4" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;" onclick="downloadKYC()">Download KYC PDF</button>
                                        </div>


                                        <!--  -->
                                        <!-- declaration points -->
                                        <div class="row g-3 mt-4">
                                            <p class=" text-muted">
                                                Kindly update merchant's application status.*
                                            </p>
                                            <div class="col-md-6 ">
                                                <?php $selectedEntity3 = $appData['status'] ?? ''; ?>
                                                <label class="form-label">Appplication Status</label>
                                                <select class="form-select" name="status" onblur="setPreviewValue(this, 'statusvalue')">
                                                    <option value="" disabled>-- please select -- </option>
                                                    <option value="In Review" <?= $selectedEntity3 === 'In Review' ? 'selected' : '' ?>>In Review</option>
                                                    <option value="Verified" <?= $selectedEntity3 === 'Verified' ? 'selected' : '' ?>>Verified</option>
                                                    <option value="Cancelled" <?= $selectedEntity3 === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                    <option value="Pending" <?= $selectedEntity3 === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                    <option value="Documents not completed<">Documents not completed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label">Comment</label>
                                                <input type="text" class="form-control" name="comment" id="comment" onblur="setPreviewValue(this, 'commentvalue')" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['coment']) ?>">
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <div class="d-flex gap-3">

                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="submit" class="btn btn-success px-4" style="box-shadow: 0 0.5rem 1rem rgba(13, 253, 137, 0.62);">Update Application</button>
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



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>

    <!-- html2pdf for converting HTML to PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- pdf-lib for merging PDFs/images -->
    <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/chartjs/js/chart.js"></script>
    <script src="assets/js/index.js"></script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
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

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const fileFields = [
                'aadhaarfile', 'panfile', 'photograph', 'addressfile', 'coifile',
                'moafile', 'aoafile', 'brfile', 'udyamfile', 'gstinfile',
                'bofile', 'cancelledchequefile', 'rentfile', 'annexurebfile'
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
            const element = document.getElementById('kycPreview');
            const businessName = document.getElementById('nob')?.value.trim() || 'KYC';
            const cleanName = businessName.replace(/[^a-zA-Z0-9]/g, '_');

            const previewIds = [
                'aadhaarpreview', 'panpreview', 'photographpreview',
                'addressfilepreview', 'coifilepreview', 'moafilepreview',
                'aoafilepreview', 'brfilepreview', 'udyamfilepreview',
                'gstinfilepreview', 'bofilepreview', 'rentfilepreview',
                'annexurebfilepreview', 'cancelledchequefile'
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
                    const {
                        width,
                        height
                    } = embedded.scale(0.5);
                    page.drawImage(embedded, {
                        x: 50,
                        y: page.getHeight() - height - 50,
                        width,
                        height
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




    <!-- //////////////// -->


    <!-- timestamp for pdf -->
    <script>
        window.onload = function() {
            const now = new Date();
            const formatted = now.toLocaleString('en-IN', {
                dateStyle: 'medium',
                timeStyle: 'short'
            });

            document.getElementById('currentDateTime').textContent = formatted;
        };
    </script>

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


    <!-- pan validation  -->

    <script>
        const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

        function validatePAN(input, errorId, targetId) {
            const value = input.value.trim().toUpperCase();
            input.value = value;

            const errorEl = document.getElementById(errorId);
            const targetEl = document.getElementById(targetId);

            // Preview always shows the entered value
            if (targetEl) {
                targetEl.textContent = value || '—';
            }

            // Validation
            if (!value || !panRegex.test(value)) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                if (errorEl) errorEl.classList.remove('d-none');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                if (errorEl) errorEl.classList.add('d-none');
            }
        }
    </script>


    <!-- ///////////////// -->

    <!-- phone validation -->

    <script>
        function validatePhone(input, errorId, targetId) {
            const value = input.value.trim();
            const errorEl = document.getElementById(errorId);
            const targetEl = document.getElementById(targetId);

            // Always update preview
            if (targetEl) {
                targetEl.textContent = value || '—';
            }

            // Indian mobile validation: starts with 6-9 and 10 digits
            const phoneRegex = /^[6-9]\d{9}$/;

            if (!value || !phoneRegex.test(value)) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                if (errorEl) errorEl.classList.remove('d-none');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                if (errorEl) errorEl.classList.add('d-none');
            }
        }
    </script>



    <!-- //////// -->

    <!-- aadhaar number validation -->
    <script>
        function validateAadhaar(input, errorId, targetId) {
            const value = input.value.trim();
            const errorEl = document.getElementById(errorId);
            const targetEl = document.getElementById(targetId);

            // ✅ Always update preview span — even if invalid
            if (targetEl) {
                targetEl.textContent = value || '—';
            }

            // ✅ Aadhaar validation: 12 digits, starts with 2-9
            const aadhaarRegex = /^[2-9][0-9]{11}$/;

            if (!aadhaarRegex.test(value)) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                if (errorEl) errorEl.classList.remove('d-none');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                if (errorEl) errorEl.classList.add('d-none');
            }
        }
    </script>

    <!-- //////////////////// -->

    <!-- validate email -->

    <script>
        function validateEmail(input, errorId, targetId) {
            const value = input.value.trim();
            const errorEl = document.getElementById(errorId);
            const targetEl = document.getElementById(targetId);

            // ✅ Always update preview
            if (targetEl) {
                targetEl.textContent = value || '—';
            }

            // ✅ Basic email regex
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(value)) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                if (errorEl) errorEl.classList.remove('d-none');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                if (errorEl) errorEl.classList.add('d-none');
            }
        }
    </script>


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

</body>

</html>