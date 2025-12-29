<x-app-layout>
    <div class="bg-stone-50 py-12 md:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-black text-stone-900 mb-6">Shipping & Returns</h1>
                <p class="text-lg text-stone-600 max-w-2xl mx-auto">Everything you need to know about getting your
                    Anchor stationery and what to do if it's not quite right.</p>
            </div>

            <div class="space-y-12">
                <!-- Shipping Section -->
                <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-stone-100">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-teal-100 rounded-2xl flex items-center justify-center text-teal-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-stone-900">Shipping Policy</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-bold text-lg text-stone-900 mb-3">Accra Delivery</h3>
                            <p class="text-stone-600 leading-relaxed mb-4">Orders within Accra are delivered within 1-2
                                business days. Same-day delivery is available for orders placed before 10 AM.</p>
                            <span class="text-teal-600 font-bold text-sm">Cost: GHS 25.00</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-stone-900 mb-3">Regional Delivery</h3>
                            <p class="text-stone-600 leading-relaxed mb-4">Deliveries to other regions in Ghana
                                typically take 3-5 business days via our courier partners.</p>
                            <span class="text-teal-600 font-bold text-sm">Cost: GHS 45.00</span>
                        </div>
                        <div class="md:col-span-2">
                            <h3 class="font-bold text-lg text-stone-900 mb-3">International Shipping</h3>
                            <p class="text-stone-600 leading-relaxed">Currently, we only ship within Ghana. We are
                                working on expanding our reach to other West African countries soon.</p>
                        </div>
                    </div>
                </div>

                <!-- Returns Section -->
                <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-stone-100">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-teal-100 rounded-2xl flex items-center justify-center text-teal-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-stone-900">Returns & Exchanges</h2>
                    </div>

                    <div class="space-y-6 text-stone-600 leading-relaxed">
                        <p>We want you to love your Anchor stationery. If you are not completely satisfied with your
                            purchase, you may return it within <span class="font-bold text-stone-900">14 days</span> of
                            receipt.</p>

                        <ul class="list-disc pl-5 space-y-2 marker:text-teal-500">
                            <li>Items must be unused, in original packaging, and in the same condition as received.</li>
                            <li>Personalized or monogrammed items cannot be returned unless defective.</li>
                            <li>Return shipping costs are the responsibility of the customer, unless the item is
                                defective or incorrect.</li>
                        </ul>

                        <div class="bg-stone-50 p-6 rounded-xl border border-stone-200 mt-6">
                            <h3 class="font-bold text-stone-900 mb-2">How to Initiate a Return</h3>
                            <p class="mb-4">Please contact our support team with your order number and reason for
                                return.</p>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center text-teal-600 font-bold hover:text-teal-700">
                                Contact Support <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>