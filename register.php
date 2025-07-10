  <!-- <?php include 'middleware.php';?>  -->
<?php include 'template/header.php'; ?>
<!--wrapper-->
<div class="wrapper">
	<div class="section-authentication-cover">
		<div class="">
			<div class="row g-0">

				<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

					<div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
						<div class="card-body">
							<img src="assets/images/login-images/register-cover.svg" class="img-fluid auth-img-cover-login" width="550" alt="" />
						</div>
					</div>

				</div>

				<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
					<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
						<div class="card-body p-sm-5">
							<div class="">
								<div class="mb-3 text-center">
									<img src="assets/images/logo-icon.png" width="60" alt="" />
								</div>
								<div class="text-center mb-4">
									<h5 class="">Rocker Admin</h5>
									<p class="mb-0">Please fill the below details to create your account</p>
								</div>
								<div class="form-body">
									<form action="auth/register_process.php" method="POST">
										<div class="col-12">
											<label for="inputUsername" class="form-label">Username</label>
											<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Jhon" required>
										</div>

										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="example@user.com" required>
										</div>

										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password" required>
												<a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
										</div>

										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">Sign up</button>
											</div>
										</div>

										<div class="col-12">
											<div class="text-center">
												<p class="mb-0">Already have an account? <a href="login.php">Sign in here</a></p>
											</div>
										</div>
									</form>


								</div>
								<div class="login-separater text-center mb-5"> <span>OR SIGN UP WITH EMAIL</span>
									<hr />
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



<?php include 'template/footer.php'; ?>