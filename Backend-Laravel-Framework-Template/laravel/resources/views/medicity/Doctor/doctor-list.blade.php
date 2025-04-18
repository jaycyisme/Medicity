<x-main-layout>
    <!-- Page Content -->
    <div class="doctor-content content">
        <div class="container mt-5">

            <!-- Doctor Search List -->
            <div class="row" style="margin-top: 100px;">
                <div class="col-xl-12 col-lg-12 map-view">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card filter-lists" x-data="{ open: true }">
                                <div class="card-header">
                                    <div class="d-flex align-items-center filter-head justify-content-between">
                                        <button class="btn btn-sm btn-outline-primary" @click="open = !open">
                                            <span x-show="open">Hide</span>
                                            <span x-show="!open">Show</span>
                                        </button>
                                        <a href="{{ route('doctor-list') }}" class="text-primary text-decoration-underline">Clear All</a>
                                    </div>
                                </div>
                                <div class="card-body p-0" x-show="open" x-transition>
                                    <form method="GET" action="{{ route('doctor-list') }}">
                                        <!-- Lọc theo Speciality -->
                                        <div class="accordion-item border-bottom">
                                            <div class="accordion-header">
                                                <h5>Speciality</h5>
                                            </div>
                                            <div class="accordion-collapse show">
                                                <div class="accordion-body pt-3">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="speciality" value=""
                                                                onchange="this.form.submit()" {{ request('speciality') == '' ? 'checked' : '' }}>
                                                            <label class="form-check-label">All</label>
                                                        </div>
                                                    </div>
                                                    @foreach ($specialities as $speciality)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="speciality" value="{{ $speciality->id }}"
                                                                onchange="this.form.submit()" {{ request('speciality') == $speciality->id ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{ $speciality->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lọc theo Clinic -->
                                        <div class="accordion-item border-bottom">
                                            <div class="accordion-header">
                                                <h5>Clinic</h5>
                                            </div>
                                            <div class="accordion-collapse show">
                                                <div class="accordion-body pt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="clinic" value=""
                                                            onchange="this.form.submit()" {{ request('clinic') == '' ? 'checked' : '' }}>
                                                        <label class="form-check-label">All</label>
                                                    </div>
                                                    @foreach ($clinics as $clinic)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="clinic" value="{{ $clinic->id }}"
                                                                onchange="this.form.submit()" {{ request('clinic') == $clinic->id ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{ $clinic->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lọc theo Service -->
                                        <div class="accordion-item border-bottom">
                                            <div class="accordion-header">
                                                <h5>Service</h5>
                                            </div>
                                            <div class="accordion-collapse show">
                                                <div class="accordion-body pt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="service" value=""
                                                            onchange="this.form.submit()" {{ request('service') == '' ? 'checked' : '' }}>
                                                        <label class="form-check-label">All</label>
                                                    </div>
                                                    @foreach ($services as $service)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="service" value="{{ $service->id }}"
                                                                onchange="this.form.submit()" {{ request('service') == $service->id ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{ $service->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lọc theo Star Rating -->
                                        <div class="accordion-item border-bottom">
                                            <div class="accordion-header">
                                                <h5>Star Rating</h5>
                                            </div>
                                            <div class="accordion-collapse show">
                                                <div class="accordion-body pt-3">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="star" value="{{ $i }}"
                                                                onchange="this.form.submit()" {{ request('star') == $i ? 'checked' : '' }}>
                                                            <label class="form-check-label">
                                                                @for ($j = 1; $j <= $i; $j++) <i class="fa fa-star text-orange"></i> @endfor
                                                            </label>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Lọc theo Consultation Type -->
                                        <div class="accordion-item border-bottom">
                                            <div class="accordion-header">
                                                <h5>Consultation Type</h5>
                                            </div>
                                            <div class="accordion-collapse show">
                                                <div class="accordion-body pt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="consultation_type" value=""
                                                            onchange="this.form.submit()" {{ request('consultation_type') == '' ? 'checked' : '' }}>
                                                        <label class="form-check-label">All</label>
                                                    </div>
                                                    @foreach ($consultationTypes as $type)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="consultation_type" value="{{ $type->name }}"
                                                                onchange="this.form.submit()" {{ request('consultation_type') == $type->name ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{ $type->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="doctor-filter-info">
                                <div class="doctor-filter-inner">
                                    <div>
                                        <div class="doctors-found">
                                            <p><span>{{$doctors->count()}} Doctors</span>
                                                {{-- Dentist in San francisco, California --}}
                                            </p>
                                        </div>
                                        {{-- <div class="doctor-filter-availability">
                                            <p>Availability</p>
                                            <div class="status-toggle status-tog">
                                                <input type="checkbox" id="status_6" class="check">
                                                <label for="status_6" class="checktoggle">checkbox</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="doctor-filter-option">
                                        <div class="doctor-filter-sort">
                                            <p>Sort</p>
                                            <div class="doctor-filter-select">
                                                <select class="select">
                                                    <option>A to Z</option>
                                                    <option>B to Z</option>
                                                    <option>C to Z</option>
                                                    <option>D to Z</option>
                                                    <option>E to Z</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="doctor-filter-sort">
                                            <p class="filter-today d-flex align-items-center">
                                                <i class="feather-calendar"></i> Today 10 Aug to 20 Aug
                                            </p>
                                        </div>
                                        <div class="doctor-filter-sort">
                                            <ul class="nav">
                                                <li>
                                                    <a href="javascript:void(0);" id="map-list">
                                                        <i class="feather-map-pin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="doctor-search-grid.html">
                                                        <i class="feather-grid"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="search-2.html" class="active">
                                                        <i class="feather-list"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            @foreach ($doctors as $doctor)
                            @php
                            // Tính tổng số năm kinh nghiệm
                                $totalExperience = $doctor->doctorExperiences->sum('year_of_experience');

                                // Tính trung bình số sao và số lượng review
                                $averageStars = $doctor->doctorFeedbacks->avg('star') ?? 0;
                                $reviewCount = $doctor->doctorFeedbacks->count();

                                // Kiểm tra business_hours có trùng với giờ hiện tại không
                                $currentDay = now()->format('l'); // Example: "Monday"
                                $currentTime = now()->format('H:i'); // Example: "14:42"

                                $businessHours = json_decode($doctor->business_hours, true);

                                $isAvailableToday = isset($businessHours[$currentDay]) &&
                                                    $businessHours[$currentDay]['start'] &&
                                                    $businessHours[$currentDay]['end'] &&
                                                    ($currentTime >= $businessHours[$currentDay]['start'] && $currentTime <= $businessHours[$currentDay]['end']);

                                // Lấy khoảng giá tiền của dịch vụ
                                $servicePrices = $doctor->doctorServices->pluck('service.price')->filter()->toArray();
                                $minPrice = count($servicePrices) > 0 ? min($servicePrices) : 0;
                                $maxPrice = count($servicePrices) > 0 ? max($servicePrices) : 0;
                                $priceRange = $minPrice === $maxPrice ? "$minPrice" : "$minPrice - $maxPrice";

                                $consultationType = $doctor->consultationType ? $doctor->consultationType->name : null;

                                // Kiểm tra kiểu tư vấn (Online hay Offline)
                                if ($consultationType === 'Online') {
                                    $consultationLabel = 'Book Online Consultation';
                                    $consultationRoute = 'booking-2.html';
                                } elseif ($consultationType === 'Offline') {
                                    $consultationLabel = 'Book Appointment';
                                    $consultationRoute = 'booking.html';
                                } else {
                                    $consultationLabel = 'No Consultation Available';
                                    $consultationRoute = '#';
                                }
                            @endphp
                                <div class="card doctor-card">
                                    <div class="card-body">
                                        <div class="doctor-widget-one">
                                            <div class="doc-info-left">
                                                <div class="doctor-img">
                                                    <a href="{{ route('doctor-profile', $doctor->id) }}">
                                                        <img src="@if(isset($doctor->profile_photo_path)){{ asset('storage/'.$doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="{{ $doctor->name }}" class="img-fluid" alt="John Doe">
                                                    </a>
                                                    <div class="favourite-btn">
                                                        <a href="javascript:void(0)" class="favourite-icon">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="doc-info-cont">
                                                    <h4 class="doc-name">
                                                        <a href="{{ route('doctor-profile', $doctor->id) }}">{{ $doctor->name }}</a>
                                                        <i class="fas fa-circle-check"></i>
                                                    </h4>
                                                    <p class="doc-speciality">{{ $doctor->designation }}</p>
                                                    <div class="clinic-details">
                                                        {{-- <p class="doc-location">
                                                            <i class="feather-map-pin"></i>
                                                            <span>0.9</span> mi - Newyork, USA <a href="javascript:void(0);">Get Direction</a>
                                                        </p> --}}
                                                        <p class="doc-location">
                                                            <i class="feather-award"></i> <span>{{ $totalExperience }}</span> Years of Experience
                                                        </p>
                                                    </div>
                                                    <div class="reviews-ratings">
                                                        <p>
                                                            <span><i class="fas fa-star"></i> {{ number_format($averageStars, 1) }}</span> ({{ $reviewCount }} Reviews)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="doc-info-right">
                                                <div class="clini-infos">
                                                    <ul>
                                                        <li>
                                                            <i class="feather-clock available-icon"></i>
                                                            <span class="available-date {{ $isAvailableToday ? 'available-today' : 'not-available' }}">
                                                                {{ $isAvailableToday ? 'Available Today' : 'Not Available' }}
                                                            </span>
                                                        </li>
                                                        {{-- <li><i class="feather-thumbs-up available-icon"></i> 98% <span class="votes">(252 Votes)</span></li> --}}
                                                        <li><i class="feather-dollar-sign available-icon"></i> {{ $priceRange }} <i class="feather-info available-info-icon"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="clinic-booking book-appoint">
                                                    <a class="btn btn-primary" href="{{ route('doctor-profile', $doctor->id) }}">{{ $consultationLabel }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="pagination dashboard-pagination mt-md-3 mt-0 mb-4">
                                        <ul>
                                            <li>
                                                <a href="#" class="page-link prev">Prev</a>
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
                                                <a href="#" class="page-link next">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 theiaStickySidebar map-right">
                    <div id="map" class="map-listing"></div>
                </div>
            </div>
            <!-- /Doctor Search List -->

        </div>
    </div>
    <!-- /Page Content -->
</x-main-layout>
