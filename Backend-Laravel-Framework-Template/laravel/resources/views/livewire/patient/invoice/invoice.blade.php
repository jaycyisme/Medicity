<!-- Page Content -->
<div class="content">
    <div class="container mt-5">
        <div class="row" style="margin-top: 100px;">
            <!-- Profile Sidebar -->
            @include('layouts.app.patient-sidebar')
            <!-- /Profile Sidebar -->

            <div class="col-lg-8 col-xl-9">
                <div class="dashboard-header">
                    <h3>Invoices</h3>
                </div>

                <!-- Search Field -->
                <div class="search-header">
                    <div class="search-field">
                        <input type="text" id="search" name="search" wire:model.live="search" class="form-control" placeholder="Search">
                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </div>

                <div class="custom-table">
                    <div class="table-responsive">
                        <table class="table table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                    <th>Total Money</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal" data-bs-target="#invoice_view" wire:click="loadOrderDetails({{ $order->id }})">#{{ $order->order_code }}</a></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-3" src="{{ asset('storage/Product/' . $order->orderItems->first()->productVariant->image_url) }}" alt="User Image">
                                                </a>
                                                <a>{{ $order->orderItems->first()->productVariant->product->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>${{ number_format($order->final_amount, 2) }}</td>
                                        <td>{{ $order->orderStatus->name }}</td>
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view" wire:click="loadOrderDetails({{ $order->id }})">
                                                    <i class="fa-solid fa-link"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination dashboard-pagination">
                    {{ $orders->links() }}
                </div>
                <!-- /Pagination -->
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Modal to View Invoice -->
    <div wire:ignore.self class="modal fade custom-modals" id="invoice_view" tabindex="-1" aria-labelledby="invoice_viewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Invoice</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>{{ $orderDetails['created_at'] ?? 'N/A' }}</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i class="isax isax-printer"></i></a></li>
                            <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content mb-0">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="assets/img/logo.svg" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        Invoice No: <span> {{ $orderDetails['order_code'] ?? 'N/A' }}</span><br>
                                        Issued: <span>{{ $orderDetails['created_at'] ?? 'N/A' }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing From</h6>
                                        <p class="invoice-details invoice-details-two">
                                            JayCy Doo <br>
                                            806 Twin Willow Lane, <br>
                                            Ha Noi, Viet Nam <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing To</h6>
                                        <p class="invoice-details invoice-details-two">
                                            {{ $orderDetails['customer_name'] ?? 'N/A' }} <br>
                                            {{ $orderDetails['shipping_address'] ?? 'N/A' }}<br>
                                            Phone: {{ $orderDetails['shipping_phone'] ?? 'N/A' }}<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Payment Method</h6>
                                        <p class="invoice-details">
                                            {{ $orderDetails['payment_method'] ?? 'N/A' }} <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Details Table -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Invoice Details</h6>
                                    <div class="invoice-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderDetails['items'] ?? [] as $item)
                                                        <tr>
                                                            <td>{{ $item['description'] }}</td>
                                                            <td>{{ $item['quantity'] }}</td>
                                                            <td>${{ $item['total'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>${{ $orderDetails['subtotal'] ?? 0 }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-{{ $orderDetails['discount'] ?? '0%' }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>${{ $orderDetails['final_amount'] ?? 0 }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
