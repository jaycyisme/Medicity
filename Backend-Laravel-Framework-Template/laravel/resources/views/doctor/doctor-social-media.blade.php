<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row">
						<div class="col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Profile Sidebar -->
                                @include('layouts.app.doctor-sidebar')
							<!-- /Profile Sidebar -->

						</div>

						<div class="col-lg-8 col-xl-9">
							<div class="dashboard-header">
								<h3>Social Media</h3>
							</div>
							<div class="add-btn text-end mb-4">
								<a href="#" class="btn btn-primary prime-btn add-social-media">Add New Social Media</a>
							</div>
							<form action="https://doccure.dreamstechnologies.com/html/template/social-media.html" class="social-media-form">
								<div class="social-media-links d-flex align-items-center">
									<div class="input-block input-block-new select-social-link">
										<select class="select form-control">
											<option selected>Facebook</option>
											<option>Linkedin</option>
											<option>Twitter</option>
											<option>Instagram</option>
										</select>
									</div>
									<div class="input-block input-block-new flex-fill">
										<input type="password" class="form-control" placeholder="Add Url">
									</div>
								</div>
								<div class="social-media-links d-flex align-items-center">
									<div class="input-block input-block-new select-social-link">
										<select class="select form-control">
											<option>Facebook</option>
											<option>Linkedin</option>
											<option selected>Twitter</option>
											<option>Instagram</option>
										</select>
									</div>
									<div class="input-block input-block-new flex-fill">
										<input type="password" class="form-control" placeholder="Add Url">
									</div>
								</div>
								<div class="social-media-links d-flex align-items-center">
									<div class="input-block input-block-new select-social-link">
										<select class="select form-control">
											<option>Facebook</option>
											<option selected>Linkedin</option>
											<option>Twitter</option>
											<option>Instagram</option>
										</select>
									</div>
									<div class="input-block input-block-new flex-fill">
										<input type="password" class="form-control" placeholder="Add Url">
									</div>
								</div>
								<div class="social-media-links d-flex align-items-center">
									<div class="input-block input-block-new select-social-link">
										<select class="select form-control">
											<option>Facebook</option>
											<option>Linkedin</option>
											<option>Twitter</option>
											<option selected>Instagram</option>
										</select>
									</div>
									<div class="input-block input-block-new flex-fill">
										<input type="password" class="form-control" placeholder="Add Url">
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
