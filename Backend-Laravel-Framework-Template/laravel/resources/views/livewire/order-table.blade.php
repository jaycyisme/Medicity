<div class="table-responsive">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ul wire:ignore class="nav nav-tabs invoice-tab border-bottom mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-1-pane" type="button" role="tab"
                            aria-controls="analytics-tab-1-pane" aria-selected="true">
                            <span class="d-flex align-items-center gap-2">All <span
                                    class="avtar rounded-circle bg-light-primary">{{ $totalOrdersCount }}</span></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-2-pane" type="button" role="tab"
                            aria-controls="analytics-tab-2-pane" aria-selected="false">
                            <span class="d-flex align-items-center gap-2">Waiting <span
                                    class="avtar rounded-circle bg-light-success">{{ $pendingOrdersCount }}</span></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="analytics-tab-3" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-3-pane" type="button" role="tab"
                            aria-controls="analytics-tab-3-pane" aria-selected="false">
                            <span class="d-flex align-items-center gap-2">Processing <span
                                    class="avtar rounded-circle bg-light-success">{{ $processingOrdersCount }}</span></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="analytics-tab-4" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-4-pane" type="button" role="tab"
                            aria-controls="analytics-tab-4-pane" aria-selected="false">
                            <span class="d-flex align-items-center gap-2">Deliveried <span
                                    class="avtar rounded-circle bg-light-warning">{{ $shippedOrdersCount }}</span></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="analytics-tab-5" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-5-pane" type="button" role="tab"
                            aria-controls="analytics-tab-5-pane" aria-selected="false">
                            <span class="d-flex align-items-center gap-2">Completed <span
                                    class="avtar rounded-circle bg-light-warning">{{ $deliveredOrdersCount }}</span></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="analytics-tab-6" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-6-pane" type="button" role="tab"
                            aria-controls="analytics-tab-6-pane" aria-selected="false">
                            <span class="d-flex align-items-center gap-2">Cancled <span
                                    class="avtar rounded-circle bg-light-danger">{{ $cancelledOrdersCount }}</span></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="analytics-tab-7" data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-7-pane" type="button" role="tab"
                            aria-controls="analytics-tab-7-pane" aria-selected="false">
                            <span class="d-flex align-items-center gap-2">Refunded <span
                                    class="avtar rounded-circle bg-light-danger">{{ $refundedOrdersCount }}</span></span>
                        </button>
                    </li>
                </ul>

                <div class="mb-3">
                    <x-input type="text" id="search" name="search" wire:model.live="search"
                        placeholder="Tìm kiếm..." />
                </div>
                <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-1" tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="pc-dt-simple-1">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Pharmacist</th>
                                        <th>Date</th>
                                        <th>Order Code</th>
                                        <th>Total Money</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersAll as $index => $order)
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployee({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <div class="p-1 text-center">
                                                        <a class="btn btn-sm btn-light wid-50" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="In"
                                                            href=""
                                                            target="_blank">
                                                            <i class="ph-duotone ph-printer"></i>
                                                        </a>
                                                    </div>
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                        "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                        "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form method="POST" action="{{ route('order.destroy', $order->id) }}">
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

                            {!! $ordersAll->onEachSide(2)->links() !!}
                        </div>
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-1" tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="pc-dt-simple-1">
                                <thead>
                                    <tr>
                                        <th>Khách hàng</th>
                                        <th>Nhân viên</th>
                                        <th>Ngày tạo</th>
                                        <th>Mã giao dịch</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersPending as $order)
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployeeOfConfirmorder({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <div class="p-1 text-center">
                                                        <a class="btn btn-sm btn-light wid-50" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="In"
                                                            href=""
                                                            target="_blank">
                                                            <i class="ph-duotone ph-printer"></i>
                                                        </a>
                                                    </div>
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                        "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                        "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form wire:click.prevent='delete({{ $order->id }})'>
                                                                <button class="btn btn-sm btn-danger wid-50"
                                                                    type="submit"><i class="fas fa-times"></i></button>
                                                            </form>
                                                        </div>
                                                    {{-- @endcan --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {!! $ordersPending->onEachSide(2)->links() !!}
                        </div>
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-2" tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="pc-dt-simple-2">
                                <thead>
                                    <tr>
                                        <th>Khách hàng</th>
                                        <th>Nhân viên</th>
                                        <th>Ngày tạo</th>
                                        <th>Mã giao dịch</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th class="text-end">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordersProcessing as $order)
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!"
                                                                class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!"
                                                                class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployeeOfPaidorder({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                            "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                            "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form wire:click.prevent='delete({{ $order->id }})'>
                                                                <button class="btn btn-sm btn-danger wid-50"
                                                                    type="submit"><i class="fas fa-times"></i></button>
                                                            </form>
                                                        </div>
                                                    {{-- @endcan --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {!! $ordersProcessing->onEachSide(2)->links() !!}
                        </div>
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="analytics-tab-4-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-3" tabindex="0">
                        <table class="table table-hover" id="pc-dt-simple-2">
                            <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Nhân viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã giao dịch</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersShipped as $order)
                                    <div class="table-responsive">
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!"
                                                                class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!"
                                                                class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployeeOfUnpaidorder({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                                "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                                "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form wire:click.prevent='delete({{ $order->id }})'>
                                                                <button class="btn btn-sm btn-danger wid-50"
                                                                    type="submit"><i class="fas fa-times"></i></button>
                                                            </form>
                                                        </div>
                                                    {{-- @endcan --}}
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $ordersShipped->onEachSide(2)->links() !!}
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="analytics-tab-5-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-5" tabindex="0">
                        <table class="table table-hover" id="pc-dt-simple-2">
                            <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Nhân viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã giao dịch</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersDelivered as $order)
                                    <div class="table-responsive">
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployeeOfWaitingorder({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                                "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                                "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form wire:click.prevent='delete({{ $order->id }})'>
                                                                <button class="btn btn-sm btn-danger wid-50" type="submit"><i
                                                                        class="fas fa-times"></i></button>
                                                            </form>
                                                        </div>
                                                    {{-- @endcan --}}
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $ordersDelivered->onEachSide(2)->links() !!}
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="analytics-tab-6-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-4" tabindex="0">
                        <table class="table table-hover" id="pc-dt-simple-2">
                            <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Nhân viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã giao dịch</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersCancelled as $order)
                                    <div class="table-responsive">
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployeeOfCancelledorder({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                                "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                                "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form wire:click.prevent='delete({{ $order->id }})'>
                                                                <button class="btn btn-sm btn-danger wid-50" type="submit"><i
                                                                        class="fas fa-times"></i></button>
                                                            </form>
                                                        </div>
                                                    {{-- @endcan --}}
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $ordersCancelled->onEachSide(2)->links() !!}
                    </div>
                    <div wire:ignore.self class="tab-pane fade" id="analytics-tab-7-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-4" tabindex="0">
                        <table class="table table-hover" id="pc-dt-simple-2">
                            <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Nhân viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã giao dịch</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersRefunded as $order)
                                    <div class="table-responsive">
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-auto pe-0">
                                                        <img src="@if (isset($order->user->profile_photo_path)) {{ asset('storage/' . $order->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                            alt="chillnfree" class="wid-40 hei-40 rounded-circle" />
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-1"><span
                                                                class="text-truncate w-100">{{ $order->customer_name }}</span>
                                                        </h6>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_email }}</span></a>
                                                        </p>
                                                        <p class="f-12 mb-0"><a href="#!" class="text-muted"><span
                                                                    class="text-truncate w-100">{{ $order->customer_phone }}</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <x-input wire:change='updateEmployeeOfCancelledorder({{$order->id}}, $event.target.value)' type="text" class="mb-3" value="{{ $order->employee }}" />
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->final_amount }}</td>
                                            <td><span class="badge bg-light-info">{{$order->orderStatus->name}}</span></td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    {{-- @can('order-list') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-warning wid-50"
                                                                href=
                                                "{{ route('order.show', $order->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Xem">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-edit') --}}
                                                        <div class="p-1 text-center">
                                                            <a class="btn btn-sm btn-info wid-50"
                                                                href=
                                                "{{ route('order.edit', $order->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    {{-- @endcan --}}
                                                    {{-- @can('order-delete') --}}
                                                        <div class="p-1 text-center">
                                                            <form wire:click.prevent='delete({{ $order->id }})'>
                                                                <button class="btn btn-sm btn-danger wid-50" type="submit"><i
                                                                        class="fas fa-times"></i></button>
                                                            </form>
                                                        </div>
                                                    {{-- @endcan --}}
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $ordersRefunded->onEachSide(2)->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mb-3">
        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#trash">
            <i class="ph-duotone ph-duotone ph-trash"></i>
        </button>
    </div>

    <div class="modal fade" id="trash" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Hóa đơn</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                            data-bs-toggle="tooltip" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="address-check-block">

                            @foreach ($orders_deleted as $bill)
                                <div class="address-check border rounded p-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($bill->user->profile_photo_path)) {{ asset('storage/User/' . $bill->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="chillnfree">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $bill->customer_name }}</span>
                                            <span class="h6 mb-0 d-block">Mã giao dịch:
                                                {{ $bill->order_code }}</span>
                                            <span class="h6 mb-0 d-block">Tổng tiền:
                                                {{ $bill->final_amount }}</span>
                                        </label>
                                    </div>

                                    <div class="action">
                                        <button wire:click.prevent='restore({{ $bill->id }})'
                                            class="btn btn-sm btn-info">
                                            <i class="ph-duotone ph-rewind"></i>
                                        </button>
                                        <button wire:click.prevent='forceDelete({{ $bill->id }})'
                                            class="btn btn-sm btn-danger">
                                            <i class="ph-duotone ph-trash-simple"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between collapse multi-collapse show">
                    <div class="flex-grow-1 text-end">
                        <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
