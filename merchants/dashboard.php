<?php include '../db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$address = "";
// error_reporting(0);

session_start();

if (!isset($_SESSION['merchant_info']) || !isset($_SESSION['merchant_info']['username'])) {
    // Redirect to registration page
    header("Location: merchant_login.php");
    exit();
}

$merchantuseremail = $_SESSION['merchant_info']['email'];

$merQuery = "SELECT * FROM merchant_info WHERE email = '$merchantuseremail'";
$merResult = mysqli_query($mysqli, $merQuery);
$merData = $merResult ? mysqli_fetch_assoc($merResult) : [];


$address = $merData['address'];
$merchant_id = $merData['merchant_id'];

// Fetch user name
$username = $_SESSION['merchant_info']['username'];
$application_id = $_SESSION['merchant_info']['application_id'];

$merchantphone = $_SESSION['merchant_info']['phone'];

// echo $merchantuseremail;
// echo $merchantphone ;


// echo $application_id;

if ($application_id != '') {
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

    $id = $appData['id'];
    $gstin = $appData['gstin'];
    $pan = $appData['pan'];
    $status = $appData['status'];
    $coment = $appData['coment'];
    $merchant_trash = $appData['merchant_trash'];
}

// echo $id;
// echo $gstin;
// echo $pan;


// echo $username;
// echo $application_id;


// echo $username;

