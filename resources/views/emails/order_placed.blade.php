<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #2d3748;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .content {
            padding: 20px 0;
        }

        .order-info {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
        }

        .items-list {
            list-style: none;
            padding: 0;
        }

        .items-list li {
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .items-list li:last-child {
            border-bottom: none;
        }

        .shipping-address {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 14px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 9999px;
            font-size: 14px;
            font-weight: 600;
            background-color: #ebf4ff;
            color: #4299e1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 style="color: #2d3748; margin: 0;">Thank you for your order, {{ $order->user->name }}!</h2>
        </div>

        <div class="content">
            <p>Your order has been placed successfully. Here are your order details:</p>

            <div class="order-info">
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                <p>
                    <strong>Status:</strong>
                    <span class="status-badge">{{ ucfirst($order->status) }}</span>
                </p>
            </div>

            <h3 style="color: #2d3748;">Ordered Items:</h3>
            <ul class="items-list">
                @foreach ($order->items as $item)
                    <li>
                        <strong>{{ $item->product_name }}</strong><br>
                        ${{ number_format($item->product_price, 2) }} x {{ $item->quantity }}
                    </li>
                @endforeach
            </ul>

            <h3 style="color: #2d3748;">Shipping Address:</h3>
            <div class="shipping-address">
                <p style="margin: 0;">{{ json_decode($order->shipping_address)->address }}</p>
            </div>

            <p style="text-align: center; margin-top: 20px;">
                We will notify you once your order is shipped.<br>
                Thank you for shopping with us!
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p style="margin: 5px 0 0 0; font-size: 12px;">
                This email was sent to confirm your order. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>

</html>
