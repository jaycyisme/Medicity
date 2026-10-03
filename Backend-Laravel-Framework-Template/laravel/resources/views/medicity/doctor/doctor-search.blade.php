<x-main-layout>
    <!-- Page Content -->
    <div class="doctor-content content">
        <div class="container mt-5">

            <!-- Doctor Search List -->
            <div class="row" style="margin-top: 100px;">
                <div class="col-xl-12 col-lg-12 map-view">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="doctor-filter-info">
                                <div class="doctor-filter-inner">
                                    <div>
                                        <div class="doctors-found">
                                            <p><span>{{$doctors->count()}} Doctors</span>
                                            </p>
                                        </div>
                                    </div>
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
                                                        <a href="javascript:void(0)" class="favourite-icon" id="favourite-icon-{{ $doctor->id }}" onclick="toggleFavourite({{ $doctor->id }})">
                                                            <i class="fas fa-heart" id="heart-icon-{{ $doctor->id }}" style="color:{{ in_array($doctor->id, $favouriteDoctorIds) ? 'red' : 'grey' }}"></i>
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
                                <script>
                                    function toggleFavourite(doctorId) {
                                        @if (!Auth::check())
                                            alert("Please log in to add to your favourites.");
                                            window.location.href = "{{ route('login') }}";
                                        @else
                                            $.ajax({
                                                url: '/doctor/' + doctorId + '/favourite',
                                                method: 'POST',
                                                data: {
                                                    _token: '{{ csrf_token() }}',
                                                },
                                                success: function(response) {
                                                    if (response.success) {
                                                        var icon = $('#heart-icon-' + doctorId);
                                                        if (response.status === 'added') {
                                                            icon.css('color', 'red');
                                                        } else {
                                                            icon.css('color', 'grey');
                                                        }
                                                    }
                                                }
                                            });
                                        @endif
                                    }
                                </script>
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
