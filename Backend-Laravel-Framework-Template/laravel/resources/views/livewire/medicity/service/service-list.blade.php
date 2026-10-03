<!-- Page Content -->
<div class="content">
    <div class="container mt-5">

        <div class="row" style="margin-top: 100px;">

            <!-- Blog Sidebar -->
            <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

                <!-- Search -->
                <div class="card search-widget">
                    <div class="card-body">
                        <form class="search-form">
                            <div class="input-group">
                                <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
                                {{-- <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button> --}}
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Search -->

                <!-- Latest Posts -->
                <div class="card filter-lists" x-data="{ open: true }">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"> </h5>
                        <button class="btn btn-sm btn-outline-primary" @click="open = !open">
                            <span x-show="open">Hide</span>
                            <span x-show="!open">Show</span>
                        </button>
                    </div>

                    <div class="card-body p-0" x-show="open" x-transition>
                        <!-- Lọc theo chuyên khoa -->
                        <div class="accordion-item border-bottom">
                            <div class="accordion-header">
                                <h5>Speciality</h5>
                            </div>
                            <div class="accordion-collapse show">
                                <div class="accordion-body pt-3">
                                    <div class="form-check">
                                        <input wire:model="specialityFilter" wire:change='filterChange' class="form-check-input" type="radio" value="">
                                        <label class="form-check-label">All</label>
                                    </div>
                                    @foreach ($specialities as $speciality)
                                        <div class="form-check">
                                            <input wire:model="specialityFilter" wire:change='filterChange' class="form-check-input" type="radio" value="{{ $speciality->id }}">
                                            <label class="form-check-label">{{ $speciality->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Lọc theo phòng khám -->
                        <div class="accordion-item border-bottom">
                            <div class="accordion-header">
                                <h5>Clinic</h5>
                            </div>
                            <div class="accordion-collapse show">
                                <div class="accordion-body pt-3">
                                    <div class="form-check">
                                        <input wire:model="clinicFilter" wire:change='filterChange' class="form-check-input" type="radio" value="">
                                        <label class="form-check-label">All</label>
                                    </div>
                                    @foreach ($clinics as $clinic)
                                        <div class="form-check">
                                            <input wire:model="clinicFilter" wire:change='filterChange' class="form-check-input" type="radio" value="{{ $clinic->id }}">
                                            <label class="form-check-label">{{ $clinic->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Lọc theo đánh giá -->
                        <div class="accordion-item border-bottom">
                            <div class="accordion-header">
                                <h5>Star Rating</h5>
                            </div>
                            <div class="accordion-collapse show">
                                <div class="accordion-body pt-3">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <div class="form-check">
                                            <input wire:model="ratingFilter" wire:change='filterChange' class="form-check-input" type="radio" value="{{ $i }}">
                                            <label class="form-check-label">
                                                @for ($j = 1; $j <= $i; $j++)
                                                    <i class="fa fa-star text-orange"></i>
                                                @endfor
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Lọc theo giá -->
                        <div class="accordion-item border-bottom">
                            <div class="accordion-header">
                                <h5>Price</h5>
                            </div>
                            <div class="accordion-collapse show">
                                <div class="accordion-body pt-3">
                                    <div class="form-check">
                                        <input wire:model="priceFilter" wire:change='filterChange' class="form-check-input" type="radio" value="">
                                        <label class="form-check-label">All</label>
                                    </div>
                                    <div class="form-check">
                                        <input wire:model="priceFilter" wire:change='filterChange' class="form-check-input" type="radio" value="10">
                                        <label class="form-check-label">Under 10$</label>
                                    </div>
                                    <div class="form-check">
                                        <input wire:model="priceFilter" wire:change='filterChange' class="form-check-input" type="radio" value="20">
                                        <label class="form-check-label">Under 20$</label>
                                    </div>
                                    <div class="form-check">
                                        <input wire:model="priceFilter" wire:change='filterChange' class="form-check-input" type="radio" value="50">
                                        <label class="form-check-label">Under 50$</label>
                                    </div>
                                    <div class="form-check">
                                        <input wire:model="priceFilter" wire:change='filterChange' class="form-check-input" type="radio" value="100">
                                        <label class="form-check-label">Under 100$</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Latest Posts -->

            </div>
            <!-- /Blog Sidebar -->
            <div class="col-lg-8 col-md-12">

                <div class="row blog-grid-row">
                    @foreach ($services as $service)
                    @php
                        $averageStars = $service->serviceFeedbacks->avg('star') ?? 0;
                        $reviewCount = $service->serviceFeedbacks->count();
                        $filledStars = floor($averageStars); // Làm tròn xuống số sao
                        $emptyStars = 5 - $filledStars; // Số sao trống còn lại
                    @endphp
                        <div class="col-md-6 col-sm-12">

                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="{{ route('service-detail', $service->id) }}"><img class="img-fluid" src="{{ asset('storage/Clinic/' . $service->thumbnail) }}" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item" style="padding-left: 0;">
                                        <li>
                                            <div class="post-author">
                                                <a href="{{ route('service-detail', $service->id) }}"><img src="{{ asset('storage/Clinic/' . $service->clinic->image_url) }}" alt="Post Author"> <span>{{$service->clinic->name}}</span></a>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock"></i> {{$service->created_at->format('Y-m-d')}}</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="{{ route('service-detail', $service->id) }}">{{$service->name}}</a></h3>
                                    <span class="badge badge-success">${{$service->price}}</span>
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
                                    <p class="mt-2">Speciality: {{$service->speciality->name}}</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->

                        </div>
                    @endforeach
                </div>

                {!! $services->onEachSide(2)->links() !!}

                <!-- Blog Pagination -->
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="blog-pagination">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> --}}
                <!-- /Blog Pagination -->

            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
