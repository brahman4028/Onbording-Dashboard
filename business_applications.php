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
    <div class="wrapper"  style="display: flex; flex-direction:column; height:100vh; ">
        <?php include 'hero.php'; ?>
        <div style=" margin-bottom:0px !important; flex:1; height:100%;">

            <div class="card" style="height: 100%;">
                <div class="card-body" style="padding: 0px;">
                    <div id="stepper3" class="bs-stepper gap-4 vertical" style="height: 100%;">
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
                                        <h5 class="mb-0 steper-title">Education</h5>
                                        <p class="mb-0 steper-sub-title">Education Details</p>
                                    </div>
                                </div>
                            </div>
                            <div class="step" data-target="#test-vl-4">
                                <div class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-vl-4">
                                    <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
                                    <div>
                                        <h5 class="mb-0 steper-title">Work Experience</h5>
                                        <p class="mb-0 steper-sub-title">Experience Details</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs-stepper-content px-5 py-4 " style="height: 750px; overflow-y: auto !important;">
                            <form onsubmit="return false">
                                <div id="test-vl-1" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger1">
                                <h5>Business Details</h5>
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
                                        <label class="form-label">Support Email ID</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Support Email ID</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Support Email ID</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Support Email ID</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Support Email ID</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Support Email ID</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                    </div>
                                </div>
                            </div>
                          <div id="test-vl-2" class="bs-stepper-pane fade" role="tabpanel" aria-labelledby="stepper3trigger2">
                                <h5>Authorized Signatory Details</h5>
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
                                        <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                               <button class="btn btn-primary" onclick="stepper3.next()">Next</button>
                                            </div>
                                </div>
                            </div>
                                <div id="test-vl-3" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger3">
                                    <h5 class="mb-1">Education Details</h5>
                                    <p class="mb-4">Enter your education details.</p>
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">School Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">University</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-outline-secondary px-4" onclick="stepper3.previous()">Previous</button>
                                                <button type="button" class="btn btn-primary px-4" onclick="stepper3.next()">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="test-vl-4" role="tabpanel" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                                    <h5 class="mb-1">Work Experience</h5>
                                    <p class="mb-4">Describe your past experiences.</p>
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Company</label>
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
        document.addEventListener("DOMContentLoaded", function () {
            window.stepper3 = new Stepper(document.querySelector("#stepper3"), {
                linear: false,
                animation: true
            });
        });
    </script>
</body>

</html>
