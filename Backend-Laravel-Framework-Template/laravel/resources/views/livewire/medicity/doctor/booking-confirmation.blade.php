<!-- Terms -->
<div class="doctor-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="booking-wizard">
                    <ul class="form-wizard-steps d-sm-flex align-items-center justify-content-center" id="progressbar2">
                        <li>
                            <div class="profile-step">
                                <span class="multi-steps">1</span>
                                <div class="step-section">
                                    <h6>Specialty</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="profile-step">
                                <span class="multi-steps">2</span>
                                <div class="step-section">
                                    <h6>Date & Time</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="profile-step">
                                <span class="multi-steps">3</span>
                                <div class="step-section">
                                    <h6>Basic Information</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="profile-step">
                                <span class="multi-steps">4</span>
                                <div class="step-section">
                                    <h6>Payment</h6>
                                </div>
                            </div>
                        </li>
                        <li class="progress-active">
                            <div class="profile-step">
                                <span class="multi-steps">5</span>
                                <div class="step-section">
                                    <h6>Confirmation</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="booking-widget multistep-form mb-5">
                    <fieldset id="first">
                        <div class="card booking-card">
                            <div class="card-body booking-body pb-1">
                                <div class="row">
                                    <div class="col-lg-8 d-flex">
                                        <div class="flex-fill">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h5 class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                        <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                        Booking Confirmed
                                                    </h5>
                                                </div>
                                                <div class="card-header d-flex align-items-center flex-wrap rpw-gap-2">
                                                    <span class="avatar avatar-lg avatar-rounded me-2 flex-shrink-0"><img src="@if(isset($doctor->profile_photo_path)){{ asset('storage/'.$doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt=""></span>
                                                    <p class="mb-0">Your Booking has been Confirmed with <span class="text-dark">{{$doctor->name}} </span>  be on time before <span class="text-dark">15 Mins </span> From the appointment Time</p>
                                                </div>
                                                <div class="card-body pb-1">
                                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-3">
                                                        <h6>Booking Info</h6>
                                                        <a href="javascript:void(0);" class="btn btn-light rounded-pill"><i class="isax isax-calendar me-1"></i>Reschedule</a>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Service</label>
                                                                <div class="form-plain-text">{{$appointment->service->name}} ({{$appointment->service->duration}} Mins)</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Speciality</label>
                                                                <div class="form-plain-text">{{$appointment->speciality->name}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date & Time</label>
                                                                <div class="form-plain-text">{{$formattedDateTime}} </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Appointment type</label>
                                                                <div class="form-plain-text">{{$appointment->appointmentRequestType->name}} </div>
                                                            </div>
                                                        </div>
                                                        @if ($appointment->clinic_id)
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Clinic Name & Location</label>
                                                                    <div class="form-plain-text">{{$appointment->clinic->name}} </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                                    <div>
                                                        <h6 class="mb-1">Need Our Assistance</h6>
                                                        <p class="mb-0">Call us in case you face any Issue on Booking / Cancellation</p>
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light rounded-pill"><i class="isax isax-call5 me-1"></i>Call Us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <div class="text-center">
                                                    <h6 class="fs-14 mb-2">Booking Number</h6>
                                                    <span class="booking-id-badge mb-3">{{$appointment->appointment_code}}</span>
                                                    <span class="d-block mb-3"><img src="{{ asset('medicity/assets/img/icons/payment-qr.svg') }}" alt=""></span>
                                                    <p>Scan this QR Code to Download the details of Appointment</p>
                                                </div>
                                                <div>
                                                    <a href="javascript:void(0);" class="btn w-100 mb-3 btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                                        Add To Calendar
                                                    </a>
                                                    <a href="{{ route('doctor-list') }}" class="btn w-100 btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                        Start New Booking
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('doctor-booking', $appointment->doctor->id) }}" class="">
                                <i class="isax isax-arrow-left-2 me-1"></i>
                                Back to Bookings
                            </a>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /Terms -->
