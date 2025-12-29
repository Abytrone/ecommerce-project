<x-app-layout>
    <div class="min-h-screen bg-stone-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Back Button -->
            <a href="{{ route('track') }}"
                class="inline-flex items-center text-stone-500 hover:text-teal-600 font-bold transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Track Another Order
            </a>

            <!-- Status Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-stone-100 overflow-hidden">
                <div class="relative bg-stone-900 p-8 md:p-12 overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl -mr-16 -mt-16">
                    </div>
                    <div
                        class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div>
                            <span
                                class="inline-block py-1 px-3 rounded-full bg-teal-900/50 border border-teal-700/50 text-teal-300 text-xs font-bold uppercase tracking-widest mb-3">
                                {{ $order->status }}
                            </span>
                            <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">Order
                                #{{ $order->number }}</h1>
                            <p class="text-stone-400 mt-2">Placed on {{ $order->created_at->format('F d, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-stone-400 text-sm font-bold uppercase tracking-wider mb-1">Total Amount</p>
                            <p class="text-3xl font-black text-white">{{ $order->currency }}
                                {{ number_format($order->total_price, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar (Visual) -->
                <div class="p-8 md:p-12">
                    <div class="relative">
                        <div class="absolute left-0 top-1/2 -mt-0.5 w-full h-1 bg-stone-100 rounded-full"></div>
                        <div class="relative z-10 flex justify-between">
                            <!-- Pending -->
                            <div class="flex flex-col items-center gap-2 group">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center border-4 transition-all duration-300
                                    {{ in_array($order->status, ['pending', 'processing', 'shipped', 'delivered', 'completed']) ? 'bg-teal-600 border-teal-100 text-white' : 'bg-white border-stone-200 text-stone-300' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span
                                    class="text-xs font-bold uppercase tracking-wider {{ in_array($order->status, ['pending', 'processing', 'shipped', 'delivered', 'completed']) ? 'text-teal-600' : 'text-stone-400' }}">Placed</span>
                            </div>

                            <!-- Processing -->
                            <div class="flex flex-col items-center gap-2">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center border-4 transition-all duration-300
                                    {{ in_array($order->status, ['processing', 'shipped', 'delivered', 'completed']) ? 'bg-teal-600 border-teal-100 text-white' : 'bg-white border-stone-200 text-stone-300' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                                <span
                                    class="text-xs font-bold uppercase tracking-wider {{ in_array($order->status, ['processing', 'shipped', 'delivered', 'completed']) ? 'text-teal-600' : 'text-stone-400' }}">Processing</span>
                            </div>

                            <!-- Shipped -->
                            <div class="flex flex-col items-center gap-2">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center border-4 transition-all duration-300
                                    {{ in_array($order->status, ['shipped', 'delivered', 'completed']) ? 'bg-teal-600 border-teal-100 text-white' : 'bg-white border-stone-200 text-stone-300' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                                <span
                                    class="text-xs font-bold uppercase tracking-wider {{ in_array($order->status, ['shipped', 'delivered', 'completed']) ? 'text-teal-600' : 'text-stone-400' }}">Shipped</span>
                            </div>

                            <!-- Delivered -->
                            <div class="flex flex-col items-center gap-2">
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center border-4 transition-all duration-300
                                    {{ in_array($order->status, ['delivered', 'completed']) ? 'bg-teal-600 border-teal-100 text-white' : 'bg-white border-stone-200 text-stone-300' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <span
                                    class="text-xs font-bold uppercase tracking-wider {{ in_array($order->status, ['delivered', 'completed']) ? 'text-teal-600' : 'text-stone-400' }}">Delivered</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                <div class="px-8 pb-8 md:px-12 md:pb-12 text-center">
                    <p class="text-stone-600 mb-6">Need a receipt?</p>
                    @if(auth()->check() && auth()->id() === $order->user_id)
                        <a href="{{ route('orders.invoice', $order) }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-stone-100 text-stone-900 font-bold rounded-xl hover:bg-stone-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download Invoice
                        </a>
                    @else
                        <p class="text-sm text-stone-400 italic">Please login to download invoices or view full details.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>