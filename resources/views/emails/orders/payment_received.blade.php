<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Payment Received</title>
</head>

<body style="font-family: sans-serif; background-color: #f5f5f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px;">
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="color: #0d9488; font-size: 24px; font-weight: bold; margin: 0;">Anchor.</h1>
        </div>

        <h2 style="font-size: 20px; color: #1c1917; margin-bottom: 20px;">Payment Received!</h2>
        <p style="color: #57534e; line-height: 1.6; margin-bottom: 30px;">
            Hi {{ $order->user->name }},<br>
            We've received your payment of <strong>{{ $order->currency }}
                {{ number_format($order->total_price, 2) }}</strong> for order <strong>#{{ $order->number }}</strong>.
        </p>

        <div
            style="background-color: #f0fdf4; border-radius: 12px; padding: 20px; margin-bottom: 30px; border: 1px solid #bbf7d0;">
            <h3 style="font-size: 16px; color: #15803d; margin-top: 0; margin-bottom: 5px;">Payment Successful</h3>
            <p style="color: #166534; font-size: 14px; margin: 0;">Your order is now being processed.</p>
        </div>

        <div style="text-align: center; margin-bottom: 30px;">
            <a href="{{ route('dashboard.orders.show', $order) }}"
                style="display: inline-block; background-color: #0d9488; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: bold;">View
                Order</a>
        </div>

        <div style="text-align: center; margin-top: 40px; color: #a8a29e; font-size: 12px;">
            &copy; {{ date('Y') }} Anchor Stationery. All rights reserved.
        </div>
    </div>
</body>

</html>