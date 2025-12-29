<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->number }}</title>
    <style>
        body {
            font-family: sans-serif;
            color: #1c1917;
            font-size: 14px;
        }

        .header {
            margin-bottom: 40px;
            overflow: hidden;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #0d9488;
            float: left;
        }

        .invoice-title {
            float: right;
            font-size: 24px;
            font-weight: bold;
            color: #a8a29e;
        }

        .details {
            margin-bottom: 30px;
        }

        .columns {
            width: 100%;
            margin-bottom: 30px;
        }

        .column {
            width: 50%;
            float: left;
        }

        .label {
            color: #78716c;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .value {
            font-weight: bold;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th {
            text-align: left;
            padding: 10px;
            background-color: #f5f5f4;
            color: #44403c;
            border-bottom: 2px solid #e7e5e4;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e7e5e4;
        }

        .totals {
            float: right;
            width: 250px;
        }

        .total-row {
            overflow: hidden;
            border-bottom: 1px solid #e7e5e4;
            padding: 10px 0;
        }

        .total-label {
            float: left;
            color: #78716c;
        }

        .total-value {
            float: right;
            font-weight: bold;
        }

        .grand-total {
            border-top: 2px solid #1c1917;
            border-bottom: none;
            padding: 15px 0;
            margin-top: 10px;
            font-size: 18px;
            color: #0d9488;
        }

        .footer {
            margin-top: 50px;
            border-top: 1px solid #e7e5e4;
            padding-top: 20px;
            text-align: center;
            color: #a8a29e;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="company-name">Anchor.</div>
        <div class="invoice-title">INVOICE</div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="label">Bill To:</div>
            <div class="value">
                {{ $order->user->name }}<br>
                {{ $order->user->email }}
            </div>
        </div>
        <div class="column" style="text-align: right;">
            <div class="label">Invoice Number</div>
            <div class="value">INV-{{ $order->number }}</div>
            <div class="label">Order Date</div>
            <div class="value">{{ $order->created_at->format('M d, Y') }}</div>
        </div>
    </div>

    <div style="clear: both;"></div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th style="text-align: right;">Price</th>
                <th style="text-align: right;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Product' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td style="text-align: right;">{{ number_format($item->unit_price, 2) }}</td>
                    <td style="text-align: right;">{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <div class="total-row">
            <div class="total-label">Subtotal</div>
            <div class="total-value">{{ $order->currency }}
                {{ number_format($order->total_price - $order->shipping_price, 2) }}</div>
        </div>
        <div class="total-row">
            <div class="total-label">Shipping</div>
            <div class="total-value">{{ $order->currency }} {{ number_format($order->shipping_price, 2) }}</div>
        </div>
        <div class="total-row grand-total">
            <div class="total-label" style="color: #0d9488;">Total</div>
            <div class="total-value">{{ $order->currency }} {{ number_format($order->total_price, 2) }}</div>
        </div>
    </div>

    <div style="clear: both;"></div>

    <div class="footer">
        Thank you for your business!
    </div>
</body>

</html>