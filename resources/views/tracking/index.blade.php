<x-app-layout>
    <div
        class="min-h-screen bg-stone-50 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden flex items-center justify-center">
        <!-- Abstract Background -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div
                class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-teal-100/40 rounded-full blur-[120px] animate-pulse">
            </div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-emerald-100/40 rounded-full blur-[120px] animate-pulse"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-xl w-full relative z-10">
            <div class="text-center mb-10 space-y-4">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-teal-50 text-teal-700 text-xs font-bold uppercase tracking-widest shadow-sm">
                    Order Status
                </span>
                <h1 class="text-4xl md:text-5xl font-black text-stone-900 tracking-tight">Track Your Order.</h1>
                <p class="text-stone-500 text-lg">Enter your order details below to check the real-time status of your
                    shipment.</p>
            </div>

            <div
                class="bg-white rounded-3xl shadow-xl border border-stone-100 overflow-hidden transform transition-all hover:shadow-2xl">
                <div class="p-8 md:p-10">
                    @if(session('error'))
                        <div
                            class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-center gap-3 text-red-700">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-bold">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('track.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label for="order_number" class="block text-sm font-bold text-stone-700">Order
                                Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <input type="text" name="order_number" id="order_number" required
                                    placeholder="e.g. OR-123456"
                                    class="block w-full pl-16 pr-4 py-4 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all font-medium"
                                    style="padding-left: 4rem;">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-bold text-stone-700">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" required placeholder="email@example.com"
                                    class="block w-full pl-16 pr-4 py-4 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all font-medium"
                                    style="padding-left: 4rem;">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full flex justify-center items-center gap-2 py-4 px-6 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-stone-900 hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300 transform hover:-translate-y-1">
                            Track Order
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="bg-stone-50 px-8 py-6 border-t border-stone-100 flex justify-center text-center">
                    <p class="text-sm text-stone-500">Need help? <a href="{{ route('contact') }}"
                            class="font-bold text-teal-600 hover:text-teal-500">Contact Support</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>