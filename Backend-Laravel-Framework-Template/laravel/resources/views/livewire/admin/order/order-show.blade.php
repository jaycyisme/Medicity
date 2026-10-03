<div>
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <div class="row g-3">
                <div class="col-sm-6 col-xl-3">
                    <div class="mb-0">
                        <label class="form-label">Phương thức thanh toán</label>
                        <input class="form-control" value="{{$order->paymentMethod->name}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mb-0">
                        <label class="form-label">Trạng thái thanh toán</label>
                        <input class="form-control" value="{{$order->paymentStatus->name}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mb-0">
                        <label class="form-label">Trạng thái</label>
                        <input class="form-control" value="{{$order->orderStatus->name}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="mb-0">
                        <label class="form-label">Loại</label>
                        <input class="form-control" value="{{$order->orderType->name}}" disabled>
                    </div>
                </div>

                <div class="col-12">
                <div class="row align-items-center g-3">
                    <div class="col-sm-6">
                    <p class="mb-0">{{ $order ->order_code }}</p>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                    <h6>Ngày đặt hàng <span class="text-muted f-w-400">{{ $order ->created_at }}</span></h6>
                    {{-- <h6>Ngày nhận hàng <span class="text-muted f-w-400">{{ $order ->updated_at }}</span></h6> --}}
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="border rounded p-3">
                    <h6 class="mb-0">Từ:</h6>
                    <h5>Medcity</h5>
                    <p class="mb-0">East Asia University of Technology</p>
                    <p class="mb-0">0867 551 656</p>
                    <p class="mb-0">quoctuan06102003@gmail.com</p>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="border rounded p-3">
                    <h6 class="mb-0">Tới:</h6>
                    <h5>{{ $order->customer_name ?? 'Không có' }}</h5>
                    <p class="mb-0">Địa chỉ: {{ $order->shipping_detail ?? 'Không có'  }}</p>
                    <p class="mb-0">Số điện thoại: {{ $order->shipping_phone ?? 'Không có'  }}</p>
                    <p class="mb-0">Email: {{ $order->customer_address ?? 'Không có'  }}</p>
                </div>
                </div>
                <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th class="text-end">Số lượng</th>
                        <th class="text-end">Giá</th>
                        <th class="text-end">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $index = 1; @endphp
                        @foreach ($orderItems as $orderItem)
                            <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $orderItem->productVariant->product->name }} (@if ($orderItem->productVariant->size_id && $orderItem->productVariant->color_id)
                                    Kích thước: {{ $orderItem->productVariant->size->name }}, Màu: {{ $orderItem->productVariant->color->name }}
                                @elseif ($orderItem->productVariant->size_id)
                                    Kích thước: {{ $orderItem->productVariant->size->name }}
                                @elseif ($orderItem->productVariant->color_id)
                                    Màu: {{ $orderItem->productVariant->color->name }}
                                @endif)</td>
                            <td class="text-end">{{ $orderItem->quantity }}</td>
                            @if ($orderItem->productVariant->is_sale)
                                <td class="text-end">{{ $orderItem->productVariant->sale_price }}</td>
                            @else
                                <td class="text-end">{{ $orderItem->productVariant->price }}</td>
                            @endif
                            @if ($orderItem->productVariant->is_sale)
                                <td class="text-end">{{ $orderItem->quantity * $orderItem->productVariant->sale_price }}</td>
                            @else
                            <td class="text-end">{{ $orderItem->quantity * $orderItem->productVariant->price }}</td>
                            @endif
                            </tr>
                            @php $index++; @endphp
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="text-start">
                    <hr class="mb-2 mt-1 border-secondary border-opacity-50">
                </div>
                </div>
                <div class="col-12">
                <div class="invoice-total ms-auto">
                    <div class="row">
                    {{-- <div class="col-6"> <p class="text-muted mb-1 text-start">Giá chưa giảm :</p></div>
                    <div class="col-6"> <p class="mb-1 text-end">{{format_price($bill->total_money + $bill->discount)}}</p></div>
                    <div class="col-6"> <p class="text-muted mb-1 text-start">Giảm giá :</p></div>
                    <div class="col-6"> <p class="mb-1 text-end text-success">{{format_price($bill->discount)}}</p></div>
                    <div class="col-6"> <p class="text-muted mb-1 text-start">Taxes :</p></div>
                    <div class="col-6"> <p class="mb-1 text-end">$5.000</p></div> --}}
                    <div class="col-6"> <p class="f-w-600 mb-1 text-start">Giảm giá :</p></div>
                    <div class="col-6"> <p class="f-w-600 mb-1 text-end">{{ $order->discount_amount }}</p></div>
                    <div class="col-6"> <p class="f-w-600 mb-1 text-start">Tổng tiền :</p></div>
                    <div class="col-6"> <p class="f-w-600 mb-1 text-end">{{ $order->final_amount }}</p></div>
                    </div>
                </div>
                </div>
                <div class="col-12">
                    <div class="mb-0">
                        <label class="form-label">Ghi chú</label>
                        <textarea disabled class="form-control" rows="3" placeholder="Note">{{ $order->note }}</textarea>
                    </div>
                </div>
                {{-- <div class="col-12 text-end d-print-none">
                    <a class="btn btn-outline-secondary btn-print-invoice" href="{{ route('physical-invoice.print', $order->id) }}" target="_blank">In Hóa Đơn</a>
                </div> --}}
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
