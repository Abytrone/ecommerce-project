<x-app-layout>
    <div class="bg-stone-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-black text-stone-900 mb-8">Checkout</h1>

            <form action="{{ route('checkout.place') }}" method="POST" class="flex flex-col lg:flex-row gap-8">
                @csrf

                <!-- Shipping Form -->
                <div class="flex-1 bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-stone-100">
                    <h2 class="text-xl font-bold text-stone-900 mb-6 flex items-center gap-2">
                        <span
                            class="w-8 h-8 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center text-sm">1</span>
                        Shipping Information
                    </h2>

                    <div x-data="{ address_option: '{{ $addresses->isNotEmpty() ? $addresses->first()->id : 'new' }}' }"
                        class="space-y-6">

                        @if($addresses->isNotEmpty())
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-stone-700 mb-2">Select a Saved Address</label>
                                @foreach($addresses as $address)
                                    <div class="flex items-start gap-3 p-4 border border-stone-200 rounded-xl cursor-pointer hover:border-teal-500 transition-colors"
                                        :class="address_option == '{{ $address->id }}' ? 'border-teal-500 bg-teal-50/50' : ''"
                                        @click="address_option = '{{ $address->id }}'">
                                        <input type="radio" name="address_id" value="{{ $address->id }}"
                                            class="mt-1 text-teal-600 focus:ring-teal-500" x-model="address_option">
                                        <div>
                                            <p class="font-bold text-stone-900">{{ $address->line_1 }}</p>
                                            <p class="text-sm text-stone-500">{{ $address->city }}, {{ $address->state }}
                                                {{ $address->zip }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="flex items-center gap-3 p-4 border border-stone-200 rounded-xl cursor-pointer hover:border-teal-500 transition-colors"
                                    :class="address_option == 'new' ? 'border-teal-500 bg-teal-50/50' : ''"
                                    @click="address_option = 'new'">
                                    <input type="radio" name="address_id" value="new"
                                        class="mt-1 text-teal-600 focus:ring-teal-500" x-model="address_option">
                                    <span class="font-bold text-stone-900">Use a New Address</span>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="address_id" value="new">
                        @endif

                        <div x-show="address_option == 'new'" class="space-y-4 pt-4 border-t border-stone-100">
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Email Address</label>
                                <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}" required
                                    class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-stone-700 mb-1">First Name</label>
                                    <input type="text" name="first_name"
                                        class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-stone-700 mb-1">Last Name</label>
                                    <input type="text" name="last_name"
                                        class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Address Line 1</label>
                                <input type="text" name="line_1"
                                    class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-stone-700 mb-1">Address Line 2
                                    (Optional)</label>
                                <input type="text" name="line_2"
                                    class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-stone-700 mb-1">City</label>
                                    <input type="text" name="city"
                                        class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-stone-700 mb-1">State</label>
                                    <input type="text" name="state"
                                        class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-stone-700 mb-1">Zip Code</label>
                                    <input type="text" name="zip"
                                        class="w-full px-4 py-3 rounded-lg border border-stone-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ payment_method: 'paystack' }" class="space-y-6">
                        <h2 class="text-xl font-bold text-stone-900 mt-8 mb-6 flex items-center gap-2">
                            <span
                                class="w-8 h-8 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center text-sm">2</span>
                            Payment Method
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Paystack Option -->
                            <div class="relative p-4 border rounded-xl cursor-pointer transition-all duration-200"
                                :class="payment_method === 'paystack' ? 'border-teal-500 bg-teal-50/50 ring-1 ring-teal-500' : 'border-stone-200 hover:border-stone-300'"
                                @click="payment_method = 'paystack'">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-white border border-stone-100 flex items-center justify-center text-teal-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-stone-900">Paystack</p>
                                            <p class="text-xs text-stone-500">Card / Mobile Money</p>
                                        </div>
                                    </div>
                                    <div class="w-4 h-4 rounded-full border border-stone-300 flex items-center justify-center"
                                        :class="payment_method === 'paystack' ? 'border-teal-500 bg-teal-500' : ''">
                                        <div x-show="payment_method === 'paystack'"
                                            class="w-2 h-2 rounded-full bg-white"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- COD Option -->
                            <div class="relative p-4 border rounded-xl cursor-pointer transition-all duration-200"
                                :class="payment_method === 'cod' ? 'border-teal-500 bg-teal-50/50 ring-1 ring-teal-500' : 'border-stone-200 hover:border-stone-300'"
                                @click="payment_method = 'cod'">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-white border border-stone-100 flex items-center justify-center text-stone-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-stone-900">Cash on Delivery</p>
                                            <p class="text-xs text-stone-500">Pay when you receive</p>
                                        </div>
                                    </div>
                                    <div class="w-4 h-4 rounded-full border border-stone-300 flex items-center justify-center"
                                        :class="payment_method === 'cod' ? 'border-teal-500 bg-teal-500' : ''">
                                        <div x-show="payment_method === 'cod'" class="w-2 h-2 rounded-full bg-white">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="payment_method" x-model="payment_method">
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="w-full lg:w-96 flex-shrink-0">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 sticky top-24">
                        <h3 class="text-lg font-bold text-stone-900 mb-6">Your Order</h3>
                        <div class="space-y-4 mb-6 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                            @foreach($cart as $item)
                                <div class="flex gap-4">
                                    <div class="w-16 h-16 bg-stone-100 rounded-md overflow-hidden flex-shrink-0">
                                        @if($item['image'])
                                            <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                                                class="object-cover w-full h-full">
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-sm text-stone-900 line-clamp-1">{{ $item['name'] }}</h4>
                                        <div class="flex justify-between text-xs text-stone-500 mt-1">
                                            <span>Qty: {{ $item['quantity'] }}</span>
                                            <span>GHS {{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-stone-100 pt-4 space-y-3">
                            <div class="flex justify-between text-stone-600">
                                <span>Subtotal</span>
                                <span>GHS{{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-stone-600">
                                <span>Shipping</span>
                                <span class="text-teal-600 font-bold">Free</span>
                            </div>
                            <div class="flex justify-between font-bold text-stone-900 text-xl pt-2">
                                <span>Total</span>
                                <span>GHS{{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full mt-8 bg-stone-900 text-white font-bold py-4 rounded-full hover:bg-teal-600 transition-all shadow-xl hover:shadow-teal-500/30">
                            Place Order (GHS {{ number_format($total, 2) }})
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>