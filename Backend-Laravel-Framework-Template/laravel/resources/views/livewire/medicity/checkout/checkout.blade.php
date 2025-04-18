<div>
    <div class="tracking-container row client-margin-error barlow3">
        <div class="col-sm-12">
            <div class="tab-content" style="margin-top: 100px;">
                <div class="card-body">
                    <div class="row mt-5">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h5 class="mb-0">Checkout</h5>
                                </div>
                                <div class="card-body">
                                    <div class="address-check border rounded p-3">
                                        <div class="form-check">
                                            <input type="radio" name="radio11" class="form-check-input input-primary"
                                                checked="">
                                            <label class="form-check-label d-block p-3">
                                                <span class="row align-items-center justify-content-between">
                                                    <span class="col-6">
                                                        <span class="h6 mb-0 d-block">Receiver name: {{ $address->receiver_name }}
                                                            <span
                                                                class="badge bg-primary rounded-pill">Default</span></span>
                                                    </span>
                                                    <span class="col-6 text-end">
                                                        <button data-bs-toggle="modal" data-bs-target="#address-edit_add-modal" class="btn btn-primary"><i
                                                                class="ti ti-edit-circle me-1"></i>Change address</button>
                                                    </span>
                                                </span>
                                                <span class="text-muted address-details">Address: {{ $address->line }}, {{ $address->ward }}, {{ $address->district }}, {{ $address->city }}</span>
                                                <span class="row align-items-center justify-content-between">
                                                    <span class="col-6">
                                                        <span class="text-muted mb-0">Phone: {{ $address->phone }}</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($paymentMethods as $paymentMethod)
                                            <div class="col-xl-6 col-xxl-4">
                                                <div class="address-check border rounded">
                                                    <div class="form-check">
                                                        <input type="radio" wire:model="selectedPaymentMethod"
                                                            value="{{ $paymentMethod->id }}"
                                                            class="form-check-input input-primary" id="payopn-check-{{ $paymentMethod->id }}"
                                                            wire:click="handlePaymentMethodChange({{ $paymentMethod->id }})"
                                                            @if (($total_money >= 1000000 || session()->has('force_bank_transfer')) && $paymentMethod->name === 'Cash on Delivery')
                                                                disabled
                                                            @endif
                                                            @if ($paymentMethod->name === 'Cash on Delivery')
                                                                checked
                                                            @endif>
                                                        <label class="form-check-label d-block p-3" for="payopn-check-{{ $paymentMethod->id }}">
                                                            <span class="card-body p-3 d-block d-flex">
                                                                <span class="">
                                                                    <span>
                                                                        <span class="h5 mb-3 d-block">{{ $paymentMethod->name }}</span>
                                                                    </span>
                                                                        <small class="text-danger">
                                                                            @if ($total_money >= 1000000)
                                                                                Not applicable for orders over 1 million
                                                                            @elseif (session()->has('force_bank_transfer'))
                                                                                Not available for pre-order
                                                                            @endif
                                                                        </small>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="mb-3 row align-items-center g-2">
                                                {{-- <button wire:click='test'>click</button> --}}
                                                @if ($qrCodeUrl)
                                                    <div class="mt-4">
                                                        <img class="margin-auto" src="{{ $qrCodeUrl }}" alt="chillnfree" class="img-fluid">
                                                    </div>
                                                    <p class="text-center h3">Please click the Complete button after successful payment.</p>
                                                    <div class="deeplink mt-4">
                                                        <a href="https://dl.vietqr.io/pay?app=vcb&ba=113366668888@vcb&am={{ $total_money }}&tn={{ $order_code }}" class="btn btn-link">
                                                            Payment via Vietcombank
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3">
                                {{-- <button wire:click='changeAddress' class="btn btn-link-primary"><i
                                        class="ti ti-arrow-narrow-left align-text-bottom me-2"></i>Back to cart</button> --}}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>List</h5>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($cartItem as $index => $item)
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-shrink-0">
                                                        <img class="bg-light rounded img-fluid wid-60 flex-shrink-0"
                                                            src="{{ asset('storage/Product/' . $item['image']) }}"
                                                            alt="{{ $item['product_name'] }}">
                                                    </div>
                                                    <div class="flex-grow-1 mx-2 ml-3">
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
                                                        <p class="text-sm text-muted mb-0">
                                                            Quantity: {{ $item['quantity'] }}</p>
                                                        <h5 class="mb-1"><b>Unit price:
                                                                {{ format_price($item['price']) }}</b>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Price</span>
                                            <div class="float-end">
                                                <h5 class="mb-0">{{ format_price($total_price) }}</h5>
                                            </div>
                                        </li>
                                        {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Estimated Delivery</span>
                                  <div class="float-end">
                                    <h5 class="mb-0">-</h5>
                                  </div>
                                </li> --}}
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Discount</span>
                                            <div class="float-end">
                                                <h5 class="mb-0">{{ format_price($discount) }}</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body py-2">
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0 d-inline-block">Total amount</h5>
                                            <div class="float-end">
                                                <h5 class="mb-0">{{ format_price($total_money) }}</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-grid mb-3">
                                <form wire:submit.prevent="checkout" class="mb-3">
                                    @csrf
                                    <button class="btn btn-primary w-100">Complete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="address-edit_add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Select address</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                            data-bs-toggle="tooltip" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="multi-collapse show">
                        <div class="address-check-block">

                            @foreach ($addresses as $address)
                                <div class="address-check border rounded p-3">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <span class="h6 mb-0 d-block">Receiver name: {{ $address->receiver_name }}</span>
                                                    <span class="text-muted address-details">Address: {{ $address->line }}, {{ $address->ward }}, {{ $address->district }}, {{ $address->city }}</span>
                                            <span class="row align-items-center justify-content-between">
                                                <span class="col-6">
                                                    <span class="text-muted mb-0">Phone: {{ $address->phone }}</span>
                                                </span>
                                                <span class="col-6 text-end">
                                                    <span
                                                        class="address-btns d-flex align-items-center justify-content-end">
                                                        <a wire:click.prevent='addAddress({{ $address->id }})'
                                                            data-bs-dismiss="modal"
                                                            class="avtar avtar-s btn-link-danger btn-pc-default">
                                                            +</i>
                                                        </a>
                                                    </span>
                                                </span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between collapse multi-collapse show">
                    <div class="flex-grow-1 text-end">
                        <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
