<x-main-layout>
    <!-- Page Content -->
    <div class="content">
        <div class="container mt-5">

            <!-- Doctor Widget -->
            <div class="card" style="margin-top: 100px;">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img1">
                                <a href="#">
                                    <img src="{{ asset('storage/Clinic/' . $clinic->image_url) }}" class="img-fluid" alt="User Image" style="width: 300px; height: 200px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name mb-2"><a href="#">{{ $clinic->name }}</a></h4>
                                <div class="rating mb-2">
                                    <span class="badge badge-primary">{{$averageStars}}</span>
                                    <?php
                                    $filledStars = floor($averageStars); // Làm tròn xuống số sao
                                    $emptyStars = 5 - $filledStars; // Số sao trống còn lại
                                    ?>

                                    @for ($i = 0; $i < $filledStars; $i++)
                                        <i class="fas fa-star filled"></i>
                                    @endfor

                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                    <span class="d-inline-block average-rating">({{$reviewCount}})</span>
                                </div>
                                <div class="clinic-details">
                                    <div class="clini-infos pt-3">

                                    <p class="doc-location mb-2"><i class="fas fa-phone-volume me-1"></i> {{ $clinic->phone_number }}</p>
                                    <p class="doc-location mb-2 text-ellipse"><i class="fas fa-map-marker-alt me-1"></i> {{ $clinic->address_detail }} </p>
                                    {{-- <p class="doc-location mb-2"><i class="fas fa-chevron-right me-1"></i> Chemists, Surgical Equipment Dealer</p>

                                    <p class="doc-location mb-2"><i class="fas fa-chevron-right me-1"></i> Opens at 08.00 AM</p> --}}

                                    <ul class="clinic-gallery d-flex">
                                        @foreach($clinic->clinicImages as $image)
                                            <li>
                                                <a href="{{ asset('storage/Clinic/' . $image->image_url) }}" data-fancybox="gallery">
                                                    <img src="{{ asset('storage/Clinic/' . $image->image_url) }}" alt="Clinic Image">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="clinic-services">
                                    @foreach ($clinic->services as $service)
                                        <span>{{ $service->name }}</span>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right d-flex align-items-center justify-content-center">
                            <div class="clinic-booking">
                                {{-- <a class="view-pro-btn" href="chat.html">Send Message</a> --}}
                                <a class="apt-btn" href="tel:+84867551656">Call Now</a>
                                {{-- <a href="product-all.html" class="view-pro-btn">Browse Services</a> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Doctor Widget -->

            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">

                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Business Hours</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-9">

                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <p>{{ $clinic->about_me }}</p>
                                    </div>
                                    <!-- /About Details -->


                                    <!-- Awards Details -->
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Awards</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @foreach($clinic->pharmacyAward as $award)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <p class="exp-year">{{ $award->date }}</p>
                                                            <h4 class="exp-title">{{ $award->name }}</h4>
                                                            <p>{{ $award->description }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Awards Details -->

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->

                        <!-- Locations Content -->
                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">

                            <!-- Location List -->
                            <div class="location-list">
                                <div class="contact-map d-flex">
                                    {!! $clinic->coordinates !!}
                                </div>
                            </div>
                            <!-- /Location List -->

                        </div>
                        <!-- /Locations Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                            <div class="write-review">
                                <h4>Write a review for <strong>{{ $clinic->name }}</strong></h4>

                                @auth
                                    <livewire:medicity.clinic.clinic-review :clinicId="$clinic->id" />
                                @else
                                    <p>Please <a href="{{ route('login') }}"><span style="color: #0E82FD">Login</span></a> to write a review.</p>
                                @endauth

                                <h4 class="mt-4">Latest Reviews</h4>
                                <ul class="comments-list">
                                    @foreach ($clinic->pharmacyReviews()->where('is_active', true)->latest()->get() as $review)
                                        <li>
                                            <div class="comment">
                                                <img class="avatar avatar-sm rounded-circle" alt="User Image" src="@if(isset(Auth::user()->profile_photo_path)){{ asset('storage/Avatar/'.Auth::user()->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author">{{ $review->user->name }} - </span>
                                                        <span class="comment-date">{{ $review->created_at->diffForHumans() }}</span>
                                                        <div class="review-count rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="fas fa-star {{ $i <= $review->star ? 'filled' : '' }}"></i>
                                                            @endfor
                                                        </div>
                                                        <p class="recommended"><i class="far fa-thumbs-up"></i> {{ $review->title }}</p>
                                                    </div>
                                                    <p class="comment-content">{{ $review->review }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- /Reviews Content -->

                        <!-- Business Hours Content -->
                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <!-- Business Hours Widget -->
                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            <div class="listing-hours">
                                                <div class="listing-hours">
                                                    @php
                                                        $businessHours = json_decode($clinic->business_hour, true);
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
                                    <!-- /Business Hours Widget -->

                                </div>
                            </div>
                        </div>
                        <!-- /Business Hours Content -->

                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->

        </div>
    </div>
    <!-- /Page Content -->
</x-main-layout>
