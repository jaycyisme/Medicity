<x-main-layout>
    <!-- Page Content -->
        <div class="content">
            <div class="container mt-5">

                <!-- Doctor Widget -->
                <div class="card doc-profile-card" style="margin-top: 100px;">
                    <div class="card-body">
                        <div class="doctor-widget doctor-profile-two">
                            <div class="doc-info-left">
                                <div class="doctor-img">
                                    <img src="@if(isset($doctor->profile_photo_path)){{ asset('storage/'.$doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="{{ $doctor->name }}" class="img-fluid" alt="User Image">
                                </div>
                                <div class="doc-info-cont" style="width: 400px;">
                                    @if ($isAvailableToday)
                                        <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>Available </span>
                                    @else
                                        <span class="badge bg-danger-light"></i>Not Available</span>
                                    @endif
                                    <h4 class="doc-name">{{$doctor->name}} <img src="{{ asset('medicity/assets/img/icons/badge-check.svg') }}" alt="Img"><span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>{{$doctor->roles->pluck('name')[0]}}</span></h4>
                                    <p>{{$doctor->designation}}</p>
                                    <p>Speaks : {{$doctor->languages}}</p>
                                    @foreach ($doctor->doctorClinics as $doctorClinic)
                                        <p class="address-detail"><span class="loc-icon"><i class="feather-map-pin"></i></span>{{$doctorClinic->clinic->name}} <a href="{{ route('medicity.clinic.detail', ['clinic'=>$doctorClinic->clinic->id]) }}" class="view-text">( View Location )</a></p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <ul class="doctors-activities">
                                    <li>
                                        <div class="hospital-info">
                                            @if ($doctor->consultationType->name === 'Online')
                                                <span class="list-icon"><img src="{{ asset('medicity/assets/img/icons/watch-icon.svg') }}" alt="Img"></span>
                                                <p>Full Time, Online Therapy Available</p>
                                            @else
                                                <span class="list-icon"><img src="{{ asset('medicity/assets/img/icons/watch-icon.svg') }}" alt="Img"></span>
                                                <p>Full Time, Offline Therapy Available</p>
                                            @endif
                                        </div>
                                        {{-- <ul class="sub-links">
                                            <li><a href="#"><i class="feather-heart"></i></a></li>
                                            <li><a href="#"><i class="feather-share-2"></i></a></li>
                                            <li><a href="#"><i class="feather-link"></i></a></li>
                                        </ul> --}}
                                    </li>
                                    <li>
                                        <div class="hospital-info">
                                            <span class="list-icon"><img src="{{ asset('medicity/assets/img/icons/thumb-icon.svg') }}" alt="Img"></span>
                                            <p><b>94% </b> Recommended</p>
                                        </div>
                                    </li>
                                        <li>
                                            <div>
                                                @foreach ($doctor->doctorClinics as $doctorClinic)
                                                    <div class="hospital-info mt-2">
                                                        <span class="list-icon"><img src="{{ asset('medicity/assets/img/icons/building-icon.svg') }}" alt="Img"></span>
                                                        <p>{{$doctorClinic->clinic->name}}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <h5 class="accept-text"><span><i class="feather-check"></i></span>Accepting New Patients</h5>
                                        </li>
                                    <li>
                                        <div class="rating">
                                            {{-- <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i> --}}
                                            <i class="fas fa-star filled"></i>
                                            <span>{{ $averageStars }}</span>
                                            <a href="#" class="d-inline-block average-rating">{{$reviewCount}} Reviews</a>
                                        </div>
                                        <ul class="contact-doctors">
                                            <li>
                                                <a href="{{ route('chat.withDoctor', ['doctorId' => $doctor->id]) }}">
                                                    <span>
                                                        <img src="{{ asset('medicity/assets/img/icons/device-message2.svg') }}" alt="Img">
                                                    </span>
                                                    Chat
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a href="{{ route('user.chats') }}">
                                                    <span>
                                                        <img src="{{ asset('medicity/assets/img/icons/device-message2.svg') }}" alt="Img">
                                                    </span>
                                                    Chat
                                                </a>
                                            </li> --}}
                                            <li><a href="voice-call.html"><span class="bg-violet"><i class="feather-phone-forwarded"></i></span>Audio Call</a></li>
                                            <li><a href="video-call.html"><span class="bg-indigo"><i class="fa-solid fa-video"></i></span>Video Call</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="doc-profile-card-bottom">
                            <ul>
                                <li>
                                    <span class="bg-blue"><img src="{{ asset('medicity/assets/img/icons/calendar3.svg') }}" alt="Img"></span>
                                    Nearly {{$appointmentCount}}+ Appointment Booked
                                </li>
                                <li>
                                    <span class="bg-dark-blue"><img src="{{ asset('medicity/assets/img/icons/bullseye.svg') }}" alt="Img"></span>
                                    In Practice for {{$totalExperience}} Years
                                </li>
                                <li>
                                    <span class="bg-green"><img src="{{ asset('medicity/assets/img/icons/bookmark-star.svg') }}" alt="Img"></span>
                                    {{$awardCount}}+ Awards
                                </li>
                            </ul>
                            <div class="bottom-book-btn">
                                <p><span>Price : ${{$doctor->price_per_session ?? 0}} </span> for a Session</p>
                                <div class="clinic-booking">
                                    <a class="apt-btn" href="{{ route('doctor-booking', $doctor->id) }}">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->

                <div class="doctors-detailed-info">
                    <ul class="information-title-list">
                        <li class="active">
                            <a href="#doc_bio">Doctor Bio</a>
                        </li>
                        <li>
                            <a href="#experience">Experience</a>
                        </li>
                        <li>
                            <a href="#insurence">Insurances</a>
                        </li>
                        <li>
                            <a href="#services">Treatments</a>
                        </li>
                        <li>
                            <a href="#speciality">Speciality</a>
                        </li>
                        <li>
                            <a href="#availability">Availability</a>
                        </li>
                        <li>
                            <a href="#clinic">Clinics</a>
                        </li>
                        <li>
                            <a href="#membership">Memberships</a>
                        </li>
                        <li>
                            <a href="#awards">Awards</a>
                        </li>
                        <li>
                            <a href="#bussiness_hour">Business Hours</a>
                        </li>
                        <li>
                            <a href="#review">Review</a>
                        </li>
                    </ul>
                    <div class="doc-information-main">
                        <div class="doc-information-details bio-detail" id="doc_bio">
                            <div class="detail-title">
                                <h4>Doctor Bio</h4>
                            </div>
                            <p>“{{$doctor->doctor_bio}}”
                            </p>
                            {{-- <a href="#" class="show-more d-flex align-items-center">See More<i class="fa-solid fa-chevron-down ms-2"></i></a> --}}
                        </div>
                        <div class="doc-information-details" id="experience">
                            <div class="detail-title">
                                <h4>Practice Experience</h4>
                            </div>
                            @foreach ($doctor->doctorExperiences as $doctorExperience)
                                <div class="experience-info">
                                    <div class="experience-logo">
                                        <span><img src="{{ asset('storage/Hospital/' . $doctorExperience->hospital_image_url) }}" alt="Img" style="width: 100px; height: 100px; object-fit: cover"></span>
                                    </div>
                                    <div class="experience-content">
                                        <h5>{{$doctorExperience->hospital_name}}</h5>
                                        <ul class="ent-list">
                                            <li>{{$doctorExperience->specialities}} </li>
                                            <li>{{$doctorExperience->location}}</li>
                                        </ul>
                                        <ul class="date-list">
                                            <li>{{ $doctorExperience->start_time->format('Y-m-d') }} -
                                                {{ $doctorExperience->end_time ? $doctorExperience->end_time->format('Y-m-d') : 'Present' }}
                                            </li>
                                            <li>{{$doctorExperience->year_of_experience}} Years</li>
                                        </ul>
                                        <p>{{$doctorExperience->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="doc-information-details" id="insurence">
                            <div class="detail-title slider-nav d-flex justify-content-between align-items-center">
                                <h4>Insurance  Accepted (6)</h4>
                                <div class="nav nav-container slide-1"></div>
                            </div>
                            <div class="insurence-logo-slider owl-carousel">
                                @foreach ($doctor->doctorInsurances as $doctorInsurance)
                                    <div class="insurence-logo">
                                        <span><img src="{{ asset('storage/' . $doctorInsurance->image_url) }}" alt="Img"></span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="doc-information-details" id="speciality">
                            <div class="detail-title">
                                <h4>Speciality</h4>
                            </div>
                            <ul class="special-links">
                                @foreach ($doctor->doctorSpecialities as $doctorSpeciality)
                                    <li><a href="#">{{$doctorSpeciality->speciality->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="doc-information-details" id="services">
                            <div class="detail-title">
                                <h4>Services & Pricing</h4>
                            </div>
                            <ul class="special-links">
                                @foreach ($doctor->doctorServices as $doctorService)
                                    <li><a href="#">{{$doctorService->service->name}} <span>${{$doctorService->service->price}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="doc-information-details" id="availability">
                            <div class="detail-title slider-nav d-flex justify-content-between align-items-center">
                                <h4>Availability</h4>
                                <div class="nav nav-container slide-2"></div>
                            </div>
                            <div class="availability-slots-slider owl-carousel">
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                                <div class="availability-date">
                                    <div class="book-date">
                                        <h6>Wed Feb 2024</h6>
                                        <span>01:00 - 02:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="doc-information-details" id="clinic">
                            <div class="detail-title">
                                <h4>Clinics & Locations</h4>
                            </div>
                            @foreach ($doctor->doctorClinics as $doctorClinic)
                                <div class="clinic-loc">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7">
                                            <div class="clinic-info">
                                                <div class="clinic-img"><img src="{{ asset('medicity/assets/img/clinic/clinic-11.jpg') }}" alt="Img"></div>
                                                <div class="detail-clinic">
                                                    <h5>{{$doctorClinic->clinic->name}} </h5>
                                                    <span>{{$doctorClinic->clinic->phone_number}}</span>
                                                    <p>{{$doctorClinic->clinic->address_detail}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center avail-time-slot">
                                                @php
                                                    $businessHours = is_array($doctorClinic->clinic->business_hour)
                                                                    ? $doctorClinic->clinic->business_hour
                                                                    : json_decode($doctorClinic->clinic->business_hour, true) ?? [];
                                                @endphp
                                                @foreach ($businessHours as $day => $hours)
                                                    <div class="availability-date">
                                                        <div class="book-date">
                                                            <h6>{{ $day }}</h6>
                                                            <span>{{ $hours['start'] }} - {{ $hours['end'] }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="contact-map d-flex">
                                                {!! $doctorClinic->clinic->coordinates !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="doc-information-details" id="membership">
                            <div class="detail-title">
                                <h4>Membership</h4>
                            </div>
                            @foreach ($doctor->doctorMemberships as $doctorMembership)
                                <div class="member-ship-info mb-0">
                                    <span class="mem-check"><i class="fa-solid fa-check"></i></span>
                                    <p>{{$doctorMembership->description}}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="doc-information-details" id="awards">
                            <div class="detail-title slider-nav d-flex justify-content-between align-items-center">
                                <h4>Awards</h4>
                                <div class="nav nav-container slide-3"></div>
                            </div>
                            <div class="awards-slider owl-carousel">
                                @foreach ($doctor->doctorAwards as $doctorAward)
                                    <div class="award-card">
                                        <div class="award-card-info">
                                            <span><img src="{{ asset('medicity/assets/img/icons/bookmark-star.svg') }}" alt="Img"></span>
                                            <h5>{{$doctorAward->name}} ({{$doctorAward->year}})</h5>
                                            <p>{{$doctorAward->description}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="doc-information-details" id="bussiness_hour">
                            <div class="detail-title">
                                <h4>Business Hours</h4>
                            </div>
                            <div class="hours-business">
                                <div class="listing-hours">
                                    <div class="listing-hours">
                                        @php
                                            $businessHours = json_decode($doctor->business_hours, true);
                                        @endphp
                                        @foreach ($businessHours as $day => $hours)
                                            <div class="listing-day">
                                                <div class="day">{{ $day }}</div>
                                                <div class="time-items">
                                                    @if ($hours['start'] && $hours['end'])
                                                        <span class="time">{{ $hours['start'] }} AM - {{ $hours['end'] }} PM</span>
                                                    @else
                                                        <span class="badge bg-danger-light">Closed</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="doc-information-details" id="review">
                            <div class="detail-title">
                                <h4>Reviews ({{$reviewCount}})</h4>
                            </div>
                            <div class="doc-review-card">
                                <div class="write-review">
                                    <h4>Write a review for <strong>{{ $doctor->name }}</strong></h4>

                                    @auth
                                        <livewire:medicity.doctor.doctor-review :doctorId="$doctor->id" />
                                    @else
                                        <p>Please <a href="{{ route('login') }}"><span style="color: #0E82FD">Login</span></a> to write a review.</p>
                                    @endauth

                                    <h4 class="mt-4">Latest Reviews</h4>
                                    <ul class="comments-list">
                                        @foreach ($doctor->doctorFeedbacks()->where('is_active', true)->latest()->get() as $review)
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt="User Image" src="@if(isset(Auth::user()->profile_photo_path)){{ asset('storage/Avatar/'.Auth::user()->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">{{ $review->patient->name }} - </span>
                                                            <span class="comment-date">{{ $review->created_at->diffForHumans() }}</span>
                                                            <div class="review-count rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i class="fas fa-star {{ $i <= $review->star ? 'filled' : '' }}"></i>
                                                                @endfor
                                                            </div>
                                                            <p class="recommended"><i class="far fa-thumbs-up"></i> {{ $review->title }}</p>
                                                        </div>
                                                        <p class="comment-content">{{ $review->review_detail }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <!-- /Page Content -->
</x-main-layout>
