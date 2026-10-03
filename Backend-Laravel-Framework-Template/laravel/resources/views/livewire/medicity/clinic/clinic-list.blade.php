<!-- Page Content -->
<div class="content">
    <div class="container mt-5">

        <div class="row" style="margin-top: 100px;">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                    <div class="filter-widget">
                        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
                    </div>
                    <div class="filter-widget">

                    </div>

                        {{-- <div class="btn-search">
                            <button type="button" class="btn w-100">Search</button>
                        </div> --}}
                    </div>
                </div>
                <!-- /Search Filter -->

            </div>

            <div class="col-md-12 col-lg-8 col-xl-9">
                @foreach ($clinics as $clinic)
                @php
                    $averageStars = $clinic->pharmacyReviews->avg('star') ?? 0;
                    $reviewCount = $clinic->pharmacyReviews->count();
                    $filledStars = floor($averageStars); // Làm tròn xuống số sao
                    $emptyStars = 5 - $filledStars; // Số sao trống còn lại
                @endphp
                    <!-- Doctor Widget -->
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left">
                                    <div class="doctor-img1">
                                        <a href="{{ route('medicity.clinic.detail', $clinic->id) }}">
                                            <img src="{{ asset('storage/Clinic/' . $clinic->image_url) }}" class="img-fluid" alt="User Image" style="width: 300px; height: 200px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name mb-2"><a href="{{ route('medicity.clinic.detail', $clinic->id) }}">{{ $clinic->name }}</a></h4>
                                        <div class="rating mb-2">
                                            <span class="badge badge-primary">{{$averageStars}}</span>
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
                                            {{-- <p class="doc-location mb-2"><i class="fas fa-chevron-right me-1"></i> Chemists, Surgical Equipment Dealer</p> --}}

                                            {{-- <p class="doc-location mb-2"><i class="fas fa-chevron-right me-1"></i> Opens at 08.00 AM</p> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clinic-booking">
                                        <a class="view-pro-btn" href="{{ route('medicity.clinic.detail', $clinic->id) }}">View Details</a>
                                        {{-- <a class="apt-btn" href="product-all.html">Browse Products</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget -->
                @endforeach

            </div>
        </div>

    </div>
</div>
<!-- /Page Content -->
