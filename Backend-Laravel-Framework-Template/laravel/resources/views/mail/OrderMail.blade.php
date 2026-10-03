<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .order-details, .shipping-details, .payment-details, .product-details {
            margin-bottom: 20px;
        }
        .order-details th, .order-details td, .shipping-details th, .shipping-details td,
        .payment-details th, .payment-details td, .product-details th, .product-details td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .order-details th, .shipping-details th, .payment-details th, .product-details th {
            background-color: #f8f8f8;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Order Confirmation</h2>
            <p>Thank you for your order! Here are the details:</p>
        </div>

        <!-- Order Details -->
        <div class="order-details">
            <h3>Order Details</h3>
            <table width="100%">
                <tr>
                    <th>Order Code</th>
                    <td>{{ $order->order_code }}</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>{{ number_format($order->discount_amount, 0, ',', '.') }} VND</td>
                </tr>
                <tr>
                    <th>Final Amount</th>
                    <td>{{ number_format($order->final_amount, 0, ',', '.') }} VND</td>
                </tr>
            </table>
        </div>

        <!-- Shipping Details -->
        <div class="shipping-details">
            <h3>Shipping Details</h3>
            <table width="100%">
                <tr>
                    <th>Receiver Name</th>
                    <td>{{ $order->customer_name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $order->shipping_detail }}, {{ $order->shipping_ward }}, {{ $order->shipping_district }}, {{ $order->shipping_city }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $order->shipping_phone }}</td>
                </tr>
            </table>
        </div>

        <!-- Payment Details -->
        <div class="payment-details">
            <h3>Payment Details</h3>
            <table width="100%">
                <tr>
                    <th>Payment Method</th>
                    <td>{{ $order->paymentMethod->name }}</td>
                </tr>
            </table>
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <h3>Products in this Order</h3>
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

        <div class="footer">
            <p>If you have any questions, feel free to contact us.</p>
            <a href="medicity.top" class="button" style="color: black">Visit Our Store</a>
        </div>
    </div>
</body>
</html>
