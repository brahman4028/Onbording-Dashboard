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
                                            <h5 class="fw-bold  mt-4" style="color:rgb(3, 106, 216);">4. Bank Account Details</h5>
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
                                                            <div id="personalpanpreview"><?php if (!empty($docData['personalpanfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['personalpanfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['photograph'] ?>" target="_blank">
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
                                                                    <a href="<?= $docData['signatoryphotoadnfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['addressfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['aadhaaradnfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['personalpanadnfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['signatoryphotoadnfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['signatorysignadnfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['addressadnfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['coifile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['moafile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['aoafile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['brfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['udyamfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['gstinfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['bofile'] ?>" target="_blank">
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
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rent Agreement / Lease Agreement / Property Tax Receipt (Mandatory if there is a change in address of Principal Place Of Business ) *</td>
                                                        <td>
                                                            <div id="rentfilepreview"><?php if (!empty($docData['rentfile'])): ?>
                                                                    <p>
                                                                        <a href="<?= $docData['rentfile'] ?>" target="_blank">
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
                                                                        <a href="<?= $docData['annexurebfile'] ?>" target="_blank">
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
                                                                    <img src="<?= htmlspecialchars($docData['photograph']) ?>"
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
                                                                    <img src="<?= htmlspecialchars($docData['signatorysignfile']) ?>"
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
                                                                    <img src="<?= htmlspecialchars($docData['signatoryphotoadnfile']) ?>"
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
                                                                    <img src="<?= htmlspecialchars($docData['signatorysignadnfile']) ?>"
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
                                                            <a href="<?= $docData['aadhaarfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="aadhaarfilepreview" data-fileurl="<?= $docData['aadhaarfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>PAN Card</strong><br>

                                                        <?php if (!empty($docData['personalpanfile'])): ?>
                                                            <a href="<?= $docData['personalpanfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="personalpanfilepreview" data-fileurl="<?= $docData['personalpanfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Photograph</strong><br>

                                                        <?php if (!empty($docData['photograph'])): ?>
                                                            <a href="<?= $docData['photograph'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="photographpreview" data-fileurl="<?= $docData['photograph'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Signature</strong><br>

                                                        <?php if (!empty($docData['signatorysignfile'])): ?>
                                                            <a href="<?= $docData['signatorysignfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="signatorysignfilepreview" data-fileurl="<?= $docData['signatorysignfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</strong><br>

                                                        <?php if (!empty($docData['addressfile'])): ?>
                                                            <a href="<?= $docData['addressfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="addressfilepreview" data-fileurl="<?= $docData['addressfile'] ?>"></div>
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
                                                            <a href="<?= $docData['aadhaaradnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="aadhaaradnfilepreview" data-fileurl="<?= $docData['aadhaaradnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>PAN Card</strong><br>

                                                        <?php if (!empty($docData['personaladnpanfile'])): ?>
                                                            <a href="<?= $docData['personaladnpanfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="personalpanadnfilepreview" data-fileurl="<?= $docData['personalpanadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Photograph</strong><br>

                                                        <?php if (!empty($docData['signatoryphotoadnfile'])): ?>
                                                            <a href="<?= $docData['signatoryphotoadnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="signatoryphotoadnfilepreview" data-fileurl="<?= $docData['signatoryphotoadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Signature</strong><br>

                                                        <?php if (!empty($docData['signatorysignadnfile'])): ?>
                                                            <a href="<?= $docData['signatorysignadnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="signatorysignadnfilepreview" data-fileurl="<?= $docData['signatorysignadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong>Address (Aadhaar Card/ Electricity Bill / Telephonic Bill / Proof of gas connection / Water Bi/ Voter ID Card)</strong><br>

                                                        <?php if (!empty($docData['addressadnfile'])): ?>
                                                            <a href="<?= $docData['addressadnfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="addressadnfilepreview" data-fileurl="<?= $docData['addressadnfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td>
                                                        <strong>Certificate of Incorporation (COI) / Business Registration Certificate</strong><br>

                                                        <?php if (!empty($docData['coifile'])): ?>
                                                            <a href="<?= $docData['coifile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="coifilepreview" data-fileurl="<?= $docData['coifile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Memorandum of Association (MOA)</strong><br>

                                                        <?php if (!empty($docData['moafile'])): ?>
                                                            <a href="<?= $docData['moafile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="moafilepreview" data-fileurl="<?= $docData['moafile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Board Resolution (BR) / Letter of Authorization for Signatory</strong><br>

                                                        <?php if (!empty($docData['brfile'])): ?>
                                                            <a href="<?= $docData['brfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="brfilepreview" data-fileurl="<?= $docData['brfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>UDYAM Registration Certificate (If Available)</strong><br>

                                                        <?php if (!empty($docData['udyamfile'])): ?>
                                                            <a href="<?= $docData['udyamfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="udyamfilepreview" data-fileurl="<?= $docData['udyamfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>GSTIN Certificate</strong><br>

                                                        <?php if (!empty($docData['gstinfile'])): ?>
                                                            <a href="<?= $docData['gstinfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="gstinfilepreview" data-fileurl="<?= $docData['gstinfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>List of Directors/Partners/Beneficial Ownership (BO)</strong><br>

                                                        <?php if (!empty($docData['bofile'])): ?>
                                                            <a href="<?= $docData['bofile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="bofilepreview" data-fileurl="<?= $docData['bofile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Cancelled Cheque</strong><br>

                                                        <?php if (!empty($docData['cancelledchequefile'])): ?>
                                                            <a href="<?= $docData['cancelledchequefile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="cancelledchequefilepreview" data-fileurl="<?= $docData['cancelledchequefile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>Rent Agreement / Lease Agreement / Property Tax Receipt (Mandatory if there is a change in address of Principal Place Of Business ) *</strong><br>

                                                        <?php if (!empty($docData['rentfile'])): ?>
                                                            <a href="<?= $docData['rentfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="rentfilepreview" data-fileurl="<?= $docData['rentfile'] ?>"></div>
                                                        <?php else: ?>
                                                            <p style="color: #888;">No file uploaded</p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <strong>ANNEXURE B Form with Signature and Stamp</strong><br>

                                                        <?php if (!empty($docData['annexurebfile'])): ?>
                                                            <a href="<?= $docData['annexurebfile'] ?>" target="_blank">
                                                                View uploaded file
                                                            </a>
                                                            <div id="annexurebfilepreview" data-fileurl="<?= $docData['annexurebfile'] ?>"></div>
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
                                                    <select class="form-select" name="kycverification" onblur="setPreviewValue(this, 'statusvalue')">
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
                                                    <input type="text" class="form-control" name="kyccomment" id="kyccomment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['kyccomment']) ?>">
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
                                                    <select class="form-select" name="documentsverification" onblur="setPreviewValue(this, 'statusvalue')">
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
                                                    <input type="text" class="form-control" name="documentscomment" id="documentscomment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['documentscomment']) ?>">
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
                                                    <select class="form-select" name="bankverification" onblur="setPreviewValue(this, 'statusvalue')">
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
                                                    <input type="text" class="form-control" name="bankcomment" id="bankcomment" placeholder="Reason of Pending or Cancellation" value="<?= htmlspecialchars($appData['bankcomment']) ?>">
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