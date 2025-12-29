<x-app-layout>
    <div class="bg-stone-50 py-12 md:py-24" x-data="{ active: null }">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-black text-stone-900 mb-6">Frequently Asked Questions</h1>
                <p class="text-lg text-stone-600 max-w-xl mx-auto">Answers to common questions about our products,
                    orders, and services.</p>
            </div>

            <div class="space-y-4">
                <!-- Question 1 -->
                <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
                    <button @click="active === 1 ? active = null : active = 1"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-stone-50 transition-colors">
                        <span class="font-bold text-lg text-stone-900">Do you offer international shipping?</span>
                        <span class="transform transition-transform duration-300 text-teal-500"
                            :class="{'rotate-180': active === 1}">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="active === 1" x-collapse style="display: none;">
                        <div class="px-6 pb-6 text-stone-600 leading-relaxed border-t border-stone-100 pt-4">
                            Currently, we primarily ship within Ghana. We are exploring options for international
                            shipping to select countries in West Africa. Join our newsletter to be updated when we
                            expand!
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
                    <button @click="active === 2 ? active = null : active = 2"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-stone-50 transition-colors">
                        <span class="font-bold text-lg text-stone-900">What payment methods do you accept?</span>
                        <span class="transform transition-transform duration-300 text-teal-500"
                            :class="{'rotate-180': active === 2}">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="active === 2" x-collapse style="display: none;">
                        <div class="px-6 pb-6 text-stone-600 leading-relaxed border-t border-stone-100 pt-4">
                            We accept Mobile Money (MTN, Vodafone, AirtelTigo) and major Credit/Debit cards (Visa,
                            Mastercard) via our secure Paystack integration. Cash on delivery is available for orders
                            within Accra.
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
                    <button @click="active === 3 ? active = null : active = 3"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-stone-50 transition-colors">
                        <span class="font-bold text-lg text-stone-900">Is your paper fountain pen friendly?</span>
                        <span class="transform transition-transform duration-300 text-teal-500"
                            :class="{'rotate-180': active === 3}">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="active === 3" x-collapse style="display: none;">
                        <div class="px-6 pb-6 text-stone-600 leading-relaxed border-t border-stone-100 pt-4">
                            Absolutely. We specifically curate our notebooks with high-GSM (80gsm+) acid-free paper that
                            resists bleed-through and feathering, making them perfect for fountain pens, rollerballs,
                            and markers.
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
                    <button @click="active === 4 ? active = null : active = 4"
                        class="w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-stone-50 transition-colors">
                        <span class="font-bold text-lg text-stone-900">How can I track my order?</span>
                        <span class="transform transition-transform duration-300 text-teal-500"
                            :class="{'rotate-180': active === 4}">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="active === 4" x-collapse style="display: none;">
                        <div class="px-6 pb-6 text-stone-600 leading-relaxed border-t border-stone-100 pt-4">
                            You can easily track your order by visiting our <a href="{{ route('track') }}"
                                class="text-teal-600 font-bold hover:underline">Track Order</a> page and entering your
                            order number (e.g., OR-123456) and email address.
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <p class="text-stone-600 mb-4">Can't find what you're looking for?</p>
                <a href="{{ route('contact') }}"
                    class="inline-block px-8 py-3 bg-stone-900 text-white font-bold rounded-xl hover:bg-teal-600 transition-colors shadow-lg">Contact
                    Us</a>
            </div>
        </div>
    </div>
</x-app-layout>