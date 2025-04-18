<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" wire:submit.prevent="updateBill">
                        @csrf

                        @if (session()->has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Thông báo:</strong> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row g-3">
                            <div class="col-sm-6 col-xl-3">
                                <div class="mb-0">
                                    <label class="form-label">Phương thức thanh toán</label>
                                    <select wire:model='payment_method_id' class="form-select"
                                        id="exampleFormControlSelect1">
                                            <option value="1">Thanh toán khi nhận hàng</option>
                                            <option value="2">Chuyển khoản</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="mb-0">
                                    <label class="form-label">Trạng thái thanh toán</label>
                                    <select wire:model='payment_status_id' class="form-select"
                                        id="exampleFormControlSelect1">
                                            <option value="1">Đang chờ</option>
                                            <option value="2">Đã thanh toán</option>
                                            <option value="3">Thanh toán thất bại</option>
                                            <option value="4">Hoàn trả</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="mb-0">
                                    <label class="form-label">Trạng thái</label>
                                    <select wire:model='order_status_id' class="form-select"
                                        id="exampleFormControlSelect1">
                                            <option value="1">Đang chờ</option>
                                            <option value="2">Đang xử lý</option>
                                            <option value="3">Đã vận chuyển</option>
                                            <option value="4">Đã giao hàng</option>
                                            <option value="5">Đã hủy</option>
                                            <option value="6">Đã hoàn tiền</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="mb-0">
                                    <label class="form-label">Loại</label>
                                    <select wire:model='order_type_id'
                                            wire:change='changeOrderType($event.target.value)'
                                            class="form-select"
                                        id="exampleFormControlSelect1">
                                            <option value="1">Online</option>
                                            <option value="2">Trực tiếp</option>
                                    </select>
                                </div>
                            </div>

                            @if ($isOnlineOrder)
                                <div class="col-xl-6">
                                    <div class="border rounded p-3 h-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0">Tới:</h6>
                                            <a class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2"
                                                data-bs-toggle="modal" data-bs-target="#address-edit_add-modal">
                                                <i class="ph-duotone ph-plus-circle"></i> Thêm
                                            </a>

                                        </div>

                                        @if (!empty($selectedAddress))
                                            <h5>{{ $selectedAddress['user_name'] }}</h5>
                                            <p class="mb-0">{{ $selectedAddress['address_province'] }} - {{ $selectedAddress['address_district'] }} -
                                                {{ $selectedAddress['address_ward'] }} - {{ $selectedAddress['address_line'] }}</p>
                                            <p class="mb-0">{{ $selectedAddress['user_phone'] }}</p>
                                            <p class="mb-0">{{ $selectedAddress['user_email'] }}</p>
                                        @else
                                            <p class="mb-0 text-muted">No address selected.</p>
                                        @endif
                                    </div>
                                </div>
                            @else

                                <div class="col-xl-6">
                                    <div class="border rounded p-3 h-100">
                                        <x-label for="color" value="Khách hàng" />
                                        <input wire:model='customer_name'type="text" placeholder="Tên" class="form-control mb-2">
                                        <input wire:model='customer_email'type="text" placeholder="Email" class="form-control mb-2">
                                        <input wire:model='shipping_phone'type="text" placeholder="Số điện thoại" class="form-control mb-2">

                                        <select required wire:model='shipping_city' wire:change='onChangeCity' class="form-select rounded mb-2" aria-label="Default select example">
                                            <option selected>Tỉnh/Thành phố</option>
                                            @foreach($citiesList as $city)
                                            <option value="{{ $city->province_id }}">{{ $city->province_name }}</option>
                                            @endforeach
                                        </select>

                                        <select required wire:model='shipping_district' wire:change='onChangeDistrict' class="form-select rounded mb-2" aria-label="Default select example">
                                            <option selected>Quận/Huyện</option>

                                            @foreach($districtsList as $district)
                                            <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>

                                        <select required wire:model='shipping_ward' class="form-select rounded mb-2" aria-label="Default select example">
                                            <option selected>Phường/Xã</option>
                                            @foreach($wardsList as $ward)
                                            <option value="{{ $ward->wards_id }}">{{ $ward->wards_name }}</option>
                                            @endforeach
                                        </select>

                                        <input wire:model='shipping_detail'type="text" placeholder="Địa chỉ chi tiết" class="form-control mb-2">
                                    </div>
                                </div>

                            @endif

                            <div class="col-12">
                                <h5 class="my-3">Chi tiết hóa đơn</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Biến thể</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item['product_name'] }}

                                                @if(isset($errorMessages[$index]))
                                                    <div class="text-danger">{{ $errorMessages[$index] }}</div>
                                                @endif
                                                </td>

                                                <td>
                                                    <select wire:model="orderItems.{{ $index }}.selected_variant"
                                                            wire:change="updateVariant({{ $index }}, $event.target.value)"
                                                            class="form-select">
                                                        <option value="">Chọn biến thể</option>
                                                        @foreach ($item['variants'] as $variant)
                                                            <option value="{{ $variant->id }}">
                                                                {{ $variant->size ? 'Size: ' . $variant->size->name : '' }}
                                                                {{ $variant->color ? '- Color: ' . $variant->color->name : '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" min="0" wire:model="orderItems.{{ $index }}.quantity"
                                                           wire:change="updateQuantity({{ $index }}, $event.target.value)"
                                                           class="form-control">
                                                </td>
                                                <td>{{ $item['price'] }}</td>
                                                <td>{{ $item['total'] }}</td>
                                                <td class="text-center">
                                                    <a wire:click.prevent="removeProduct({{ $index }})"
                                                        class="avtar avtar-s btn-link-danger btn-pc-default">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-end">
                                    <p class="fw-bold">Tổng tiền: {{ $final_amount }}</p>
                                </div>

                            </div>
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="text-start">
                                            <hr class="mb-4 mt-0 border-secondary border-opacity-50">
                                            <a class="btn btn-light-primary d-flex align-items-center gap-2"
                                                data-bs-toggle="modal" data-bs-target="#product-add-modal"><i
                                                    class="ti ti-plus"></i> Thêm sản phẩm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-0">
                                    <label class="form-label">Giảm giá</label>
                                    <input type="number" wire:model='discount_amount' wire:change='updateTotalMoney' class="form-control" placeholder="Giảm giá (chỉ nhập số)" min="0">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-0">
                                    <label class="form-label">Ghi chú</label>
                                    <textarea wire:model='note' class="form-control" rows="3" placeholder="Note"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Update Button -->
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Cập nhật hóa đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="product-add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Lựa chọn sản phẩm</h5>
                    </div>

                    <div class="collapse multi-collapse">
                        <h5 class="mb-0">Thêm sản phẩm</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="collapse multi-collapse show" data-bs-toggle="tooltip" title="Thêm">
                            <a href="{{ route('product.create') }}" class="avtar avtar-s btn-link-secondary">
                                <i class="ti ti-plus f-20"></i>
                            </a>
                        </div>
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                            data-bs-toggle="tooltip" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="address-check-block">
                            <div class="mb-3">
                                <x-input type="text" id="search" name="search" wire:model.live="search"
                                    placeholder="Tìm kiếm..." />
                            </div>

                            @foreach ($products as $product)
                                <div class="address-check border rounded p-3">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($product->thumbnail)) {{ asset('storage/Product/' . $product->thumbnail) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="{{ $product->name }}">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $product->name }} <small
                                                    class="text-muted">({{ $product->category->name }})</small></span>

                                            <span class="col-6 text-end">
                                                <span
                                                    class="address-btns d-flex align-items-center justify-content-end">
                                                    <a wire:click.prevent="addProduct({{ $product->id }})"
                                                        class="avtar avtar-s btn-link-danger btn-pc-default"
                                                        data-bs-dismiss="modal">
                                                        <i class="ti ti-plus f-20"></i>
                                                    </a>
                                                </span>
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
                        <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Quay lại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
