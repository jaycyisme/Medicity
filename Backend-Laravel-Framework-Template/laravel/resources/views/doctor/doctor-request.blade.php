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
								<h3>Requests</h3>
								{{-- <ul>
									<li>
										<div class="dropdown header-dropdown">
											<a class="dropdown-toggle nav-tog" data-bs-toggle="dropdown" href="javascript:void(0);">
												Last 7 Days
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="javascript:void(0);" class="dropdown-item">
													Today
												</a>
												<a href="javascript:void(0);" class="dropdown-item">
													This Month
												</a>
												<a href="javascript:void(0);" class="dropdown-item">
													Last 7 Days
												</a>
											</div>
										</div>
									</li>
								</ul> --}}
							</div>

                            @foreach ($appointments as $appointment)
                            @php
                                $businessHour = json_decode($appointment->business_hour, true);
                                if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
                                    return 'Not Set';
                                }

                                $date = \Carbon\Carbon::parse($businessHour['date'])->format('d M, Y');
                                $time = $businessHour['time'];

                                $formattedDateTime = "{$date} at {$time}";
                            @endphp
                                <!-- Request List -->
                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="patient-profile.html">
                                                    <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                    <p>#{{$appointment->appointment_code}}</p>
                                                    <h6><a href="patient-profile.html">{{$appointment->user->name}}</a><span class="badge new-tag">New</span></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            <p><i class="fa-solid fa-clock"></i>{{$formattedDateTime}}</p>

                                                <p class="md-text">{{$appointment->service->name}}</p>

                                        </li>
                                        <li class="appointment-type">
                                            <p class="md-text">Type of Appointment</p>

                                            <p><i class="fa-solid {{ $appointment->appointmentRequestType->name == 'Offline' ? 'fa-hospital' :
                                                                    ($appointment->appointmentRequestType->name == 'Online' ? 'fa-message' :
                                                                    ($appointment->appointmentRequestType->name == 'Home Visit' ? 'fa-house' : '')) }}
                                                                    text-blue"></i>{{$appointment->appointmentRequestType->name}}
                                                                    @if ($appointment->clinic_id)
                                                                    <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" title="{{$appointment->clinic->name}}"></i>
                                                                    @endif
                                                                </p>
                                        </li>
                                        <li>
                                            <ul class="request-action">
                                                <li>
                                                    <!-- Open Accept Modal -->
                                                    <a href="javascript:void(0);" class="accept-link" data-bs-toggle="modal"
                                                       data-bs-target="#accept_appointment"
                                                       onclick="setAppointmentId({{ $appointment->id }}, 'accept')">
                                                        <i class="fa-solid fa-check"></i> Accept
                                                    </a>
                                                </li>
                                                <li>
                                                    <!-- Open Reject Modal -->
                                                    <a href="javascript:void(0);" class="reject-link" data-bs-toggle="modal"
                                                       data-bs-target="#cancel_appointment"
                                                       onclick="setAppointmentId({{ $appointment->id }}, 'reject')">
                                                        <i class="fa-solid fa-xmark"></i> Reject
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Request List -->
                            @endforeach

							{{-- <div class="row">
								<div class="col-md-12">
									<div class="loader-item text-center">
										<a href="javascript:void(0);" class="btn btn-load">Load More</a>
									</div>
								</div>
							</div> --}}

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
