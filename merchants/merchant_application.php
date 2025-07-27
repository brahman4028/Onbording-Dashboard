<?php include '../db.php';

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['merchant_info']) || !isset($_SESSION['merchant_info']['username'])) {
    // Redirect to registration page
    header("Location: merchant_login.php");
    exit();
}

// Fetch user name
$username = $_SESSION['merchant_info']['username'];
$application_id = $_SESSION['merchant_info']['application_id'];
$merchantuseremail = $_SESSION['merchant_info']['email'];

if($application_id != ''){
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

// $id = $appData['id'];
// $gstin = $appData['gstin'];
// $pan = $appData['pan'];

}

echo $id;
echo $gstin;
echo $pan;


// echo $username;
// echo $application_id;


// echo $username;

?>

<?php include 'header.php'; ?>


<link rel="icon" href="../assets/images/starfav.png" type="image/png" />

<style>
    .autth-img-cover-login {
        background-image: url('../assets/images/sales7.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        /* or set a fixed height like 400px if needed */
    }

    .blr {
        background-color: rgba(254, 254, 254, 0.9) !important;
        backdrop-filter: blur(20px) !important;

    }

    .blr1 {
        background-color: rgba(254, 254, 254, 0.57) !important;
        backdrop-filter: blur(20px) !important;

    }
</style>


<!--wrapper-->
<div class="wrapper ">
    <div class="section-authentication-cover">

        <div class="row g-0">

            <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center d-none d-xl-flex">


                <div class="card rounded-0  shadow-none bg-transparent mb-0 autth-img-cover-login">
                    <div class="card-body d-flex p- " style="flex-direction: row;  justify-content: start; align-items:end;">
                        <!-- <img src="assets/images/login-images/register-cover.svg" class="img-fluid auth-img-cover-login" width="550" alt="" /> -->
                        sad
                    </div>
                </div>

            </div>

            <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center border p-0" style="position:relative;">
                <a href="../logout.php" 
   class="btn btn-outline-danger btn-sm rounded-pill" 
   style="position: absolute; bottom: 0; right: 0; margin: 1rem;">
   Logout
</a>

                <div class="cad shadow-none bg-transparent shadow-none rounded-0 mb-0  " style=" width:60%;">
                    <div class="card-body p-0" style="width: 100%;">
                        <div class="container-fluid">
                            <div class="mb-3 text-center">
                                <img src="../assets/images/logo-img.png" width="200" alt="" />
                            </div>
                            <div class="text-center mb-4">
                                <h5 class="">Start Your Journey</h5>
                                <p class="mb-0">Begin your merchant onboarding by completing the form, or check the status of your existing application.</p>
                            </div>
                            <!-- application form -->

                            <?php

                            if ($application_id != '') {
                                echo '<div class="card shadow-sm rounded-3 p-3" style="max-width: 700px;">
    <div class="row">
        <!-- Left Section -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between">
                <h5 class="mb-0">' . htmlspecialchars($appData["businessname"]) . '</h5>
            </div>
            <p class="text-muted mt-1 mb-3"><strong>GSTIN:</strong> ' . htmlspecialchars($appData["gstin"]) . '</p>
            <div class="mt-4">
                <small class="text-muted">Onboarding Date & Time: ' . htmlspecialchars($appData["created_at"]) . '</small><br>
                <span>Application status: <span class="badge bg-warning text-dark">' . htmlspecialchars($appData["status"]) . '</span></span>
            </div>
        </div>

        <!-- Right Section: Photo -->
        <div class="col-md-4 text-end">
            <img src="../' . htmlspecialchars($docData["photograph"]) . '" alt="Applicant Photo" class="img-thumbnail" style="width: 100%; height: 120px; object-fit: cover;"><br>
            Applicant:<p class="fw-semibold">' . htmlspecialchars($appData["fullname"]) . '</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <a href="../view_application.php?id=' . urlencode($id) . '&gstin=' . urlencode($gstin) . '&pan=' . urlencode($pan) . '" class="btn btn-primary text-center btn-back mt-2" style="box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.3); border-radius:30px;">
        View your application status <i class="bx bx-send ms-1"></i>
    </a>
</div>';

                            } else {
                                echo '<div class="card text-center border-0 shadow-sm p-4" style="max-width: 400px; margin: auto; border-radius: 1rem;">
                                <div class="card-body">
                                <h5 class="card-title mb-3">You\'re Almost There!</h5>
                                 <p class="card-text text-muted mb-4">It looks like you haven’t filled out your form yet. Start now to complete your onboarding.</p>
                                  <a href="../index.php" class="btn btn-primary rounded-pill px-4">Begin Onboarding</a>
                                 </div>
                                 </div>';
                            }
                            ?>



                            <!-- ////////// -->




                            <!-- //////////// -->
                        
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->
    </div>
</div>

<!-- Search Filter Script -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const filter = this.value.toUpperCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent || row.innerText;
            row.style.display = text.toUpperCase().includes(filter) ? '' : 'none';
        });
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
</script>

<!-- phone validation -->

<script>
    function validatePhone(input, errorId, targetId) {
        const value = input.value.trim();
        const errorEl = document.getElementById(errorId);
        // const targetEl = document.getElementById(targetId);

        // Always update preview
        // if (targetEl) {
        //     targetEl.textContent = value || '—';
        // }

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

<!-- validate email -->

<script>
    function validateEmail(input, errorId, targetId) {
        const value = input.value.trim();
        const errorEl = document.getElementById(errorId);
        // const targetEl = document.getElementById(targetId);

        // ✅ Always update preview
        // if (targetEl) {
        //     targetEl.textContent = value || '—';
        // }

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


<!-- protect from submitting -->

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

    function checkPasswordStrength(password) {
        const lengthValid = password.length >= 8;
        const uppercaseValid = /[A-Z]/.test(password);
        const numberValid = /[0-9]/.test(password);
        const symbolValid = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        return {
            valid: lengthValid && uppercaseValid && numberValid && symbolValid,
            lengthValid,
            uppercaseValid,
            numberValid,
            symbolValid
        };
    }

    document.getElementById("inputChoosePassword").addEventListener("input", function() {
        const value = this.value;
        const checks = checkPasswordStrength(value);

        // Update checklist colors
        document.getElementById("length").className = checks.lengthValid ? "text-success" : "text-muted";
        document.getElementById("uppercase").className = checks.uppercaseValid ? "text-success" : "text-muted";
        document.getElementById("number").className = checks.numberValid ? "text-success" : "text-muted";
        document.getElementById("symbol").className = checks.symbolValid ? "text-success" : "text-muted";

        // Update strength bar
        const strength = [checks.lengthValid, checks.uppercaseValid, checks.numberValid, checks.symbolValid].filter(Boolean).length;
        const strengthBar = document.getElementById("strengthBar");
        strengthBar.style.width = (strength * 25) + "%";
        strengthBar.className = "progress-bar";

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

    // Prevent form submission if password is weak
    document.getElementById("signupForm").addEventListener("submit", function(e) {
        const password = document.getElementById("inputChoosePassword").value;
        const isStrong = checkPasswordStrength(password).valid;

        if (!isStrong) {
            e.preventDefault();
            alert("Password is too weak. Please make sure it meets all the strength requirements.");
        }
    });
</script>


<!-- //////// -->

<?php include '../template/footer.php'; ?>