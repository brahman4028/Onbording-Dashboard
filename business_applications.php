<?php include 'db.php'; ?>

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
        <header class="login-header shadow">
            <nav class="navbar navbar-expand-lg navbar-light rounded-0 bg-white  rounded-0 shadow-none border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo-img.png" width="140" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav ms-auto mb- mb-lg-0">
                            <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#"><i class='bx bx-home-alt me-1'></i>Home</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-user me-1'></i>About</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-category-alt me-1'></i>Features</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="#"><i class='bx bx-microphone me-1'></i>Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <form action="action.php" method="POST" enctype="multipart/form-data">
            <div style=" margin-bottom:0px !important; flex:1; height:100%;">
                <div class="card" style="height: 100%;">
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
                                                <p class="mb-0 steper-sub-title">Enter Your Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-2">
                                        <div class="step-trigger" role="tab" id="stepper3trigger2" aria-controls="test-vl-2">
                                            <div class="bs-stepper-circle"><i class='bx bx-user fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Authorized Signatory Details</h5>
                                                <p class="mb-0 steper-sub-title">Setup Account Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-3">
                                        <div class="step-trigger" role="tab" id="stepper3trigger3" aria-controls="test-vl-3">
                                            <div class="bs-stepper-circle"><i class='bx bx-file fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Documents Upload</h5>
                                                <p class="mb-0 steper-sub-title">Education Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-4">
                                        <div class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-vl-4">
                                            <div class="bs-stepper-circle"><i class='bx  bx-user-check fs-4'></i> </div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Declarations</h5>
                                                <p class="mb-0 steper-sub-title">Experience Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-5">
                                        <div class="step-trigger" role="tab" id="stepper3trigger5" aria-controls="test-vl-5">
                                            <div class="bs-stepper-circle"><i class='bx  bx-badge-check fs-4'></i> </div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Final Submission</h5>
                                                <p class="mb-0 steper-sub-title">Experience Details</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- help -->
                                <div class="bs-stepper-header">
                                    <div class="help " style="margin-top: 85px;">
                                        <div class="bs-stepper text-primary"><i class='bx  bx-info-circle fs-3 '></i> </div>
                                        <h5>Having Trouble?</h5>
                                        <p class="text-muted">It is a long established fact that a reader<br> will be distracted by the readable content <br>of a page when looking at its layout.</p>
                                        <button type="button" class="btn btn-primary  d-flex f-cloumn justify-content-center fs-6 b" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;">Get in Touch <div class="text-light ms-1"><i class='bx  bx-paper-plane fs-4 '></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-content position-relative px-5 py-5 " style="height: 750px; overflow-y: auto !important;">

                                <!-- welcome screen page  -->
                                <div class="position-absolute top-0 start-0 w-100 vh-100 z-3 ps-5 pt-5 d-flex justify-content-between "
                                    style="background-image: url('./assets/images/welcomescreen.png'); 
                                            background-size: cover; 
                                            background-position: center center; 
                                            background-attachment: scroll;
                                            background-color:white; flex-direction:column;" id="startonboardingpage">

                                    <div>
                                        <h1 class="fw-light">Welcome to ItStarPay</h1>
                                        <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content <br>of a page when looking at its layout.</p>
                                        <button onclick="startOnboardingProcess()" type="button" class="btn btn-primary rounded-lg d-flex f-cloumn justify-content-center fs-6 shadow-primary bg-primary" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;">Start Your Onboarding process <div class="text-light ms-1 "><i class='bx  bx-heart fs-4 '></i></button>
                                    </div>
                                    <div style="width: 900px; " class="ms-auto	">
                                        <img src="./assets/images/dashb.png" alt="User Avatar" class="img-fluid rounded shadow" width="100%">

                                    </div>
                                </div>
                                <!-- ///////////// -->

                                <!-- business details -->

                                <div id="test-vl-1" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger1">
                                    <h2 class="fs-2 " style="color:rgb(7, 104, 231)">Set Up Your Business Profile</h2>
                                    <div class="" style="margin-right: 300px;">
                                        <p class="mb-4 text-muted ">Please fill in your business information to help us verify your identity and activate features like vendor payouts, salary disbursements, and invoice management..</p>
                                    </div>
                                    <hr class="my-4">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Business Name</label>
                                            <input type="text" class="form-control" name="businessname" id="nob" onblur="setPreviewValue(this, 'businessnamevalue')">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Type of Entity</label>
                                            <select class="form-select" name="entity" onblur="setPreviewValue(this, 'entityvalue')">
                                                <option selected disabled>--Select--</option>
                                                <option value="Proprietorship">Proprietorship</option>
                                                <option value="Partnership">Partnership</option>
                                                <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                                                <option value="LLP">LLP</option>
                                                <option value="Public Ltd.">Public Ltd.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Incorporation</label>
                                            <input type="date" class="form-control" name="doi" placeholder="Enter Date in DD/MM/YYYY format" onblur="setPreviewValue(this, 'doivalue')"><br>
                                            <small class="text-muted">Enter date in DD/MM/YYYY format</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nature of Business</label>
                                            <input type="text" class="form-control" name="nob" onblur="setPreviewValue(this, 'nobvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Category</label>
                                            <input type="text" class="form-control" name="businesscategory" onblur="setPreviewValue(this, 'businesscategoryvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Sub-Category</label>
                                            <input type="text" class="form-control" name="businesssubcategory" onblur="setPreviewValue(this, 'businesssubcategoryvalue')">
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <label class="form-label">GSTIN</label>
                                            <input type="text" class="form-control" name="gstin">
                                        </div> -->
                                        <div class="col-md-6">
                                            <label for="gstin" class="form-label">GSTIN</label>
                                            <input type="text" class="form-control" id="gstin" name="gstin" onblur="setPreviewValue(this, 'gstinvalue')">
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
                                            <input type="text" class="form-control " name="pan" id="businesspan" onblur="validatePAN(this, 'error-businesspan','businesspanvalue')" placeholder="ABCDE1234F">
                                            <div class="text-danger mt-1 d-none" id="error-businesspan">Invalid PAN format (e.g., AAAAA9999A)</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Registered Business Address</label>
                                            <input type="text" class="form-control" name="registeredbsuiness" onblur="setPreviewValue(this, 'registeredbsuinessvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Operating Address</label>
                                            <input type="text" class="form-control" name="operatingaddress" onblur="setPreviewValue(this, 'operatingaddressvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Website URL</label>
                                            <input type="text" class="form-control" name="url" onblur="setPreviewValue(this, 'urlvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Application Name</label>
                                            <input type="text" class="form-control" name="applicantname" onblur="setPreviewValue(this, 'applicantnamevalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Contact Number</label>
                                            <input type="text" class="form-control" name="businessnumber" id="businessnumber" onblur="validatePhone(this, 'businessnumber-error', 'businessnumbervalue')" placeholder="9876543210">
                                            <div id="businessnumber-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alternate Contact Number</label>
                                            <input type="text" class="form-control" name="alternnumber" id="alternnumber" onblur="validatePhone(this, 'alternnumber-error', 'alternnumbervalue')" placeholder="9876543210">
                                            <div id="alternnumber-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="supportemail" class="form-label">Support Email ID</label>
                                            <input type="email" class="form-control" id="supportemail" name="supportemail" onblur="validateEmail(this, 'supportemail-error', 'supportemailvalue')" placeholder="name@example.com">
                                            <div id="supportemail-error" class="text-danger mt-1 d-none">
                                                ❌ Please enter a valid email address
                                            </div>
                                        </div>





                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- authorization details -->
                                <div id="test-vl-2" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger2">

                                    <h2 class=" fs-2 " style="color:rgb(7, 104, 231)">Authorized Signatory Details</h2>
                                    <div class="" style="margin-right: 300px;">
                                        <p class="mb-4 text-muted ">PPlease provide the details of the person authorized to sign documents and make decisions on behalf of the business. This is required for verification and legal compliance.</p>
                                    </div>
                                    <hr class="my-4">

                                    <h6 class="mt-2 text-primary">Authorized Director 1</h6><br>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" onblur="setPreviewValue(this, 'fullnamevalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" name="designation" onblur="setPreviewValue(this, 'designationvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="number" id="number" onblur="validatePhone(this, 'number-error', 'numbervalue')" placeholder="9876543210">
                                            <div id="number-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control" id="personalemail" name="personalemail" onblur="validateEmail(this, 'personalemail-error', 'personalemailvalue')" placeholder="name@example.com">
                                            <div id="personalemail-error" class="text-danger mt-1 d-none">
                                                ❌ Please enter a valid email address
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aadhaar Number</label>
                                            <input type="text" class="form-control" name="aadhaarnumber" id="aadhaarnumber" placeholder="Enter 12-digit Aadhaar number" maxlength="12"
                                                onblur="validateAadhaar(this, 'aadhaarnumber-error', 'aadhaarnumbervalue')">
                                            <div id="aadhaarnumber-error" class="text-danger d-none">Please enter a valid 12-digit Aadhaar number.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">PAN Number</label>
                                            <input type="text" class="form-control" name="pannumber" id="pannumber" onblur="validatePAN(this, 'error-pannumber','pannumbervalue')" placeholder="ABCDE1234F">
                                            <div class="text-danger mt-1 d-none" id="error-pannumber">Invalid PAN format (e.g., AAAAA9999A)</div>
                                        </div>

                                        <h6 class="mt-4 text-primary">Authorized Director 2 (If any)</h6><br>

                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullnameadn" onblur="setPreviewValue(this, 'fullnameadnvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" name="designationadn" onblur="setPreviewValue(this, 'designationadnvalue')">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="numberadn" id="numberadn" onblur="validatePhone(this, 'numberadn-error', 'numberadnvalue')" placeholder="9876543210">
                                            <div id="numberadn-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control" id="personalemailadn" name="personalemailadn" onblur="validateEmail(this, 'personalemailadn-error', 'personalemailadnvalue')" placeholder="name@example.com">
                                            <div id="personalemailadn-error" class="text-danger mt-1 d-none">
                                                ❌ Please enter a valid email address
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aadhaar Number</label>
                                            <input type="text" class="form-control" name="aadhaarnumberadn" id="aadhaarnumberadn" placeholder="Enter 12-digit Aadhaar number" maxlength="12"
                                                onblur="validateAadhaar(this, 'aadhaarnumberadn-error', 'aadhaarnumberadnvalue')">
                                            <div id="aadhaarnumberadn-error" class="text-danger d-none">Please enter a valid 12-digit Aadhaar number.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">PAN Number</label>
                                            <input type="text" class="form-control" name="pannumberadn" id="pannumberadn" onblur="validatePAN(this, 'error-pannumberadn','pannumberadnvalue')" placeholder="ABCDE1234F">
                                            <div class="text-danger mt-1 d-none" id="error-pannumberadn">Invalid PAN format (e.g., AAAAA9999A)</div>
                                        </div>

                                        <div class="d-flex gap-3">
                                            <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        </div>
                                    </div>






                                </div>
                                <!-- document submission -->
                                <div id="test-vl-3" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger3">

                                    <h2 class="fs-2 " style="color:rgb(7, 104, 231)">Submit Required Documents</h2>
                                    <div class="" style="margin-right: 300px;">
                                        <p class="mb-4 text-muted ">PSubmit valid business and identity documents to proceed. We keep your data safe and use it only for verification purposes.</p>
                                    </div>
                                    <hr class="my-4">
                                    <h6 class="mt-4 text-primary">Personal identity</h6>

                                    <div class="row g-3">
                                        <!-- 1 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">1. Aadhaar Card :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" onchange="validateFile(this, 'AadhaarMsg','aadhaarpreview')" class="form-control" id="inputGroupFile01" accept=".pdf,.jpeg,.jpg,.png,.webp" name="aadhaarfile">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>

                                            </div>
                                            <span id="AadhaarMsg"></span>

                                        </div>
                                        <!-- 2 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">2. Pan Card :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02" onchange="validateFile(this, 'PanMsg','panpreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="personalpanfile">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                            <span id="PanMsg"></span>
                                        </div>
                                        <!-- 3 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">3. Photograph :</label>

                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile03" onchange="validateFile(this, 'PhotoMsg','photographpreview')" accept=".jpeg,.jpg,.png,.webp" name="photograph">
                                                <label class="input-group-text" for="inputGroupFile03">Upload</label>
                                            </div>
                                            <span id="PhotoMsg"></span>

                                        </div>
                                        <!-- 4 -->
                                        <div class="col-12 col-lg-6 mb-3">

                                            <label class="form-label fw-semibold">4. Address :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile04" onchange="validateFile(this, 'AddressMsg','addressfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="addressfile">
                                                <label class="input-group-text" for="inputGroupFile04">Upload</label>
                                            </div>
                                            <p class="" style="color:red">(Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bill/ Voter ID Card) Not older than 3 months </p>
                                            <span id="AddressMsg"></span>
                                        </div>

                                        <h6 class="mt-4 mb-2 text-primary">Business identity</h6>
                                        <!-- 1 -->


                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold ">5. Certificate of Incorporation (COI) / Business Registration Certificate :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile05" onchange="validateFile(this, 'CoiMsg','coifilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="coifile">
                                                <label class="input-group-text" for="inputGroupFile05">Upload</label>
                                            </div>
                                            <span id="CoiMsg"></span>

                                        </div>
                                        <!-- 2 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">6. Memorandum of Association (MOA) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile06" onchange="validateFile(this, 'MoaMsg','moafilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="moafile">
                                                <label class="input-group-text" for="inputGroupFile06">Upload</label>
                                            </div>
                                            <span id="MoaMsg"></span>

                                        </div>
                                        <!-- 3 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">7. Articles of Association (AOA) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile07" onchange="validateFile(this, 'AoaMsg','aoafilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="aoafile">
                                                <label class="input-group-text" for="inputGroupFile07">Upload</label>
                                            </div>
                                            <span id="AoaMsg"></span>

                                        </div>
                                        <!-- 4 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">8. Board Resolution (BR) / Letter of Authorization for Signatory :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile08" onchange="validateFile(this, 'BrMsg','brfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="brfile">
                                                <label class="input-group-text" for="inputGroupFile08">Upload</label>
                                            </div>
                                            <span id="BrMsg"></span>

                                        </div>
                                        <!-- 5 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">9. UDYAM Registration Certificate (If Available) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile09" onchange="validateFile(this, 'UdyamMsg','udyamfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="udyamfile">
                                                <label class="input-group-text" for="inputGroupFile09">Upload</label>
                                            </div>
                                            <span id="UdyamMsg"></span>

                                        </div>
                                        <!-- 6 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">10. GSTIN Certificate :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile010" onchange="validateFile(this, 'GstinMsg','gstinfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="gstinfile">
                                                <label class="input-group-text" for="inputGroupFile010">Upload</label>
                                            </div>
                                            <span id="GstinMsg"></span>

                                        </div>
                                        <!-- 7 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">11. List of Directors/Partners/Beneficial Ownership (BO) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile011" onchange="validateFile(this, 'BoMsg','bofilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="bofile">
                                                <label class="input-group-text" for="inputGroupFile011">Upload</label>
                                            </div>
                                            <span id="BoMsg"></span>

                                        </div>
                                        <!-- 8 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">12. Rent Agreement / Lease Agreement / Property Tax Receipt :</label>

                                            <div class="input-group mb-3 mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'RentMsg','rentfilepreview')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="rentfile">
                                                <label class="input-group-text" for="inputGroupFile012">Upload</label>
                                            </div>
                                            <p class="" style="color:red">(Mandatory if there is a change in address of Principal Place Of Business )</p>
                                            <span id="RentMsg"></span>

                                        </div>
                                        <!-- 9 -->



                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="button" class="btn btn-primary px-4" onclick="stepper3.next()">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- declarations -->
                                <div id="test-vl-4" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                                    <h2 class="fs-2 " style="color:rgb(7, 104, 231)">Authorized Declarations & Consent</h2>
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
                                                    <input type="text" class="form-control mt-1" name="totalvolume" onblur="setPreviewValue(this, 'totalvolumenvalue')">
                                                </div>
                                                <div>
                                                    <p>b. Number of users</p>
                                                    <input type="text" class="form-control mt-1" name="numberofusers" onblur="setPreviewValue(this, 'numberofusersnvalue')">
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
                                                    <input type="text" class="form-control mt-1" name="sixmonthprojectionamount" onblur="setPreviewValue(this, 'sixmonthprojectionamountvalue')">
                                                </div>
                                                <div>
                                                    <p>b. Number of Users</p>
                                                    <input type="text" class="form-control mt-1" name="sixmonthprojectionuser" onblur="setPreviewValue(this, 'sixmonthprojectionuservalue')">
                                                </div>
                                            </div>
                                            <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                        </div>

                                        <!-- 3 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">3. Number of transactions /frequencies in a day</label>
                                            <input type="text" class="form-control" placeholder="No. of transactions" name="numoftransactions" onblur="setPreviewValue(this, 'numoftransactionsvalue')">
                                        </div>

                                        <!-- 4 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">4. Volume of total amount disbursed /distributed in a day</label>
                                            <input type="text" class="form-control" placeholder="Amount" name="disbursedamount" onblur="setPreviewValue(this, 'disbursedamountvalue')">
                                        </div>

                                        <!-- 5 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold ">5. Minimum and Maximum transaction amount</label>
                                            <div class="d-flex gap-2 mt-1">
                                                <div>
                                                    <p>a. Minimum Amount</p>
                                                    <input type="text" class="form-control mt-1" name="mintransaction" onblur="setPreviewValue(this, 'mintransactionvalue')">
                                                </div>
                                                <div>
                                                    <p>b. Maximum Amount</p>
                                                    <input type="text" class="form-control mt-1" name="maxtransaction" onblur="setPreviewValue(this, 'maxtransactionvalue')">
                                                </div>
                                            </div>
                                            <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                        </div>

                                        <!-- 6 -->

                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-semibold">6. Threshold limit and/or daily payout that can be fixed</label>
                                            <input type="text" class="form-control" placeholder="" name="thresholdlimit" onblur="setPreviewValue(this, 'thresholdlimitvalue')">
                                        </div>


                                        <h6 class="mt-4 text-primary ">Annexure B</h6>
                                        <!-- /////////////////////////////////// -->
                                        <div class="col-12 col-lg-12 mb-3">
                                            <div class="card shadow-sm" style="max-width: 500px;">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">Download Your File</h5>
                                                    <p class="card-text text-muted mb-3">Click the button below to preview and download the file.</p>

                                                    <!-- File Preview (PDF in iframe) -->
                                                    <div class="mb-3">
                                                        <iframe
                                                            src="http://localhost//dashboard_marchant/Onbording-Dashboard/assets/pdf/ANNEXUREB.pdf"
                                                            width="100%"
                                                            height="400px"
                                                            style="border: 1px solid #ccc;"
                                                            title="File Preview"></iframe>
                                                    </div>

                                                    <!-- Download Button -->
                                                    <a
                                                        href="/Onbording-Dashboard/assets/pdf/ANNEXUREB.pdf"
                                                        download
                                                        class="btn btn-primary">
                                                        <i class="bi bi-download me-2"></i>Download File
                                                    </a>
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
                                                <button type="button" class="btn btn-primary px-4" onclick="stepper3.next()">Next</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- submission form -->
                                <div id="test-vl-5" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger5">

                                    <h2 class="fs-2 " style="color:rgb(7, 104, 231)">Submit Your Application</h2>
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
                                            <img src="./assets/images/itstarlogo.png" alt="Logo" style="max-height: 70px;">
                                            <h4 class="text-medium">Staar Payout Private Limited</h4>
                                            <h5 class="mt-3 fw-bold " style="color:rgb(3, 106, 216);">MERCHANT ONBOARDING FORM</h5>
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
                                            <h5 class="fw-bold  mt-1" style="color:rgb(3, 106, 216);">2. Authorized Signatory Details</h5>
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
                                        <div style="page-break-before: always;">
                                            <h5 class="fw-bold mt-4" style="color:rgb(3, 106, 216);">3. Authorized Signatory Details 2 (If any)</h5>
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
                                                <td><span id="val_accountholder">TO BE FILLED MANUALLY</span></td>
                                            </tr>
                                            <tr>
                                                <td>Bank Name</td>
                                                <td><span id="val_bankname">TO BE FILLED MANUALLY</span></td>
                                            </tr>
                                            <tr>
                                                <td>Branch Name</td>
                                                <td><span id="val_branchname">TO BE FILLED MANUALLY</span></td>
                                            </tr>
                                            <tr>
                                                <td>Account Number</td>
                                                <td><span id="val_accountnumber">TO BE FILLED MANUALLY</span></td>
                                            </tr>
                                            <tr>
                                                <td>IFSC Code</td>
                                                <td><span id="val_ifsc">TO BE FILLED MANUALLY</span></td>
                                            </tr>
                                            <tr>
                                                <td>Account Type</td>
                                                <td><span id="val_accounttype">TO BE FILLED MANUALLY</span></td>
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
                                                        <div id="aadhaarpreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>PAN Card</td>
                                                    <td>
                                                        <div id="panpreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Photograph</td>
                                                    <td>
                                                        <div id="photographpreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</td>
                                                    <td>
                                                        <div id="addressfilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate of Incorporation (COI) / Business Registration Certificate</td>
                                                    <td>
                                                        <div id="coifilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Memorandum of Association (MOA)</td>
                                                    <td>
                                                        <div id="moafilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CArticles of Association (AOA) </td>
                                                    <td>
                                                        <div id="aoafilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Board Resolution (BR) / Letter of Authorization for Signatory</td>
                                                    <td>
                                                        <div id="brfilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>UDYAM Registration Certificate (If Available)</td>
                                                    <td>
                                                        <div id="udyamfilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>GSTIN Certificate</td>
                                                    <td>
                                                        <div id="gstinfilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>List of Directors/Partners/Beneficial Ownership (BO)</td>
                                                    <td>
                                                        <div id="bofilepreview"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Rent Agreement / Lease Agreement / Property Tax Receipt (Mandatory if there is a change in address of Principal Place Of Business ) *</td>
                                                    <td>
                                                        <div id="rentfilepreview"></div>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>ANNEXURE B Form with Signature and Stamp</td>
                                                    <td>
                                                        <div id="annexurebfilepreview"></div>
                                                    </td>
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
                                                <li class="d-flex align-items-center" style="margin-top: -5px;"><i id="check1" class='bx  bx-checkbox fs-2'></i> I/We confirm that the information provided is true and accurate.</li>
                                                <li class="d-flex align-items-center" style="margin-top: -15px;"><i id="check2" class='bx  bx-checkbox fs-2'></i> I/We authorize ITSTARPAY to verify the submitted information and documents.</li>
                                                <li class="d-flex align-items-center" style="margin-top: -15px;"><i id="check3" class='bx  bx-checkbox fs-2'></i> I/We agree to comply with all applicable RBI, AML, and KYC guidelines.</li>
                                                <li class="d-flex align-items-center" style="margin-top: 35px;"></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn text-center btn-primary mb-4 mt-2" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;" onclick="downloadKYC()">Download KYC PDF</button>
                                    </div>


                                    <!--  -->
                                    <!-- declaration points -->
                                    <div class="row g-3 mt-4">
                                        <p class=" text-muted">
                                            Kindly confirm your acceptance of the terms outlined below before continuing.
                                        </p>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="" id="termsCheckbox" onchange="updateIcon(this, 'check1')" required>
                                            <label class="form-check-label" for="termsCheckbox">
                                                I/We confirm that the information provided is true and accurate.
                                            </label>
                                        </div>

                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="" id="privacyCheckbox" onchange="updateIcon(this, 'check2')" required>
                                            <label class="form-check-label" for="privacyCheckbox">
                                                I/We authorize ITSTARPAY to verify the submitted information and documents.
                                            </label>
                                        </div>

                                        <!-- ////// -->

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="marketingCheckbox" onchange="updateIcon(this, 'check3')" required>
                                            <label class="form-check-label" for="marketingCheckbox">
                                                I/We agree to comply with all applicable RBI, AML, and KYC guidelines.
                                            </label>
                                        </div>





                                        <div class="col-12">
                                            <div class="d-flex gap-3">

                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="submit" class="btn btn-success px-4">Submit</button>
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


    <!-- pdf generator -->
    <script>
        function downloadKYC() {
            const element = document.getElementById('kycPreview');
            const businessName = document.getElementById('nob').value.trim() || 'KYC';

            // Sanitize filename (remove spaces/special chars)
            const cleanName = businessName.replace(/[^a-zA-Z0-9]/g, '_');


            const opt = {
                margin: 0.8,
                filename: `${cleanName}-KYC-Onboarding.pdf`,
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
            };

            html2pdf().set(opt).from(element).save();
        }
    </script>


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


    <!--  -->


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


    <!-- ////////////// -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.stepper3 = new Stepper(document.querySelector("#stepper3"), {
                linear: false,
                animation: true
            });
        });


        function validateFile(fileInput, spanId, previewId) {
            const messageSpan = document.getElementById(spanId);
            const previewDiv = document.getElementById(previewId);
            const file = fileInput.files[0];

            messageSpan.innerText = '';
            previewDiv.innerHTML = '';


            const allowedTypes = ["application/pdf", "image/jpeg", "image/jpg", "image/png", "image/webp"];
            const maxSize = 2 * 1024 * 1024; // 2 MB

            if (!file) {
                messageSpan.innerText = "❌ No file selected.";
                messageSpan.style.color = "red";
                return false;
            }

            if (!allowedTypes.includes(file.type)) {
                messageSpan.innerText = "❌ Invalid file type.";
                messageSpan.style.color = "red";
                fileInput.value = "";
                return false;
            }

            if (file.size > maxSize) {
                messageSpan.innerText = "❌ File size exceeds 2MB.";
                messageSpan.style.color = "red";
                fileInput.value = "";
                return false;
            }

            messageSpan.innerText = "✅ File is valid.";
            messageSpan.style.color = "green";



            const fileURL = URL.createObjectURL(file);

            // Show Preview
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '60%';
                    img.style.border = '1px solid #ccc';
                    img.style.marginTop = '8px';
                    previewDiv.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else if (file.type === "application/pdf") {
                const link = document.createElement('a');
                link.href = URL.createObjectURL(file);
                link.target = "_blank";
                link.innerHTML = `📄 ${file.name}`;
                link.style.display = "inline-block";
                link.style.marginTop = "8px";
                previewDiv.appendChild(link);

            }





            return true;




        }
    </script>
</body>

</html>