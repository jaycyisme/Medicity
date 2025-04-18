<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row">
                        <!-- Profile Sidebar -->
                            @include('layouts.app.patient-sidebar')
                        <!-- /Profile Sidebar -->


						<div class="col-lg-8 col-xl-9">
							<div class="dashboard-header">
								<div class="header-back">
									<a href="appointments.html" class="back-arrow"><i class="fa-solid fa-arrow-left"></i></a>
									<h3>Appointment Details</h3>
								</div>
							</div>
							<div class="appointment-details-wrap">

								<!-- Appointment Detail Card -->
								<div class="appointment-wrap appointment-detail-card">
									<ul>
										<li>
											<div class="patinet-information">
												<a href="#">
													<img src="assets/img/doctors-dashboard/doctor-profile-img.jpg" alt="User Image">
												</a>
												<div class="patient-info">
													<p>#Apt0001</p>
													<h6><a href="#">Dr Edalin Hendry</a></h6>
													<div class="mail-info-patient">
														<ul>
															<li><i class="fa-solid fa-envelope"></i><a href="https://doccure.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="620706030e0b0c22071a030f120e074c010d0f">[email&#160;protected]</a></li>
															<li><i class="fa-solid fa-phone"></i> +1 504 368 6874</li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li class="appointment-info">
											<div class="person-info">
												<p>Type of Appointment</p>
												<ul class="d-flex apponitment-types">
													<li><i class="fa-solid fa-hospital text-green"></i>Direct Visit</li>
												</ul>
											</div>
										</li>
										<li class="appointment-action">
											<div class="detail-badge-info">
												<span class="badge bg-yellow">Upcoming</span>
											</div>
											<div class="consult-fees">
												<h6>Consultation Fees : $200</h6>
											</div>
											<ul>
												<li>
													<a href="#"><i class="fa-solid fa-comments"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa-solid fa-xmark"></i></a>
												</li>
											</ul>
										</li>
									</ul>
									<ul class="detail-card-bottom-info">
										<li>
											<h6>Appointment Date & Time</h6>
											<span>22 Jul 2023 - 12:00 pm</span>
										</li>
										<li>
											<h6>Clinic Location</h6>
											<span>Adrian’s Dentistry</span>
										</li>
										<li>
											<h6>Location</h6>
											<span>Newyork, United States</span>
										</li>
										<li>
											<h6>Visit Type</h6>
											<span>General</span>
										</li>
										<li>
											<div class="start-btn">
												<a href="#" class="btn btn-secondary">Start Session</a>
											</div>
										</li>
									</ul>
								</div>
								<!-- /Appointment Detail Card -->

								<div class="recent-appointments">
									<h5 class="head-text">Recent Appointments</h5>
									<!-- Appointment List -->
									<div class="appointment-wrap">
										<ul>
											<li>
												<div class="patinet-information">
													<a href="#">
														<img src="assets/img/doctors/doctor-15.jpg" alt="User Image">
													</a>
													<div class="patient-info">
														<p>#Apt0002</p>
														<h6><a href="#">Dr.Shanta Nesmith</a></h6>
													</div>
												</div>
											</li>
											<li class="appointment-info">
												<p><i class="fa-solid fa-clock"></i>11 Nov 2024 10.45 AM</p>
												<ul class="d-flex apponitment-types">
													<li>General Visit</li>
													<li>Chat</li>
												</ul>

											</li>
											<li class="mail-info-patient">
												<ul>
													<li><i class="fa-solid fa-envelope"></i><a href="https://doccure.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2e5d464f405a4f6e4b564f435e424b004d4143">[email&#160;protected]</a></li>
													<li><i class="fa-solid fa-phone"></i> +1 504 368 6874</li>
												</ul>
											</li>
											<li class="appointment-action">
												<ul>
													<li>
														<a href="#"><i class="fa-solid fa-eye"></i></a>
													</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /Appointment List -->
									<!-- Appointment List -->
									<div class="appointment-wrap">
										<ul>
											<li>
												<div class="patinet-information">
													<a href="#">
														<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
													</a>
													<div class="patient-info">
														<p>#Apt0003</p>
														<h6><a href="#">Dr.John Ewel</a></h6>
													</div>
												</div>
											</li>
											<li class="appointment-info">
												<p><i class="fa-solid fa-clock"></i>27 Oct 2024 09.30 AM</p>
												<ul class="d-flex apponitment-types">
													<li>General Visit</li>
													<li>Video Call</li>
												</ul>

											</li>
											<li class="mail-info-patient">
												<ul>
													<li><i class="fa-solid fa-envelope"></i><a href="https://doccure.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b7ddd8dfd9f7d2cfd6dac7dbd299d4d8da">[email&#160;protected]</a></li>
													<li><i class="fa-solid fa-phone"></i> +1 749 104 6291</li>
												</ul>
											</li>
											<li class="appointment-action">
												<ul>
													<li>
														<a href="#"><i class="fa-solid fa-eye"></i></a>
													</li>
												</ul>
											</li>
										</ul>
									</div>
									<!-- /Appointment List -->
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>

