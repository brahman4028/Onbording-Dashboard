<?php include 'template/header.php'; ?>
<!--wrapper-->

<style> 
.autth-img-cover-login {
    background-image: url('./assets/images/loginpage.jpg');
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

</style>

<div class="autth-img-cover-login">
	
<div class="wrapper">
	<div class="section-authentication-cover ">
		<div class="">
			<div class="row g-0 autth-img-cover-login">

				<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

					<div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0 autth-img-cover-login ">
						<div class="card-body">
							<!-- ./assets/images/login-images/login-cover.svg -->
							<!-- <img src="./assets/images/loginpage.jpg" class="img-fluid auth-img-cover-login" width="100%" alt="" /> -->
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
												<p class="mb-0">Don't have an account yet? <a href="register.php">Sign up here</a></p>
											</div>
										</div>
									</form>

								</div>
								<div class="login-separater text-center mb-5"> <span>OR SIGN IN WITH</span>
									<hr>
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
<?php include 'template/footer.php'; ?>