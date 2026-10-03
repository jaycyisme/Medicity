<x-main-layout>
    <!-- Page Content -->
    <div class="content">
        <div class="container mt-5">

            <!-- Doctor Widget -->
            <div class="card"  style="margin-top: 100px;">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ asset('storage/Clinic/' . $service->thumbnail) }}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$service->name}}</h4>
                                {{-- <p class="doc-speciality">Speciality: {{$service->speciality->name}}</p> --}}
                                <p class="doc-department"><img src="{{ asset('storage/Speciality/' . $service->speciality->image_url) }}" class="img-fluid" alt="Speciality">{{$service->speciality->name}}</p>
                                <div class="rating">
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
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$service->clinic->name}}</p>
                                    <ul class="clinic-gallery">
                                        @foreach ($service->serviceImages as $image)
                                            <li>
                                                <a href="{{ asset('storage/Clinic/' . $image->image_url) }}" data-fancybox="gallery">
                                                    <img src="{{ asset('storage/Clinic/' . $image->image_url) }}" alt="Feature">
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    {{-- <li><i class="far fa-thumbs-up"></i> 99%</li> --}}
                                    {{-- <li><i class="far fa-comment"></i> 35 Feedback</li>
                                    <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li> --}}
                                    <li><i class="far fa-money-bill-alt"></i> ${{$service->price}} per {{$service->duration}} minutes </li>
                                </ul>
                            </div>
                            {{-- <div class="doctor-action">
                                <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="chat.html" class="btn btn-white msg-btn">
                                    <i class="far fa-comment-alt"></i>
                                </a>
                                <a href="voice-call.html" class="btn btn-white call-btn">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="video-call.html" class="btn btn-white call-btn">
                                    <i class="fas fa-video"></i>
                                </a>
                            </div> --}}
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ route('doctors.by.service', $service->id) }}">Book Appointment</a>
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
                                <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Locations</a>
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
                                <div class="col-md-12">

                                    {!! $service->description !!}

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->

                        <!-- Locations Content -->
                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">

                            <!-- Location List -->
                            <div class="location-list">
                                <div class="row">

                                    <!-- Clinic Content -->
                                    <div class="col-md-6">
                                        <div class="clinic-content" style="text-align: center; transform: translateY(100%)">
                                            <h4 class="clinic-name"><a href="#">{{$service->clinic->name}}</a></h4>
                                            {{-- <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p> --}}
                                            <div class="rating">
                                                <?php
                                                $filledStars = floor($averageStarsClinic); // Làm tròn xuống số sao
                                                $emptyStars = 5 - $filledStars; // Số sao trống còn lại
                                                ?>

                                                @for ($i = 0; $i < $filledStars; $i++)
                                                    <i class="fas fa-star filled"></i>
                                                @endfor

                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                                <span class="d-inline-block average-rating">({{$reviewCountClinic}})</span>
                                            </div>
                                            <div class="clinic-details mb-0">
                                                <h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> {{$service->clinic->address_detail}}</h5>
                                                <ul>
                                                    @foreach ($service->clinic->clinicImages as $image)
                                                        <li>
                                                            <a href="{{ asset('storage/Clinic/' . $image->image_url) }}" data-fancybox="gallery2">
                                                                <img src="{{ asset('storage/Clinic/' . $image->image_url) }}" alt="Feature Image">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Clinic Content -->

                                    <!-- Clinic Timing -->
                                    <div class="col-md-6">
                                        <div class="contact-map d-flex">
                                            {!! $service->clinic->coordinates !!}
                                        </div>
                                    </div>
                                    <!-- /Clinic Timing -->

                                </div>
                            </div>
                            <!-- /Location List -->

                        </div>
                        <!-- /Locations Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <div class="write-review">
                                <h4>Write a review for <strong>{{ $service->name }}</strong></h4>

                                @auth
                                    <livewire:medicity.service.service-review :serviceId="$service->id" />
                                @else
                                    <p>Please <a href="{{ route('login') }}"><span style="color: #0E82FD">Login</span></a> to write a review.</p>
                                @endauth

                                <h4 class="mt-4">Latest Reviews</h4>
                                <ul class="comments-list">
                                    @foreach ($service->serviceFeedbacks()->where('is_active', true)->latest()->get() as $review)
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
                                                        $businessHours = json_decode($service->clinic->business_hour, true);
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
