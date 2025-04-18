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
                        <li class="progress-active">
                            <div class="profile-step">
                                <span class="multi-steps">4</span>
                                <div class="step-section">
                                    <h6>Payment</h6>
                                </div>
                            </div>
                        </li>
                        <li>
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
                    <form wire:submit.prevent="checkout">
                        @csrf
                        <fieldset id="first">
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <div class="booking-header pb-0">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                    <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img src="@if(isset($doctor->profile_photo_path)){{ asset('storage/'.$doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt=""></span>
                                                    <div>
                                                        <h4 class="mb-1">{{$doctor->name}} <span class="badge bg-orange fs-12"><i class="fa-solid fa-star me-1"></i>{{$averageStars}}.0</span></h4>
                                                        <p class="text-indigo mb-3 fw-medium">{{$doctor->designation}}</p>
                                                        <p class="mb-0"><i class="isax isax-location me-2"></i>{{$doctor->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="row">
                                        <div class="col-lg-6 d-flex">
                                            <div class="card flex-fill mb-3 mb-lg-0">
                                                <div class="card-body">
                                                    <h6 class="mb-3">Payment Gateway</h6>
                                                    <div class="payment-tabs">
                                                        <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                                                            <li class="nav-item col-sm-4" role="presentation">
                                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab">
                                                                <img src="{{ asset('medicity/assets/img/icons/payment-icon-05.svg') }}" class="me-2" alt="">
                                                                Credit Card
                                                            </button>
                                                            </li>
                                                            <li class="nav-item col-sm-4" role="presentation">
                                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab">
                                                                <img src="{{ asset('medicity/assets/img/icons/payment-icon-06.svg') }}" class="me-2" alt="">
                                                                Paypal
                                                            </button>
                                                            </li>
                                                            <li class="nav-item col-sm-4" role="presentation">
                                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab">
                                                                <img src="{{ asset('medicity/assets/img/icons/payment-icon-07.svg') }}" class="me-2" alt="">
                                                                Stripe
                                                            </button>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Card Holder Name</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-user"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Card Number</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-card-tick"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Expire Date</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-calendar-2"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-0">
                                                                    <label class="form-label">CVV</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-check"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                                                <div class="mb-3 row align-items-center g-2">
                                                                    {{-- <button wire:click='test'>click</button> --}}
                                                                    @if ($qrCodeUrl)
                                                                        <div class="mt-4">
                                                                            <img class="margin-auto" src="{{ $qrCodeUrl }}" alt="chillnfree" class="img-fluid">
                                                                        </div>
                                                                        <p class="text-center h3">Please click the Confirm & Pay button after successful payment</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email Address</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-sms"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="form-label">Password</label>
                                                                    <div class="pass-group">
                                                                        <input type="password" class="form-control pass-input-sub">
                                                                        <span class="feather-eye-off toggle-password-sub"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex">
                                            <div class="card flex-fill mb-0">
                                                <div class="card-body">
                                                    <h6 class="mb-3">Booking Info</h6>
                                                    <div class="mb-3">
                                                        <label class="form-label">Date & Time</label>
                                                        <div class="form-plain-text">{{$formattedDateTime}} </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Appointment Type</label>
                                                        <div class="form-plain-text">{{$appointment->appointmentRequestType->name}}
                                                            @if ($appointment->appointmentRequestType->name == 'Offline')
                                                                ({{$appointment->clinic->name}})
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="pt-3 border-top booking-more-info">
                                                        <h6 class="mb-3">Payment Info</h6>
                                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">{{$appointment->service->name}}</p>
                                                            <span class="fw-medium d-block">${{$appointment->service->price}}</span>
                                                        </div>
                                                        {{-- <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Booking Fees</p>
                                                            <span class="fw-medium d-block">$20</span>
                                                        </div>
                                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Tax</p>
                                                            <span class="fw-medium d-block">$18</span>
                                                        </div>
                                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Discount</p>
                                                            <span class="fw-medium text-danger d-block">-$15</span>
                                                        </div> --}}
                                                    </div>
                                                    <div class="bg-primary d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between p-3 rounded">
                                                        <h6 class="text-white">Total</h6>
                                                        <h6 class="text-white">${{$appointment->service->price}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="{{ route('appointment-info', $appointment->id) }}" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Confirm & Pay
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset eldset>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /Terms -->
