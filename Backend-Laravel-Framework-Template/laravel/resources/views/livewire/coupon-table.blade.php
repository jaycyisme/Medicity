<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Coupon Type</th>
                <th>Value</th>
                <th>Usage Limit</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr>
                <td class="align-middle">{{ $coupon->title }}</td>
                <td class="align-middle">
                    @if ($coupon->couponType->name === 'fixed')
                        Giảm giá trị đơn hàng
                    @elseif ($coupon->couponType->name === 'percentage')
                        Giảm phần trăm giá trị đơn hàng
                    @else
                        {{ $coupon->couponType->name }}
                    @endif
                </td>
                <td class="align-middle">
                    @if ($coupon->couponType->name === 'fixed')
                        {{ number_format($coupon->value, 0, ',', '.') }}đ
                    @elseif ($coupon->couponType->name === 'percentage')
                        {{ number_format($coupon->value, 0, ',', '.') }}%
                    @else
                        {{ $coupon->couponType->name }}
                    @endif
                </td>
                <td class="align-middle">{{ $coupon->usage_limit }}</td>
                <td class="align-middle">{{ date('d/m/Y H:i:s', strtotime($coupon->start_time)) }} - {{ date('d/m/Y H:i:s', strtotime($coupon->end_time)) }}</td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('coupon-list') --}}
                            <div class="p-1 text-center">
                                <a class="btn btn-sm btn-warning wid-50" href="{{ route('coupon.show', $coupon->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            </div>
                        {{-- @endcan --}}
                        {{-- @can('coupon-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('coupon.edit', $coupon->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('coupon-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('coupon.destroy', $coupon->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-danger wid-50" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $coupons->onEachSide(2)->links() !!}
</div>
