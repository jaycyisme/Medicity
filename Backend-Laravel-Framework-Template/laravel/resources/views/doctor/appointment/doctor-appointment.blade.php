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
								<h3>Appointments</h3>
								{{-- <ul class="header-list-btns">
									<li>
										<div class="input-block dash-search-input">
											<input type="text" class="form-control" placeholder="Search">
											<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
										</div>
									</li>
									<li>
										<div class="view-icons">
											<a href="appointments.html" class="active"><i class="fa-solid fa-list"></i></a>
										</div>
									</li>
									<li>
										<div class="view-icons">
											<a href="doctor-appointments-grid.html"><i class="fa-solid fa-th"></i></a>
										</div>
									</li>
									<li>
										<div class="view-icons">
											<a href="#"><i class="fa-solid fa-calendar-check"></i></a>
										</div>
									</li>
								</ul> --}}
							</div>
							<div class="appointment-tab-head">
								<div class="appointment-tabs">
									<ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="pills-upcoming-tab" data-bs-toggle="pill" data-bs-target="#pills-upcoming" type="button" role="tab" aria-controls="pills-upcoming" aria-selected="false">Upcoming<span>{{$upcomingAppointments->count()}}</span></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill" data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel" aria-selected="true">Cancelled<span>{{$cancelledAppointments->count()}}</span></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill" data-bs-target="#pills-complete" type="button" role="tab" aria-controls="pills-complete" aria-selected="true">Completed<span>{{$completedAppointments->count()}}</span></button>
										</li>
									</ul>
								</div>
								{{-- <div class="filter-head">
									<div class="position-relative daterange-wraper me-2">
										<div class="input-groupicon calender-input">
											<input type="text" class="form-control  date-range bookingrange" placeholder="From Date - To Date ">
										</div>
										<i class="fa-solid fa-calendar-days"></i>
									</div>
									<div class="form-sorts dropdown">
										<a href="javascript:void(0);" class="dropdown-toggle" id="table-filter"><i class="fa-solid fa-filter me-2"></i>Filter By</a>
										<div class="filter-dropdown-menu">
											<div class="filter-set-view">
												<div class="accordion" id="accordionExample">
													<div class="filter-set-content">
														<div class="filter-set-content-head">
															<a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Name<i class="fa-solid fa-chevron-right"></i></a>
														</div>
														<div class="filter-set-contents accordion-collapse collapse show" id="collapseTwo" data-bs-parent="#accordionExample">
															<ul>
																<li>
																	<div class="input-block dash-search-input w-100">
																		<input type="text" class="form-control" placeholder="Search">
																		<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<div class="filter-set-content">
														<div class="filter-set-content-head">
															<a href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Appointment Type<i class="fa-solid fa-chevron-right"></i></a>
														</div>
														<div class="filter-set-contents accordion-collapse collapse show" id="collapseOne" data-bs-parent="#accordionExample">
															<ul>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox" checked>
																			<span class="checkmarks"></span>
																			<span class="check-title">All Type</span>
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Video Call</span>
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Audio Call</span>
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Chat</span>
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Direct Visit</span>
																		</label>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<div class="filter-set-content">
														<div class="filter-set-content-head">
															<a href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Visit Type<i class="fa-solid fa-chevron-right"></i></a>
														</div>
														<div class="filter-set-contents accordion-collapse collapse show" id="collapseThree" data-bs-parent="#accordionExample">
															<ul>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox" checked>
																			<span class="checkmarks"></span>
																			<span class="check-title">All Visit</span>
																		</label>
																	</div>

																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">General</span>
																		</label>
																	</div>

																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Consultation</span>
																		</label>
																	</div>

																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Follow-up</span>
																		</label>
																	</div>

																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			<span class="check-title">Direct Visit</span>
																		</label>
																	</div>

																</li>
															</ul>
														</div>
													</div>
												</div>

												<div class="filter-reset-btns">
													<a href="appointments.html" class="btn btn-light">Reset</a>
													<a href="appointments.html" class="btn btn-primary">Filter Now</a>
												</div>
											</div>
										</div>
									</div>
								</div> --}}
							</div>

							<div class="tab-content appointment-tab-content">
								<div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                                    @foreach ($upcomingAppointments as $appointment)
                                    @php
                                        $businessHour = json_decode($appointment->business_hour, true);
                                        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
                                            return 'Not Set';
                                        }

                                        $date = \Carbon\Carbon::parse($businessHour['date'])->format('d M, Y');
                                        $time = $businessHour['time'];

                                        $formattedDateTime = "{$date} at {$time}";
                                    @endphp
                                        <!-- Appointment List -->
                                        <div class="appointment-wrap">
                                            <ul>
                                                <li>
                                                    <div class="patinet-information">
                                                        <a href="{{ route('doctor.upcoming.appointment', $appointment->id) }}">
                                                            <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
                                                        </a>
                                                        <div class="patient-info">
                                                            <p>#{{$appointment->appointment_code}}</p>
                                                            <h6><a href="{{ route('doctor.upcoming.appointment', $appointment->id) }}">{{$appointment->user->name}}</a></h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info">
                                                    <p><i class="fa-solid fa-clock"></i>{{$formattedDateTime}}</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li>{{$appointment->service->name}}</li>
                                                        {{-- <li>Video Call</li> --}}
                                                    </ul>

                                                </li>
                                                <li class="mail-info-patient">
                                                    <ul>
                                                        <li><i class="fa-solid fa-envelope"></i>{{$appointment->patient_email}}</li>
                                                        <li><i class="fa-solid fa-phone"></i>{{$appointment->patient_phone}}</li>
                                                    </ul>
                                                </li>
                                                <li class="appointment-action">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('doctor.upcoming.appointment', $appointment->id) }}"><i class="fa-solid fa-eye"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('chat.withUser', ['userId' => $appointment->user->id]) }}"><i class="fa-solid fa-comments"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="appointment-start">
                                                    <a href="{{ route('doctor.appointment.start', $appointment->id) }}" class="start-link">Start Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Appointment List -->
                                    @endforeach

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
								<div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">
                                    @foreach ($cancelledAppointments as $appointment)
                                    @php
                                        $businessHour = json_decode($appointment->business_hour, true);
                                        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
                                            return 'Not Set';
                                        }

                                        $date = \Carbon\Carbon::parse($businessHour['date'])->format('d M, Y');
                                        $time = $businessHour['time'];

                                        $formattedDateTime = "{$date} at {$time}";
                                    @endphp
                                        <!-- Appointment List -->
                                        <div class="appointment-wrap">
                                            <ul>
                                                <li>
                                                    <div class="patinet-information">
                                                        <a href="{{ route('doctor-cancelled-appointment', $appointment->id) }}">
                                                            <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
                                                        </a>
                                                        <div class="patient-info">
                                                            <p>#{{$appointment->appointment_code}}</p>
                                                            <h6><a href="{{ route('doctor-cancelled-appointment', $appointment->id) }}">{{$appointment->user->name}}</a></h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info">
                                                    <p><i class="fa-solid fa-clock"></i>{{$formattedDateTime}}</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li>{{$appointment->service->name}}</li>
                                                        {{-- <li>Video Call</li> --}}
                                                    </ul>

                                                </li>
                                                <li class="appointment-detail-btn">
                                                    <a href="{{ route('doctor-cancelled-appointment', $appointment->id) }}" class="start-link">View Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Appointment List -->
                                    @endforeach

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
								<div class="tab-pane fade" id="pills-complete" role="tabpanel" aria-labelledby="pills-complete-tab">
                                    @foreach ($completedAppointments as $appointment)
                                    @php
                                        $businessHour = json_decode($appointment->business_hour, true);
                                        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
                                            return 'Not Set';
                                        }

                                        $date = \Carbon\Carbon::parse($businessHour['date'])->format('d M, Y');
                                        $time = $businessHour['time'];

                                        $formattedDateTime = "{$date} at {$time}";
                                    @endphp
                                        <!-- Appointment List -->
                                        <div class="appointment-wrap">
                                            <ul>
                                                <li>
                                                    <div class="patinet-information">
                                                        <a href="{{ route('doctor-completed-appointment', $appointment->id) }}">
                                                            <img src="@if(isset($appointment->user->profile_photo_path)){{ asset('storage/'.$appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
                                                        </a>
                                                        <div class="patient-info">
                                                            <p>#{{$appointment->appointment_code}}</p>
                                                            <h6><a href="{{ route('doctor-completed-appointment', $appointment->id) }}">{{$appointment->user->name}}</a></h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info">
                                                    <p><i class="fa-solid fa-clock"></i>{{$formattedDateTime}}</p>
                                                    <ul class="d-flex apponitment-types">
                                                        <li>{{$appointment->service->name}}</li>
                                                        {{-- <li>Video Call</li> --}}
                                                    </ul>

                                                </li>
                                                <li class="appointment-detail-btn">
                                                    <a href="{{ route('doctor-completed-appointment', $appointment->id) }}" class="start-link">View Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Appointment List -->
                                    @endforeach

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
							</div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
