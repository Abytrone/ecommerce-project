<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
</head>

<body style="font-family: sans-serif; background-color: #f5f5f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px;">
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="color: #0d9488; font-size: 24px; font-weight: bold; margin: 0;">Anchor.</h1>
        </div>

        <h2 style="font-size: 20px; color: #1c1917; margin-bottom: 20px;">Thank you for your order!</h2>
        <p style="color: #57534e; line-height: 1.6; margin-bottom: 30px;">
            Hi {{ $order->user->name }},<br>
            We've received your order and are getting it ready. We'll let you know when it ships!
        </p>

        <div style="background-color: #fafaf9; border-radius: 12px; padding: 20px; margin-bottom: 30px;">
            <h3 style="font-size: 16px; color: #1c1917; margin-top: 0; margin-bottom: 15px;">Order Summary</h3>
            <p style="color: #78716c; font-size: 14px; margin-bottom: 5px;">Order #:
                <strong>{{ $order->number }}</strong></p>
            <p style="color: #78716c; font-size: 14px; margin-bottom: 0;">Date:
                {{ $order->created_at->format('M d, Y') }}</p>
        </div>

        <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
            @foreach($order->items as $item)
                <tr style="border-bottom: 1px solid #e7e5e4;">
                    <td style="padding: 15px 0; color: #1c1917;">
                        <strong>{{ $item->product->name ?? 'Product' }}</strong>
                        <div style="font-size: 12px; color: #78716c;">Qty: {{ $item->quantity }}</div>
                    </td>
                    <td style="padding: 15px 0; text-align: right; color: #1c1917;">
                        {{ $order->currency }} {{ number_format($item->unit_price * $item->quantity, 2) }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td style="padding-top: 20px; text-align: right; font-weight: bold; color: #1c1917;">Total</td>
                <td style="padding-top: 20px; text-align: right; font-weight: bold; color: #1c1917;">
                    {{ $order->currency }} {{ number_format($order->total_price, 2) }}</td>
            </tr>
        </table>

        <div style="text-align: center;">
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