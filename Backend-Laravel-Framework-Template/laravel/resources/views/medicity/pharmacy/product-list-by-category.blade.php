<x-main-layout>
    <div class="content">
        <div class="container mt-5">

            <div class="row" style="margin-top: 100px;">
                {{-- <div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">

                    <div class="card filter-lists" x-data="{ open: true }">
                        <div class="card-header">
                            <div class="d-flex align-items-center filter-head justify-content-between">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"> </h5>
                                    <button class="btn btn-sm btn-outline-primary" @click="open = !open">
                                        <span x-show="open">Hide</span>
                                        <span x-show="!open">Show</span>
                                    </button>
                                </div>
                                <a href="{{ route('pharmacy-list') }}" class="text-primary text-decoration-underline">Clear All</a>
                            </div>
                        </div>
                        <div class="card-body p-0" x-show="open" x-transition>
                                <!-- Lọc theo Speciality -->
                                <div class="accordion-item border-bottom">
                                    <div class="accordion-header">
                                        <h5>Speciality</h5>
                                    </div>
                                    <div class="accordion-collapse show">
                                        <div class="accordion-body pt-3">
                                            <div class="form-check">
                                                <input wire:model="specialityFilter" wire:change='filterChange' class="form-check-input" type="radio" name="speciality" value="">
                                                <label class="form-check-label">All</label>
                                            </div>
                                            @foreach ($specialities as $speciality)
                                                <div class="form-check">
                                                    <input wire:model="specialityFilter" wire:change='filterChange' class="form-check-input" type="radio" name="speciality" value="{{ $speciality->id }}">
                                                    <label class="form-check-label">{{ $speciality->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Lọc theo Categories -->
                                <div class="accordion-item border-bottom">
                                    <div class="accordion-header">
                                        <h5>Categories</h5>
                                    </div>
                                    <div class="accordion-collapse show">
                                        <div class="accordion-body pt-3">
                                            <div class="form-check">
                                                <input wire:model="categoryFilter" wire:change='filterChange' class="form-check-input" type="radio" name="category" value="">
                                                <label class="form-check-label">All</label>
                                            </div>
                                            @foreach ($categories as $category)
                                                <div class="form-check">
                                                    <input wire:model="categoryFilter" wire:change='filterChange' class="form-check-input" type="radio" name="category" value="{{ $category->id }}">
                                                    <label class="form-check-label">{{ $category->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Lọc theo Brand -->
                                <div class="accordion-item border-bottom">
                                    <div class="accordion-header">
                                        <h5>Brand</h5>
                                    </div>
                                    <div class="accordion-collapse show">
                                        <div class="accordion-body pt-3">
                                            <div class="form-check">
                                                <input wire:model="brandFilter" wire:change='filterChange' class="form-check-input" type="radio" name="brand" value="">
                                                <label class="form-check-label">All</label>
                                            </div>
                                            @foreach ($brands as $brand)
                                                <div class="form-check">
                                                    <input wire:model="brandFilter" wire:change='filterChange' class="form-check-input" type="radio" name="brand" value="{{ $brand->id }}">
                                                    <label class="form-check-label">{{ $brand->name }}</label>
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

                                <!-- Lọc theo Giá -->
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

                                <div class="accordion-item border-bottom">
                                    <div class="accordion-header">
                                        <h5>Sort By</h5>
                                    </div>
                                    <div class="accordion-collapse show">
                                        <div class="accordion-body pt-3">
                                            <div class="form-check">
                                                <select class="form-select" style="width: 150px;">
                                                    <option value="">Sort by price</option>
                                                    <option value="lowtohigh">Low To High</option>
                                                    <option value="hightolow">High To Low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div> --}}

                <div class="col-md-7 col-lg-9 col-xl-9">

                    <div class="row align-items-center pb-3">
                        <div class="col-md-4 col-12 d-md-block d-none custom-short-by">
                            <h3 class="title pharmacy-title fs-24 mb-2">{{$category->name}}</h3>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
                                <div class="profile-widget w-100">
                                    <div class="doc-img">
                                        <a href="{{ route('product-detail', ['name' => toSlug($product->name), 'id'=>$product->id]) }}" tabindex="-1">
                                            <img class="img-fluid" alt="Product image"
                                                src="{{ asset('storage/Product/' . $product->thumbnail) }}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{ route('product-detail', ['name' => toSlug($product->name), 'id'=>$product->id]) }}" tabindex="-1">{{$product->name}}</a>
                                        </h3>
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 d-flex">
                                                <span class="price me-2">${{$product->base_price}}</span>
                                            </div>
                                            <div class="col-lg-6 text-end">
                                                <a href="{{ route('product-detail', ['name' => toSlug($product->name), 'id'=>$product->id]) }}" class="cart-icon"><i
                                                        class="fas fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main-layout>
