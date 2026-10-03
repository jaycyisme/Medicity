<div class="content doctor-content">
    <div class="container mt-5">
        <div class="row" style="margin-top: 100px;">

            <!-- Profile Sidebar -->
            @include('layouts.app.patient-sidebar')
            <!-- /Profile Sidebar -->

            <div class="col-lg-8 col-xl-9">

                <div class="dashboard-header">
                    <h3>Favourites</h3>
                    <ul class="header-list-btns">
                        {{-- <li>
                            <div class="input-block dash-search-input">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="search-icon"><i class="isax isax-search-normal"></i></span>
                            </div>
                        </li> --}}
                    </ul>
                </div>

                <!-- Favourites -->
                <div class="row">
                    @foreach ($doctorFavourites as $doctorFavourite)
                    @php
                        $averageStars = $doctorFavourite->doctor->doctorFeedbacks->avg('star') ?? 0;
                        $reviewCount = $doctorFavourite->doctor->doctorFeedbacks->count();
                        // Lấy khoảng giá tiền của dịch vụ
                        $servicePrices = $doctorFavourite->doctor->doctorServices->pluck('service.price')->filter()->toArray();
                        $minPrice = count($servicePrices) > 0 ? min($servicePrices) : 0;
                        $maxPrice = count($servicePrices) > 0 ? max($servicePrices) : 0;
                        $priceRange = $minPrice === $maxPrice ? "$minPrice" : "$minPrice - $maxPrice";
                    @endphp
                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" wire:click="toggleFavourite({{ $doctorFavourite->doctor->id }})" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite">
                                            <i class="isax isax-heart5"
                                               @if($doctorFavourite->doctor->id === $doctorFavourite->doctor->id) style="color:red" @else style="color:grey" @endif>
                                            </i>
                                        </span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="@if(isset($doctorFavourite->doctor->profile_photo_path)){{ asset('storage/'.$doctorFavourite->doctor->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="{{ $doctorFavourite->doctor->name }}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">{{ $doctorFavourite->doctor->name }}</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">{{ $doctorFavourite->doctor->designation }}</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <span class="d-inline-block average-rating">{{ number_format($averageStars, 1) }}</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Price :</span> {{ $priceRange }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="{{ route('doctor-profile', $doctorFavourite->doctor->id) }}" class="btn btn-md btn-light w-100">View Details</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('doctor-booking', $doctorFavourite->doctor->id) }}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- /Favourites -->
            </div>
        </div>
    </div>

</div>
