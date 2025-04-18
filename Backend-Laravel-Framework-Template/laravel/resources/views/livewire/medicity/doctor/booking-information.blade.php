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
                        <li class="progress-active">
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
                    <form wire:submit.prevent="updateAppointment">
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
                                                <h6 class="mb-2">Booking Info</h6>
                                                <div class="row gx-2 gy-3">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Service</h6>
                                                            <p class="mb-0" id="selected-service">{{$this->appointment->service->name}} ({{$this->appointment->service->duration}} Mins)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Date & Time</h6>
                                                            <p class="mb-0" id="selected-time">{{ $formattedDateTime }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Appointment</h6>
                                                            @if ($this->appointment->appointmentRequestType->name === 'Online' && $this->appointment->appointmentRequestType->name === 'Home Visit')
                                                                <p class="mb-0" id="selected-clinic">{{$this->appointment->appointmentRequestType->name}}</p>
                                                            @else
                                                                <p class="mb-0" id="selected-clinic">{{$this->appointment->appointmentRequestType->name}} - {{$this->appointment->clinic->name}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input wire:model='patient_name' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input wire:model='patient_phone' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input wire:model='patient_email' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-3">
                                                    <label class="form-label">Gender</label>
                                                    <select wire:model='gender' class="form-select rounded mb-3" aria-label="Default select example">
                                                        <option value="Male" selected>Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 col-md-3">
                                                    <label class="form-label">DOB</label>
                                                    <input wire:model='dob' type="date" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Job</label>
                                                        <input wire:model='job' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Height(cm)</label>
                                                        <input wire:model='height' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Weight(kg)</label>
                                                        <input wire:model='weight' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Dependant Role</label>
                                                        <input wire:model='dependant_role' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Dependant Name</label>
                                                        <input wire:model='dependant_name' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Dependant Phone</label>
                                                        <input wire:model='dependant_phone' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Symptoms</label>
                                                        <input wire:model='patient_symptoms' type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <label class="form-label">Address</label>
                                                <div class="col-lg-4 col-md-6">
                                                    <select required wire:model='address_province' wire:change='onChangeCity' class="form-select rounded mb-3" aria-label="Default select example">
                                                        <option selected>Province/City</option>
                                                        @foreach($citiesList as $city)
                                                        <option value="{{ $city->province_id }}">{{ $city->province_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <select required wire:model='address_district' wire:change='onChangeDistrict' class="form-select rounded mb-3" aria-label="Default select example">
                                                        <option selected>District</option>

                                                        @foreach($districtsList as $district)
                                                        <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <select required wire:model='address_ward' class="form-select rounded mb-3" aria-label="Default select example">
                                                        <option selected>Ward</option>
                                                        @foreach($wardsList as $ward)
                                                        <option value="{{ $ward->wards_id }}">{{ $ward->wards_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Patient</label>
                                                        <select class="select">
                                                            <option>Andrew Fletcher</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address Detail</label>
                                                        <input wire:model='patient_address_detail' type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div  class="mb-3">
                                                    <x-label class="form-label d-flex align-items-center" value="Symptom Images" />
                                                    <label class="btn btn-outline-primary" id="uppyModalOpener"><i class="ti ti-upload me-2"></i> Click to upload image</label>
                                                    <div id="uppyArea"></div>
                                                    <x-input-error for="images" />

                                                    {{-- Khu vực hiển thị ảnh đã tải lên --}}
                                                    <div id="uploadedImagePreviews" class="mt-3 d-flex flex-wrap">

                                                    </div>

                                                    {{-- Hidden input để lưu URL ảnh --}}
                                                    <input type="hidden" id="uploadedImages" wire:model="images">
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Reason for Visit</label>
                                                        <textarea wire:model='patient_reason_visit' class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="{{ route('appointment-date-time', $appointment->id) }}" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Select Payment
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Terms -->
