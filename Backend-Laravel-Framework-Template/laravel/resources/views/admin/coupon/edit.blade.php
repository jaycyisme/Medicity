<x-app-layout>
    <x-slot name="pageHeader">
        Quản lý mã giảm giá
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Chỉnh sửa mã giảm giá ID: {{ $coupon->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('coupon.index') }}">
                    Quay lại
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('coupon.edit', $coupon->id) }}">
                    @csrf
                    <div class="mb-5">
                        <x-label for="title" value="Title" />
                        <x-input name='title' value="{{ $coupon->title }}" type="text" class="mb-3" id="title" placeholder="Nhập tiêu đề..." required />
                        <x-input-error for="title" />

                        <x-label for="code" value="Mã giảm giá" />
                        <x-input name='code' value="{{ $coupon->code }}" type="text" class="mb-3" id="code" placeholder="Nhập mã giảm giá..." required />
                        <x-input-error for="code" />

                        <div class="mb-3">
                            <x-label for="coupon_type" value="Loại giảm giá" />
                            <select name="couponTypeId" class="form-select" id="coupon_type">
                                @foreach ($couponTypes as $couponType)
                                    <option value="{{ $couponType->id }}" {{ $coupon->coupon_type_id == $couponType->id ? 'selected' : '' }}>
                                        @if ($couponType->name === 'fixed')
                                            Giảm giá trị đơn hàng
                                        @elseif ($couponType->name === 'percentage')
                                            Giảm phần trăm giá trị đơn hàng
                                        @else
                                            {{ $couponType->name }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <x-label for="value" value="Giá trị giảm giá" />
                        <x-input name='value' value="{{ $coupon->value }}" type="text" class="mb-3" id="value" placeholder="Nhập giá trị giảm..." required />
                        <x-input-error for="value" />

                        <x-label for="min_order_mount" value="Giá trị đơn hàng tối thiểu" />
                        <x-input name='min_order_mount' value="{{ $coupon->min_order_mount }}" type="text" class="mb-3" id="min_order_mount" placeholder="Nhập giá trị đơn hàng tối thiểu..." step='0.01' required />
                        <x-input-error for="min_order_mount" />

                        <x-label for="max_discount_amount" value="Số tiền giảm tối đa" />
                        <x-input name='max_discount_amount' value="{{ $coupon->max_discount_amount }}" type="text" class="mb-3" id="max_discount_amount" placeholder="Nhập giá trị đơn hàng tối thiểu..." step='0.01' required />
                        <x-input-error for="max_discount_amount" />

                        <x-label for="usage_limit" value="Giới hạn số lần sử dụng" />
                        <x-input name="usage_limit" value="{{ $coupon->usage_limit }}" type="number" class="mb-3" id="usage_limit" placeholder="Nhập số lần sử dụng..." required />
                        <x-input-error for="usage_limit" />

                        <div class="d-flex gap-3">
                            <div>
                                <x-label for="start_time" value="Thời gian bắt đầu" />
                                <x-input name="start_time" value="{{ $coupon->start_time }}" type="datetime-local" class="mb-3" id="start_time" required />
                                <x-input-error for="start_time" />
                            </div>

                            <div>
                                <x-label for="end_time" value="Thời gian kết thúc" />
                                <x-input name="end_time" value="{{ $coupon->end_time }}" type="datetime-local" class="mb-3" id="end_time" required />
                                <x-input-error for="end_time" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-button class="btn-primary">Chỉnh sửa mã giảm giá</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
