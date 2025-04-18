<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row" style="margin-top: 100px;">
                        <!-- Profile Sidebar -->
                            @include('layouts.app.patient-sidebar')
                        <!-- /Profile Sidebar -->


						<div class="col-lg-8 col-xl-9">
							<div class="dashboard-header">
								<h3>Dashboard</h3>
							</div>
							<div class="row">
								<div class="col-xl-8 d-flex">
									<div class="dashboard-card w-100">
										<div class="dashboard-card-head">
											<div class="header-title">
												<h5>Health Records</h5>
											</div>
											{{-- <div class="dropdown header-dropdown">
												<a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);">
													<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="avatar dropdown-avatar" alt="Img">
													Hendrita
												</a>
												<div class="dropdown-menu dropdown-menu-end">
													<a href="javascript:void(0);" class="dropdown-item">
														<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="avatar dropdown-avatar" alt="Img">
														Hendrita
													</a>
													<a href="javascript:void(0);" class="dropdown-item">
														<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-08.jpg') }}" class="avatar dropdown-avatar" alt="Img">
														Laura
													</a>
													<a href="javascript:void(0);" class="dropdown-item">
														<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-07.jpg') }}" class="avatar dropdown-avatar" alt="Img">
														Mathew
													</a>
												</div>
											</div> --}}

										</div>
										<div class="dashboard-card-body">
											<div class="row">
												<div class="col-sm-7">
													<div class="row">
														<div class="col-lg-6">
															<div class="health-records icon-orange">
																<span><i class="fa-solid fa-heart"></i>Heart Rate</span>
																<h3>140 Bpm <sup> 2%</sup></h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-amber">
																<span><i class="fa-solid fa-temperature-high"></i>Body Temprature</span>
																<h3>37.5 C</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-dark-blue">
																<span><i class="fa-solid fa-notes-medical"></i>Glucose Level</span>
																<h3>70 - 90<sup> 6%</sup></h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-blue">
																<span><i class="fa-solid fa-highlighter"></i>SPo2</span>
																<h3>96%</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-red">
																<span><i class="fa-solid fa-syringe"></i>Blood Pressure</span>
																<h3>100 mg/dl<sup> 2%</sup></h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-purple">
																<span><i class="fa-solid fa-user-pen"></i>BMI </span>
																<h3>20.1 kg/m2</h3>
															</div>
														</div>
														<div class="col-md-12">
															<div class="report-gen-date">
																<p>Report generated on last visit : 25 Mar 2024 <span><i class="fa-solid fa-copy"></i></span></p>
															</div>

														</div>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="chart-over-all-report">
														<h5>Overall Report</h5>
														<div class="circle-bar circle-bar3 report-chart">
														</div>
														<a href="medical-details.html" class="btn btn-dark w-100">View Details<i class="fa-solid fa-chevron-right ms-2"></i></a>
													</div>

												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="col-xl-4 d-flex">
									<div class="favourites-dashboard w-100">
										<div class="book-appointment-head">
											<h3><span>Book a new</span>Appointment</h3>
											<span class="add-icon"><a href="#"><i class="fa-solid fa-circle-plus"></i></a></span>
										</div>
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Favourites</h5>
												</div>
												<div class="card-view-link">
													<a href="favourites.html">View All</a>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="doctor-fav-list">
													<div class="doctor-info-profile">
														<a href="#" class="table-avatar">
															<img src="{{ asset('medicity/assets/img/doctors-dashboard/doctor-profile-img.jpg') }}" alt="Img">
														</a>
														<div class="doctor-name-info">
															<h5><a href="#">Dr. Edalin</a></h5>
															<span>Endodontists</span>
														</div>
													</div>
													<a href="#" class="cal-plus-icon"><i class="fa-solid fa-calendar-plus"></i></a>
												</div>
												<div class="doctor-fav-list">
													<div class="doctor-info-profile">
														<a href="#" class="table-avatar">
															<img src="{{ asset('medicity/assets/img/doctors/doctor-thumb-11.jpg') }}" alt="Img">
														</a>
														<div class="doctor-name-info">
															<h5><a href="#">Dr. Maloney</a></h5>
															<span>Cardiologist</span>
														</div>
													</div>
													<a href="#" class="cal-plus-icon"><i class="fa-solid fa-calendar-plus"></i></a>
												</div>
												<div class="doctor-fav-list">
													<div class="doctor-info-profile">
														<a href="#" class="table-avatar">
															<img src="{{ asset('medicity/assets/img/doctors/doctor-14.jpg') }}" alt="Img">
														</a>
														<div class="doctor-name-info">
															<h5><a href="#">Dr. Wayne </a></h5>
															<span>Dental Specialist</span>
														</div>
													</div>
													<a href="#" class="cal-plus-icon"><i class="fa-solid fa-calendar-plus"></i></a>
												</div>
												<div class="doctor-fav-list">
													<div class="doctor-info-profile">
														<a href="#" class="table-avatar">
															<img src="{{ asset('medicity/assets/img/doctors/doctor-15.jpg') }}" alt="Img">
														</a>
														<div class="doctor-name-info">
															<h5><a href="#">Dr. Marla</a></h5>
															<span>Endodontists</span>
														</div>
													</div>
													<a href="#" class="cal-plus-icon"><i class="fa-solid fa-calendar-plus"></i></a>
												</div>
											</div>

										</div>
									</div>
								</div>
								<div class="col-xl-5 d-flex">
									<div class="dashboard-main-col w-100">
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5><span class="card-head-icon"><i class="fa-solid fa-calendar-days"></i></span>Appointment</h5>
												</div>
												<div class="card-view-link">
													<div class="owl-nav slide-nav text-end nav-control"></div>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="apponiment-dates">
													<ul class="appointment-calender-slider owl-carousel">
														<li>
															<a href="#">
																<h5>19 <span>Mon</span></h5>
															</a>
														</li>
														<li>
															<a href="#">
																<h5>20 <span>Mon</span></h5>
															</a>
														</li>
														<li>
															<a href="#" class="available-date">
																<h5>21 <span>Tue</span></h5>
															</a>
														</li>
														<li>
															<a href="#" class="available-date">
																<h5>22 <span>Wed</span></h5>
															</a>
														</li>
														<li>
															<a href="#">
																<h5>23 <span>Thu</span></h5>
															</a>
														</li>
														<li>
															<a href="#">
																<h5>24 <span>Fri</span></h5>
															</a>
														</li>
														<li>
															<a href="#">
																<h5>25 <span>Sat</span></h5>
															</a>
														</li>
													</ul>
													<div class="appointment-dash-card">
														<div class="doctor-fav-list">
															<div class="doctor-info-profile">
																<a href="#" class="table-avatar">
																	<img src="{{ asset('medicity/assets/img/doctors-dashboard/doctor-profile-img.jpg') }}" alt="Img">
																</a>
																<div class="doctor-name-info">
																	<h5><a href="#">Dr.Edalin Hendry</a></h5>
																	<span>Dentist</span>
																</div>
															</div>
															<a href="#" class="cal-plus-icon"><i class="fa-solid fa-hospital"></i></a>
														</div>
														<div class="date-time">
															<p><i class="fa-solid fa-clock"></i>21 Mar 2024 - 10:30 PM </p>
														</div>
														<div class="card-btns">
															<a href="chat.html" class="btn btn-gray"><i class="fa-solid fa-comment-dots"></i>Chat Now</a>
															<a href="patient-appointments.html" class="btn btn-outline-primary"><i class="fa-solid fa-calendar-check"></i>Attend</a>
														</div>
													</div>
													<div class="appointment-dash-card">
														<div class="doctor-fav-list">
															<div class="doctor-info-profile">
																<a href="#" class="table-avatar">
																	<img src="{{ asset('medicity/assets/img/doctors/doctor-17.jpg') }}" alt="Img">
																</a>
																<div class="doctor-name-info">
																	<h5><a href="#">Dr.Juliet Gabriel</a></h5>
																	<span>Cardiologist</span>
																</div>
															</div>
															<a href="#" class="cal-plus-icon"><i class="fa-solid fa-video"></i></a>
														</div>
														<div class="date-time">
															<p><i class="fa-solid fa-clock"></i>22 Mar 2024 - 10:30 PM  </p>
														</div>
														<div class="card-btns">
															<a href="chat.html" class="btn btn-gray"><i class="fa-solid fa-comment-dots"></i>Chat Now</a>
															<a href="patient-appointments.html" class="btn btn-outline-primary"><i class="fa-solid fa-calendar-check"></i>Attend</a>
														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Notifications</h5>
												</div>
												<div class="card-view-link">
													<a href="#">View All</a>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="table-responsive">
													<table class="table dashboard-table">
														<tbody>
															<tr>
																<td>
																	<div class="table-noti-info">
																		<div class="table-noti-icon color-violet">
																			<i class="fa-solid fa-bell"></i>
																		</div>

																		<div class="table-noti-message">
																			<h6><a href="#">Booking Confirmed on <span> 21 Mar 2024 </span> 10:30 AM</a></h6>
																			<span class="message-time">Just Now</span>
																		</div>
																	</div>
																</td>

															</tr>
															<tr>
																<td>
																	<div class="table-noti-info">
																		<div class="table-noti-icon color-blue">
																			<i class="fa-solid fa-star"></i>
																		</div>

																		<div class="table-noti-message">
																			<h6><a href="#">You have a  <span> New </span> Review for your Appointment </a></h6>
																			<span class="message-time">5 Days ago</span>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="table-noti-info">
																		<div class="table-noti-icon color-red">
																			<i class="fa-solid fa-calendar-check"></i>
																		</div>

																		<div class="table-noti-message">
																			<h6><a href="#">You have Appointment with <span> Ahmed </span> by 01:20 PM </a></h6>
																			<span class="message-time">12:55 PM</span>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="table-noti-info">
																		<div class="table-noti-icon color-yellow">
																			<i class="fa-solid fa-money-bill-1-wave"></i>
																		</div>

																		<div class="table-noti-message">
																			<h6><a href="#">Sent an amount of <span> $200 </span> for an Appointment  by 01:20 PM </a></h6>
																			<span class="message-time">2 Days ago</span>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="table-noti-info">
																		<div class="table-noti-icon color-blue">
																			<i class="fa-solid fa-star"></i>
																		</div>

																		<div class="table-noti-message">
																			<h6><a href="#">You have a  <span> New </span> Review for your Appointment </a></h6>
																			<span class="message-time">5 Days ago</span>
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

										</div>
									</div>
								</div>
								<div class="col-xl-7 d-flex">
									<div class="dashboard-main-col w-100">
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Analytics</h5>
												</div>
												<div class="dropdown-links d-flex align-items-center flex-wrap">
													<div class="dropdown header-dropdown">
														<a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);">
															<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="avatar dropdown-avatar" alt="Img">
															Hendrita
														</a>
														<div class="dropdown-menu dropdown-menu-end">
															<a href="javascript:void(0);" class="dropdown-item">
																<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="avatar dropdown-avatar" alt="Img">
																Hendrita
															</a>
															<a href="javascript:void(0);" class="dropdown-item">
																<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-08.jpg') }}" class="avatar dropdown-avatar" alt="Img">
																Laura
															</a>
															<a href="javascript:void(0);" class="dropdown-item">
																<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-07.jpg') }}" class="avatar dropdown-avatar" alt="Img">
																Mathew
															</a>
														</div>
													</div>
													<div class="dropdown header-dropdown header-dropdown-two">
														<a class="dropdown-toggle border-0" data-bs-toggle="dropdown" href="javascript:void(0);">
															This Week
														</a>
														<div class="dropdown-menu dropdown-menu-end">
															<a href="javascript:void(0);" class="dropdown-item">
																This Week
															</a>
															<a href="javascript:void(0);" class="dropdown-item">
																This Month
															</a>
															<a href="javascript:void(0);" class="dropdown-item">
																This Year
															</a>
														</div>
													</div>
												</div>

											</div>
											<div class="dashboard-card-body">
												<div class="chart-tabs patient-dash-tab">
													<ul class="nav" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#heart-rate" aria-selected="false" role="tab" tabindex="-1">Heart Rate</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link " href="#" data-bs-toggle="tab" data-bs-target="#blood-pressure" aria-selected="true" role="tab">Blood Pressure</a>
														</li>
													</ul>
												</div>
												<div class="tab-content pt-0">

													<!-- Chart -->
													<div class="tab-pane fade active show" id="heart-rate" role="tabpanel">
														<div id="heart-rate-chart"></div>
													</div>
													<!-- /Chart -->

													<!-- Chart -->
													<div class="tab-pane fade" id="blood-pressure" role="tabpanel">
														<div id="blood-pressure-chart"></div>
													</div>
													<!-- /Chart -->
												</div>
											</div>
										</div>
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Past Appointments</h5>
												</div>
												<div class="card-view-link">
													<div class="owl-nav slide-nav2 text-end nav-control"></div>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="past-appointments-slider owl-carousel">
													<div class="appointment-dash-card past-appointment">
														<div class="appointment-date-info">
															<h4>Thursday, Mar 2024</h4>
															<ul>
																<li>
																	<span><i class="fa-solid fa-clock"></i></span>Time : 04:00 PM - 04:30 PM (30 Min)
																</li>
																<li>
																	<span><i class="fa-solid fa-location-dot"></i></span>Newyork, United States
																</li>
															</ul>
														</div>
														<div class="doctor-fav-list">
															<div class="doctor-info-profile">
																<a href="#" class="table-avatar">
																	<img src="{{ asset('medicity/assets/img/doctors-dashboard/doctor-profile-img.jpg') }}" alt="Img">
																</a>
																<div class="doctor-name-info">
																	<h5><a href="#">Dr.Edalin Hendry</a></h5>
																	<span>Dental Specialist</span>
																</div>
															</div>
														</div>
														<div class="card-btns">
															<a href="patient-appointments.html" class="btn btn-outline-primary ms-0 me-3">Reschedule</a>
															<a href="patient-appointment-details.html" class="btn btn-primary prime-btn">View Details</a>
														</div>
													</div>
													<div class="appointment-dash-card past-appointment">
														<div class="appointment-date-info">
															<h4>Friday, Mar 2024</h4>
															<ul>
																<li>
																	<span><i class="fa-solid fa-clock"></i></span>Time : 03:00 PM - 03:30 PM (30 Min)
																</li>
																<li>
																	<span><i class="fa-solid fa-location-dot"></i></span>Newyork, United States
																</li>
															</ul>
														</div>
														<div class="doctor-fav-list">
															<div class="doctor-info-profile">
																<a href="#" class="table-avatar">
																	<img src="{{ asset('medicity/assets/img/doctors/doctor-17.jpg') }}" alt="Img">
																</a>
																<div class="doctor-name-info">
																	<h5><a href="#">Dr.Juliet Gabriel</a></h5>
																	<span>Cardiologist</span>
																</div>
															</div>
														</div>
														<div class="card-btns">
															<a href="patient-appointments.html" class="btn btn-outline-primary ms-0 me-3">Reschedule</a>
															<a href="medical-details.html" class="btn btn-primary prime-btn">View Details</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Dependant</h5>
												</div>
												<div class="card-view-link">
													<a href="#" class="add-new" data-bs-toggle="modal" data-bs-target="#add_dependent"><i class="fa-solid fa-circle-plus me-2"></i>Add New</a>
													<a href="dependent.html">View All</a>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="doctor-fav-list">
													<div class="doctor-info-profile">
														<a href="#" class="table-avatar">
															<img src="{{ asset('medicity/assets/img/patients/patient-20.jpg') }}" alt="Img">
														</a>
														<div class="doctor-name-info">
															<h5><a href="#">Laura</a></h5>
															<span>Mother - 58 years 20 days</span>
														</div>
													</div>
													<div class="d-flex align-items-center">
														<a href="#" class="cal-plus-icon me-2"><i class="fa-solid fa-calendar-plus"></i></a>
														<a href="dependent.html" class="cal-plus-icon"><i class="fa-solid fa-eye"></i></a>
													</div>
												</div>
												<div class="doctor-fav-list">
													<div class="doctor-info-profile">
														<a href="#" class="table-avatar">
															<img src="{{ asset('medicity/assets/img/patients/patient-21.jpg') }}" alt="Img">
														</a>
														<div class="doctor-name-info">
															<h5><a href="#">Mathew</a></h5>
															<span>Father - 59 years 15 days</span>
														</div>
													</div>
													<div class="d-flex align-items-center">
														<a href="#" class="cal-plus-icon me-2"><i class="fa-solid fa-calendar-plus"></i></a>
														<a href="dependent.html" class="cal-plus-icon"><i class="fa-solid fa-eye"></i></a>
													</div>
												</div>
											</div>

										</div>
									</div>

								</div>
								<div class="col-xl-12 d-flex">
									<div class="dashboard-card w-100">
										<div class="dashboard-card-head">
											<div class="header-title">
												<h5>Reports</h5>
											</div>
											<div class="dropdown header-dropdown">
												<a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);">
													<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="avatar dropdown-avatar" alt="Img">
													Hendrita
												</a>
												<div class="dropdown-menu dropdown-menu-end">
													<a href="javascript:void(0);" class="dropdown-item">
														<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-06.jpg') }}" class="avatar dropdown-avatar" alt="Img">
														Hendrita
													</a>
													<a href="javascript:void(0);" class="dropdown-item">
														<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-08.jpg') }}" class="avatar dropdown-avatar" alt="Img">
														Laura
													</a>
													<a href="javascript:void(0);" class="dropdown-item">
														<img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-07.jpg') }}" class="avatar dropdown-avatar" alt="Img">
														Mathew
													</a>
												</div>
											</div>

										</div>
										<div class="dashboard-card-body">
											<div class="account-detail-table">
												<!-- Tab Menu -->
												<nav class="patient-dash-tab border-0 pb-0 mb-3 mt-3">
												   <ul class="nav nav-tabs-bottom">
													    <li class="nav-item">
														   <a class="nav-link active" href="#appoint-tab" data-bs-toggle="tab">Appointments</a>
													    </li>
													    <li class="nav-item">
														   <a class="nav-link" href="#medical-tab" data-bs-toggle="tab">Medical Records</a>
													    </li>
													    <li class="nav-item">
															<a class="nav-link" href="#prsc-tab" data-bs-toggle="tab">Prescriptions</a>
													    </li>
														<li class="nav-item">
															<a class="nav-link" href="#invoice-tab" data-bs-toggle="tab">Invoices</a>
														</li>
												   </ul>
											   </nav>
											   <!-- /Tab Menu -->

											   <!-- Tab Content -->
											   <div class="tab-content pt-0">

												   <!-- Appointments Tab -->
												   <div id="appoint-tab" class="tab-pane fade show active">
													<div class="custom-new-table">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>ID</th>
																		<th>Test Name</th>
																		<th>Date</th>
																		<th>Referred By</th>
																		<th>Amount</th>
																		<th>Comments</th>
																		<th>Status</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<a href="javascript:void(0);"><span class="text-blue">RE124343</span></a>
																		</td>
																		<td>
																			 Electro cardiography
																		</td>
																		<td>21 Mar 2024</td>
																		<td>Edalin Hendry</td>
																		<td>$300</td>
																		<td>Good take rest</td>
																		<td>
																			<span class="badge badge-success-bg">Normal</span>
																		</td>
																		<td>
																			<div class="d-flex align-items-center">
																				<a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
																				<a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																	<td>
																		<a href="javascript:void(0);"><span class="text-blue">RE124342</span></a>
																	</td>
																	 <td>
																		 Complete Blood Count
																	 </td>
																	 <td>28 Mar 2024</td>
																	 <td>Shanta Nesmith</td>
																	 <td>$400</td>
																	 <td>Stable, no change</td>
																	 <td>
																		 <span class="badge badge-success-bg">Normal</span>
																	 </td>
																	 <td>
																		 <div class="d-flex align-items-center">
																			 <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
																			 <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
																		 </div>

																	 </td>
																 </tr>
																 <tr>
																	 <td>
																		<a href="javascript:void(0);"><span class="text-blue">RE124341</span></a>
																	 </td>
																	 <td>
																		 Blood Glucose Test
																	 </td>
																	 <td>02 Apr 2024</td>
																	 <td>John Ewel</td>
																	 <td>$350</td>
																	 <td>All Clear</td>
																	 <td>
																		 <span class="badge badge-success-bg">Normal</span>
																	 </td>
																	 <td>
																		 <div class="d-flex align-items-center">
																			 <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
																			 <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
																		 </div>

																	 </td>
																 </tr>
																 <tr>
																	 <td>
																		<a href="javascript:void(0);"><span class="text-blue">RE124340</span></a>
																	 </td>
																	 <td>
																		 Liver Function Tests
																	 </td>
																	 <td>15 Apr 2024</td>
																	 <td>Joseph Engels</td>
																	 <td>$480</td>
																	 <td>Stable, no change</td>
																	 <td>
																		 <span class="badge badge-success-bg">Normal</span>
																	 </td>
																	 <td>
																		 <div class="d-flex align-items-center">
																			 <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
																			 <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
																		 </div>

																	 </td>
																 </tr>
																 <tr>
																	 <td>
																		<a href="javascript:void(0);"><span class="text-blue">RE124339</span></a>
																	 </td>
																	 <td>
																		 Lipid Profile
																	 </td>
																	 <td>27 Apr 2024</td>
																	 <td>Victoria Selzer</td>
																	 <td>$250</td>
																	 <td>Good take rest</td>
																	 <td>
																		 <span class="badge badge-success-bg">Normal</span>
																	 </td>
																	 <td>
																		 <div class="d-flex align-items-center">
																			 <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
																			 <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
																		 </div>

																	 </td>
																 </tr>
																 <tr>
																	 <td>
																		<a href="#"><span class="text-blue">RE124338</span></a>
																	 </td>
																	 <td>
																		 Blood Cultures
																	 </td>
																	 <td>10 May 2024</td>
																	 <td>Juliet Gabriel</td>
																	 <td>$320</td>
																	 <td>Good take rest</td>
																	 <td>
																		 <span class="badge badge-success-bg">Normal</span>
																	 </td>
																	 <td>
																		 <div class="d-flex align-items-center">
																			 <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
																			 <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
																		 </div>

																	 </td>
																 </tr>
																</tbody>
															</table>
														</div>
													</div>
												   </div>
												   <!-- /Appointments Tab -->

												   <!-- Medical Records Tab -->
												   <div class="tab-pane fade" id="medical-tab">
														<div class="custom-table">
															<div class="table-responsive">
																<table class="table table-center mb-0">
																	<thead>
																		<tr>
																			<th>ID</th>
																			<th>Name</th>
																			<th>Date</th>
																			<th>Description</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="text-blue-600"><a href="javascript:void(0);">#MR-123</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon">
																					<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																				</a>
																			</td>
																			<td>24 Mar 2024</td>
																			<td>Glucose Test V12</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);">
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
																			<td class="text-blue-600"><a href="javascript:void(0);">#MR-124</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon">
																					<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																				</a>
																			</td>
																			<td>27 Mar 2024</td>
																			<td>Complete Blood Count(CBC)</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);">
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
																			<td class="text-blue-600"><a href="#">#MR-125</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon">
																					<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																				</a>
																			</td>
																			<td>10 Apr 2024</td>
																			<td>Echocardiogram</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);">
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
																			<td class="text-blue-600"><a href="javascript:void(0);">#MR-126</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon">
																					<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																				</a>
																			</td>
																			<td>19 Apr 2024</td>
																			<td>COVID-19 Test</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);">
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
																			<td class="text-blue-600"><a href="javascript:void(0);">#MR-127</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon">
																					<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																				</a>
																			</td>
																			<td>27 Apr 2024</td>
																			<td>Allergy Tests</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);">
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
																			<td class="text-blue-600"><a href="#">#MR-128</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon">
																					<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
																				</a>
																			</td>
																			<td>02 May  2024</td>
																			<td>Lipid Panel </td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);">
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
												   </div>
												   <!-- /Medical Records Tab -->

												    <!-- Prescriptions Tab -->
												   <div class="tab-pane fade" id="prsc-tab">
														<div class="custom-table">
															<div class="table-responsive">
																<table class="table table-center mb-0">
																	<thead>
																		<tr>
																			<th>ID</th>
																			<th>Name</th>
																			<th>Created Date</th>
																			<th>Prescriped By</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="text-blue-600"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-123</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon prescription">
																					<span><i class="fa-solid fa-prescription"></i></span>Prescription
																				</a>
																			</td>
																			<td>24 Mar 2024, 10:30 AM</td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">Edalin Hendry</a>
																				</h2>
																			</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																						<i class="fa-solid fa-link"></i>
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
																			<td class="text-blue-600"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-124</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon prescription">
																					<span><i class="fa-solid fa-prescription"></i></span>Prescription
																				</a>
																			</td>
																			<td>27 Mar 2024, 11:15 AM</td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-05.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">John Homes</a>
																				</h2>
																			</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																						<i class="fa-solid fa-link"></i>
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
																			<td class="text-blue-600"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-125</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon prescription">
																					<span><i class="fa-solid fa-prescription"></i></span>Prescription
																				</a>
																			</td>
																			<td>11 Apr 2024, 09:00 AM</td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-03.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">Shanta Neill</a>
																				</h2>
																			</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																						<i class="fa-solid fa-link"></i>
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
																			<td class="text-blue-600"><a href="#"  data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-126</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon prescription">
																					<span><i class="fa-solid fa-prescription"></i></span>Prescription
																				</a>
																			</td>
																			<td>15 Apr 2024, 02:30 PM</td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-08.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">Anthony Tran</a>
																				</h2>
																			</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																						<i class="fa-solid fa-link"></i>
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
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-127</a></td>
																			<td>
																				<a href="javascript:void(0);" class="lab-icon prescription">
																					<span><i class="fa-solid fa-prescription"></i></span>Prescription
																				</a>
																			</td>
																			<td>23 Apr 2024, 06:40 PM</td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-01.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">Susan Lingo</a>
																				</h2>
																			</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																						<i class="fa-solid fa-link"></i>
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
												   </div>
												    <!-- Prescriptions Tab -->

													 <!--Invoices Tab -->
												   <div class="tab-pane fade" id="invoice-tab">
														<div class="custom-table">
															<div class="table-responsive">
																<table class="table table-center mb-0">
																	<thead>
																		<tr>
																			<th>ID</th>
																			<th>Doctor</th>
																			<th>Appointment Date</th>
																			<th>Booked on</th>
																			<th>Amount</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-21.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">Edalin Hendry</a>
																				</h2>
																			</td>
																			<td>24 Mar 2024</td>
																			<td>21 Mar 2024</td>
																			<td>$300</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																						<img class="avatar-img rounded-3" src="{{ asset('medicity/assets/img/doctors/doctor-thumb-13.jpg') }}" alt="User Image">
																					</a>
																					<a href="doctor-profile.html">John Homes</a>
																				</h2>
																			</td>
																			<td>17 Mar 2024</td>
																			<td>14 Mar 2024</td>
																			<td>$450</td>
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
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
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
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
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
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
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
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
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
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
																			<td>
																				<div class="action-item">
																					<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
																						<i class="fa-solid fa-link"></i>
																					</a>
																					<a href="javascript:void(0);">
																						<i class="fa-solid fa-print"></i>
																					</a>
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
												   </div>
												    <!-- Invoices Tab -->

											   </div>
											   <!-- Tab Content -->
										   </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>

