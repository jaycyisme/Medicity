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
																<h3>{{ $latestRecord?->pulse ?? ' ' }} Bpm</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-amber">
																<span><i class="fa-solid fa-temperature-high"></i>Body Temprature</span>
																<h3>{{ $latestRecord?->temperature ?? ' ' }} °C</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-dark-blue">
																<span><i class="fa-solid fa-notes-medical"></i>Glucose Level</span>
																<h3>{{ $latestRecord?->diastolic ?? ' ' }}</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-blue">
																<span><i class="fa-solid fa-highlighter"></i>SPo2</span>
																<h3>{{ $latestRecord?->spo2 ?? ' ' }}%</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-red">
																<span><i class="fa-solid fa-syringe"></i>Blood Pressure</span>
																<h3>{{ $latestRecord?->systolic ?? ' ' }}/{{ $record?->diastolic ?? ' ' }} mmHg</h3>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="health-records icon-purple">
																<span><i class="fa-solid fa-user-pen"></i>BMI </span>
																<h3>{{ $latestRecord?->body_mass_index ?? ' ' }} kg/m²</h3>
															</div>
														</div>
														<div class="col-md-12">
															<div class="report-gen-date">
																<p>Report generated on last visit : {{ $latestRecord?->created_at?->format('d M Y') ?? ' ' }} <span><i class="fa-solid fa-copy"></i></span></p>
															</div>

														</div>
													</div>
												</div>
												{{-- <div class="col-sm-5">
													<div class="chart-over-all-report">
														<h5>Overall Report</h5>
														<div class="circle-bar circle-bar3 report-chart">
														</div>
														<a href="medical-details.html" class="btn btn-dark w-100">View Details<i class="fa-solid fa-chevron-right ms-2"></i></a>
													</div>

												</div> --}}
											</div>
										</div>

									</div>
								</div>
								<div class="col-xl-4 d-flex">
									<div class="favourites-dashboard w-100">
										<div class="book-appointment-head">
											<h3><span>Book a new</span>Appointment</h3>
											<span class="add-icon"><a href="{{ route('doctor-list') }}"><i class="fa-solid fa-circle-plus"></i></a></span>
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
                                                @foreach ($favouriteDoctors as $doctor)
                                                    <div class="doctor-fav-list">
                                                        <div class="doctor-info-profile">
                                                            <a href="{{ route('doctor-profile', $doctor->id) }}" class="table-avatar">
                                                                <img src="@if(isset($doctor->profile_photo_path)){{ asset('storage/'.$doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="Img">
                                                            </a>
                                                            <div class="doctor-name-info">
                                                                <h5><a href="{{ route('doctor-profile', $doctor->id) }}">{{ $doctor->name }}</a></h5>
                                                                <span>{{ $doctor->designation }}</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('doctor-booking', $doctor->id) }}" class="cal-plus-icon"><i class="fa-solid fa-calendar-plus"></i></a>
                                                    </div>
                                                @endforeach
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-5 d-flex">
									<div class="dashboard-main-col w-100">
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5><span class="card-head-icon"><i class="fa-solid fa-calendar-days"></i></span>Upcoming Appointment</h5>
												</div>
												<div class="card-view-link">
													<div class="owl-nav slide-nav text-end nav-control"></div>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="apponiment-dates">
                                                    @foreach ($upcomingAppointments as $appointment)
                                                        <div class="appointment-dash-card">
                                                            <div class="doctor-fav-list">
                                                                <div class="doctor-info-profile">
                                                                    <a href="{{ route('doctor-profile', $appointment->doctor->id) }}" class="table-avatar">
                                                                        <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="Img">
                                                                    </a>
                                                                    <div class="doctor-name-info">
                                                                        <h5><a href="{{ route('doctor-profile', $appointment->doctor->id) }}">{{ $appointment->doctor->name }}</a></h5>
                                                                        <span>Dentist</span>
                                                                    </div>
                                                                </div>
                                                                <a href="#" class="cal-plus-icon"><i class="fa-solid
                                                                    {{ $appointment->appointmentRequestType->name == 'Offline' ? 'fa-hospital' :
                                                                       ($appointment->appointmentRequestType->name == 'Online' ? 'fa-video' : 'fa-house') }}">
                                                                </i></a>
                                                            </div>
                                                            @php
                                                                $businessHour = json_decode($appointment->business_hour, true);
                                                                $formatted = $businessHour && isset($businessHour['date'], $businessHour['time'])
                                                                    ? \Carbon\Carbon::parse($businessHour['date'] . ' ' . $businessHour['time'])->format('d M Y - h:i A')
                                                                    : 'Not Set';
                                                            @endphp
                                                            <div class="date-time">
                                                                <p><i class="fa-solid fa-clock"></i>{{ $formatted }} </p>
                                                            </div>
                                                            <div class="card-btns">
                                                                <a href="{{ route('chat.withDoctor', ['doctorId' => $appointment->doctor->id]) }}" class="btn btn-gray"><i class="fa-solid fa-comment-dots"></i>Chat Now</a>
                                                                <a href="{{ route('patient.appointment') }}" class="btn btn-outline-primary"><i class="fa-solid fa-calendar-check"></i>Attend</a>
                                                            </div>
                                                        </div>
                                                    @endforeach

													{{-- <div class="appointment-dash-card">
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
													</div> --}}
												</div>
											</div>

										</div>
										{{-- <div class="dashboard-card w-100">
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

										</div> --}}
									</div>
								</div>
								<div class="col-xl-7 d-flex">
									<div class="dashboard-main-col w-100">
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Analytics</h5>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="chart-tabs patient-dash-tab">
													<ul class="nav" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#heart-rate" aria-selected="false" role="tab" tabindex="-1">Appointment</a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link " href="#" data-bs-toggle="tab" data-bs-target="#blood-pressure" aria-selected="true" role="tab">Order</a>
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
										{{-- <div class="dashboard-card w-100">
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
										</div> --}}
										{{-- <div class="dashboard-card w-100">
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

										</div> --}}
									</div>

								</div>
								<div class="col-xl-12 d-flex">
									<div class="dashboard-card w-100">
										<div class="dashboard-card-head">
											<div class="header-title">
												<h5>Reports</h5>
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
													    {{-- <li class="nav-item">
														   <a class="nav-link" href="#medical-tab" data-bs-toggle="tab">Medical Records</a>
													    </li>
													    <li class="nav-item">
															<a class="nav-link" href="#prsc-tab" data-bs-toggle="tab">Prescriptions</a>
													    </li> --}}
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
																		<th>Doctor Name</th>
																		<th>Date</th>
																		<th>Service Name</th>
																		<th>Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
                                                                    @foreach ($appointments as $appointment)
                                                                        <tr>
                                                                            <td>
                                                                                <a href="javascript:void(0);"><span class="text-blue">#{{ $appointment->appointment_code }}</span></a>
                                                                            </td>
                                                                            <td>
                                                                                {{ $appointment->doctor->name }}
                                                                            </td>
                                                                            <td>{{ $appointment->created_at->format('d M Y') }}</td>
                                                                            <td>{{ $appointment->service->name }}</td>
                                                                            <td>${{ number_format($appointment->appointment_final_price, 2) }}</td>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <a href="{{ route('patient-completed-appointment', $appointment->id) }}" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
																</tbody>
															</table>
														</div>
													</div>
												   </div>
												   <!-- /Appointments Tab -->

													 <!--Invoices Tab -->
												   <div class="tab-pane fade" id="invoice-tab">
														<div class="custom-table">
															<div class="table-responsive">
																<table class="table table-center mb-0">
																	<thead>
																		<tr>
																			<th>Code</th>
																			<th>Product</th>
																			<th>Date</th>
																			<th>Total Money</th>
																		</tr>
																	</thead>
																	<tbody>
                                                                        @foreach ($orders as $order)
                                                                            <tr>
                                                                                <td class="text-blue-600"><a href="javascript:void(0);">#{{ $order->order_code }}</a></td>
                                                                                <td>
                                                                                    <a href="javascript:void(0);" class="lab-icon">
                                                                                        <span><i class="fa-solid fa-paperclip"></i></span>{{ $order->orderItems->first()->productVariant->product->name }}
                                                                                    </a>
                                                                                </td>
                                                                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                                                                <td>${{ number_format($order->final_amount, 2) }}</td>
                                                                            </tr>
                                                                        @endforeach
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
