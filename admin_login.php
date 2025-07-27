<?php include 'template/header.php'; ?>
<!--wrapper-->

 <link rel="icon" href="assets/images/starfav.png" type="image/png" />
<style> 
.autth-img-cover-login {
    background-image: url('./assets/images/sales2.jpg');
    background-size: cover;
    background-position: right center;
    background-repeat: no-repeat;
    width: 100%;
     height: 100%;/* or set a fixed height like 400px if needed */
}

.blr{
	background-color:rgba(254, 254, 254, 0.8) !important;
	backdrop-filter: blur(20px) !important;

}

.blr1 {
		background-color: rgba(254, 254, 254, 0.57) !important;
		backdrop-filter: blur(20px) !important;

	}

</style>

<div class="autth-img-cover-login">
	
<div class="wrapper">
	<div class="section-authentication-cover ">
		<div class="">
			<div class="row g-0 autth-img-cover-login">

				<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
					<div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0 autth-img-cover-login ">
						<div class="card-body d-flex p-3 " style="flex-direction: row;  justify-content: start; align-items:end;">
							<!-- <img src="assets/images/login-images/register-cover.svg" class="img-fluid auth-img-cover-login" width="550" alt="" /> -->
							 <div class="blr1 p-3 rounded" style="height: auto; width:600px">
								<button class="btn blr border rounded-pill shadow" > View Your Application Status</button>
								<p class="mt-2">ItStarPay is your trusted partner for streamlined vendor payouts and HRMS solutions. Manage payments, compliance, and onboarding in one place.</p>
							 </div>
						</div>
					</div>
				</div>
				<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center blr  ">
					<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
						<div class="card-body p-sm-5">
							<div class="">
								<div class="mb-3 text-center">
									<img src="./assets/images/itstarlogo.png" width="120" alt="">
								</div>
								<div class="text-center mb-4">
									<h5 class="">ItStarPay Admin</h5>
									<p class="mb-0">Please log in to your account</p>
								</div>
								<div class="form-body">
									<form class="row g-3" action="auth/login_process.php" method="POST">
										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email</label>
											<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="jhon@example.com" required>
										</div>

										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password" required>
												<a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
											</div>
										</div>


										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">Sign in</button>
											</div>
										</div>

										<div class="col-12">
											<div class="text-center">
												<p class="mb-0">Don't have an account yet? <a href="admin_register.php">Sign up here</a></p>
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
</div>
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
document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#show_hide_password a");
    const passwordInput = document.querySelector("#show_hide_password input");
    const icon = document.querySelector("#show_hide_password i");

    togglePassword.addEventListener("click", function (e) {
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

<?php include 'template/footer.php'; ?>