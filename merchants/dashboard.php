<?php include '../db.php';

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$address = "";
$accountnumber = "";
$accountnumberadn = "";
error_reporting(0);

session_start();

// if (!isset($_SESSION['merchant_info']) || !isset($_SESSION['merchant_info']['username'])) {
//     // Redirect to registration page
//     header("Location: merchant_login.php");
//     exit();
// }

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baloot Cloud Dashboard Replica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f5f7;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar {
            height: 100vh;
            background: #fff;
            border-right: 1px solid #ddd;
            padding: 1rem;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            z-index: 1000;
        }

        .main-content {
            /* margin-left: 16.666667%; */
            transition: margin-left 0.3s;
            /* padding: 1rem; */
        }

        .row>* {

            padding-right: 0px;
            padding-left: 0px;

        }

        .main-header {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid #ddd;
            padding: 1rem;
        }

        .main-body {
            padding: 25px;
        }

        .section {
            display: none;
            animation: fadeIn 0.4s ease forwards;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sidebar .nav-link {
            color: #333;
            padding: 0.75rem 1rem;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: #f0f0f0;
            border-radius: 5px;
            color: #ff5a00;
        }

        .theme-switcher {
            position: fixed;
            bottom: 10px;
            left: 20px;
        }

        body.dark-mode {
            background: #1e1e1e;
            color: #eaeaea;
        }

        body.dark-mode .sidebar {
            background: #2c2c2c;
            border-color: #444;
        }

        body.dark-mode .sidebar .nav-link {
            color: #ccc;
        }

        body.dark-mode .sidebar .nav-link.active,
        body.dark-mode .sidebar .nav-link:hover {
            background: #3a3a3a;
            color: #ff5a00;
        }

        body.dark-mode .main-header {
            background-color: rgba(42, 42, 42, 0.8);
            border-color: #444;
        }

        .right-panel {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100vh;
            background: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
            transition: right 0.5s ease;
            z-index: 1050;
            padding: 0;
            overflow-y: auto;
        }

        .right-panel.active {
            right: 0;
        }

        .right-panel-header {
            position: sticky;
            top: 0;
            background: #fff;
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            z-index: 10;
        }

        body.dark-mode .right-panel {
            background: #2a2a2a;
            color: #eaeaea;
        }

        body.dark-mode .right-panel-header {
            background: #2a2a2a;
            border-color: #444;
        }

        .logout-btn {
            background-color: #ffe5e5;
            /* light red */
            border: 1px solid #ff4d4d;
            /* red border */
            color: #ff4d4d;
            /* red text/icon */
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 400;
            display: inline-flex;
            width: 100%;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            margin-top: 5px;
        }

        .logout-btn:hover {
            background-color: #ffcccc;
            color: #d90000;
            border-color: #d90000;
        }

        .logout-btn i {
            font-size: 16px;
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

        .notifications-card {
            background: linear-gradient(145deg, #f5f7fa, #e2e8f0);
            border-radius: 1rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .notifications-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.03) 1px, transparent 1px),
                linear-gradient(180deg, rgba(0, 0, 0, 0.03) 1px, transparent 1px);
            background-size: 20px 20px;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .notifications-card .card-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .notifications-list {
            list-style: none;
            padding-left: 0;
            position: relative;
            z-index: 1;
        }

        .notifications-list li {
            display: flex;
            align-items: start;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 0.95rem;
            color: #333;
            border-bottom: 1px solid #cacacaff;
            padding-bottom: 5px;
        }

        .notifications-list li::before {
            content: "•";
            color: #6c63ff;
            font-size: 1.5rem;
            line-height: 1;
        }

        .notifications-separator {
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            margin-top: 1.5rem;
            position: relative;
            z-index: 1;
        }
        
        .stat {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .subtext {
            color: #888;
            font-size: 0.85rem;
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

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                left: -100%;
                transition: left 0.3s ease;
                width: 60%;
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                /* padding: 1rem; */
            }

            .hamburger {
                display: inline-block;
                font-size: 1.5rem;
                cursor: pointer;
            }
        }
    </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar d-flex flex-column" id="sidebar">
                <h4 class="mb-4 d-flex justify-content-between align-items-center">
                    <img src="../assets/images/itstarlogo.png" alt="Logo" class="img-fluid" width="150px">
                    <span class="d-md-none hamburger" onclick="toggleSidebar()"><i class="fa-solid fa-xmark"></i></span>
                </h4>
                <ul class="nav flex-column">
                    <!-- <li class="nav-item"><a class="nav-link" href="#" onclick="openPanel('sd')">dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="openPanel('Domains')">Domains</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="openPanel('DNS')">DNS</a></li> -->

                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('Dashboard')"><i class='bx bx-bar-chart-alt-2'></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('Your Application')"><i class='bx bx-user'></i> Your Application</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('New Application')"><i class='bx bx-plus-circle'></i> New Application</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('Payout Link')"><i class='bx bx-link'></i> Payout Link</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('Bank Account')"><i class='bx bx-credit-card'></i> Bank Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('Webhooks & API')"><i class='bx bx-plug'></i> Webhooks & API</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('View Application')"><i class='bx bx-detail'></i> View Application</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showMainSection('View Profile')"><i class='bx bx-detail'></i> View Profile</a></li>
                </ul>
                <div class="theme-switcher mt-auto">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkSwitch">
                        <label class="form-check-label" for="darkSwitch">Dark Mode</label>
                    </div>

                </div>
            </nav>
            <main class="col-md-10 offset-md-2 main-content">
                <div class="main-header d-flex justify-content-between align-items-center">
                    <h4 id="mainHeaderTitle">Welcome</h4>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-light border rounded-pill d-flex align-items-center gap-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-user-circle fs-5"></i>
                                <span class="fw-semibold">Hello, <?php echo $username; ?></span>
                                <!-- <button class="btn btn-outline-danger btn-sm"><i class='bx bx-log-out'></i> Logout</button> -->
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" onclick="showMainSection('View Profile')"><i class='bx bx-user me-2'></i> View Profile</a></li>
                                <li><a class="dropdown-item" onclick="showMainSection('View Profile')"><i class='bx bx-lock me-2'></i> Change Password</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="merchant_logout.php"><i class='bx bx-log-out me-2'></i> Logout</a></li>
                            </ul>
                        </div>
                        <span class="d-md-none hamburger" onclick="toggleSidebar()">&#9776;</span>
                    </div>

                </div>
                <div class="main-body">
                    <div id="Dashboard" class="section active">
                        <?php include 'home_dashboard.php' ?>
                    </div>
                    <!-- ///////////////////////////////////////////////// -->
                    <div id="Your Application" class="section">
                        <div class="col-md-8">
                            <div class="card p-3 bg-white ">
                                <?php include 'previous_application_status.php' ?>
                            </div>
                        </div>
                    </div>
                    <!-- ////////////////////////////////////////// -->
                    <div id="New Application" class="section">
                        <p>This is the WP Configuration section.</p>
                    </div>
                    <div id="Payout Link" class="section">
                        <p>This is the Backup section.</p>
                    </div>
                    <!-- ////////////////////////////////////////////////// -->
                    <div id="Bank Account" class="section">
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
                        <!-- ///////////////////////////////////////////// -->
                        <!-- Tab 6: Adding secondary bank account  -->
                        <div id="addsecondarybankaccount" class="tab-section">
                            <?php include 'addbankaccount2.php' ?>
                        </div>
                        <!-- //////////////////////////////////////////// -->
                    </div>
                    <div id="Webhooks & API" class="section">
                        <?php include 'webhook_api.php' ?>
                    </div>
                    <div id="View Application" class="section">
                        <p>This is the Setting section.</p>
                    </div>
                    <!-- ////////////////////////////////////// -->

                    <!-- view profile -->
                    <div id="View Profile" class="section tab-section ">
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
                                        <button class="btn btn-cancel me-2" onclick="showMainSection('Dashboard')">Cancel</button>
                                        <button class="btn btn-proceed btn-primary" type="submit">Update</button>
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
                    <!-- /////////////////////////////////////// -->
                </div>
            </main>
            <div class="right-panel" id="rightPanel">
                <div class="right-panel-header d-flex justify-content-between align-items-center">
                    <h4 id="panelTitle">Panel</h4>
                    <button class="btn-close" onclick="closePanel()"></button>
                </div>
                <div id="panelContent" class="p-4">
                    <!-- Dynamic content gets loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('darkSwitch').addEventListener('change', function() {
            document.body.classList.toggle('dark-mode', this.checked);
        });

        function openPanel(section) {
            document.getElementById('rightPanel').classList.add('active');
            document.getElementById('panelTitle').textContent = section;
            toggleSidebar();
            document.getElementById('panelContent').innerHTML = `<p>Panel content for <strong>${section}</strong></p>`;

        }

        function closePanel() {
            document.getElementById('rightPanel').classList.remove('active');
        }

        function showMainSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(sec => sec.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
            document.getElementById('mainHeaderTitle').textContent = sectionId;
            toggleSidebar();
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>

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

<!-- password show hide -->

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