?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Merchant Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #ffffffff;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background: white;
            border-right: 1px solid #ddd;
            justify-content: space-between;
            display: flex;
            flex-direction: column;
        }

        .sidebar .nav-link {
            color: #333;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            cursor: pointer;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #f1f1f1;
            color: #0286dfff;
            font-weight: 400;
            /* border: 1px solid #bababaff; */
        }

        .sidebar i {
            margin-right: 10px;
        }

        .header {
            height: 60px;
            background: white;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .header img {
            max-width: 120px;
        }

        .application-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .tab-section {
            display: none;
        }

        .tab-section.active {
            display: block;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .form-label-title {
            font-weight: 600;
            font-size: 14px;
            color: #343a40;
            margin-bottom: 4px;
        }

        .form-subtext {
            font-size: 12px;
            color: #6c757d;
        }

        .section-divider {
            border-top: 1px solid #dee2e6;
            margin: 32px 0;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #212529;
        }

        .btn-cancel {
            background-color: white;
            border: 1px solid #ced4da;
            color: #495057;
        }

        .btn-proceed {
            background-color: #0066ff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-2 me-6">
            <div>
                <div class="text-start mt-2 fs-5 ms-2 me-5 fw-bold mb-4">Merchant Dashboard</div>

                <ul class="nav flex-column">
                    <li><a class="nav-link active" onclick="showTab('yourApp')"><i class='bx bx-user'></i>Your Application</a></li>
                    <li><a class="nav-link" onclick="showTab('newApp')"><i class='bx bx-plus-circle'></i>New Application</a></li>
                    <li><a class="nav-link" onclick="showTab('payout')"><i class='bx bx-link'></i>Payout Link</a></li>
                    <li><a class="nav-link" onclick="showTab('verification')"><i class='bx bx-shield'></i>Account Verification</a></li>
                    <li><a class="nav-link" onclick="showTab('accountdetails')"><i class='bx bx-shield'></i>Account Details</a></li>
                    <li><a class="nav-link" onclick="showTab('api')"><i class='bx bx-shield'></i>Webhooks & API</a></li>
                    <li><a class="nav-link" onclick="showTab('viewapplication')"><i class='bx bx-shield'></i>View Application</a></li>
                </ul>
            </div>

            <!-- //////////////////// -->
            <div class="sidebar-bottom d-flex justify-content-between px-2 mt-3 " style="flex-direction: column;">
                <a class="nav-link"><i class='bx bx-cog'></i>Settings</a>
                <a class="nav-link"><i class='bx bx-key'></i>Credentials</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <div class="header">
                <div><img src="../assets/images/logo-img.png" alt="Logo"></div>

                <div class="dropdown">
                    <button class="btn btn-light border rounded-pill d-flex align-items-center gap-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-user-circle fs-5"></i>
                        <span class="fw-semibold">Hello, <?php echo $username; ?></span>
                        <!-- <button class="btn btn-outline-danger btn-sm"><i class='bx bx-log-out'></i> Logout</button> -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" onclick="showTab('viewprofile')"><i class='bx bx-user me-2'></i> View Profile</a></li>
                        <li><a class="dropdown-item" onclick="showTab('viewprofile')"><i class='bx bx-lock me-2'></i> Change Password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="merchant_logout.php"><i class='bx bx-log-out me-2'></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <!-- All Sections -->
            <div class="container p-5">
                <!-- Tab 1: Your Applications -->
                <div id="yourApp" class="tab-section active">
                    <h4 class="mb-4">Your Previous Applications</h4>
                    <div class="row g-4">
                        <div class="col-md-8">
                            <?php

                            if ($application_id != '' && $status != "Cancelled" && $merchant_trash != "y") {
                                echo '
                                <div class="card p-3 rounded-4" style="max-width: 700px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.3);">
                                 <div class="row g-3">
                                 <!-- Left Section -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-start">
                <h5 class="mb-1 fw-bold text-dark">' . htmlspecialchars($appData["businessname"]) . '</h5>
            </div>
            <p class="text-muted mt-1 mb-3"><strong>GSTIN:</strong> ' . htmlspecialchars($appData["gstin"]) . '</p>
            <div class="mt-3">
                <small class="text-muted d-block">Onboarding Date & Time: ' . htmlspecialchars($appData["created_at"]) . '</small>
                <span class="mt-1 d-inline-block">Application status: <span class="badge bg-warning text-dark">' . htmlspecialchars($appData["status"]) . '</span></span>
            </div>
        </div>

        <!-- Right Section: Photo -->
        <div class="col-md-4 text-end">
            <img src="../' . htmlspecialchars($docData["photograph"]) . '" alt="Applicant Photo" class="img-thumbnail rounded-3 border-0" style="width: 100%; height: 120px; object-fit: cover; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);">
            <p class="mt-2 mb-0 text-muted small">Applicant:</p>
            <p class="fw-semibold text-dark mb-0">' . htmlspecialchars($appData["fullname"]) . '</p>
        </div>
    </div>
</div>

<div class="d-flex  ">
    <a href="merchant_application.php?id=' . urlencode($id) . '&gstin=' . urlencode($gstin) . '&pan=' . urlencode($pan) . '" class="btn btn-primary text-center btn-back mt-3 px-4 py-2" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;">
        View your application <i class="bx bx-send ms-1"></i>
    </a>
</div>';
                            } elseif ($status == "Cancelled" && $merchant_trash != "y") {
                                echo '
<div class="card text-center border-0 p-4" style="
    max-width: 600px; 
    margin: auto; 
    border-radius: 1rem; 
    background: rgba(255, 255, 255, 0.6); 
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08); 
    backdrop-filter: blur(6px); 
    -webkit-backdrop-filter: blur(6px); 
    border: 1px solid rgba(255, 255, 255, 0.3);
">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-semibold text-dark">Application Declined</h5>
        <p class="card-text text-muted mb-4">
            Your previous application with ID <span class="text-dark fw-medium">' . htmlspecialchars($id) . '</span> was cancelled due to the reason <span class="text-dark fw-semibold">"' . htmlspecialchars($coment) . '"</span> please submit a fresh application.
        </p>
        <a href="../index.php" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
            Begin Onboarding
        </a>
    </div>
</div>';
                            } else {
                                echo '
<div class="card text-center border-0 p-4" style="
    max-width: 400px; 
    margin: auto; 
    border-radius: 1rem; 
    background: rgba(255, 255, 255, 0.6); 
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); 
    backdrop-filter: blur(8px); 
    -webkit-backdrop-filter: blur(8px); 
    border: 1px solid rgba(255, 255, 255, 0.3);
">
    <div class="card-body">
        <h5 class="card-title mb-3 fw-semibold text-dark">You\'re Almost There!</h5>
        <p class="card-text text-muted mb-4">It looks like you haven’t filled out your form yet. Start now to complete your onboarding.</p>
        <a href="../index.php" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.2);">
            Begin Onboarding
        </a>
    </div>
</div>';
                            }
                            ?>

                        </div>
                        <!-- ////////////////////////////// -->
                        <!-- <div class="col-md-6">
                            <div class="application-card">
                                <h5>Application #12346</h5>
                                <p>Status: <span class="badge bg-warning text-dark">Pending</span></p>
                                <p>Date: 27 July 2025</p>
                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Tab 2: New Application -->
                <div id="newApp" class="tab-section">
                    <h4 class="mb-4">Start New Application</h4>
                    <div class="application-card">
                        <p>This is the form for a new merchant application.</p>
                        <!-- Add form fields here -->
                    </div>
                </div>

                <!-- Tab 3: Payout Link -->
                <div id="payout" class="tab-section">
                    <h4 class="mb-4">Generate Payout Link</h4>
                    <div class="application-card">
                        <p>This section allows you to create and manage payout links.</p>
                        <!-- Add payout link content -->
                    </div>
                </div>

                <!-- Tab 4: Account Verification -->
                <div id="verification" class="tab-section">
                    <h4 class="mb-4">Account Verification</h4>
                    <div class="application-card">
                        <p>Upload your KYC documents for verification.</p>
                        <!-- Add KYC upload UI -->
                    </div>
                </div>



                <div id="viewprofile" class="tab-section">
                    <div class="">
                        <form id="profileForm">
                            <div class="bg-white p-2  rounded">
                                <input type="hidden" value="<?php echo $merchant_id ?>" name="merchant_id">
                                <!-- Main Title -->
                                <h3 class="mb-1">Your Profile</h3>
                                <p class="text-muted mb-4">Please provide details of the beneficiary you would like to add.</p>
                                <div class="section-divider"></div>


                                <!-- Section 1: Basic Info -->
                                <div class="row align-items-start">
                                    <div class="col-md-4">
                                        <div class="form-label ">Basic info</div>
                                        <div class="form-subtext">Please provide details of the beneficiary you would like to add.</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Beneficiary name</label>
                                                <input type="text" class="form-control" name="username" placeholder="John Mesh" value="<?php echo $username ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mobile number</label>
                                                <input type="text" class="form-control" placeholder="9812 3412 34" name="phone" value="<?php echo $merchantphone ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Email address</label>
                                                <input type="email" class="form-control" placeholder="sample@gmail.com" name="email" value="<?php echo  $merchantuseremail ?>">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Permanent address of beneficiary" value="<?php echo $address ?>">
                                                <small class="form-text text-muted">A12, Gold globe, silicon valley, mg road, kochi, 682030</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section-divider"></div>

                                <!-- Section 2: Beneficiary Settings -->
                                <div class="row align-items-start">
                                    <div class="col-md-4">
                                        <div class="form-label">Change Password</div>
                                        <div class="form-subtext">Add a alias name and indicate the beneficiary’s relationship with you.</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row g-3">
                                            <div class="col-md-6">

                                                <label class="form-label">New Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="progress" style="height:5px;">
                                                        <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                                                    </div>
                                                    <small id="passwordHelp" class="form-text text-muted">Password must include:</small>
                                                    <ul class="mb-2" style="list-style: none; padding-left: 0;">
                                                        <li id="length" class="text-muted">✔️ 8 or more characters</li>
                                                        <li id="uppercase" class="text-muted">✔️ At least one uppercase letter</li>
                                                        <li id="number" class="text-muted">✔️ At least one number</li>
                                                        <li id="symbol" class="text-muted">✔️ At least one special character</li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Confirm Password</label>
                                                <div class="input-group" id="show_hide_password2">

                                                    <input type="password" onchange="checkPasswordMatch();" class="form-control border-end-0" name="confirmpassword" id="confirmpassword" placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                                <span id="matchError" class="text-danger small d-none">Passwords do not match</span>
                                                <span id="matchSuccess" class="text-success small d-none">Passwords matched</span>
                                            </div>
                                            <!-- <div class="col-md-6">
                                            <label class="form-label">Beneficiary Type</label>
                                            <select class="form-select">
                                                <option selected>Placeholder</option>
                                                <option>Individual</option>
                                                <option>Business</option>
                                            </select>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="section-divider"></div>

                                <!-- Section 3: Payout Purpose -->

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="btn btn-cancel me-2" onclick="showTab('yourApp')">Cancel</button>
                                    <button class="btn btn-proceed" type="submit">Update</button>
                                </div>

                            </div>
                        </form>

                        <!-- notification -->
                        <div id="toast" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999; display: none;">
                            <div class="toast align-items-center text-white bg-success border-0 show">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        Profile updated successfully!
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Script to handle tab switch -->
    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab-section').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


    <!-- password syrength -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("inputChoosePassword");
            const toggleIcon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.replace("bx-hide", "bx-show");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.replace("bx-show", "bx-hide");
            }
        }

        document.getElementById("inputChoosePassword").addEventListener("input", function() {
            const value = this.value;
            const lengthValid = value.length >= 8;
            const uppercaseValid = /[A-Z]/.test(value);
            const numberValid = /[0-9]/.test(value);
            const symbolValid = /[!@#$%^&*(),.?":{}|<>]/.test(value);

            // Update checklist colors
            document.getElementById("length").className = lengthValid ? "text-success" : "text-muted";
            document.getElementById("uppercase").className = uppercaseValid ? "text-success" : "text-muted";
            document.getElementById("number").className = numberValid ? "text-success" : "text-muted";
            document.getElementById("symbol").className = symbolValid ? "text-success" : "text-muted";

            // Calculate strength
            let strength = lengthValid + uppercaseValid + numberValid + symbolValid;
            const strengthBar = document.getElementById("strengthBar");

            strengthBar.style.width = (strength * 25) + "%";
            strengthBar.className = "progress-bar"; // reset classes

            if (strength === 0) {
                strengthBar.classList.add("bg-danger");
            } else if (strength <= 2) {
                strengthBar.classList.add("bg-warning");
            } else if (strength === 3) {
                strengthBar.classList.add("bg-info");
            } else {
                strengthBar.classList.add("bg-success");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#show_hide_password a");
            const passwordInput = document.querySelector("#show_hide_password input");
            const icon = document.querySelector("#show_hide_password i");

            togglePassword.addEventListener("click", function(e) {
                e.preventDefault();
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("bx-hide");
                    icon.classList.add("bx-show");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("bx-show");
                    icon.classList.add("bx-hide");
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#show_hide_password2 a");
            const passwordInput = document.querySelector("#show_hide_password2 input");
            const icon = document.querySelector("#show_hide_password2 i");

            togglePassword.addEventListener("click", function(e) {
                e.preventDefault();
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("bx-hide");
                    icon.classList.add("bx-show");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("bx-show");
                    icon.classList.add("bx-hide");
                }
            });
        });
    </script>


    <!-- password match -->

    <script>
        function checkPasswordMatch() {
            const password = document.getElementById("inputChoosePassword").value;
            const confirmPassword = document.getElementById("confirmpassword").value;
            const errorSpan = document.getElementById("matchError");

            const successMsg = document.getElementById("matchSuccess");

            if (confirmPassword === "") {
                errorSpan.classList.add("d-none");
                successMsg.classList.add("d-none");
                return;
            }

            if (password === confirmPassword) {
                errorSpan.classList.add("d-none");
                successMsg.classList.remove("d-none");
            } else {
                errorSpan.classList.remove("d-none");
                successMsg.classList.add("d-none");
            }
        }
    </script>



    <!-- profile updation by ajax -->

    <script>
        $('#profileForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submit

            let newPass = $('#inputChoosePassword').val();
            let confirmPass = $('#confirmpassword').val();

            if (newPass !== confirmPass) {
                alert("Passwords do not match!");
                return;
            }


            let formData = $(this).serialize();

            $.ajax({
                url: 'update_merchant_profile.php', // Your PHP file
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log("Raw Text Response:", response.status);

                    // let json = JSON.parse(response);
                    // console.log("Parsed JSON:", json)
                    if (response.status === 'success') {
                        $('#toast').fadeIn().delay(3000).fadeOut(); // Show notification
                        $('#profileForm')[0].reset(); // Clear form
                        $('#inputChoosePassword').val('');
                        $('#confirmpassword').val('');
                    } else {
                        alert("Error: " + response.message); // 👈 show real err
                    }
                },
                error: function(xhr, status, error) {
                    console.log("XHR:", xhr);
                    console.log("Status:", status);
                    console.log("Error:", error);
                    alert("AJAX error: " + xhr.responseText);
                }
            });
        });
    </script>

</body>

</html>