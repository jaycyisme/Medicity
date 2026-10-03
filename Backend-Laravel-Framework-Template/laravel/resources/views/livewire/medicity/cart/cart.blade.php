<div class="content">
    <div class="container mt-5">
        <div class="row barlow3 tracking-cart-container">
            <div class="col-sm-12">

                <div class="tab-content" style="margin-top: 100px;">
                    <div class="tab-pane show active" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                        <div class="row gy-4">
                            <div class="col-xl-8">

                                <div class="card">
                                    <div class="card-body p-0 table-body overflow-auto">
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th class="text-end">Unit price</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-start">Total amount</th>
                                                        <th class=""></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cartItem as $index => $item)

                                                        <tr class=" overflow-scroll ">
                                                            <td>
                                                                <div class="d-flex align-items-center max-content ">
                                                                    <div class="flex-shrink-0">
                                                                        <img src="{{ asset('storage/Product/' . $item['image']) }}"
                                                                            alt="{{ $item['product_name'] }}"
                                                                            class="bg-light wid-50 rounded" style="width: 50px;border-radius: 0.25rem;max-width: 100%;height: auto;display: block;vertical-align: middle;">
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3 ">
                                                                        <h5 class="mb-1">{{ $item['product_name'] }}</h5>
                                                                        @if ($item['packaging'])
                                                                            <p class="text-sm text-muted mb-0">
                                                                                Packaging Type: {{ $item['packaging'] }}</p>
                                                                        @endif
                                                                        @if ($item['size'])
                                                                            <p class="text-sm text-muted mb-0">
                                                                                Size: {{ $item['size'] }}</p>
                                                                        @endif
                                                                        @if ($item['color'])
                                                                            <p class="text-sm text-muted mb-0">
                                                                                Color: {{ $item['color'] }}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-end">
                                                                <h5 class="mb-0">${{ $item['price'] }}</h5>
                                                            </td>
                                                            <td class="text-center" style="width: 150px">
                                                                <div class="btn-group btn-group-sm mb-2"
                                                                    role="group">
                                                                    <button type="button" wire:click="decreaseQuantity({{$index}})"
                                                                        class="btn btn-outline-primary">-</button>
                                                                    <input
                                                                        class="wid-50 text-center border-0 m-0 form-control rounded-0 shadow-none"
                                                                        type="number" id="number"
                                                                        value="{{ $item['quantity'] }}" id="number{{ $index }}"
                                                                        wire:change='updateQuantityProduct({{ $index }}, $event.target.value)'>
                                                                    <button type="button" wire:click="increaseQuantity({{$index}})"
                                                                        class="btn btn-outline-primary">+</button>
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <h5 class="mb-0">${{ $item['total_price'] }}
                                                                </h5>
                                                            </td>
                                                            <td class="">
                                                                <a wire:click="removeProductFromCart({{ $index }})"
                                                                    class="avtar avtar-s btn-link-danger btn-pc-default">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div
                                            class="card-body border-bottom d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Address</h5>
                                            <div class="col-auto">
                                                <button class="btn btn-primary" type="button" id="toggleAddressForm" wire:click="clickAddNewAddress">Add New Address</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="addressContainContainer">
                                                @foreach ($addresses as $address)
                                                <div class="address-check-block">
                                                    <div class="address-check border rounded p-3">
                                                        <div class="form-check">
                                                            <input type="radio" name="radio1"
                                                                class="form-check-input input-primary"
                                                                id="address-check-{{ $address->id }}"
                                                                wire:model="selectedAddressId"
                                                                value="{{ $address->id }}">
                                                            <label class="form-check-label d-block"
                                                                for="address-check-{{ $address->id }}">
                                                                <span class="h6 mb-0 d-block">Receiver Name: {{ $address->receiver_name }}</span>
                                                                <span class="text-muted address-details">Address: {{ $address->address_detail }}, {{ $address->ward }}, {{ $address->district }}, {{ $address->city }}</span>
                                                                <span class="row d-flex align-items-center justify-content-between">
                                                                    <span class="col-6">
                                                                        <span class="text-muted mb-0">Phone: {{ $address->phone }}</span>
                                                                    </span>
                                                                    <span class="col-6 text-end width-fit-content">
                                                                        <span
                                                                            class="address-btns d-flex align-items-center justify-content-end gap-2">
                                                                            <a wire:click='deleteAddress({{ $address->id }})'
                                                                                class="avtar avtar-s btn-link-danger btn-pc-default">
                                                                                <i class="fa fa-trash"></i>
                                                                            </a>
                                                                            <span class="btn btn-sm btn-outline-primary"
                                                                                wire:click="chooseAddress({{ $address->id }})">Delivery to this address</span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>


                                            <div class="address-form-container" id="addressFormContainer" style="@if($isAddNew) display: block; @else display: none; @endif">
                                                <div class="card-body border-bottom">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h5 class="mb-0">New Address</h5>
                                                        </div>
                                                        <div class="col-auto">
                                                        </div>
                                                    </div>
                                                </div>
                                                <form wire:submit.prevent="createAddress">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label">Receiver Name :<small class="text-muted d-block">Receiver Name</small></label>
                                                                    <div class="col-lg-8">
                                                                        <input required wire:model='receiver_name' type="text" class="form-control">
                                                                        <x-input-error for="receiver_name" />
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label">Phone :<small class="text-muted d-block">Enter Phone</small></label>
                                                                    <div class="col-lg-8">
                                                                        <input required wire:model='phone' type="text" class="form-control">
                                                                        <x-input-error for="phone" />
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label">Address :</label>
                                                                    <div class="col-lg-4">
                                                                        <select required wire:model='address_province' wire:change='onChangeCity' class="form-select rounded mb-3" aria-label="Default select example">
                                                                            <option selected>Province/City</option>
                                                                            @foreach($citiesList as $city)
                                                                            <option value="{{ $city->province_id }}">{{ $city->province_name }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                        <select required wire:model='address_district' wire:change='onChangeDistrict' class="form-select rounded mb-3" aria-label="Default select example">
                                                                            <option selected>District</option>

                                                                            @foreach($districtsList as $district)
                                                                            <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                        <select required wire:model='address_ward' class="form-select rounded mb-3" aria-label="Default select example">
                                                                            <option selected>Ward</option>
                                                                            @foreach($wardsList as $ward)
                                                                            <option value="{{ $ward->wards_id }}">{{ $ward->wards_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label">House number/Alley/Road/Street :<small
                                                                            class="text-muted d-block">Enter detailed address</small></label>
                                                                    <div class="col-lg-8">
                                                                        <input required wire:model='address_detail' type="text"
                                                                            class="form-control">

                                                                        <x-input-error for="address_detail" />
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="mb-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="checkaddres" checked>
                                                                        <label class="form-check-label" for="checkaddres">
                                                                            Lưu địa chỉ cho lần mua hàng tiếp theo </label>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="text-end btn-page mb-0 mt-4">
                                                                    <button class="btn btn-outline-danger" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target=".multi-collapse"
                                                                        id="cancelAddressForm" wire:click="clickCancelNewAddress">Cancel</button>
                                                                    <button class="btn btn-primary"
                                                                        data-bs-dismiss="modal">Save and select address</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mb-3">
                                    <a href="{{ route('index') }}" class="btn btn-link-primary"><i
                                            class="ti ti-arrow-narrow-left align-text-bottom me-2"></i>Back to home page</a>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-link-secondary"
                                            data-bs-toggle="modal" data-bs-target="#couponModal">
                                            Do you have a discount code?
                                        </button>
                                        <div class="input-group my-2">
                                            <input wire:model='coupon_code' type="text" class="form-control"
                                                placeholder="Discount code">
                                            <button wire:click='applyCoupon' class="btn btn-outline-danger"
                                                type="button">Apply</button>
                                        </div>
                                        @if (session()->has('coupon_error'))
                                            <div class="alert alert-danger">
                                                {{ session('coupon_error') }}
                                            </div>
                                        @endif

                                        @if (session()->has('coupon_success'))
                                            <div class="alert alert-success">
                                                {{ session('coupon_success') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="cart-price lg:block">
                                    <div class="cart-pay lg:w-410 lg:h-136 lg:ml-20 lg:mt-18">
                                        <div class="cart-total-price">
                                            <div class="cart-total-text barlow4">Total amount</div>
                                            <div class="cart-total-amount barlow4">
                                                {{ number_format($total_money, 0, ',', '.') }}$
                                            </div>
                                        </div>
                                        <div class="cart-pay-button mt-3">
                                            <form wire:submit.prevent="checkout" class="mb-3">
                                                @csrf
                                                <button class="cart-buy-button barlow4 bg-main text-white btn btn-danger">CHECKOUT</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
