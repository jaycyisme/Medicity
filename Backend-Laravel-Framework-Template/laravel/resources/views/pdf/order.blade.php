<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details th, .order-details td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .order-details th {
            background-color: #f8f8f8;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
        .note-section p {
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Order Invoice</h2>
            <p>Order Code: {{ $order->order_code }}</p>
        </div>

        <!-- Order Details -->
        <div class="order-details">
            <h3>Order Details</h3>
            <table width="100%">
                <tr>
                    <th>Customer Name</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $order->user->email }}</td>
                </tr>
                <tr>
                    <th>Order Status</th>
                    <td>{{ $order->orderStatus->name }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                </tr>
            </table>
        </div>

        <!-- Order Items -->
        <div class="order-details">
            <h3>Order Items</h3>
            <table width="100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->productVariant->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($item->total, 0, ',', '.') }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($order->note)
        <div class="note-section">
            <h3>Note</h3>
            <p>{{ $order->note }}</p>
        </div>
        @endif

        <div class="footer">
            <p>Thank you for your order!</p>
        </div>
    </div>
</body>
</html>
