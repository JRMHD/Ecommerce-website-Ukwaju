<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Delivered</title>
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

        .success-banner {
            background-color: #f0fff4;
            border: 1px solid #c6f6d5;
            color: #2f855a;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            text-align: center;
            font-weight: 600;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 14px;
        }

        .celebration-emoji {
            font-size: 24px;
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 style="color: #2d3748; margin: 0;">
                Your Order Has Been Delivered!
                <span class="celebration-emoji">🎉</span>
            </h2>
        </div>

        <div class="content">
            <div class="success-banner">
                Order #{{ $order->id }} has been successfully delivered!
            </div>

            <p>Hello {{ $order->user->name }},</p>
            <p>We are pleased to inform you that your order has been successfully delivered to your shipping address.
            </p>

            <div class="order-info">
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
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

            <p style="text-align: center; margin-top: 20px;">
                Thank you for shopping with us!<br>
                If you have any issues with your delivery, please don't hesitate to contact our customer support.
            </p>

            <p style="margin-top: 30px;">
                Best regards,<br>
                <strong>{{ config('app.name') }}</strong>
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p style="margin: 5px 0 0 0; font-size: 12px;">
                This email was sent to confirm your order delivery. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>

</html>
