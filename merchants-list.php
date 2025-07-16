<?php
include 'middleware.php';
include 'db.php';
?>

<style> 

</style>

<?php include 'template/header.php'; ?>

<div class="wrapper autth-img-cover-login">
	<?php include 'template/sidebar-header.php'; ?>

	<div class="page-wrapper blr1">
		<div class="page-content">
			<!-- Breadcrumb -->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" >
				<div class="breadcrumb-title pe-3">Merchants List</div>
				<div class="ps-3" >
					<nav aria-label="breadcrumb" >
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;" ><i class="bx bx-home-alt"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page" >Home</li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary" style="z-index: 100;"><a href="index.php" style="color:white" target="_blank">Add New Merchant</a></button>
						
							
						</div>
					</div>
			</div>
			<!-- End Breadcrumb -->
			<?php
			// Pagination setup
			$limit = 10;
			$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
			if ($page <= 0) $page = 1;
			$offset = ($page - 1) * $limit;
			// Filter merchant_id (static 'n' or dynamic via session)
			$merchant_id = 'n';
			// Total records with condition
			$total_result = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM business_applications WHERE merchant_trash = '$merchant_id'");
			if (!$total_result) {
				die("Count Query Failed: " . mysqli_error($mysqli));
			}
			$total_row = mysqli_fetch_assoc($total_result);
			$total_records = $total_row['total'];
			$total_pages = ceil($total_records / $limit);

			// Paginated data with same condition
			$sql = "SELECT * FROM business_applications WHERE merchant_trash = '$merchant_id' ORDER BY id DESC LIMIT $limit OFFSET $offset";
			$result = mysqli_query($mysqli, $sql);
			if (!$result) {
				die("Data Query Failed: " . mysqli_error($mysqli));
			}
			?>
			<div class="card blr">
				<div class="card-body">

					<!-- Search Bar -->
					<div class="d-lg-flex align-items-center mb-4 gap-3">
						<div class="position-relative">
							<input type="text" class="form-control ps-5 radius-30" placeholder="Search Merchant" id="searchInput">
							<span class="position-absolute top-50 product-show translate-middle-y">
								<i class="bx bx-search"></i>
							</span>
						</div>
					</div>

					<!-- Table -->
					<div class="table-responsive blr">
						<table class="table mb-0 blr">
							<thead class="table-light blr">
								<tr>
									<th>Application ID</th>
									<th>Business Name</th>
									<th>Signatory Name</th>
									<th>Status</th>
									<th>Date</th>
									<th>View Details</th>
									<th>Actions</th>
									<th>Comment</th>
								</tr>
							</thead>
							<tbody id="merchantTable blr">
								<?php while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									$businessname = $row['businessname'];
									$fullname = $row['fullname'];
									$status = $row['status'];
									$coment = $row['coment'];
									$created_at = date('F d, Y', strtotime($row['created_at']));

									echo "<tr>
										<td>#{$id}</td>
										<td>{$businessname}</td>
										<td>{$fullname}</td>
										<td>{$status}</td>
										<td>{$created_at}</td>
										<td>
    <a href='view_application.php?id=" . $id . "' target='_blank' class='btn btn-primary btn-sm radius-30 px-4'>View PDF</a>
</td>";

									// Show edit/delete buttons only if user is admin
									if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
										echo "<td>
											<div class='d-flex order-actions'>
												<a href='edit_applications.php?id={$id}' target='_blank'><i class='bx bxs-edit'></i>edit</a>
												<a href='archive.php?id={$id}' class='ms-3' onclick=\"return confirm('⚠️ Are you sure you want to delete this application? This action cannot be undone.')\">
													<i class='bx bxs-trash'></i>
												</a>
											</div>
										</td>";
									} else {
										echo "<td>-</td>";
									}

									echo "<td>{$coment}</td>
									</tr>";
								} ?>
							</tbody>
						</table>
					</div>

					<!-- Pagination -->
					<div class="mt-4 text-center">
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">

								<!-- Previous Button -->
								<li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
									<a class="page-link" href="?page=<?php echo max(1, $page - 1); ?>">Previous</a>
								</li>

								<!-- Page Numbers -->
								<?php for ($i = 1; $i <= $total_pages; $i++): ?>
									<li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
										<a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
									</li>
								<?php endfor; ?>

								<!-- Next Button -->
								<li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
									<a class="page-link" href="?page=<?php echo min($total_pages, $page + 1); ?>">Next</a>
								</li>

							</ul>
						</nav>
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