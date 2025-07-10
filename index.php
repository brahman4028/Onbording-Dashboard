<?php
include 'middleware.php';
?>
<?php include 'template/header.php'; ?>


<!-- wrapper -->
	<div class="wrapper">
	<?php include 'template/sidebar-header.php'; ?>
		<!--end sidebar-wrapper-->
		<!--header-->
	
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="card radius-15 overflow-hidden">
								<div class="card-body">
									<div class="d-flex">
										<div>
											<p class="mb-0 font-weight-bold">Totol Client</p>
											<h2 class="mb-0">501</h2>
										</div>
										<div class="ms-auto align-self-end">
											<p class="mb-0 font-14 text-primary"><i class='bx bxs-up-arrow-circle'></i>  <span>1.01% 31 days ago</span>
											</p>
										</div>
									</div>
									<div id="chart1"></div>
								</div>
							</div>
						</div>

					</div>
					<!--end row-->


				
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		

<?php include 'template/footer-copyright.php';  ?>

<?php include 'template/footer.php';  ?>