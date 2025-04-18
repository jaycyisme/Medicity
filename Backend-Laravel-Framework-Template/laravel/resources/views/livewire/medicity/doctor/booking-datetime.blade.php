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
                        <li class="progress-active">
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
                {{-- <div class="booking-widget multistep-form mb-5">
                    <fieldset id="first">
                        <div class="card booking-card mb-0">
                            <div class="card-header">
                                <div class="booking-header pb-0">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img src="@if(isset($doctor->profile_photo_path)){{ asset('storage/Avatar/'.$doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt=""></span>
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
                                                        <p class="mb-0" id="selected-service">Please select a service</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-1">Date & Time</h6>
                                                        <p class="mb-0" id="selected-time">Please select a time</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-1">Appointment</h6>
                                                        <p class="mb-0" id="selected-clinic">Please select a clinic</p>
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
                                            <div class="col-lg-5">
                                                <div class="card" style="transform: translateY(-50%); top: 50%;">
                                                    <div class="card-body p-2 pt-3">
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $businessHours = json_decode($doctor->business_hours, true); // Decode JSON từ database

                                                $daysOfWeek = [
                                                    "Monday" => "Monday",
                                                    "Tuesday" => "Tuesday",
                                                    "Wednesday" => "Wednesday",
                                                    "Thursday" => "Thursday",
                                                    "Friday" => "Friday",
                                                    "Saturday" => "Saturday",
                                                    "Sunday" => "Sunday"
                                                ];

                                                // Lấy ngày hiện tại
                                                $today = \Carbon\Carbon::now()->format('l'); // Monday, Tuesday, ...
                                                $todayHours = $businessHours[$today] ?? null; // Lấy lịch làm việc của ngày hiện tại

                                                // Hàm tạo khung giờ
                                                function generateTimeSlots($start, $end) {
                                                    if (!$start || !$end) return []; // Nếu không có giờ làm việc, trả về danh sách rỗng

                                                    $slots = [];
                                                    $startTime = \Carbon\Carbon::createFromFormat('H:i', $start);
                                                    $endTime = \Carbon\Carbon::createFromFormat('H:i', $end);

                                                    while ($startTime <= $endTime) {
                                                        $slots[] = $startTime->format('H:i');
                                                        $startTime->addMinutes(30); // Mỗi slot cách nhau 30 phút
                                                    }
                                                    return $slots;
                                                }

                                                // Kiểm tra xem ngày hôm nay có lịch làm việc không
                                                $timeSlots = (!empty($todayHours) && !is_null($todayHours['start']) && !is_null($todayHours['end']))
                                                    ? generateTimeSlots($todayHours['start'], $todayHours['end'])
                                                    : [];
                                            @endphp

                                            <div class="col-lg-7">
                                                <div class="card booking-wizard-slots">
                                                    <div class="card-body">
                                                        <div class="book-title">
                                                            <h6 class="fs-14 mb-2">Available Time Slots for {{ $daysOfWeek[$today] ?? $today }}</h6>
                                                        </div>
                                                        <div class="token-slot mt-2 mb-2">
                                                            @if (!empty($timeSlots))
                                                                @foreach ($timeSlots as $time)
                                                                    <div class="form-check-inline visits me-0">
                                                                        <label class="visit-btns">
                                                                            <input type="checkbox" class="form-check-input" name="appointment-time" value="{{ $time }}">
                                                                            <span class="visit-rsn">{{ $time }}</span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <p class="text-danger">Không có lịch làm việc hôm nay.</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                    <a href="javascript:void(0);" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                        <i class="isax isax-arrow-left-2 me-1"></i>
                                        Back
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                        Add Basic Information
                                        <i class="isax isax-arrow-right-3 ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div> --}}

                <div class="booking-widget multistep-form mb-5">
                    <fieldset id="first">
                        <form wire:submit.prevent="updateDateTime">
                            @csrf
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <h6 class="mb-3">Select Date & Time</h6>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="card" style="transform: translateY(-50%); top: 50%;">
                                                        <div class="card-body p-2 pt-3">
                                                            <input type="date" class="form-control" wire:model="date" wire:change='handleUpdatedDate($event.target.value)'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="card booking-wizard-slots">
                                                        <div class="card-body">
                                                            <div class="token-slot mt-2 mb-2">
                                                                @if (!empty($timeSlots))
                                                                    @foreach($timeSlots as $slot)
                                                                        <div class="form-check-inline visits me-0">
                                                                            <label class="visit-btns">
                                                                                <input
                                                                                    type="radio"
                                                                                    class="form-check-input"
                                                                                    name="appointment-time"
                                                                                    value="{{ $slot }}"
                                                                                    wire:model="time"
                                                                                    @if(in_array($slot, $disabledSlots)) disabled @endif
                                                                                >
                                                                                <span class="visit-rsn">{{ $slot }}</span>
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <p class="text-danger">Choose date of appointment.</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <button type="submit" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Add Basic Information
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /Terms -->
