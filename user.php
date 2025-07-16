<?php
include 'middleware.php';
include 'db.php';


// Redirect if user is not admin
if ($_SESSION['user']['role'] !== 'admin') {
    echo "❌ Access Denied: Admins only.";
    exit();
}

// SQL query to fetch users
$query = "SELECT id, username, email, role FROM users";
$result = mysqli_query($mysqli, $query);
?>

<?php include 'template/header.php'; ?>

<div class="wrapper">
	<?php include 'template/sidebar-header.php'; ?>

	<div class="page-wrapper">
		<div class="page-content">
			<!-- Breadcrumb -->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">User List</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><i class="bx bx-home-alt"></i></li>
							<li class="breadcrumb-item active" aria-current="page">Home</li>
						</ol>
					</nav>
				</div>
			</div>
			<!-- End Breadcrumb -->
			
			<div class="card">
				<div class="card-body">

					<!-- Search Bar -->
					<div class="d-lg-flex align-items-center mb-4 gap-3">
						<div class="position-relative">
							<input type="text" class="form-control ps-5 radius-30" placeholder="Search User" id="searchInput">
							<span class="position-absolute top-50 product-show translate-middle-y">
								<i class="bx bx-search"></i>
							</span>
						</div>
					</div>

					<!-- Table -->
					<div class="table-responsive">
						<table class="table mb-0">
							<thead class="table-light">
								<tr>
									<th>ID</th>
									<th>User Name</th>
									<th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody id="userlist">
								<?php 
								if ($result && mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>
											<td>#{$row['id']}</td>
											<td>{$row['username']}</td>
											<td>{$row['email']}</td>
                                            <td>{$row['role']}</td>
                                            <td>
											<div class='d-flex order-actions'>
											<a href='update_user.php?id={$row['id']}' target='_blank'><i class='bx bxs-edit'></i>edit</a>
											</div>
										</td>
										</tr>";
									}
								} else {
									echo "<tr><td colspan='4'>No users found.</td></tr>";
								}
								?>
							</tbody>
						</table>
					</div>

				</div>
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

	<?php include 'template/footer-copyright.php'; ?>
	<?php include 'template/footer.php'; ?>
</div>
