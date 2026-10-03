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
							<div class="appointment-patient">

								<div class="dashboard-header">
									<h3><a href="my-patients.html"><i class="fa-solid fa-arrow-left"></i> Patient Details</a></h3>
								</div>

								<div class="patient-wrap">
									<div class="patient-info">
										<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-01.jpg') }}" alt="img">
										<div class="user-patient">
											<h6>#P0016</h6>
											<h5>Adrian Marshall</h5>
											<ul>
												<li>Age : 42</li>
												<li>Male</li>
												<li>AB+ve</li>
											</ul>
										</div>
									</div>
									<div class="patient-book">
										<p><i class="fa-solid fa-calendar-days"></i>Last Booking</p>
										<p>24 Mar 2024</p>
									</div>
								</div>

								<!-- Appoitment Tabs -->
								<div class="appointment-tabs user-tab">
									<ul class="nav">
										<li class="nav-item">
											<a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Appointments</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#prescription" data-bs-toggle="tab">Prescription</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#medical" data-bs-toggle="tab">Medical Records</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#billing" data-bs-toggle="tab">Billing</a>
										</li>
									</ul>
								</div>
								<!-- /Appoitment Tabs -->

								<div class="tab-content pt-0">

									<!-- Appointment Tab -->
									<div id="pat_appointments" class="tab-pane fade show active">

										<div class="search-header">
											<div class="search-field">
												<input type="text" class="form-control" placeholder="Search">
												<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
											</div>
										</div>

										<div class="custom-table">
											<div class="table-responsive">
												<table class="table table-center mb-0">
													<thead>
														<tr>
															<th>ID</th>
															<th>Doctor</th>
															<th>Appt Date</th>
															<th>Booking Date</th>
															<th>Amount</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt123</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Edalin Hendry</a>
																</h2>
															</td>
															<td>24 Mar 2024</td>
															<td>21 Mar 2024</td>
															<td>$300</td>
															<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
															<td>
																<div class="action-item">
																	<a href="patient-upcoming-appointment.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt124</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-05.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">John Homes</a>
																</h2>
															</td>
															<td>17 Mar 2024</td>
															<td>14 Mar 2024</td>
															<td>$450</td>
															<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
															<td>
																<div class="action-item">
																	<a href="patient-upcoming-appointment.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt125</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-03.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Shanta Neill</a>
																</h2>
															</td>
															<td>11 Mar 2024</td>
															<td>07 Mar 2024</td>
															<td>$250</td>
															<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
															<td>
																<div class="action-item">
																	<a href="patient-upcoming-appointment.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt126</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-08.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Anthony Tran</a>
																</h2>
															</td>
															<td>26 Feb 2024</td>
															<td>23 Feb 2024</td>
															<td>$320</td>
															<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
															<td>
																<div class="action-item">
																	<a href="patient-upcoming-appointment.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a class="text-blue-600" href="patient-upcoming-appointment.html">#Apt127</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-01.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Susan Lingo</a>
																</h2>
															</td>
															<td>18 Feb 2024</td>
															<td>15 Feb 2024</td>
															<td>$480</td>
															<td><span class="badge badge-yellow status-badge">Upcoming</span></td>
															<td>
																<div class="action-item">
																	<a href="doctor-appointment-start.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a class="text-blue-600" href="patient-cancelled-appointment.html">#Apt128</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-09.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Joseph Boyd</a>
																</h2>
															</td>
															<td>10 Feb 2024</td>
															<td>07 Feb 2024</td>
															<td>$260</td>
															<td><span class="badge badge-danger status-badge">Cancelled</span></td>
															<td>
																<div class="action-item">
																	<a href="patient-cancelled-appointment.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a class="text-blue-600" href="patient-completed-appointment.html">#Apt129</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-07.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Juliet Gabriel</a>
																</h2>
															</td>
															<td>28 Jan 2024</td>
															<td>25 Jan 2024</td>
															<td>$350</td>
															<td><span class="badge badge-green status-badge">Completed</span></td>
															<td>
																<div class="action-item">
																	<a href="patient-completed-appointment.html">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- Pagination -->
										<div class="pagination dashboard-pagination">
											<ul>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
												</li>
												<li>
													<a href="#" class="page-link">1</a>
												</li>
												<li>
													<a href="#" class="page-link active">2</a>
												</li>
												<li>
													<a href="#" class="page-link">3</a>
												</li>
												<li>
													<a href="#" class="page-link">4</a>
												</li>
												<li>
													<a href="#" class="page-link">...</a>
												</li>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
												</li>
											</ul>
										</div>
										<!-- /Pagination -->

									</div>
									<!-- /Appointment Tab -->

									<!-- Prescription Tab -->
									<div class="tab-pane fade" id="prescription">
										<div class="search-header">
											<div class="search-field">
												<input type="text" class="form-control" placeholder="Search">
												<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
											</div>
											<div>
												<a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal" data-bs-target="#add_prescription">Add New Prescription</a>
											</div>
										</div>

										<div class="custom-table">
											<div class="table-responsive">
												<table class="table table-center mb-0">
													<thead>
														<tr>
															<th>ID</th>
															<th>Prescriped By</th>
															<th>Type</th>
															<th>Date</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt123</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Edalin Hendry</a>
																</h2>
															</td>
															<td>Visit</td>
															<td>25 Jan 2024</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt124</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-05.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">John Homes</a>
																</h2>
															</td>
															<td>Visit</td>
															<td>28 Jan 2024</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>

															<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt125</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-03.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Shanta Neill</a>
																</h2>
															</td>
															<td>Visit</td>
															<td>11 Feb 2024</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>

															<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt126</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-08.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Anthony Tran</a>
																</h2>
															</td>
															<td>Visit</td>
															<td>19 Feb 2024</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#view_prescription">#Apt127</a></td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																		<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-01.jpg') }}" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Susan Lingo</a>
																</h2>
															</td>
															<td>Visit</td>
															<td>27 Feb 2024</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- Pagination -->
										<div class="pagination dashboard-pagination">
											<ul>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
												</li>
												<li>
													<a href="#" class="page-link">1</a>
												</li>
												<li>
													<a href="#" class="page-link active">2</a>
												</li>
												<li>
													<a href="#" class="page-link">3</a>
												</li>
												<li>
													<a href="#" class="page-link">4</a>
												</li>
												<li>
													<a href="#" class="page-link">...</a>
												</li>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
												</li>
											</ul>
										</div>
										<!-- /Pagination -->

									</div>
									<!-- /Prescription Tab -->

									<!-- Medical Records Tab -->
									<div class="tab-pane fade" id="medical">
										<div class="search-header">
											<div class="search-field">
												<input type="text" class="form-control" placeholder="Search">
												<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
											</div>
											<div>
												<a href="#" data-bs-toggle="modal" data-bs-target="#add_medical_records" class="btn btn-primary prime-btn">Add Medical Record</a>
											</div>
										</div>

										<div class="custom-table">
											<div class="table-responsive">
												<table class="table table-center mb-0">
													<thead>
														<tr>
															<th>Name</th>
															<th>Date</th>
															<th>Description</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<a href="javascript:void(0);" class="lab-icon">
																	<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																</a>
															</td>
															<td>24 Mar 2024</td>
															<td>Glucose Test V12</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																		<i class="fa-solid fa-pen-to-square"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-download"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-trash-can"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="javascript:void(0);" class="lab-icon">
																	<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																</a>
															</td>
															<td>27 Mar 2024</td>
															<td>Complete Blood Count(CBC)</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																		<i class="fa-solid fa-pen-to-square"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-download"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-trash-can"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="javascript:void(0);" class="lab-icon">
																	<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																</a>
															</td>
															<td>10 Apr 2024</td>
															<td>Echocardiogram</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																		<i class="fa-solid fa-pen-to-square"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-download"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-trash-can"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="javascript:void(0);" class="lab-icon">
																	<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																</a>
															</td>
															<td>19 Apr 2024</td>
															<td>COVID-19 Test</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																		<i class="fa-solid fa-pen-to-square"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-download"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-trash-can"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="javascript:void(0);" class="lab-icon">
																	<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																</a>
															</td>
															<td>27 Apr 2024</td>
															<td>Allergy Tests</td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																		<i class="fa-solid fa-pen-to-square"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-download"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-trash-can"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="javascript:void(0);" class="lab-icon">
																	<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																</a>
															</td>
															<td>02 May  2024</td>
															<td>Lipid Panel </td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																		<i class="fa-solid fa-pen-to-square"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-download"></i>
																	</a>
																	<a href="javascript:void(0);">
																		<i class="fa-solid fa-trash-can"></i>
																	</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- Pagination -->
										<div class="pagination dashboard-pagination">
											<ul>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
												</li>
												<li>
													<a href="#" class="page-link">1</a>
												</li>
												<li>
													<a href="#" class="page-link active">2</a>
												</li>
												<li>
													<a href="#" class="page-link">3</a>
												</li>
												<li>
													<a href="#" class="page-link">4</a>
												</li>
												<li>
													<a href="#" class="page-link">...</a>
												</li>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
												</li>
											</ul>
										</div>
										<!-- /Pagination -->

									</div>
									<!-- /Medical Records Tab -->

									<!-- Billing Tab -->
									<div class="tab-pane" id="billing">
										<div class="search-header">
											<div class="search-field">
												<input type="text" class="form-control" placeholder="Search">
												<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
											</div>
											<div>
												<a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal" data-bs-target="#add_billing">Add New Billing</a>
											</div>
										</div>

										<div class="custom-table">
											<div class="table-responsive">
												<table class="table table-center mb-0">
													<thead>
														<tr>
															<th>Billing Date</th>
															<th>Amount</th>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>24 Mar 2024</td>
															<td>$300</td>
															<td><span class="badge badge-green status-badge">Paid</span></td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>28 Mar 2024</td>
															<td>$350</td>
															<td><span class="badge badge-green status-badge">Paid</span></td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>10 Apr 2024</td>
															<td>$400</td>
															<td><span class="badge badge-green status-badge">Paid</span></td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>19 Apr 2024</td>
															<td>$250</td>
															<td><span class="badge badge-green status-badge">Paid</span></td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>22 Apr 2024</td>
															<td>$320</td>
															<td><span class="badge badge-green status-badge">Paid</span></td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>02 May 2024</td>
															<td>$480</td>
															<td><span class="badge badge-danger status-badge">Unpaid</span></td>
															<td>
																<div class="action-item">
																	<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_bill">
																		<i class="fa-solid fa-link"></i>
																	</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- Pagination -->
										<div class="pagination dashboard-pagination">
											<ul>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
												</li>
												<li>
													<a href="#" class="page-link">1</a>
												</li>
												<li>
													<a href="#" class="page-link active">2</a>
												</li>
												<li>
													<a href="#" class="page-link">3</a>
												</li>
												<li>
													<a href="#" class="page-link">4</a>
												</li>
												<li>
													<a href="#" class="page-link">...</a>
												</li>
												<li>
													<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
												</li>
											</ul>
										</div>
										<!-- /Pagination -->
									</div>
									<!-- Billing Tab -->

								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>

