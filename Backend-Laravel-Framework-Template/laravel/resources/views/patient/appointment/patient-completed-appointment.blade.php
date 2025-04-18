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
													<h6><a href="{{ route('doctor-profile', $appointment->doctor->id) }}">Dr Edalin Hendry </a></h6>
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
												<span class="badge bg-green">Completed</span>
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
										<li class="detail-badge-info">
											<a href="#view_prescription" data-bs-toggle="modal" class="btn btn-primary prime-btn me-3">Download Prescription</a>
											<a href="{{ route('doctor-booking', $appointment->doctor->id) }}" class="btn reschedule-btn btn-primary-border">Reschedule Appointment</a>
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
                    <h5>{{$appointment->created_at->format('d M, Y')}}</h5>
                    <ul>
                        <li><a href="javascript:void(0);" class="print-link"><i class="fa-solid fa-print"></i></a></li>
                        <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                    </ul>
                </div>
                <div class="view-prescribe-details">
                    <div class="hospital-addr">
                        <div class="invoice-logo">
                            <img src="{{ asset('medicity/assets/img/logo.png') }}" alt="logo">
                        </div>
                        @if ($appointment->clinic_id)
                            <h5>{{$appointment->clinic->address_detail}}  </h5>
                            <p>Phone : {{$appointment->clinic->phone_number}}</p>
                        @endif
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <h6 class="customer-text">{{$appointment->doctor->name}}</h6>
                                    <p>{{$appointment->doctor->designation}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info2">
                                    <p><span>Date : </span>{{$formattedDateTime}}</p>
                                    <p><span>Appointment Type :  </span>{{$appointment->appointmentRequestType->name}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="patient-id">
                                    <h6>Patient Details</h6>
                                    <div class="patient-det">
                                        <h6>{{$appointment->user->name}}</h6>
                                        <ul>
                                            <li>{{$medical_record->dob->format('d M, Y')}} /  {{$medical_record->gender}}</li>
                                            {{-- <li>Blood : O+ve</li> --}}
                                            <li>Consultation Fees : ${{$medical_record->appointment_final_price}}</li>
                                            {{-- <li>Type : Outpatient</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <div class="appointment-notes">
                        <h3>Appointment Note</h3>
                    </div>
                    <div class="appoint-wrap">
                        <h5>Vitals</h5>
                        <ul>
                            <li><span>Pulse : </span> {{$medical_record->pulse}} Bpm</li>
                            <li><span>Systolic BP : </span>{{$medical_record->systolic}}mmHg</li>
                            <li><span>Diastolic : </span>{{$medical_record->diastolic}}mmHg</li>
                            <li><span>Spo2 : </span>{{$medical_record->spo2}}%</li>
                            <li><span>BSA : </span>{{$medical_record->bsa}}</li>
                                <li><span>Height :  </span>{{$medical_record->height}} cm</li>
                            <li><span>Weight : </span>{{$medical_record->weight}} Kg</li>
                            {{-- <li><span>Patient Direct from : </span>Walk in / OPD</li> --}}
                            <li><span>Body Mass Index : </span>{{$medical_record->body_mass_index}} BMI</li>
                            {{-- <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li> --}}
                        </ul>
                    </div>
                    <div class="appoint-wrap">
                        <h5>Previous Medical History</h5>
                        <p>{{$medical_record->previous_medical_history}}</p>
                    </div>
                    <div class="appoint-wrap">
                        <h5>Clinical Notes</h5>
                        <p>{{$medical_record->clinical_notes}}</p>
                    </div>
                    {{-- <div class="appoint-wrap">
                        <h5>Complaint</h5>
                        <p>An account of the present illness, which includes the circumstances surrounding the onset of recent health changes and the chronology of subsequent events that have led the patient to seek medi</p>
                    </div> --}}
                    <div class="appoint-wrap">
                        <h5>Laboratory Test Results</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Test Name</th>
                                    <th>Price</th>
                                    <th>Position</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laboratoryResults as $result)
                                    <tr>
                                        <td>{{ $result->laboratoryTest->name }}</td>
                                        <td>${{ $result->laboratoryTest->price }}</td>
                                        <td>{{ $result->position }}</td>
                                        <td>
                                            @if($result->result && file_exists(storage_path('app/public/' . $result->result)))
                                                <!-- Download Button -->
                                                <a href="{{ asset('storage/' . $result->result) }}" class="btn btn-primary" download>Download PDF</a>

                                                <!-- Quick View Button -->
                                                <a href="{{ asset('storage/' . $result->result) }}" class="btn btn-secondary" target="_blank">Quick View</a>
                                            @else
                                                <p>No PDF available for this test.</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="appoint-wrap">
                        <h5>Medications</h5>
                        <p>The patient  has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled on metformin. Additionally, the patient underwent appendectomy in 2020 without postoperative complications.</p>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive inv-table">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SNO</th>
                                                <th>Medecine Name</th>
                                                <th>Dosage</th>
                                                <th>Frequency</th>
                                                <th>Duration</th>
                                                <th>Timings</th>
                                                <th>Instruction</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($medications as $index => $medication)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $medication->productVariant->product->name }}
                                                        @if($medication->productVariant->packagingType)
                                                            (Packaging: {{ $medication->productVariant->packagingType->name }})
                                                        @endif
                                                        @if($medication->productVariant->size)
                                                            (Size: {{ $medication->productVariant->size->name }})
                                                        @endif
                                                        @if($medication->productVariant->color)
                                                            (Color: {{ $medication->productVariant->color->name }})
                                                        @endif
                                                    </td>
                                                    <td>{{ $medication->dosage }} <span>Oral Tab</span></td>
                                                    <td>{{ $medication->frequency }}</td>
                                                    <td>{{ $medication->duration }}</td>
                                                    <td>{{ $medication->timing }}</td>
                                                    <td>{{ $medication->instruction }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="scan-wrap">
                                <h6>Scan to download report</h6>
                                <img src="{{ asset('medicity/assets/img/scan.png') }}" alt="scan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prescriber-info">
                                <h6>{{$appointment->doctor->name}}</h6>
                                <p>Dept of {{$appointment->service->speciality->name}}</p>
                            </div>
                        </div>
                    </div>

                    <ul class="nav inv-paginate justify-content-center">
                        <li>Page 01 of <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /View Prescription -->

<!--View Prescription -->
<div class="modal fade custom-modals" id="view_prescription2">
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
                    <h5>{{$appointment->created_at->format('d M, Y')}}</h5>
                    <ul>
                        <li><a href="javascript:void(0);" class="print-link"><i class="fa-solid fa-print"></i></a></li>
                        <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                    </ul>
                </div>
                <div class="view-prescribe-details">
                    <div class="hospital-addr">
                        <div class="invoice-logo">
                            <img src="{{ asset('medicity/assets/img/logo.png') }}" alt="logo">
                        </div>
                        @if ($appointment->clinic_id)
                            <h5>{{$appointment->clinic->address_detail}}  </h5>
                            <p>Phone : {{$appointment->clinic->phone_number}}</p>
                        @endif
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <h6 class="customer-text">{{$appointment->doctor->name}}</h6>
                                    <p>{{$appointment->doctor->designation}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info2">
                                    <p><span>Date : </span>{{$formattedDateTime}}</p>
                                    <p><span>Appointment Type :  </span>{{$appointment->appointmentRequestType->name}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="patient-id">
                                    <h6>Patient Details</h6>
                                    <div class="patient-det">
                                        <h6>{{$appointment->user->name}}</h6>
                                        <ul>
                                            <li>{{$medical_record->dob->format('d M, Y')}} /  {{$medical_record->gender}}</li>
                                            {{-- <li>Blood : O+ve</li> --}}
                                            <li>Consultation Fees : ${{$medical_record->appointment_final_price}}</li>
                                            {{-- <li>Type : Outpatient</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <div class="appointment-notes">
                        <h3>Appointment Note</h3>
                    </div>
                    <div class="appoint-wrap">
                        <h5>Advice</h5>
                        <p>{{$medical_record->advice}}</p>
                    </div>
                    <div class="appoint-wrap">
                        <h5>Lab Tests</h5>
                        <p class="mb-0">{{$medical_record->laboratory_tests}}</p>
                    </div>
                    {{-- <div class="appoint-wrap">
                        <h5>Follow Up</h5>
                        <p class="mb-0">After 3 Months in empty Stomach</p>
                        <p>Lab test for Glucose Level</p>
                    </div> --}}

                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="scan-wrap">
                                <h6>Scan to download report</h6>
                                <img src="{{ asset('medicity/assets/img/scan.png') }}" alt="scan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="prescriber-info">
                                <h6>{{$appointment->doctor->name}}</h6>
                                <p>Dept of {{$appointment->service->speciality->name}}</p>
                            </div>
                        </div>
                    </div>

                    <ul class="nav inv-paginate justify-content-center">
                        <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription" data-bs-dismiss="modal">02</a> of 02</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /View Prescription -->
