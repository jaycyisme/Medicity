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
												<a href="patient-profile.html">
													<img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
												</a>
												<div class="patient-info">
													<p>#{{$appointment->appointment_code}}</p>
													<h6><a href="patient-profile.html">{{$appointment->user->name}} </a></h6>
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
												<p>Person with patient</p>
												<ul class="d-flex apponitment-types">
													<li>{{$medical_record->dependant_name}} ({{$medical_record->dependant_role}} - {{$medical_record->dependant_phone}})</li>
												</ul>
											</div>
											<div class="person-info">
												<p>Service</p>
												<ul class="d-flex apponitment-types">
													<li><i class="fa-solid {{ $appointment->appointmentRequestType->name == 'Offline' ? 'fa-hospital' :
                                                                    ($appointment->appointmentRequestType->name == 'Online' ? 'fa-message' :
                                                                    ($appointment->appointmentRequestType->name == 'Home Visit' ? 'fa-house' : '')) }}
                                                                    text-green">
                                                        </i>{{$appointment->service->name}}
                                                    </li>
												</ul>
											</div>
										</li>
										<li class="appointment-action">
											<div class="detail-badge-info">
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
													<a href="#"><i class="fa-solid fa-xmark"></i></a>
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
												<a href="#" class="btn btn-secondary">Inprogress</a>
											</div>
										</li>
									</ul>
								</div>
								<!-- /Appointment Detail Card -->

								<div class="create-appointment-details">
									@if ($sessionEndTime)
                                        <div class="session-end-head">
                                            <h6><span>Session Ends in</span> <span id="countdown-timer"></span></h6>
                                        </div>

                                        <script>
                                            function startCountdown(endTime) {
                                                function updateCountdown() {
                                                    const now = new Date().getTime();
                                                    const timeLeft = endTime - now;

                                                    if (timeLeft <= 0) {
                                                        document.getElementById('countdown-timer').innerHTML = "00M:00S";
                                                        return;
                                                    }

                                                    const minutes = Math.floor((timeLeft / 1000) / 60);
                                                    const seconds = Math.floor((timeLeft / 1000) % 60);

                                                    document.getElementById('countdown-timer').innerHTML =
                                                        `${String(minutes).padStart(2, '0')}M:${String(seconds).padStart(2, '0')}S`;
                                                }

                                                setInterval(updateCountdown, 1000);
                                                updateCountdown();
                                            }

                                            const sessionEndTime = new Date("{{ $sessionEndTime->format('Y-m-d H:i:s') }}").getTime();
                                            startCountdown(sessionEndTime);
                                        </script>
                                    @endif
                                    @livewire('doctor.appointment.medical-record-update', ['id' => $medical_record->id])

								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