<!--View Prescription -->
<div class="modal fade custom-modals" id="view_prescription">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">View Prescription</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body pb-0">
                <div class="prescribe-download">
                    <h5>21 Mar  2024</h5>
                    <ul>
                        <li><a href="javascript:void(0);" class="print-link"><i class="fa-solid fa-print"></i></a></li>
                        <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                    </ul>
                </div>
                <div class="view-prescribe invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="assets/img/logo.png" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Prescription ID :</strong> #PR-123 <br>
                                    <strong>Issued:</strong> 21 Mar 2024
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <h6 class="customer-text">Doctor Details</h6>
                                    <p class="invoice-details invoice-details-two">
                                        Edalin Hendry <br>
                                        806 Twin Willow Lane, <br>
                                        Newyork, USA <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <h6 class="customer-text">Patient Details</h6>
                                    <p class="invoice-details">
                                        Adrian Marshall <br>
                                        299 Star Trek Drive,<br>
                                        Florida, 32405, USA <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Prescription  Details</h6>
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Dosage</th>
                                                <th>Frequency</th>
                                                <th>Duration</th>
                                                <th>Timings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                <td>75 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-1</td>
                                                <td>1 month</td>
                                                <td>Before Meal</td>
                                            </tr>
                                            <tr>
                                                <td>Alexer 90MG Tab</td>
                                                <td>90 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-1</td>
                                                <td>1 month</td>
                                                <td>Before Meal</td>
                                            </tr>
                                            <tr>
                                                <td>Ramistar XL2.5</td>
                                                <td>60 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-0</td>
                                                <td>1 month</td>
                                                <td>After Meal</td>
                                            </tr>
                                            <tr>
                                                <td>Metscore</td>
                                                <td>90 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-1</td>
                                                <td>1 month</td>
                                                <td>After Meal</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>Other information</h4>
                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                    </div>
                    <div class="other-info">
                        <h4>Follow Up</h4>
                        <p class="text-muted mb-0">Follow u p after 3 months, Have to come on empty stomach</p>
                    </div>
                    <div class="prescriber-info">
                        <h6>Dr. Edalin Hendry</h6>
                        <p>Dept of Cardiology</p>
                    </div>
                    <!-- /Invoice Information -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /View Prescription -->
