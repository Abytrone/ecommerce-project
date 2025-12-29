<x-app-layout>
    <div class="bg-stone-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-black text-stone-900 mb-8">Shopping Cart</h1>

            @if(session('success'))
                <div
                    class="bg-teal-50 border border-teal-200 text-teal-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(count($cart) > 0)
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Cart Items -->
                    <div class="flex-1 rounded-2xl border border-stone-200 bg-white overflow-hidden shadow-sm">
                        <table class="w-full text-left">
                            <thead class="bg-stone-50 border-b border-stone-100">
                                <tr>
                                    <th class="py-4 px-6 text-stone-500 font-bold text-sm uppercase">Product</th>
                                    <th class="py-4 px-6 text-stone-500 font-bold text-sm uppercase">Price</th>
                                    <th class="py-4 px-6 text-stone-500 font-bold text-sm uppercase">Quantity</th>
                                    <th class="py-4 px-6 text-stone-500 font-bold text-sm uppercase">Total</th>
                                    <th class="py-4 px-6"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-100">
                                @foreach($cart as $id => $details)
                                    <tr>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center gap-4">
                                                <div class="w-16 h-16 rounded-lg bg-stone-100 overflow-hidden flex-shrink-0">
                                                    @if($details['image'])
                                                        <img src="{{ Storage::url($details['image']) }}"
                                                            alt="{{ $details['name'] }}" class="object-cover w-full h-full">
                                                    @else
                                                        <div class="flex items-center justify-center h-full text-stone-300">
                                                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <a href="{{ route('shop.show', $details['slug']) }}"
                                                    class="font-bold text-stone-900 hover:text-teal-600 transition-colors">{{ $details['name'] }}</a>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6 text-stone-600">GHS {{ number_format($details['price'], 2) }}</td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center gap-2">
                                                <!-- Simple update with reload for now, ideally AJAX -->
                                                <span class="font-bold">{{ $details['quantity'] }}</span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6 font-bold text-stone-900">
                                            GHS {{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                        <td class="py-6 px-6 text-right">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button type="submit"
                                                    class="text-stone-400 hover:text-red-500 transition-colors p-2">
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary -->
                    <div class="w-full lg:w-80 flex-shrink-0 space-y-6">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                            <h2 class="text-xl font-black text-stone-900 mb-6">Order Summary</h2>
                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between text-stone-600">
                                    <span>Subtotal</span>
                                    <span>GHS {{ number_format($total, 2) }}</span>
                                </div>
                                <div class="flex justify-between text-stone-600">
                                    <span>Shipping</span>
                                    <span>Calculated at checkout</span>
                                </div>
                                <div
                                    class="border-t border-stone-100 pt-4 flex justify-between font-bold text-stone-900 text-lg">
                                    <span>Total</span>
                                    <span>GHS {{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                            <a href="{{ url('/checkout') }}"
                                class="block w-full text-center bg-stone-900 text-white font-bold py-4 rounded-full hover:bg-teal-600 transition-all shadow-xl hover:shadow-teal-500/30">
                                Proceed to Checkout
                            </a>
                        </div>
                        <a href="{{ route('shop') }}"
                            class="block text-center text-stone-500 hover:text-stone-900 font-medium">Continue Shopping</a>
                    </div>
                </div>
            @else
                <div class="text-center py-24 bg-white rounded-2xl border border-stone-100">
                    <div
                        class="w-16 h-16 bg-stone-100 text-stone-300 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-black text-stone-900 mb-2">Your cart is empty</h2>
                    <p class="text-stone-500 mb-8">Looks like you haven't added any items yet.</p>
                    <a href="{{ route('shop') }}"
                        class="inline-flex px-8 py-3 bg-teal-600 text-white font-bold rounded-full hover:bg-teal-500 transition-all">Start
                        Shopping</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>