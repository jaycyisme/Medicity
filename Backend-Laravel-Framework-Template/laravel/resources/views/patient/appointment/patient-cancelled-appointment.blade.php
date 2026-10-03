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
								<div class="header-back">
									<a href="{{ route('patient.appointment') }}" class="back-arrow"><i class="fa-solid fa-arrow-left"></i></a>
									<h3>Appointment Details</h3>
								</div>
							</div>
							<div class="appointment-details-wrap">

								<!-- Appointment Detail Card -->
								<div class="appointment-wrap appointment-detail-card">
									<ul>
										<li>
											<div class="patinet-information">
												<a href="{{ route('doctor-profile', $appointment->doctor->id) }}">
													<img src="@if(isset($appointment->doctor->profile_photo_path)){{ asset('storage/'.$appointment->doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
												</a>
												<div class="patient-info">
													<p>#{{$appointment->appointment_code}}</p>
													<h6><a href="{{ route('doctor-profile', $appointment->doctor->id) }}">{{$appointment->doctor->name}} </a></h6>
													<div class="mail-info-patient">
														<ul>
															<li><i class="fa-solid fa-envelope"></i>{{$appointment->doctor->email}}</li>
															<li><i class="fa-solid fa-phone"></i> {{$appointment->doctor->phone_number}}</li>
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
												<span class="badge bg-red me-2">Cancelled</span>
												<a href="#reject_reason" class="reject-popup" data-bs-toggle="modal">Reason</a>
											</div>
											<div class="consult-fees">
												<h6>Consultation Fees : ${{$appointment->service->price}}</h6>
											</div>
											<ul>
												<li>
													<a href="#"><i class="fa-solid fa-comments"></i></a>
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
											<h6>Visit Type</h6>
											<span>{{$appointment->appointmentRequestType->name}}</span>
										</li>
										<li>
											<div class="detail-badge-info">
												<span class="badge bg-soft-red me-2">Status : Reschedule</span>
												<a href="{{ route('doctor-booking', $appointment->doctor->id) }}" class="reschedule-btn btn-primary-border">Reschedule Appointment</a>
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

<!-- Appointment Cancel Reason Modal -->
<div class="modal fade custom-modal custom-modal-two" id="reject_reason">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Reason</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span><i class="fa-solid fa-x"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="reason-of-rejection">
                    <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book an reschedule by next week.</p>
                    <span class="text-danger">Cancelled By You on 23 March 2023</span>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /Appointment Cancel Reason Modal -->
