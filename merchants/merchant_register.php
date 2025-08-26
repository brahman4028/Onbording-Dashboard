<?php
// session_start();

// Redirect if user is not logged in
// if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }

// Redirect if user is not admin

// Continue with registration logic below...
require_once '../db.php';
?>
<?php include 'header.php'; ?>

<?php

session_start();



// Generate 4-digit OTP
// $otp = rand(1000, 9999);

// // Store OTP in session
// $_SESSION['otp'] = $otp;

// echo $_SESSION['otp'];
unset($_SESSION['otp']);

?>


<link rel="icon" href="../assets/images/starfav.png" type="image/png" />

<style>
	.autth-img-cover-login {
		background-image: url('../assets/images/sales.jpg');
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
<div class="wrapper autth-img-cover-login">
	<div class="section-authentication-cover">
		<div class="">
			<div class="row g-0">

				<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

					<div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0 autth-img-cover-login " style="position:relative;">
						<div class="card-body d-flex p- " style="flex-direction: row;  justify-content: start; align-items:end;">
							<!-- <img src="assets/images/login-images/register-cover.svg" class="img-fluid auth-img-cover-login" width="550" alt="" /> -->
							<div class="blr1 p-3 rounded" style="height: auto; width:600px">
								<button class="btn blr border rounded-pill shadow"> Login to View Your Application</button>
								<p class="mt-2">ItStarPay is your trusted partner for streamlined vendor payouts and HRMS solutions. Manage payments, compliance, and onboarding in one place.</p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center blr">
					<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
						<div class="card-body p-sm-5">
							<div class="">
								<div class="mb-3 text-center">
									<img src="../assets/images/logo-img.png" width="200" alt="" />
								</div>
								<div class="text-center mb-4">
									<h5 class="">Merchant Registration</h5>
									<p class="mb-0">Please fill the below details to create your account</p>
								</div>
								<div class="form-body">
									<form action="registration.php" method="POST" id="signupForm">
										<div class="col-12">
											<label for="inputUsername" class="form-label">Your Name</label>
											<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Jhon toe" required>
										</div>

										<div class="col-12 mt-2 mb-2">
											<div>
												<div class="col-12 mt-2 mb-2 d-flex align-items-end gap-2">
													<div class="flex-grow-1">
														<label for="inputEmailAddress" class="form-label mb-0">Email Address</label>
														<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="example@user.com" onblur="validateEmail(this, 'personalemailadn-error', 'personalemailadnvalue')" required>
														<div id="personalemailadn-error" class="text-danger mt-1 d-none">
															❌ Please enter a valid email address
														</div>



													</div>
													<div>
														<button type="button" class="btn btn-primary " onclick="showOTPSection()">Verify</button>
													</div>
												</div>
												<div id="email-status" class="mt-1 text-success d-none"></div>
											</div>

										</div>

										<!-- OTP Section: hidden by default -->
										<div class="col-12 mt-1 d-none" id="otp-section">
											<label class="form-label">Enter OTP</label>
											<div class="d-flex gap-2 mb-2">
												<input type="text" maxlength="1" class="form-control otp-input text-center" id="otp1" oninput="moveFocus(this, 'otp2')" >
												<input type="text" maxlength="1" class="form-control otp-input text-center" id="otp2" oninput="moveFocus(this, 'otp3')" >
												<input type="text" maxlength="1" class="form-control otp-input text-center" id="otp3" oninput="moveFocus(this, 'otp4')" >
												<input type="text" maxlength="1" class="form-control otp-input text-center" id="otp4" >
											</div>
											<button type="button" id="verify-btn" class="btn btn-success btn-sm" onclick="verifyOTP()">Verify</button>

											<div id="otp-error" class="text-danger mt-2 d-none">
												❌ Please enter the correct OTP
											</div>
											<div id="otp-success" class="text-success mt-2 d-none">
												✅ OTP verified successfully
											</div>
										</div>
										<div class="col-12 mt-2 mb-2">
											<label for="inputPhoneAddress" class="form-label">Your Number</label>
											<input type="tel" class="form-control" name="phone" id="inputPhoneAddress" placeholder="Enter 10 Digit Number" pattern="[0-9]{10}" onblur="validatePhone(this, 'numberadn-error', 'numberadnvalue')" required>
											<div id="numberadn-error" class="text-danger small d-none">❌ Enter valid 10-digit mobile number</div>
										</div>

										<div class="col-12 mt-2 mb-2">
											<label for="inputChoosePassword" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password" required>
												<a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
										</div>
										<!-- Password Strength Meter -->
										<div class="mt-2">
											<div class="progress" style="height:5px;">
												<div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
											</div>
											<small id="passwordHelp" class="form-text text-muted">Password must include:</small>
											<ul class="mb-2" style="list-style: none; padding-left: 0;">
												<li id="length" class="text-muted">✔️ 12 or more characters</li>
												<li id="uppercase" class="text-muted">✔️ At least one uppercase letter</li>
												<li id="number" class="text-muted">✔️ At least one number</li>
												<li id="symbol" class="text-muted">✔️ At least one special character</li>
											</ul>

										</div>



										<div class="col-12 mt-3 mb-2">
											<div class="d-grid ">
												<button type="submit" id="submitBtn" class="btn btn-primary">Sign up</button>
											</div>
										</div>

										<div class="col-12">
											<div class="text-center">
												<p class="mb-0">Already have an account? <a href="merchant_login.php">Sign in here</a></p>
											</div>
										</div>
									</form>


								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
			<!--end row-->
		</div>
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

	function showOTPSection() {
		const emailInput = document.getElementById('inputEmailAddress').value;
		// const otp = document.getElementById('otp').value;
		const emailError = document.getElementById('personalemailadn-error');
		const emailStatus = document.getElementById('email-status');
		const verifyBtn = document.getElementById('verify-btn');

		const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		if (emailPattern.test(emailInput)) {
			// Hide error
			emailError.classList.add('d-none');

			// Show sending status
			emailStatus.classList.remove('d-none');
			emailStatus.innerHTML = `<span class="text-primary">Sending... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>`;
			verifyBtn.disabled = true; // disable button while sending

			// Send OTP
			fetch('merchant_otp.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					},
					body: 'email=' + encodeURIComponent(emailInput)
				})
				.then(response => response.json())
				.then(data => {
					if (data.status === 'success') {
						emailStatus.innerHTML = `<span class="text-success">OTP Sent!</span>`;
						document.getElementById('otp-section').classList.remove('d-none');
					} else {
						emailStatus.innerHTML = `<span class="text-danger">❌ Error: ${data.message}</span>`;
					}
				})
				.catch(error => {
					console.error('Error:', error);
					emailStatus.innerHTML = `<span class="text-danger">❌ Something went wrong.</span>`;
				})
				.finally(() => {
					verifyBtn.disabled = false; // re-enable button
				});

		} else {
			emailError.classList.remove('d-none');
			emailStatus.classList.add('d-none');
		}
	}



	// Function to move focus to next OTP field
	function moveFocus(current, nextFieldID) {
		if (current.value.length >= 1) {
			const next = document.getElementById(nextFieldID);
			if (next) next.focus();
		}
	}

	let isOTPVerified = false;

	// OTP verification (replace with backend logic)
	function verifyOTP() {


		const emailStatus = document.getElementById('email-status');
		const verifyBtn = document.getElementById('verify-btn');
		const enteredOTP =
			document.getElementById('otp1').value +
			document.getElementById('otp2').value +
			document.getElementById('otp3').value +
			document.getElementById('otp4').value;

		// const correctOTP = "1234"; // Replace with real OTP from backend

		const emailInput = document.getElementById('inputEmailAddress').value;

		fetch('verify_otp.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				body: 'email=' + encodeURIComponent(emailInput) + '&otp=' + encodeURIComponent(enteredOTP)
			})
			.then(res => res.json())
			.then(data => {
				if (data.status === 'success') {
					isOTPVerified = true;
					document.getElementById('otp-success').classList.remove('d-none');
					document.getElementById('otp-error').classList.add('d-none');
					document.getElementById('otp-section').classList.add('d-none');
					emailStatus.innerHTML = `<span class="text-success">Email Verified !</span>`;
				} else {
					isOTPVerified = false; // OTP invalid
					document.getElementById('otp-error').classList.remove('d-none');
					document.getElementById('otp-success').classList.add('d-none');
				}
			}).catch(err => {
				console.error('Error verifying OTP:', err);
				isOTPVerified = false;
			});

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
		const lengthValid = value.length >= 12;
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
		const lengthValid = password.length >= 12;
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

		if (!isOTPVerified) {
        e.preventDefault(); // block submission
        alert('Please verify your email first with the OTP.');
    }
	else{
		
		if (!isStrong) {
			e.preventDefault();
			alert("Password is too weak. Please make sure it meets all the strength requirements.");
		}
	}


	});

	
	 
</script>


<!-- //////// -->

<?php include '../template/footer.php'; ?>