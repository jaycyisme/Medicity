
    <!-- Page Content -->
    <div class="content">
        <div class="container mt-5">

            <!-- Doctor Widget -->
            <div class="card" style="margin-top: 100px;">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ asset('storage/Product/' . $this->product->thumbnail) }}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$this->product->name}}</h4>
                                @if ($product->is_prescription)
                                    <div class="alert alert-warning mt-3">
                                        <strong>
                                            <i class="fas fa-phone"></i>  Product require pharmacist advice
                                        </strong>
                                    </div>
                                @endif
                                <p class="doc-speciality">{{$this->product->category->name}}</p>
                                <p class="doc-department"><img src="{{ asset('storage/Speciality/' . $this->product->speciality->image_url) }}" class="img-fluid" alt="Speciality">{{$this->product->speciality->name}}</p>

                                <div class="clinic-details">
                                    <ul class="clinic-gallery d-flex mt-3">
                                        @foreach ($product->images as $image)
                                            <li>
                                                <a href="{{ asset('storage/Product/' . $image->image_url) }}" data-fancybox="gallery">
                                                    <img src="{{ asset('storage/Product/' . $image->image_url) }}" alt="Feature">
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">

                            <span><i class="far fa-money-bill-alt"></i>
                                <span class="ms-auto text-primary">
                                    @if ($sale_price)
                                        <span><del style="color: red;">${{ number_format($original_price, 2) }}</del></span>
                                        <strong style="font-size: 2rem;">${{ number_format($sale_price, 2) }}</strong>
                                    @else
                                        <strong style="font-size: 2rem;">${{ number_format($main_price, 2) }}</strong>
                                    @endif
                                </span>
                            </span>
                           <!-- Packaging -->
                            @if ($packagingTypes && $packagingTypes->count() > 0)
                            <p class="doc-speciality mt-3">Packaging Type</p>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($packagingTypes as $packagingType)
                                    <label class="btn btn-outline-primary {{ $selectedPackagingTypeId == $packagingType->id ? 'active' : '' }}"
                                        wire:click="togglePackagingType({{ $packagingType->id }})">
                                        {{ $packagingType->name }}
                                    </label>
                                @endforeach
                            </div>
                            @endif

                            <!-- Size -->
                            @if ($sizes && $sizes->count() > 0)
                            <p class="doc-speciality mt-3">Size</p>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($sizes as $size)
                                    <label class="btn btn-outline-primary {{ $selectedSizeId == $size->id ? 'active' : '' }}"
                                        wire:click="toggleSize({{ $size->id }})">
                                        {{ $size->name }}
                                    </label>
                                @endforeach
                            </div>
                            @endif

                            <!-- Color -->
                            @if ($colors && $colors->count() > 0)
                            <p class="doc-speciality mt-3">Color</p>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($colors as $color)
                                    <label class="btn btn-outline-primary {{ $selectedColorId == $color->id ? 'active' : '' }}"
                                        wire:click="toggleColor({{ $color->id }})">
                                        {{ $color->name }}
                                    </label>
                                @endforeach
                            </div>
                            @endif
                            <div class="mt-3">
                                <p class="doc-speciality">Quantity</p>
                                <div class="input-group">
                                    <button class="btn btn-outline-primary" type="button" wire:click="decreaseQuantity">-</button>
                                    <input type="number" class="form-control text-center" wire:model="selectedQuantity" min="1">
                                    <button class="btn btn-outline-primary" type="button" wire:click="increaseQuantity">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    {{-- <li><i class="far fa-thumbs-up"></i> 99%</li> --}}
                                    <li><i class="far fa-comment"></i> {{$product->activeFeedbacks()->count()}} Feedbacks</li>
                                    <div class="rating">
                                        @for ($i = 1; $i <= round($product->averageRating()); $i++)
                                            <i class="fas fa-star filled"></i>
                                        @endfor
                                    </div>
                                    <li><i class="fas fa-map-marker-alt"></i> {{$this->product->brand->name}}</li>
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
                            @if ($product->is_prescription)
                                <div class="clinic-booking">
                                    <a class="apt-btn" href="booking.html">Consultation Now</a>
                                </div>
                            @else
                                <div class="mt-4">
                                    <form wire:submit.prevent="addToCart">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            <i class="fas fa-shopping-cart"></i> Add To Cart
                                        </button>
                                    </form>
                                </div>
                                <div class="clinic-booking mt-3">
                                    <button type="button" class="btn btn-outline-primary btn-lg w-100" wire:click="buyNow">
                                        <i class="fas fa-credit-card"></i> Buy Now
                                    </button>
                                </div>
                            @endif
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
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Locations</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Reviews</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Business Hours</a>
                            </li> --}}
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <!-- Description Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">Description</h4>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <!-- /Description Details -->

                                    <!-- Education Details -->
                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Ingredient</h4>
                                        <p>{{ $product->ingredient }}</p>
                                    </div>
                                    <!-- /Education Details -->

                                    <!-- Experience Details -->
                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">Indication</h4>
                                        <p>{{ $product->indication }}</p>
                                    </div>
                                    <!-- /Experience Details -->

                                    <!-- Awards Details -->
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Precaution</h4>
                                        <p>{{ $product->precaution }}</p>
                                    </div>
                                    <!-- /Awards Details -->

                                    <!-- Awards Details -->
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Usage Instruction</h4>
                                        <p>{{ $product->usage_instruction }}</p>
                                    </div>
                                    <!-- /Awards Details -->

                                    <!-- Awards Details -->
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Manufacturing Info</h4>
                                        <p>{{ $product->manufacturing_info }}</p>
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
                                <div class="row">

                                    <!-- Clinic Content -->
                                    <div class="col-md-6">
                                        <div class="clinic-content">
                                            <h4 class="clinic-name"><a href="#">Smile Cute Dental Care Center</a></h4>
                                            <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(4)</span>
                                            </div>
                                            <div class="clinic-details mb-0">
                                                <h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2286  Sundown Lane, Austin, Texas 78749, USA <br><a href="javascript:void(0);">Get Directions</a></h5>
                                                <ul>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-01.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-02.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-02.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-03.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-03.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-04.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-04.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Clinic Content -->

                                    <!-- Clinic Timing -->
                                    <div class="col-md-4">
                                        <div class="clinic-timing">
                                            <div>
                                                <p class="timings-days">
                                                    <span> Mon - Sat </span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>10:00 AM - 2:00 PM</span>
                                                    <span>4:00 PM - 9:00 PM</span>
                                                </p>
                                            </div>
                                            <div>
                                            <p class="timings-days">
                                                <span>Sun</span>
                                            </p>
                                            <p class="timings-times">
                                                <span>10:00 AM - 2:00 PM</span>
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Clinic Timing -->

                                    <div class="col-md-2">
                                        <div class="consult-price">
                                            $250
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Location List -->

                            <!-- Location List -->
                            <div class="location-list">
                                <div class="row">

                                    <!-- Clinic Content -->
                                    <div class="col-md-6">
                                        <div class="clinic-content">
                                            <h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
                                            <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(4)</span>
                                            </div>
                                            <div class="clinic-details mb-0">
                                                <p class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2883  University Street, Seattle, Texas Washington, 98155 <br><a href="javascript:void(0);">Get Directions</a></p>
                                                <ul>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-01.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-01.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-02.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-02.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-03.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-03.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ asset('medicity/assets/img/features/feature-04.jpg') }}" data-fancybox="gallery2">
                                                            <img src="{{ asset('medicity/assets/img/features/feature-04.jpg') }}" alt="Feature Image">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Clinic Content -->

                                    <!-- Clinic Timing -->
                                    <div class="col-md-4">
                                        <div class="clinic-timing">
                                            <div>
                                                <p class="timings-days">
                                                    <span> Tue - Fri </span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>11:00 AM - 1:00 PM</span>
                                                    <span>6:00 PM - 11:00 PM</span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="timings-days">
                                                    <span>Sat - Sun</span>
                                                </p>
                                                <p class="timings-times">
                                                    <span>8:00 AM - 10:00 AM</span>
                                                    <span>3:00 PM - 7:00 PM</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Clinic Timing -->

                                    <div class="col-md-2">
                                        <div class="consult-price">
                                            $350
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Location List -->

                        </div>
                        <!-- /Locations Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <div class="write-review">
                                <h4>Write a review for <strong>{{ $product->name }}</strong></h4>

                                @auth
                                    <livewire:medicity.pharmacy.product-review :productId="$product->id" />
                                @else
                                    <p>Please <a href="{{ route('login') }}"><span style="color: #0E82FD">Login</span></a> to write a review.</p>
                                @endauth

                                <h4 class="mt-4">Latest Reviews</h4>
                                <ul class="comments-list">
                                    @foreach ($product->productFeedbacks()->where('is_active', true)->latest()->get() as $review)
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
                                                <div class="listing-day current">
                                                    <div class="day">Today <span>5 Nov 2023</span></div>
                                                    <div class="time-items">
                                                        <span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day">
                                                    <div class="day">Monday</div>
                                                    <div class="time-items">
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day">
                                                    <div class="day">Tuesday</div>
                                                    <div class="time-items">
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day">
                                                    <div class="day">Wednesday</div>
                                                    <div class="time-items">
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day">
                                                    <div class="day">Thursday</div>
                                                    <div class="time-items">
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day">
                                                    <div class="day">Friday</div>
                                                    <div class="time-items">
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day">
                                                    <div class="day">Saturday</div>
                                                    <div class="time-items">
                                                        <span class="time">07:00 AM - 09:00 PM</span>
                                                    </div>
                                                </div>
                                                <div class="listing-day closed">
                                                    <div class="day">Sunday</div>
                                                    <div class="time-items">
                                                        <span class="time"><span class="badge bg-danger-light">Closed</span></span>
                                                    </div>
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
