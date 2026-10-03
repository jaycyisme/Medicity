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
							<div class="dashboard-header">
								<div class="header-back">
									<a href="{{ route('doctor.appointment') }}" class="back-arrow"><i class="fa-solid fa-arrow-left"></i></a>
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
													<img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
												</a>
												<div class="patient-info">
													<p>#{{$appointment->appointment_code}}</p>
													<h6><a href="#">{{$appointment->user->name}} </a></h6>
													<div class="mail-info-patient">
														<ul>
															<li><i class="fa-solid fa-envelope"></i>{{$appointment->patient_email}}</li>
															<li><i class="fa-solid fa-phone"></i>{{$appointment->patient_phone}}</li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li class="appointment-info">
											<div class="person-info">
												<p>Type of Appointment</p>
												<ul class="d-flex apponitment-types">
													<li><i class="fa-solid {{ $appointment->appointmentRequestType->name == 'Offline' ? 'fa-hospital' :
                                                                    ($appointment->appointmentRequestType->name == 'Online' ? 'fa-message' :
                                                                    ($appointment->appointmentRequestType->name == 'Home Visit' ? 'fa-house' : '')) }}
                                                                    text-green">
                                                        </i>{{$appointment->appointmentRequestType->name}}
                                                    </li>
												</ul>
											</div>
										</li>
										<li class="appointment-action">
											<div class="detail-badge-info">
												{{-- <span class="badge bg-grey me-2">New Patient</span> --}}
												<span class="badge bg-yellow">Upcoming</span>
											</div>
											<div class="consult-fees">
												<h6>Consultation Fees : ${{$appointment->service->price}}</h6>
											</div>
											<ul>
												<li>
													<a href="#"><i class="fa-solid fa-comments"></i></a>
												</li>
												<li>
													<a href="{{ route('doctor.declineRequest', $appointment->id) }}"><i class="fa-solid fa-xmark"></i></a>
												</li>
											</ul>
										</li>
									</ul>

                                    @php
                                        $businessHour = json_decode($appointment->business_hour, true);
                                        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
                                            return 'Not Set';
                                        }

                                        $date = \Carbon\Carbon::parse($businessHour['date'])->format('d M, Y');
                                        $time = $businessHour['time'];

                                        $formattedDateTime = "{$date} at {$time}";
                                    @endphp

									<ul class="detail-card-bottom-info">
										<li>
											<h6>Appointment Date & Time</h6>
											<span>{{$formattedDateTime}}</span>
										</li>
										<li>
											<h6>Clinic Location</h6>
											<span>{{$appointment->clinic->name}}</span>
										</li>
										{{-- <li>
											<h6>Location</h6>
											<span>Newyork, United States</span>
										</li> --}}
										<li>
											<h6>Visit Type</h6>
											<span>{{$appointment->appointmentRequestType->name}}</span>
										</li>
										<li>
											<div class="start-btn">
												<a href="{{ route('doctor.appointment.start', $appointment->id) }}" class="btn btn-secondary">Start Session</a>
											</div>
										</li>
									</ul>
								</div>
								<!-- /Appointment Detail Card -->
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
