<x-app-layout>
    <div class="bg-stone-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('dashboard.orders') }}"
                    class="flex items-center gap-2 text-stone-500 hover:text-teal-600 transition-colors font-medium">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Orders
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Order Details -->
                <div class="lg:col-span-3 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
                        <div class="p-8 border-b border-stone-100 flex flex-wrap justify-between items-center gap-4">
                            <div>
                                <h1 class="text-2xl font-black text-stone-900">Order #{{ $order->number }}</h1>
                                <p class="text-stone-500 text-sm mt-1">Placed on
                                    {{ $order->created_at->format('F d, Y \a\t h:i A') }}
                                </p>
                            </div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('orders.invoice', $order) }}"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg border border-stone-200 text-stone-600 hover:bg-stone-50 hover:text-stone-900 transition-colors text-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download Invoice
                                </a>
                                <span class="px-4 py-2 rounded-full text-sm font-bold
                                    @if($order->status == 'completed' || $order->status == 'delivered') bg-green-100 text-green-700
                                    @elseif($order->status == 'processing') bg-blue-100 text-blue-700
                                    @elseif($order->status == 'shipped') bg-purple-100 text-purple-700
                                    @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                                    @else bg-yellow-100 text-yellow-700 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8">
                            <h2 class="font-bold text-lg mb-6">Items</h2>
                            <div class="space-y-6">
                                @foreach($order->items as $item)
                                    <div class="flex gap-6">
                                        <div class="w-20 h-24 bg-stone-100 rounded-lg overflow-hidden flex-shrink-0">
                                            @if($item->product && $item->product->images)
                                                <img src="{{ Storage::url($item->product->images[0]) }}"
                                                    class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h3 class="font-bold text-stone-900">
                                                        {{ $item->product->name ?? 'Product' }}
                                                    </h3>
                                                    <p class="text-stone-500 text-sm">Qty: {{ $item->quantity }}</p>
                                                </div>
                                                <p class="font-bold text-stone-900">{{ $order->currency }}
                                                    {{ number_format($item->unit_price * $item->quantity, 2) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-stone-50 p-8 border-t border-stone-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <h3 class="font-bold text-stone-900 mb-4">Payment & Transactions</h3>
                                    @if($order->transactions->count() > 0)
                                        <div class="space-y-3">
                                            @foreach($order->transactions as $transaction)
                                                <div class="bg-white border border-stone-200 rounded-xl p-4 flex items-center justify-between">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-10 h-10 rounded-full flex items-center justify-center
                                                            @if($transaction->payment_method == 'paystack') bg-blue-50 text-blue-600
                                                            @elseif($transaction->payment_method == 'cash_on_delivery') bg-amber-50 text-amber-600
                                                            @else bg-stone-50 text-stone-600 @endif">
                                                            @if($transaction->payment_method == 'paystack')
                                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                                </svg>
                                                            @elseif($transaction->payment_method == 'cash_on_delivery')
                                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                </svg>
                                                            @else
                                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <p class="font-bold text-stone-900 text-sm">
                                                                @if($transaction->payment_method == 'paystack') Paystack Online
                                                                @elseif($transaction->payment_method == 'cash_on_delivery') Cash on Delivery
                                                                @else {{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}
                                                                @endif
                                                            </p>
                                                            <p class="text-xs text-stone-500">{{ $transaction->created_at->format('M d, Y h:i A') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <p class="font-bold text-stone-900 text-sm">{{ $order->currency }} {{ number_format($transaction->amount, 2) }}</p>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold
                                                        @if($transaction->status == 'success') bg-green-100 text-green-700
                                                        @elseif($transaction->status == 'pending') bg-amber-100 text-amber-700
                                                        @elseif($transaction->status == 'failed') bg-red-100 text-red-700
                                                        @else bg-stone-100 text-stone-700 @endif">
                                                        {{ ucfirst($transaction->status) }}
                                                    </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-stone-500 text-sm">No payment records found.</p>
                                    @endif
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between text-stone-600">
                                        <span>Subtotal</span>
                                        <span>{{ $order->currency }}
                                            {{ number_format($order->total_price - $order->shipping_price, 2) }}</span>
                                    </div>
                                    <div class="flex justify-between text-stone-600">
                                        <span>Shipping</span>
                                        <span>{{ $order->currency }} {{ number_format($order->shipping_price, 2) }}</span>
                                    </div>
                                    <div
                                        class="flex justify-between font-black text-xl text-stone-900 pt-4 border-t border-stone-200">
                                        <span>Total</span>
                                        <span>{{ $order->currency }} {{ number_format($order->total_price, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Shipping Address functionality currently in Order model or separate Address model?
                         Assuming user address or shipping info is stored. Checking Order model earlier, didn't see explicit address relation,
                         but usually it's there. For now, I'll stick to basic order info until address structure is confirmed.
                         Wait, I saw Address.php in models list.
                         Let's assume there might be an address relation or fields.
                         For now, I'll display basic Notes if any. -->


                    @if($order->notes)
                        <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6">
                            <h3 class="font-bold text-stone-900 mb-4">Order Notes</h3>
                            <p class="text-stone-600 text-sm">{{ $order->notes }}</p>
                        </div>
                    @endif

                    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6">
                        <h3 class="font-bold text-stone-900 mb-4">Need Help?</h3>
                        <p class="text-stone-500 text-sm mb-4">If you have any questions about this order, please
                            contact our support team.</p>
                        <a href="{{ route('contact') }}"
                            class="block w-full text-center px-4 py-2 bg-stone-100 text-stone-900 font-bold rounded-lg hover:bg-stone-200 transition-colors">Contact
                            Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
