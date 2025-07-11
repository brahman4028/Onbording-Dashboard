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
        <div style=" margin-bottom:0px !important; flex:1; height:100%;">

            <div class="card" style="height: 100%;">
                <div class="card-body" style="padding: 0px;">
                    <div id="stepper3" class="bs-stepper gap-4 vertical" style="height: 100%; ">
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
                                    <button class="btn btn-primary rounded-lg d-flex f-cloumn justify-content-center fs-6">Get in Touch <div class="text-light ms-1"><i class='bx  bx-paper-plane fs-4 '></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="bs-stepper-content px-5 py-4 " style="height: 750px; overflow-y: auto !important;">
                            <form>
                                <div id="test-vl-1" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger1">
                                    <h2 class="fs-2 " style="color:rgb(7, 104, 231)">Set Up Your Business Profile</h2>
                                    <div class="" style="margin-right: 300px;">
                                        <p class="mb-4 text-muted ">Please fill in your business information to help us verify your identity and activate features like vendor payouts, salary disbursements, and invoice management..</p>
                                    </div>
                                    <hr class="my-4">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Type of Entity</label>
                                            <select class="form-select">
                                                <option selected disabled>--Select--</option>
                                                <option>Proprietorship</option>
                                                <option>Partnership</option>
                                                <option>Pvt. Ltd.</option>
                                                <option>LLP</option>
                                                <option>Public Ltd.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Incorporation</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nature of Business</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Category</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Sub-Category</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">GSTIN</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business PAN Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Registered Business Address</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Operating Address</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Website URL</label>
                                            <input type="url" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Application Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Business Contact Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alternate Contact Number</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="SupportEmail" class="form-label">Support Email ID</label>
                                            <input type="email" class="form-control" id="SupportEmail" name="SupportEmail">
                                        </div>





                                        <div class="col-12">
                                            <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        </div>
                                    </div>
                                </div>
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
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aadhaar Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">PAN Number</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <h6 class="mt-4 text-primary">Authorized Director 2 (If any)</h6><br>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aadhaar Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">PAN Number</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="d-flex gap-3">
                                            <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                            <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                        </div>
                                    </div>






                                </div>
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
                                                <input type="file" onchange="validateFile(this, 'AadhaarMsg')" class="form-control" id="inputGroupFile01" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>

                                            </div>
                                            <span id="AadhaarMsg">Not Allowed</span>

                                        </div>
                                        <!-- 2 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">2. Pan Card :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02" onchange="validateFile(this, 'AadhaarMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                            <span id="PanMsg">Not Allowed</span>
                                        </div>
                                        <!-- 3 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">3. Photograph :</label>

                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile03" onchange="validateFile(this, 'AadhaarMsg')" accept=".jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile03">Upload</label>
                                            </div>
                                            <span id="PhotoMsg">Not Allowed</span>

                                        </div>
                                        <!-- 4 -->
                                        <div class="col-12 col-lg-6 mb-3">

                                            <label class="form-label fw-semibold">4. Address :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile04" onchange="validateFile(this, 'AadhaarMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile04">Upload</label>
                                            </div>
                                            <p class="" style="color:red">(Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bill/ Voter ID Card) Not older than 3 months </p>
                                            <span id="AddressMsg">Not Allowed</span>
                                        </div>

                                        <h6 class="mt-4 mb-2 text-primary">Business identity</h6>
                                        <!-- 1 -->


                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold ">5. Certificate of Incorporation (COI) / Business Registration Certificate :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile05" onchange="validateFile(this, 'CoiMsg')"accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile05">Upload</label>
                                            </div>
                                            <span id="CoiMsg">Not Allowed</span>

                                        </div>
                                        <!-- 2 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">6. Memorandum of Association (MOA) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile06" onchange="validateFile(this, 'MoaMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile06">Upload</label>
                                            </div>
                                            <span id="MoaMsg">Not Allowed</span>

                                        </div>
                                        <!-- 3 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">7. Articles of Association (AOA) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile07" onchange="validateFile(this, 'AoaMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile07">Upload</label>
                                            </div>
                                            <span id="AoaMsg">Not Allowed</span>

                                        </div>
                                        <!-- 4 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">8. Board Resolution (BR) / Letter of Authorization for Signatory :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile08" onchange="validateFile(this, 'BrMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile08">Upload</label>
                                            </div>
                                            <span id="BrMsg">Not Allowed</span>

                                        </div>
                                        <!-- 5 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">9. UDYAM Registration Certificate (If Available) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile09" onchange="validateFile(this, 'UdyamMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile09">Upload</label>
                                            </div>
                                            <span id="UdyamMsg">Not Allowed</span>

                                        </div>
                                        <!-- 6 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">10. GSTIN Certificate :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile010" onchange="validateFile(this, 'GstinMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile010">Upload</label>
                                            </div>
                                            <span id="GstinMsg">Not Allowed</span>

                                        </div>
                                        <!-- 7 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">11. List of Directors/Partners/Beneficial Ownership (BO) :</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile011" onchange="validateFile(this, 'BoMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile011">Upload</label>
                                            </div>
                                            <span id="BoMsg">Not Allowed</span>

                                        </div>
                                        <!-- 8 -->
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">12. Rent Agreement / Lease Agreement / Property Tax Receipt :</label>

                                            <div class="input-group mb-3 mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'RentMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile012">Upload</label>
                                            </div>
                                            <p class="" style="color:red">(Mandatory if there is a change in address of Principal Place Of Business )</p>
                                            <span id="RentMsg">Not Allowed</span>

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
                                                    <input type="text" class="form-control mt-1">
                                                </div>
                                                <div>
                                                    <p>b. Number of users</p>
                                                    <input type="text" class="form-control mt-1">
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
                                                    <input type="text" class="form-control mt-1">
                                                </div>
                                                <div>
                                                    <p>b. Number of Users</p>
                                                    <input type="text" class="form-control mt-1">
                                                </div>
                                            </div>
                                            <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                        </div>

                                        <!-- 3 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">3. Number of transactions /frequencies in a day</label>
                                            <input type="text" class="form-control" placeholder="No. of transactions">
                                        </div>

                                        <!-- 4 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold">4. Volume of total amount disbursed /distributed in a day</label>
                                            <input type="text" class="form-control" placeholder="Amount">
                                        </div>

                                        <!-- 5 -->

                                        <div class="col-12 col-lg-6 mb-3">
                                            <label class="form-label fw-semibold ">5. Minimum and Maximum transaction amount</label>
                                            <div class="d-flex gap-2 mt-1">
                                                <div>
                                                    <p>a. Minimum Amount</p>
                                                    <input type="text" class="form-control mt-1">
                                                </div>
                                                <div>
                                                    <p>b. Maximum Amount</p>
                                                    <input type="text" class="form-control mt-1">
                                                </div>
                                            </div>
                                            <p class="" style="color:red">(rough/ballpark numbers for reference)</p>
                                        </div>

                                        <!-- 6 -->

                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-semibold">6. Threshold limit and/or daily payout that can be fixed</label>
                                            <input type="text" class="form-control" placeholder="">
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
                                            <label class="form-label fw-semibold">7. Download the form, add your signature and stamp, and upload it back here :</label>

                                            <div class="input-group mb-3 mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile012" onchange="validateFile(this, 'UploadtMsg')" accept=".pdf,.jpeg,.jpg,.png,.webp">
                                                <label class="input-group-text" for="inputGroupFile012">Upload</label>
                                            </div>
                                            <p class="text-secondary">Download the form, add your signature and stamp, and upload it back here.</p>
                                             <span id="UploadtMsg">Not Allowed</span>

                                        </div>



                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="submit" class="btn btn-success px-4">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="test-vl-5" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger5">

                                    <h2 class="fs-2 " style="color:rgb(7, 104, 231)">Submit Your Application</h2>
                                    <div class="" style="margin-right: 300px;">
                                        <p class="mb-4 text-muted ">This is the final step. Ensure all fields are correctly filled and documents uploaded. After submission, you’ll receive a confirmation shortly.</p>
                                    </div>
                                    <hr class="my-4">

                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Company</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Role</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Role</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="submit" class="btn btn-success px-4">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>

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

            const allowedTypes = ["application/pdf", "image/jpeg", "image/jpg","image/png"];
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