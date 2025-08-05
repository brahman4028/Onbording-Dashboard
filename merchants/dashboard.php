<?php include '../db.php';

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$address = "";
$accountnumber = "";
	$accountnumberadn = "";
error_reporting(0);

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
	$accountnumber = $appData['accountnumber'];
	$accountnumberadn = $appData['accountnumberadn'];
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
   
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-2 me-6 position-fixed" style="width: 240px; left: 0; top: 0; z-index: 1000;">
            <div>
                <div class="text-start mt-2 fs-5 ms-2 me-5 fw-bold mb-4">Merchant Dashboard</div>

                <ul class="nav flex-column">
                    <li><a class="nav-link active" onclick="showTab('dashboard')"><i class='bx bx-bar-chart-alt-2'></i>Dashboard</a></li>
                    <li><a class="nav-link" onclick="showTab('yourApp')"><i class='bx bx-user'></i>Your Application</a></li>
                    <li><a class="nav-link" onclick="showTab('newApp')"><i class='bx bx-plus-circle'></i>New Application</a></li>
                    <li><a class="nav-link" onclick="showTab('payout')"><i class='bx bx-link'></i>Payout Link</a></li>
                    <li><a class="nav-link" onclick="showTab('bankaccount')"><i class='bx bx-credit-card'></i>Bank Account</a></li>
                    <li><a class="nav-link" onclick="showTab('api')"><i class='bx bx-plug'></i>Webhooks & API</a></li>
                    <li><a class="nav-link" onclick="showTab('viewapplication')"><i class='bx bx-detail'></i>View Application</a></li>

                </ul>
            </div>

            <!-- //////////////////// -->
            <div class="sidebar-bottom d-flex justify-content-between px-2 mt-3 " style="flex-direction: column;">
                <!-- <a class="nav-link"></i>Need Help?</a> -->
                <a class="nav-link"><i class='bx bx-cog'></i>Settings</a>
                <a class="nav-link"><i class='bx bx-key'></i>Credentials</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1" style="margin-left: 240px; ">
            <!-- Header -->
            <div class="header d-flex justify-content-between align-items-center px-4 py-2 position-sticky top-0 z-3" style="backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.8); border-bottom: 1px solid #ddd;">
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
                <!-- Tab 1: Dashboard -->
                <div id="dashboard" class="tab-section active">
                    <h4 class="mb-4">Your Previous Applications</h4>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="card p-3 bg-white">
                                <div class="card-title">Total Revenue</div>
                                <div class="stat text-success">$40,109</div>
                                <div class="subtext">+12.5% this week</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 bg-white">
                                <div class="card-title">Products Sold</div>
                                <div class="stat text-primary">1,951</div>
                                <div class="subtext">+3.2% increase</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 bg-white">
                                <div class="card-title">New Customers</div>
                                <div class="stat text-warning">4,514</div>
                                <div class="subtext">+5.8% growth</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3 bg-white">
                                <div class="card-title">New Customers</div>
                                <div class="stat text-warning">4,514</div>
                                <div class="subtext">+5.8% growth</div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Application + Chart -->
                    <div class="row mb-4">

                        <!-- application status -->
                        <div class="col-md-8">
                            <div class="card p-3 bg-white ">
                                <?php include 'previous_application_status.php' ?>
                            </div>
                        </div>

                        <!-- ////////////////////// -->
                        <div class="col-md-4">
                            <div class="card p-3 bg-white">
                                <div class="card-title">Weekly Stats</div>
                                <canvas id="weeklyChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Notifications -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card p-4 bg-white">
                                <div class="card-title">Application Status</div>
                                <ul class="list-group list-group-flush mt-3">
                                    <?php include 'application_status.php' ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="notifications-card">
                                <div class="card-title">🔔 Notifications</div>
                                <ul class="notifications-list">
                                    <?php if ($appData['coment']) : ?>
                                        <li><?= htmlspecialchars($appData['coment']) ?></li>
                                    <?php endif; ?>
                                    <?php if ($appData['kyccomment']) : ?>
                                        <li>KYC: <?= htmlspecialchars($appData['kyccomment']) ?></li>
                                    <?php endif; ?>
                                    <?php if ($appData['documentscomment']) : ?>
                                        <li>Business Documents: <?= htmlspecialchars($appData['documentscomment']) ?></li>
                                    <?php endif; ?>
                                    <?php if ($appData['bankcomment']) : ?>
                                        <li>Bank Account: <?= htmlspecialchars($appData['bankcomment']) ?></li>
                                    <?php endif; ?>
                                </ul>
                                <div class="notifications-separator"></div>
                            </div>
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

                <!-- Tab 2: previous Application -->
                <div id="yourApp" class="tab-section">
                    <h4 class="mb-4">Previuos Application</h4>
                   
                        <div class="col-md-8">
                            <div class="card p-3 bg-white ">
                                <?php include 'previous_application_status.php' ?>
                            </div>
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

                <!-- Tab 4: Bank Account Verification 1 -->
                <div id="bankaccount" class="tab-section card border shadow-sm p-2">
                    <?php include 'bankaccount1.php' ?>

                    <div class="section-divider mb-3"></div>
                    <!-- Tab 4: Bank Account Verification 2 -->
                    <?php include 'bankaccount2.php' ?>

                    <!-- Notification -->
                    <div id="toast" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999; display: none;">
                        <div class="toast align-items-center text-white bg-success border-0 show">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Bank account added successfully!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- only to run script -->

                <div>

                </div>


                <!-- Tab 4: Webhooks & API  -->
                <div id="api" class="tab-section">
                   
                        <?php include 'webhook_api.php' ?>
              
                </div>

                <!-- Tab 5: View Application  -->
                <div id="viewapplication" class="tab-section">
                    <h4 class="mb-4">view APplication</h4>
                    <div class="application-card">
                        <p>Upload your KYC documents for verification.</p>
                  
                        <!-- Add KYC upload UI -->
                    </div>
                </div>

                <!-- Tab 6: Adding secondary bank account  -->
                <div id="addsecondarybankaccount" class="tab-section">
                    <?php include 'addbankaccount2.php' ?>
                </div>


                <!-- view profile -->
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
            <!-- ///////////////////// -->
        </div>
    </div>
    </div>

    <!-- Script to handle tab switch -->
    <script>
        function showTab(tabId) {
            document.querySelectorAll('.tab-section').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');
            console.log(event.target);
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

    <!-- //////////////////// -->

    <script>
        const ctx = document.getElementById('weeklyChart').getContext('2d');
        const weeklyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Sales',
                    data: [120, 190, 300, 250, 270, 380, 410],
                    borderColor: '#4e73df',
                    backgroundColor: 'rgba(78, 115, 223, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>


    <!-- update secondary bank account info -->
    <script>
        $('#addbankAccountForm2').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this); // 🔥 Automatically handles file + text fields

            $.ajax({
                url: 'add_secondary_bank_account.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false, // 🔥 Required for FormData to work
                processData: false, // 🔥 Don't convert to query string
                success: function(response) {
                    console.log("Response:", response);

                    if (response.status === 'success') {
                        $('#addbankAccountForm2')[0].reset();
                        $('#toast2').fadeIn().delay(3000).fadeOut();

                        // Refresh the page 3 seconds after toast appears
                        setTimeout(function() {
                            location.reload(); // This refreshes the page
                        }, 3000);
                        

                    } else {
                        alert("Error: " + response.message);
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