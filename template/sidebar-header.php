	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-img.png" class="logo-icon" alt="logo icon">
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>
				<li>
					<a href="merchants-list.php">
						<div class="parent-icon"><i class='bx bx-grid-alt'></i>
						</div>
						<div class="menu-title">Merchants List</div>
					</a>
				</li>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class="bx bx-lock"></i>
						</div>
						<div class="menu-title">Authentication</div>
					</a>
					<ul>
						<li>
						<li><a href="login.php" target="_blank"><i class='bx bx-radio-circle'></i>Login</a></li>
						
							<li>
								<a href="register.php" target="_blank">
									<i class='bx bx-radio-circle'></i> Register
								</a>
							</li>
						

				</li>
			</ul>
			</li>
			<?php endif; ?>
			<!-- <li>
				<a href="user-profile.html">
					<div class="parent-icon"><i class="bx bx-user-circle"></i>
					</div>
					<div class="menu-title">User Profile</div>
				</a>
			</li> -->

			<li>
				<a href="https://itstarpay.com/contact-us/">
					<div class="parent-icon"><i class="bx bx-support"></i>
					</div>
					<div class="menu-title">Support</div>
				</a>
			</li>
			</ul>
			<hr class="mt-2">

			<ul class="metismenu" id="menu1" style="margin-top: -15px !important;">
				<li>
				<a href="trash.php" style="color:#ff4e4e;">
					<div class="parent-icon" ><i class="bx bx-trash"></i>
					</div>
					<div class="menu-title">Trash</div>
				</a>
			</li>
			</ul>
		
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->


		<!-- top header  -->

		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					<div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						<a href="avascript:;" class="btn d-flex align-items-center"><i class='bx bx-search'></i>Search</a>
					</div>

					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>

							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-app">

								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2"></div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">

									<div class="header-notifications-list"></div>

								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">

									<div class="header-message-list">

									</div>

								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
													<li><a class="dropdown-item d-flex align-items-center" href="index.php"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
							</li>
						
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->

		<!--end  top header  -->