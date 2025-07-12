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
                                            <div class="bs-stepper-circle"><i class='bx bx-user fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Business Details</h5>
                                                <p class="mb-0 steper-sub-title">Enter Your Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-2">
                                        <div class="step-trigger" role="tab" id="stepper3trigger2" aria-controls="test-vl-2">
                                            <div class="bs-stepper-circle"><i class='bx bx-file fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Authorized Signatory Details</h5>
                                                <p class="mb-0 steper-sub-title">Setup Account Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-3">
                                        <div class="step-trigger" role="tab" id="stepper3trigger3" aria-controls="test-vl-3">
                                            <div class="bs-stepper-circle"><i class='bx bxs-graduation fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Documents Upload</h5>
                                                <p class="mb-0 steper-sub-title">Education Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-4">
                                        <div class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-vl-4">
                                            <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
                                            <div>
                                                <h5 class="mb-0 steper-title">Declarations</h5>
                                                <p class="mb-0 steper-sub-title">Experience Details</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step" data-target="#test-vl-5">
                                        <div class="step-trigger" role="tab" id="stepper3trigger5" aria-controls="test-vl-5">
                                            <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
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
                                            <label class="form-label">Type of Entity</label>
                                            <select class="form-select" name="entity">
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
                                            <input type="date" class="form-control" name="doi" placeholder="Enter Date in DD/MM/YYYY format"><br>
                                            <small class="text-muted">Enter date in DD/MM/YYYY format</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nature of Business</label>
                                            <input type="text" class="form-control" name="nob">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Category</label>
                                            <input type="text" class="form-control" name="businesscategory">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Sub-Category</label>
                                            <input type="text" class="form-control" name="businesssubcategory">
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <label class="form-label">GSTIN</label>
                                            <input type="text" class="form-control" name="gstin">
                                        </div> -->
                                        <div class="col-md-6">
                                            <label for="gstin" class="form-label">GSTIN</label>
                                            <input type="text" class="form-control" id="gstin" name="gstin" onblur="validateGSTIN()">
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
                                            <input type="text" class="form-control " name="pan" id="businesspan" onblur="validatePAN(this, 'error-businesspan')" placeholder="ABCDE1234F">
                                            <div class="text-danger mt-1 d-none" id="error-businesspan">Invalid PAN format (e.g., AAAAA9999A)</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Registered Business Address</label>
                                            <input type="text" class="form-control" name="registeredbsuiness">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Operating Address</label>
                                            <input type="text" class="form-control" name="operatingaddress">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Website URL</label>
                                            <input type="text" class="form-control" name="url">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Application Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Contact Number</label>
                                            <input type="text" class="form-control" name="businessnumber" id="businessnumber" onblur="validatePhone('businessnumber')" placeholder="9876543210">
                                            <div id="businessnumber-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alternate Contact Number</label>
                                            <input type="text" class="form-control" name="alternnumber" id="alternnumber" onblur="validatePhone('alternnumber')" placeholder="9876543210">
                                            <div id="alternnumber-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="supportemail" class="form-label">Support Email ID</label>
                                            <input type="email" class="form-control" id="supportemail" name="supportemail" onblur="validateEmail(this)" placeholder="name@example.com">
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
                                            <input type="text" class="form-control" name="fullname">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" name="designation">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="number" id="number" onblur="validatePhone('number')" placeholder="9876543210">
                                            <div id="number-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control" id="personalemail" name="personalemail" onblur="validateEmail(this)" placeholder="name@example.com">
                                            <div id="personalemail-error" class="text-danger mt-1 d-none">
                                                ❌ Please enter a valid email address
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aadhaar Number</label>
                                            <input type="text" class="form-control" name="aadhaarnumber" id="aadhaarnumber" placeholder="Enter 12-digit Aadhaar number" maxlength="12"
                                                onblur="validateAadhaar('aadhaarnumber')">
                                            <div id="aadhaarnumber-error" class="text-danger d-none">Please enter a valid 12-digit Aadhaar number.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">PAN Number</label>
                                            <input type="text" class="form-control" name="pannumber" id="pannumber" onblur="validatePAN(this, 'error-pannumber')" placeholder="ABCDE1234F">
                                            <div class="text-danger mt-1 d-none" id="error-pannumber">Invalid PAN format (e.g., AAAAA9999A)</div>
                                        </div>

                                        <h6 class="mt-4 text-primary">Authorized Director 2 (If any)</h6><br>

                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullnameadn">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" name="designationadn">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="numberadn" id="numberadn" onblur="validatePhone('numberadn')" placeholder="9876543210">
                                            <div id="numberadn-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control" id="personalemailadn" name="personalemailadn" onblur="validateEmail(this)" placeholder="name@example.com">
                                            <div id="personalemailadn-error" class="text-danger mt-1 d-none">
                                                ❌ Please enter a valid email address
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aadhaar Number</label>
                                            <input type="text" class="form-control" name="aadhaarnumberadn" id="aadhaarnumberadn" placeholder="Enter 12-digit Aadhaar number" maxlength="12"
                                                onblur="validateAadhaar('aadhaarnumberadn')">
                                            <div id="aadhaarnumberadn-error" class="text-danger d-none">Please enter a valid 12-digit Aadhaar number.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">PAN Number</label>
                                            <input type="text" class="form-control" name="pannumberadn" id="pannumberadn" onblur="validatePAN(this, 'error-pannumberadn')" placeholder="ABCDE1234F">
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
                                                <input type="file" onchange="validateFile(this, 'AadhaarMsg')" class="form-control" id="inputGroupFile01" accept=".pdf,.jpeg,.jpg,.png,.webp" name="aadhaarfile">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>

                                            </div>
                                            <span id="AadhaarMsg"></span>

                                        </div>
                                        <!-- 2 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">2. Pan Card :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02" onchange="validateFile(this, 'PanMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="personalpanfile">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                            <span id="PanMsg"></span>
                                        </div>
                                        <!-- 3 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">3. Photograph :</label>

                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile03" onchange="validateFile(this, 'PhotoMsg')" accept=".jpeg,.jpg,.png,.webp" name="photograph">
                                                <label class="input-group-text" for="inputGroupFile03">Upload</label>
                                            </div>
                                            <span id="PhotoMsg"></span>

                                        </div>
                                        <!-- 4 -->
                                        <div class="col-12 col-lg-6 mb-3">

                                            <label class="form-label fw-semibold">4. Address :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile04" onchange="validateFile(this, 'AddressMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="addressfile">
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
                                                <input type="file" class="form-control" id="inputGroupFile05" onchange="validateFile(this, 'CoiMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="coifile">
                                                <label class="input-group-text" for="inputGroupFile05">Upload</label>
                                            </div>
                                            <span id="CoiMsg"></span>

                                        </div>
                                        <!-- 2 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">6. Memorandum of Association (MOA) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile06" onchange="validateFile(this, 'MoaMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="moafile">
                                                <label class="input-group-text" for="inputGroupFile06">Upload</label>
                                            </div>
                                            <span id="MoaMsg"></span>

                                        </div>
                                        <!-- 3 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">7. Articles of Association (AOA) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile07" onchange="validateFile(this, 'AoaMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="aoafile">
                                                <label class="input-group-text" for="inputGroupFile07">Upload</label>
                                            </div>
                                            <span id="AoaMsg"></span>

                                        </div>
                                        <!-- 4 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">8. Board Resolution (BR) / Letter of Authorization for Signatory :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile08" onchange="validateFile(this, 'BrMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="brfile">
                                                <label class="input-group-text" for="inputGroupFile08">Upload</label>
                                            </div>
                                            <span id="BrMsg"></span>

                                        </div>
                                        <!-- 5 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">9. UDYAM Registration Certificate (If Available) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile09" onchange="validateFile(this, 'UdyamMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="udyamfile">
                                                <label class="input-group-text" for="inputGroupFile09">Upload</label>
                                            </div>
                                            <span id="UdyamMsg"></span>

                                        </div>
                                        <!-- 6 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">10. GSTIN Certificate :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile010" onchange="validateFile(this, 'GstinMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="gstinfile">
                                                <label class="input-group-text" for="inputGroupFile010">Upload</label>
                                            </div>
                                            <span id="GstinMsg"></span>

                                        </div>
                                        <!-- 7 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">11. List of Directors/Partners/Beneficial Ownership (BO) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile011" onchange="validateFile(this, 'BoMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="bofile">
                                                <label class="input-group-text" for="inputGroupFile011">Upload</label>
                                            </div>
                                            <span id="BoMsg"></span>

                                        </div>
                                        <!-- 8 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">12. Rent Agreement / Lease Agreement / Property Tax Receipt :</label>

                                            <div class="input-group mb-3 mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'RentMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="rentfile">
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
                                                    <input type="text" class="form-control mt-1" name="totalvolume">
                                                </div>
                                                <div>
                                                    <p>b. Number of users</p>
                                                    <input type="text" class="form-control mt-1" name="numberofusers">
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
                                                    <input type="text" class="form-control mt-1" name="sixmonthprojectionamount">
                                                </div>
                                                <div>
                                                    <p>b. Number of Users</p>
                                                    <input type="text" class="form-control mt-1" name="sixmonthprojectionuser">
                                                </div>
                                            </div>
                                            <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                        </div>

                                        <!-- 3 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">3. Number of transactions /frequencies in a day</label>
                                            <input type="text" class="form-control" placeholder="No. of transactions" name="numoftransactions">
                                        </div>

                                        <!-- 4 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">4. Volume of total amount disbursed /distributed in a day</label>
                                            <input type="text" class="form-control" placeholder="Amount" name="disbursedamount">
                                        </div>

                                        <!-- 5 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold ">5. Minimum and Maximum transaction amount</label>
                                            <div class="d-flex gap-2 mt-1">
                                                <div>
                                                    <p>a. Minimum Amount</p>
                                                    <input type="text" class="form-control mt-1" name="mintransaction">
                                                </div>
                                                <div>
                                                    <p>b. Maximum Amount</p>
                                                    <input type="text" class="form-control mt-1" name="maxtransaction">
                                                </div>
                                            </div>
                                            <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                        </div>

                                        <!-- 6 -->

                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-semibold">6. Threshold limit and/or daily payout that can be fixed</label>
                                            <input type="text" class="form-control" placeholder="" name="thresholdlimit">
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
                                                <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'UploadtMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp" name="annexurebfile">
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
                                    <div>
                                        <p>preview box will be here</p>
                                    </div>
                                    <div class="row g-3">
                                        <p class=" text-muted">
                                            Kindly confirm your acceptance of the terms outlined below before continuing.
                                        </p>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="termsCheckbox" required>
                                            <label class="form-check-label" for="termsCheckbox">
                                                I/We confirm that the information provided is true and accurate.
                                            </label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="" id="privacyCheckbox" required>
                                            <label class="form-check-label" for="privacyCheckbox">
                                                I/We authorize ITSTARPAY to verify the submitted information and documents.
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="marketingCheckbox" required>
                                            <label class="form-check-label" for="marketingCheckbox">
                                                I/We agree to comply with all applicable RBI, AML, and KYC guidelines.
                                            </label>
                                        </div>

                                        <!-- pdf html template -->
                                        <div id="kyc-pdf-preview" style="display:none; padding: 30px; font-family: Arial;">
                                            <h2>Merchant Onboarding Form</h2>

                                            <h4>Business Details</h4>
                                            <p><strong>Business Name:</strong> <span id="pdf-business-name"></span></p>
                                            <p><strong>Entity Type:</strong> <span id="pdf-entity"></span></p>
                                            <p><strong>Date of Incorporation:</strong> <span id="pdf-doi"></span></p>
                                            <p><strong>Nature of Business:</strong> <span id="pdf-nature"></span></p>
                                            <p><strong>GSTIN:</strong> <span id="pdf-gstin"></span></p>
                                            <p><strong>PAN:</strong> <span id="pdf-pan"></span></p>

                                            <h4>Authorized Signatory</h4>
                                            <p><strong>Full Name:</strong> <span id="pdf-name"></span></p>
                                            <p><strong>Mobile:</strong> <span id="pdf-mobile"></span></p>
                                            <p><strong>Email:</strong> <span id="pdf-email"></span></p>

                                            <h4>Bank Account Details</h4>
                                            <p><strong>Account Holder:</strong> <span id="pdf-holder"></span></p>
                                            <p><strong>Account Number:</strong> <span id="pdf-acno"></span></p>
                                            <p><strong>IFSC:</strong> <span id="pdf-ifsc"></span></p>

                                            <h5 style="margin-top:30px;">Declaration:</h5>
                                            <p>I/We confirm that the information provided is true and accurate.</p>
                                        </div>

                                        <!--  -->



                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="button" onclick="generateKYCPreview()" class="btn btn-primary mt-3">Preview KYC PDF</button>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- pdf generator -->

    <script>
        function generateKYCPreview() {
            // Fill values from form
            document.getElementById('pdf-business-name').textContent = document.querySelector('[name="businessname"]').value;
            document.getElementById('pdf-entity').textContent = document.querySelector('[name="entity"]').value;
            document.getElementById('pdf-doi').textContent = document.querySelector('[name="doi"]').value;
            document.getElementById('pdf-nature').textContent = document.querySelector('[name="nob"]').value;
            document.getElementById('pdf-gstin').textContent = document.querySelector('[name="gstin"]').value;
            document.getElementById('pdf-pan').textContent = document.querySelector('[name="pan"]').value;

            document.getElementById('pdf-name').textContent = document.querySelector('[name="fullname"]').value;
            document.getElementById('pdf-mobile').textContent = document.querySelector('[name="number"]').value;
            document.getElementById('pdf-email').textContent = document.querySelector('[name="personalemail"]').value;

            document.getElementById('pdf-holder').textContent = document.querySelector('[name="accountholder"]').value;
            document.getElementById('pdf-acno').textContent = document.querySelector('[name="accountnumber"]').value;
            document.getElementById('pdf-ifsc').textContent = document.querySelector('[name="ifsc"]').value;

            // Generate PDF
            const element = document.getElementById('kyc-pdf-preview');
            element.style.display = 'block';

            const opt = {
                margin: 0.5,
                filename: 'KYC-Preview.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(opt).from(element).save();

            setTimeout(() => {
                element.style.display = 'none';
            }, 1000);
        }
    </script>


    <!-- //////////// -->




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

        function validatePAN(input, errorId) {
            const value = input.value.trim().toUpperCase();
            input.value = value;

            const errorEl = document.getElementById(errorId);

            if (value === '' || !panRegex.test(value)) {
                input.classList.add('is-invalid');
                errorEl.classList.remove('d-none');
            } else {
                input.classList.remove('is-invalid');
                errorEl.classList.add('d-none');
            }
        }

        // Prevent submission if any input is invalid
        document.getElementById('panForm').addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input');
            let hasError = false;

            inputs.forEach(input => {
                const id = input.id;
                const errorId = 'error-' + id;
                validatePAN(input, errorId);

                if (input.classList.contains('is-invalid')) {
                    hasError = true;
                }
            });

            if (hasError) {
                e.preventDefault();
                alert('❌ Please fix the errors before submitting.');
            }
        });
    </script>

    <!-- ///////////////// -->

    <!-- phone validation -->

    <script>
        function validatePhone(fieldId) {
            const input = document.getElementById(fieldId);
            const error = document.getElementById(`${fieldId}-error`);
            const value = input.value.trim();

            if (/^[6-9]\d{9}$/.test(value)) {
                error.classList.add('d-none');
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                error.classList.remove('d-none');
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }
        }
    </script>


    <!-- //////// -->

    <!-- aadhaar number validation -->
    <script>
        function validateAadhaar(fieldId) {
            const input = document.getElementById(fieldId);
            const error = document.getElementById(`${fieldId}-error`);
            const value = input.value.trim();

            if (/^\d{12}$/.test(value)) {
                error.classList.add('d-none');
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                error.classList.remove('d-none');
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }
        }
    </script>
    <!-- //////////////////// -->

    <script>
        function validateEmail(inputEl) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const id = inputEl.id;
            const errorEl = document.getElementById(id + '-error');

            if (inputEl.value.trim() === '' || !emailRegex.test(inputEl.value.trim())) {
                errorEl.classList.remove('d-none');
            } else {
                errorEl.classList.add('d-none');
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.stepper3 = new Stepper(document.querySelector("#stepper3"), {
                linear: false,
                animation: true
            });
        });


        function validateFile(fileInput, spanId) {
            const messageSpan = document.getElementById(spanId);
            const file = fileInput.files[0];

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
            return true;
        }
    </script>
</body>

</html>