<!-- Add Dependent Modal-->
<div class="modal fade custom-modals" id="add_dependent">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Dependant</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="#">
                <div class="add-dependent">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap pb-0">
                                    <div class="change-avatar img-upload">
                                        <div class="profile-img">
                                            <i class="fa-solid fa-file-image"></i>
                                        </div>
                                        <div class="upload-img">
                                            <h5>Profile Image</h5>
                                            <div class="imgs-load d-flex align-items-center">
                                                <div class="change-photo">
                                                    Upload New
                                                    <input type="file" class="upload">
                                                </div>
                                                <a href="#" class="upload-remove">Remove</a>
                                            </div>
                                            <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Relationship</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">DOB <span class="text-danger">*</span></label>
                                    <div class="form-icon">
                                        <input type="text" class="form-control datetimepicker">
                                        <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Select Gender</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-btn text-end">
                        <a href="#" class="btn btn-gray" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Dependent Modal-->

<!--View Invoice -->
<div class="modal fade custom-modals" id="invoice_view">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">View Invoice</h3>
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
                                    <img src="{{ asset('medicity/assets/img/logo.png') }}" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Invoice No : </strong> #INV005<br>
                                    <strong>Issued:</strong> 21 Mar 2024
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="invoice-info">
                                    <h6 class="customer-text">Billing From</h6>
                                    <p class="invoice-details invoice-details-two">
                                        Edalin Hendry <br>
                                        806 Twin Willow Lane, <br>
                                        Newyork, USA <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="invoice-info">
                                    <h6 class="customer-text">Billing To</h6>
                                    <p class="invoice-details invoice-details-two">
                                        Richard Wilson <br>
                                        299 Star Trek Drive<br>
                                        Florida, 32405, USA<br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="invoice-info invoice-info2">
                                    <h6 class="customer-text">Payment Method</h6>
                                    <p class="invoice-details">
                                        Debit Card <br>
                                        XXXXXXXXXXXX-2541<br>
                                        HDFC Bank<br>
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
                                <h6>Invoice Details</h6>
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Quatity</th>
                                                <th>VAT</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>General Consultation</td>
                                                <td>1</td>
                                                <td>$0</td>
                                                <td>$150</td>
                                            </tr>
                                            <tr>
                                                <td>Video Call</td>
                                                <td>1</td>
                                                <td>$0</td>
                                                <td>$100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ms-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td><span>$350</span></td>
                                        </tr>
                                        <tr>
                                            <th>Discount:</th>
                                            <td><span>-10%</span></td>
                                        </tr>
                                        <tr>
                                            <th>Total Amount:</th>
                                            <td><span>$315</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Information -->
                    <div class="other-info mb-0">
                        <h4>Other information</h4>
                        <p class="text-muted mb-0">An account of the present illness, which includes the circumstances surrounding the onset of recent health changes and the chronology of subsequent events that have led the patient to seek medicine</p>
                    </div>
                    <!-- /Invoice Information -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /View Invoice -->


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
                                    <img src="{{ asset('medicity/assets/img/logo.png') }}" alt="logo">
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
                    </div>ch
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
