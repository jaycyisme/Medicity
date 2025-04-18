<div class="div">

    <!-- Page Content -->
    <div class="content">
        <div class="container mt-5">

            <div class="row" style="margin-top: 100px;">
                <div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">

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
                            {{-- <div class="filter-input">
                                <div class="position-relative input-icon">
                                    <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
                                    <span><i class="isax isax-search-normal-1"></i></span>
                                </div>
                            </div> --}}
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

                </div>

                <div class="col-md-7 col-lg-9 col-xl-9">

                    <div class="row align-items-center pb-3">
                        <div class="col-md-4 col-12 d-md-block d-none custom-short-by">
                            <h3 class="title pharmacy-title fs-24 mb-2">Medlife Medical</h3>
                            {{-- <p class="doc-location mb-2 text-ellipse pharmacy-location"><i
                                    class="isax isax-location5 me-1"></i> 96 Red Hawk Road Cyrus, MN 56323 </p>
                            <span class="sort-title">Showing 6 of 98 products</span> --}}
                        </div>
                        <div class="col-md-8 col-12 d-md-block d-none custom-short-by">
                            <div class="sort-by pb-3">
                                <span class="sort-title">Sort by</span>
                                <span class="sortby-fliter">
                                    <select class="form-select" style="width: 150px;">
                                        <option value="">Sort by price</option>
                                        <option value="lowtohigh">Low To High</option>
                                        <option value="hightolow">High To Low</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
                                <div class="profile-widget w-100">
                                    <div class="doc-img">
                                        <a href="{{ route('product-detail', ['name' => toSlug($product['name']), 'id'=>$product['id']]) }}" tabindex="-1">
                                            <img class="img-fluid" alt="Product image"
                                                src="{{ asset('storage/Product/' . $product['thumbnail']) }}">
                                        </a>
                                        <a href="#" wire:click="showProduct({{ $product['id'] }})" data-bs-toggle="modal" data-bs-target="#quickview"
                                        data-tooltip="tooltip" title="Quick View" class="fav-btn" tabindex="-1">
                                        <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{ route('product-detail', ['name' => toSlug($product['name']), 'id'=>$product['id']]) }}" tabindex="-1">{{$product['name']}}</a>
                                        </h3>
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 d-flex">
                                                <span class="price me-2">${{$product['base_price']}}</span>
                                            </div>
                                            <div class="col-lg-6 text-end">
                                                <a href="{{ route('product-detail', ['name' => toSlug($product['name']), 'id'=>$product['id']]) }}" class="cart-icon"><i
                                                        class="fas fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="col-md-12 text-center">
                        @if ($this->hasMore)
                            <div class="self-center loading loading-spinner" x-intersect="$wire.loadMore()">
                                <img class="nav-logo text-center loading-img" src="{{ asset('medicity/assets/img/logo.svg') }}" alt="chillnfree">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


<!-- Modal hiển thị chi tiết sản phẩm -->
<div wire:ignore.self class="modal quickview fade" id="quickview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="quickview" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                style="position: absolute; right: 5px; top: 5px; z-index: 100; width: 10px; height: 10px;"></button>
            <div class="modal-body">
                @if ($selectedProduct)
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" style="display: flex; align-items: center;">
                            <div class="quickview-img">
                                <img src="{{ asset('storage/Product/' . $selectedProduct->thumbnail) }}" alt="Product Image" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 mt-3">
                            <div class="quickview-content">
                                <h3 class="quickview-title mb-3">{{ $selectedProduct->name }}</h3>
                                @if ($selectedProduct->is_prescription)
                                <div class="alert alert-warning mt-3">
                                    <strong>
                                        <i class="fas fa-phone"></i>  Product require pharmacist advice
                                    </strong>
                                </div>
                            @endif
                                <div class="quickview-rating" style="color: #FBA707;">
                                    @for ($i = 1; $i <= round($selectedProduct->averageRating()); $i++)
                                        <i class="fas fa-star filled"></i>
                                    @endfor
                                    <span class="rating-count" style="color: darkgrey;"> ({{ $selectedProduct->activeFeedbacks()->count() }} feedbacks)</span>
                                </div>

                                <!-- Danh sách biến thể -->
                                @if (!empty($selectedVariants))
                                    <div class="quickview-variants mt-3">
                                        <h5 class="mb-3">Option:</h5>
                                        @foreach ($selectedVariants as $variant)
                                            <div class="variant-item d-flex align-items-center mb-2">
                                                <input type="radio" wire:model="selectedVariantId" value="{{ $variant->id }}" class="form-check-input">
                                                <label class="ms-2">
                                                    {{ $variant->size_id ? 'Size: ' . $variant->size->name . ' -' : '' }}
                                                    {{ $variant->color_id ? 'Color: ' . $variant->color->name . ' -' : '' }}
                                                    {{ $variant->packaging_type_id ? 'Packaging Type: ' . $variant->packagingType->name : '' }}
                                                </label>
                                                <span class="ms-auto text-success">
                                                    @if($variant->is_sale)
                                                        <del>${{ number_format($variant->price, 2) }}</del>
                                                        <strong>${{ number_format($variant->sale_price, 2) }}</strong>
                                                    @else
                                                        <strong>${{ number_format($variant->price, 2) }}</strong>
                                                    @endif
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3">
                                        <h5 class="mb-3">Quantity:</h5>
                                        <div class="input-group w-50">
                                            <button class="btn btn-outline-primary" type="button" wire:click="decreaseQuantity">-</button>
                                            <input type="number" class="form-control text-center" wire:model="selectedQuantity" min="1">
                                            <button class="btn btn-outline-primary" type="button" wire:click="increaseQuantity">+</button>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted">Empty Option.</p>
                                @endif

                                <!-- Nút thêm vào giỏ hàng và mua ngay -->
                                <div class="product-cart mt-3">
                                    <div class="freshner-card d-flex gap-2" style="background: none;">
                                        @if ($selectedProduct->is_prescription)
                                            <div class="shop-content">
                                                <button class="btn">Consultation Now</button>
                                            </div>
                                        @else
                                            <div class="shop-content">
                                                <button wire:click="addToCart({{ $selectedProduct->id }})" class="btn">
                                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                                </button>
                                            </div>
                                            <div class="shop-content">
                                                <button wire:click="buyNow({{ $selectedProduct->id }})" class="btn" style="background-color: #E5440E;">
                                                    <i class="fas fa-credit-card"></i> Buy Now
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center">Loading...</p>
                @endif
            </div>
        </div>
    </div>
</div>

</div>
