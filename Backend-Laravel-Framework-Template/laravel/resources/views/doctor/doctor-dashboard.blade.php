<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row" style="margin-top: 100px;">
						<div class="col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Profile Sidebar -->
                                @include('layouts.app.doctor-sidebar')
							<!-- /Profile Sidebar -->

						</div>

						<div class="col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-xl-4 d-flex">
									<div class="dashboard-box-col w-100">
										<div class="dashboard-widget-box">
											<div class="dashboard-content-info">
												<h6>Total Patient</h6>
												<h4>{{$totalPatients}}</h4>
												<span class="{{ $percentChangeWeek >= 0 ? 'text-success' : 'text-danger' }}">
                                                    <i class="fa-solid {{ $percentChangeWeek >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                                    {{ abs($percentChangeWeek) }}% From Last Week
                                                </span>
											</div>
											<div class="dashboard-widget-icon">
												<span class="dash-icon-box"><i class="fa-solid fa-user-injured"></i></span>
											</div>
										</div>
										<div class="dashboard-widget-box">
											<div class="dashboard-content-info">
												<h6>Patients Today</h6>
												<h4>{{$patientsToday}}</h4>
												<span class="{{ $percentChangeDay >= 0 ? 'text-success' : 'text-danger' }}">
                                                    <i class="fa-solid {{ $percentChangeDay >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                                    {{ abs($percentChangeDay) }}% From Yesterday
                                                </span>
											</div>
											<div class="dashboard-widget-icon">
												<span class="dash-icon-box"><i class="fa-solid fa-user-clock"></i></span>
											</div>
										</div>
										{{-- <div class="dashboard-widget-box">
											<div class="dashboard-content-info">
												<h6>Appointments Today</h6>
												<h4>50</h4>
												<span class="text-success"><i class="fa-solid fa-arrow-up"></i>20% From Yesterday</span>
											</div>
											<div class="dashboard-widget-icon">
												<span class="dash-icon-box"><i class="fa-solid fa-calendar-days"></i></span>
											</div>
										</div> --}}
									</div>
								</div>
								<div class="col-xl-8 d-flex">
									<div class="dashboard-card w-100">
										<div class="dashboard-card-head">
											<div class="header-title">
												<h5>Appointment</h5>
											</div>

										</div>
										<div class="dashboard-card-body">
											<div class="table-responsive">
												<table class="table dashboard-table appoint-table">
													<tbody>
                                                        @foreach ($recentRequests as $appointment)
                                                        @php
                                                            $businessHour = json_decode($appointment->business_hour, true);
                                                            if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
                                                                return 'Not Set';
                                                            }

                                                            $date = \Carbon\Carbon::parse($businessHour['date'])->format('d M, Y');
                                                            $time = $businessHour['time'];

                                                            $formattedDateTime = "{$date} at {$time}";
                                                        @endphp
                                                            <tr>
                                                                <td>
                                                                    <div class="patient-info-profile">
                                                                        <a href="#" class="table-avatar">
                                                                            <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="Img">
                                                                        </a>
                                                                        <div class="patient-name-info">
                                                                            <span>#{{$appointment->appointment_code}}</span>
                                                                            <h5><a href="#">{{$appointment->user->name}}</a></h5>
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <div class="appointment-date-created">
                                                                        <h6>{{$formattedDateTime}}</h6>
                                                                        <span class="badge table-badge">General</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="apponiment-actions d-flex align-items-center">
                                                                        <a href="javascript:void(0);" class="text-success-icon me-2 accept-link" data-bs-toggle="modal"
                                                                        data-bs-target="#accept_appointment"
                                                                        onclick="setAppointmentId({{ $appointment->id }}, 'accept')"><i class="fa-solid fa-check"></i></a>
                                                                        <a href="javascript:void(0);" class="text-danger-icon reject-link" data-bs-toggle="modal"
                                                                        data-bs-target="#cancel_appointment"
                                                                        onclick="setAppointmentId({{ $appointment->id }}, 'reject')"><i class="fa-solid fa-xmark"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
													</tbody>
												</table>
											</div>
										</div>

									</div>
								</div>
								<div class="col-xl-5 d-flex">
									<div class="dashboard-chart-col w-100">
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head border-0">
												<div class="header-title">
													<h5>Weekly Overview</h5>
												</div>
												<div class="chart-create-date">
													<h6>Mar 14 - Mar 21</h6>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="chart-tab">
													<ul class="nav nav-pills product-licence-tab" id="pills-tab2" role="tablist">
														<li class="nav-item" role="presentation">
															<button class="nav-link active" id="pills-revenue-tab" data-bs-toggle="pill" data-bs-target="#pills-revenue" type="button" role="tab" aria-controls="pills-revenue" aria-selected="false">Revenue</button>
														</li>
														<li class="nav-item" role="presentation">
															<button class="nav-link" id="pills-appointment-tab" data-bs-toggle="pill" data-bs-target="#pills-appointment" type="button" role="tab" aria-controls="pills-appointment" aria-selected="true">Appointments</button>
														</li>
													</ul>
													<div class="tab-content w-100" id="v-pills-tabContent">
														<div class="tab-pane fade show active" id="pills-revenue" role="tabpanel" aria-labelledby="pills-revenue-tab">
															<div id="revenue-chart"></div>
														</div>
														<div class="tab-pane fade" id="pills-appointment" role="tabpanel" aria-labelledby="pills-appointment-tab">
															<div id="appointment-chart"></div>

														</div>
													</div>

												</div>
											</div>

										</div>
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Recent Patients</h5>
												</div>
												<div class="card-view-link">
													{{-- <a href="my-patients.html">View All</a> --}}
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="d-flex recent-patient-grid-boxes">
                                                    @foreach ($recentPatients as $appointment)
                                                        <div class="recent-patient-grid">
                                                            <a href="#" class="patient-img">
                                                                <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif"" alt="Img">
                                                            </a>
                                                            <h5><a href="#">{{ $appointment->user->name }}</a></h5>
                                                            <span>Patient ID : P{{ str_pad($appointment->user->id, 4, '0', STR_PAD_LEFT) }}</span>
                                                            <div class="date-info">
                                                                <p>Last Appointment
                                                                    {{ \Carbon\Carbon::parse($appointment->created_at)->format('d M Y') }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- <div class="col-xl-7 d-flex">
									<div class="dashboard-main-col w-100">
										<div class="upcoming-appointment-card">
											<div class="title-card">
												<h5>Upcoming Appointment</h5>
											</div>
											<div class="upcoming-patient-info">
												<div class="info-details">
													<span class="img-avatar"><img src="{{ asset('medicity/assets/img/doctors-dashboard/profile-01.jpg') }}" alt="Img"></span>
													<div class="name-info">
														<span>#Apt0001</span>
														<h6>Adrian Marshall</h6>
													</div>

												</div>
												<div class="date-details">
													<span>General visit</span>
													<h6>Today, 10:45 AM</h6>
												</div>
												<div class="circle-bg">
													<img src="{{ asset('medicity/assets/img/bg/dashboard-circle-bg.png') }}" alt="Img">
												</div>
											</div>
											<div class="appointment-card-footer">
												<h5><i class="fa-solid fa-video"></i>Video Appointment</h5>
												<div class="btn-appointments">
													<a href="chat-doctor.html" class="btn">Chat Now</a>
													<a href="doctor-appointment-start.html" class="btn">Start Appointment</a>
												</div>
											</div>
										</div>
										<div class="dashboard-card w-100">
											<div class="dashboard-card-head">
												<div class="header-title">
													<h5>Recent Invoices</h5>
												</div>
												<div class="card-view-link">
													<a href="{{ route('doctor.appointment') }}">View All</a>
												</div>
											</div>
											<div class="dashboard-card-body">
												<div class="table-responsive">
													<table class="table dashboard-table">
														<tbody>
                                                            @foreach ($recentCompletedAppointments as $appointment)
                                                                <tr>
                                                                    <td>
                                                                        <div class="patient-info-profile">
                                                                            <a href="invoices.html" class="table-avatar">
                                                                                <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="Img">
                                                                            </a>
                                                                            <div class="patient-name-info">
                                                                                <h5><a href="invoices.html">{{$appointment->user->name}}</a></h5>
                                                                                <span>#{{$appointment->appointment_code}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="appointment-date-created">
                                                                            <span class="paid-text">Amount</span>
                                                                            <h6>${{ number_format($appointment->appointment_final_price, 2) }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="appointment-date-created">
                                                                            <span class="paid-text">Paid On</span>
                                                                            <h6{{ $appointment->created_at->format('d M Y') }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="apponiment-view d-flex align-items-center">
                                                                            <a href="{{ route('doctor-completed-appointment', $appointment->id) }}"><i class="fa-solid fa-eye"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

								</div> --}}
								{{-- <div class="col-xl-7 d-flex">
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
								</div> --}}
								<div class="col-xl-5 d-flex">
									<div class="dashboard-card w-100">
										<div class="dashboard-card-head">
											<div class="header-title">
												<h5>Clinics & Availability</h5>
											</div>
										</div>
										<div class="dashboard-card-body">
                                            @foreach ($doctorClinics as $doctorClinic)
                                            @php
                                                $clinic = $doctorClinic->clinic;
                                                $hours = json_decode($clinic->business_hour, true);
                                            @endphp
                                                <div class="clinic-available">
                                                    <div class="clinic-head">
                                                        <div class="clinic-info">
                                                            <span class="clinic-img">
                                                                <img src="{{ asset('storage/Clinic/'.$clinic->image_url) }}" alt="Img">
                                                            </span>
                                                            <h6>{{ $clinic->name }}</h6>
                                                        </div>
                                                        <div class="clinic-charge">
                                                            {{-- <span>${{ Auth::user()->price_per_session }}</span> --}}
                                                        </div>
                                                    </div>
                                                    <div class="available-time">
                                                        <ul>
                                                            @foreach($hours as $day => $time)
                                                                @if(!empty($time['start']) && !empty($time['end']))
                                                                    <li>
                                                                        <span>{{ substr($day, 0, 3) }} :</span>
                                                                        {{ \Carbon\Carbon::parse($time['start'])->format('h:i A') }} - {{ \Carbon\Carbon::parse($time['end'])->format('h:i A') }}
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                        <div class="change-time">
                                                            {{-- <a href="#">Change </a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
<!-- Appointment Accepted Modal -->
<div class="modal fade info-modal" id="accept_appointment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="success-wrap text-center">
                    <span class="icon-success"><i class="fa-solid fa-calendar-check"></i></span>
                    <h3>Appointment Accepted</h3>
                    <p>Your Appointment has been scheduled.</p>
                    <input type="hidden" id="appointment_id">
                    <button onclick="confirmAction('accept')" class="btn btn-primary prime-btn">
                        Confirm
                    </button>
                    <button class="btn btn-gray" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /Appointment Accepted Modal -->

<!-- Appointment Cancel Modal -->
<div class="modal fade info-modal" id="cancel_appointment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="success-wrap text-center">
                    <span class="icon-success bg-red"><i class="fa-solid fa-xmark"></i></span>
                    <h3>Are you Sure?</h3>
                    <p>Do you want to cancel this appointment?</p>
                    <input type="hidden" id="appointment_id">
                    <button onclick="confirmAction('reject')" class="btn btn-danger">
                        Confirm
                    </button>
                    <button class="btn btn-gray" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Appointment Cancel Modal -->
