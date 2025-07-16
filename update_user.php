<?php
session_start();

// Continue with registration logic below...
require_once './db.php';

// Redirect if  user is not logged in
if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Redirect if user is not admin
if ($_SESSION['user']['role'] !== 'admin') {
    echo "❌ Access Denied: Only Admins can change the access.";
    exit();
}

// -----------------------


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Fetch user data
$username = $email = $password = $role = "";
if ($id > 0) {
    $stmt = $mysqli->prepare("SELECT username, email , password, role FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username, $email, $password, $role);
    $stmt->fetch();
    $stmt->close();
}


?>
<?php include 'middleware.php'; ?>
<?php include 'template/header.php'; ?>

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

<!--wrapper-->
<div class="wrapper autth-img-cover-login">
	<div class="section-authentication-cover">
		<div class="">
			<div class="row g-0">

				<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

					<div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0 autth-img-cover-login">
						<div class="card-body">
							<!-- <img src="assets/images/login-images/register-cover.svg" class="img-fluid auth-img-cover-login" width="550" alt="" /> -->
						</div>
					</div>

				</div>

				<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center blr">
					<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
						<div class="card-body p-sm-5">
							<div class="">
								<div class="mb-3 text-center">
									<img src="assets/images/logo-img.png" width="200" alt="" />
								</div>
								<div class="text-center mb-4">
									<h5 class="">Itstarpay Admin</h5>
									<p class="mb-0">Update user details and manage their role-based access rights.</p>
								</div>
								<div class="form-body">
									<form action="update_user_confirm.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
										<div class="col-12">
											<label for="inputUsername" class="form-label">Username</label>
											<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Jhon" value="<?php echo htmlspecialchars($username); ?>">
										</div>

										<div class="col-12 mt-2 mb-2">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="example@user.com" value="<?php echo htmlspecialchars($email); ?>">
										</div>

										<div class="col-12 mt-2 mb-2">
											<label for="inputChoosePassword" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password" value="<?php echo htmlspecialchars($password); ?>">
												<a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
										</div>
										<div class="col-12 mt-2 mb-2">
											<label for="inputSelectCountry" class="form-label">Select Role</label>
											<select class="form-select" name="role" aria-label="Select role" required>
												<option value="user" <?php echo ($role === 'user') ? 'selected' : ''; ?>>User</option>
												<option value="admin" <?php echo ($role === 'admin') ? 'selected' : ''; ?>>Admin</option>
											</select>

										</div>
                                        <hr />

										<div class="col-12 mt-3 mb-2">
											<div class="d-grid ">
												<button type="submit" class="btn btn-primary">Sign up</button>
											</div>
										</div>

									</form>


								</div>
									
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