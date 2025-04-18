<!-- Terms -->
<div class="doctor-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="booking-wizard">
                    <ul class="form-wizard-steps d-sm-flex align-items-center justify-content-center" id="progressbar2">
                        <li class="progress-active">
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
                    <div id="first">
                        <form wire:submit.prevent="createAppointment">
                            @csrf
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
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <div class="mb-4 pb-4 border-bottom col-4">
                                                <label class="form-label">Select Speciality</label>
                                                <select wire:model='speciality'
                                                        wire:change='handleSpecialityChange($event.target.value)'
                                                        name="speciality"
                                                        id="speciality-select"
                                                        class="select form-control">
                                                    @foreach ($doctor->doctorSpecialities as $doctorSpeciality)
                                                        <option value="{{ $doctorSpeciality->speciality->id }}">{{$doctorSpeciality->speciality->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <h6 class="mb-3">Services</h6>
                                            <div class="row">
                                                @foreach ($doctor->doctorServices as $doctorService)
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="service-item active">
                                                            <input wire:model="service"
                                                                wire:change="handleServiceChange($event.target.value)"
                                                                class="form-check-input ms-0 mt-0"
                                                                name="service"
                                                                type="radio"
                                                                id="service{{ $doctorService->service->id }}"
                                                                value="{{ $doctorService->service->id }}">

                                                            <label class="form-check-label ms-2" for="service{{$doctorService->service->id}}">
                                                                <span class="service-title d-block mb-1">
                                                                    {{$doctorService->service->name}}
                                                                </span>
                                                                <span class="fs-14 d-block">${{$doctorService->service->price}}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <h6 class="mb-3">Select Appointment Type</h6>
                                            <div class="row">
                                                <div class="col-xl-3 col-md-3 col-sm-4">
                                                    <div class="radio-select text-center">
                                                        <input wire:model='consultationType' name="consultationType" class="form-check-input ms-0 mt-0" type="radio" value="{{$doctor->consultationType->id}}" checked>
                                                        <label class="form-check-label" for="service7">
                                                            <i class="isax {{ $doctor->consultationType->name == 'Offline' ? 'isax-hospital5' : ($doctor->consultationType->name == 'Online' ? 'isax-messages-15' : '') }}"></i>
                                                            <span class="service-title d-block">{{$doctor->consultationType->name}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clinics-path">
                                                <h6 class="mb-3">Select Clinics</h6>
                                                <div>
                                                    @foreach ($doctor->doctorClinics as $doctorClinic)
                                                        <div class="service-item active">
                                                            <input wire:model='clinic'
                                                                    wire:change='handleClinicChange($event.target.value)'
                                                                    name="clinic"
                                                                    value="{{ $doctorClinic->clinic->id }}"
                                                                    class="form-check-input ms-0 mt-0" type="checkbox"
                                                                    id="clinic{{ $doctorClinic->id }}">
                                                            <label class="form-check-label ms-2" for="clinic{{ $doctorClinic->id }}">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2">
                                                                        <img src="{{ asset('storage/Clinic/' . $doctorClinic->clinic->image_url) }}" class="rounded-circle" alt="" style="width: 48px; height: 48px;">
                                                                    </span>
                                                                    <span>
                                                                        <span class="service-title d-block mb-1">{{$doctorClinic->clinic->name}}</span>
                                                                        <span class="fs-14">{{$doctorClinic->clinic->address_detail}}</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                                        <span class="fs-14">{{$doctorClinic->clinic->phone_number}}</span>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="javascript:void(0);" class="btn btn-md btn-dark inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Select Appointment Type
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Terms -->
