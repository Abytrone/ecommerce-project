<x-app-layout>
    <div class="bg-white min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm text-stone-500">
                <a href="{{ route('shop') }}" class="hover:text-teal-600">Shop</a>
                @if($product->category)
                    <span class="mx-2">/</span>
                    <a href="{{ route('shop', ['category' => $product->category->slug]) }}"
                        class="hover:text-teal-600">{{ $product->category->name }}</a>
                @endif
                <span class="mx-2">/</span>
                <span class="text-stone-900 font-medium">{{ $product->name }}</span>
            </nav>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16">
                <!-- Image Gallery -->
                <div class="space-y-4" x-data='{
                    activeImage: "{{ $product->images ? Storage::disk("public")->url($product->images[0]) : "" }}",
                    images: @json($product->images ? array_map(fn($img) => Storage::disk("public")->url($img), $product->images) : [])
                }'>
                    <div class="aspect-[4/5] bg-stone-100 rounded-2xl overflow-hidden border border-stone-100 relative">
                        <template x-if="images.length > 0">
                            <img :src="activeImage" alt="{{ $product->name }}"
                                class="object-cover w-full h-full transition-opacity duration-300">
                        </template>
                        <template x-if="images.length === 0">
                            <div class="flex items-center justify-center h-full text-stone-300">
                                <svg class="w-24 h-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </template>
                    </div>

                    <!-- Thumbnails -->
                    <template x-if="images.length > 1">
                        <div class="flex gap-4 mt-4 overflow-x-auto pb-2">
                            <template x-for="(image, index) in images" :key="index">
                                <button @click="activeImage = image"
                                    class="relative w-24 aspect-[4/5] flex-shrink-0 rounded-lg overflow-hidden border-2 transition-all duration-200"
                                    :class="activeImage === image ? 'border-teal-600 ring-2 ring-teal-100' : 'border-transparent hover:border-stone-300'">
                                    <img :src="image" class="w-full h-full object-cover">
                                </button>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- Product Info -->
                <div class="flex flex-col">
                    <h1 class="text-4xl font-black text-stone-900 mb-2 leading-tight">{{ $product->name }}</h1>
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-2xl font-bold text-teal-600">GHS
                            {{ number_format($product->price, 2) }}</span>
                        @if($product->stock > 0)
                            <span
                                class="px-3 py-1 bg-teal-50 text-teal-700 text-sm font-bold rounded-full border border-teal-100">In
                                Stock</span>
                        @else
                            <span
                                class="px-3 py-1 bg-stone-100 text-stone-500 text-sm font-bold rounded-full border border-stone-200">Out
                                of Stock</span>
                        @endif
                    </div>

                    <div class="prose prose-stone mb-8 text-stone-600">
                        {!! str($product->description)->markdown()->sanitizeHtml() !!}
                    </div>

                    <div class="mt-auto border-t border-stone-200 pt-8">
                        <form action="{{ url('/cart/add/' . $product->id) }}" method="POST" class="flex gap-4">
                            @csrf
                            <div class="w-24">
                                <label for="quantity" class="sr-only">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                    max="{{ $product->stock }}"
                                    class="w-full px-4 py-3 rounded-full border border-stone-200 text-center font-bold text-stone-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            </div>
                            <button type="submit"
                                class="flex-1 bg-stone-900 text-white font-bold rounded-full py-4 px-8 hover:bg-teal-600 transition-all shadow-xl hover:shadow-teal-500/30 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>

                    <!-- Additional Details -->
                    <div class="mt-12 space-y-4">
                        <div class="flex items-center gap-3 text-stone-500 text-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Quality Guaranteed</span>
                        </div>
                        <div class="flex items-center gap-3 text-stone-500 text-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span>Free Shipping on Orders over GHS 500</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-stone-200 mt-16 pt-16">
                <!-- Tabs or Accordion for Details -->
                <div x-data="{ activeTab: 'details' }" class="w-full max-w-3xl">
                    <div class="flex border-b border-stone-200 mb-8">
                        <button @click="activeTab = 'details'"
                            :class="{ 'border-teal-600 text-teal-600': activeTab === 'details', 'border-transparent text-stone-500 hover:text-stone-700': activeTab !== 'details' }"
                            class="py-4 px-6 border-b-2 font-bold text-base transition-colors">
                            Product Details
                        </button>
                        <button @click="activeTab = 'shipping'"
                            :class="{ 'border-teal-600 text-teal-600': activeTab === 'shipping', 'border-transparent text-stone-500 hover:text-stone-700': activeTab !== 'shipping' }"
                            class="py-4 px-6 border-b-2 font-bold text-base transition-colors">
                            Shipping & Returns
                        </button>
                    </div>

                    <!-- Details Content -->
                    <div x-show="activeTab === 'details'" class="prose prose-stone max-w-none">
                        <ul class="list-disc pl-4 space-y-2 text-stone-600 text-lg leading-relaxed">
                            <li><strong>Material:</strong> Premium materials sourced globally</li>
                            <li><strong>Dimensions:</strong> Standard sizing for versatile use</li>
                            <li><strong>Origin:</strong> Crafted with care in our partner workshops</li>
                            <li><strong>Care:</strong> Handle with appreciation</li>
                        </ul>
                    </div>

                    <!-- Shipping Content -->
                    <div x-show="activeTab === 'shipping'"
                        class="prose prose-stone max-w-none text-stone-600 text-lg leading-relaxed"
                        style="display: none;">
                        <p class="mb-4"><strong>Delivery:</strong></p>
                        <ul class="list-disc pl-4 space-y-2 mb-8">
                            <li>Standard Shipping: 3-5 business days</li>
                            <li>Express Shipping: 1-2 business days</li>
                        </ul>
                        <p class="mb-4"><strong>Returns:</strong></p>
                        <p>We accept returns within 30 days of purchase if the item is unused and in its original
                            packaging.</p>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
                <div class="border-t border-stone-200 pt-24" style="margin-top: 8rem;">
                    <div class="flex items-center justify-between mb-12">
                        <h2 class="text-3xl font-black text-stone-900">You May Also Like</h2>
                        <a href="{{ route('shop') }}"
                            class="group flex items-center gap-2 text-stone-500 hover:text-teal-600 transition-colors font-medium">
                            View All
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
                        @foreach($relatedProducts as $related)
                            <div class="group">
                                <div class="relative aspect-[4/5] rounded-2xl overflow-hidden mb-6 bg-stone-100">
                                    @if($related->images)
                                        <img src="{{ Storage::disk('public')->url($related->images[0]) }}"
                                            alt="{{ $related->name }}"
                                            class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700 ease-out">
                                    @endif

                                    <!-- Quick Action -->
                                    <div
                                        class="absolute bottom-4 right-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                        <button
                                            class="w-10 h-10 rounded-full bg-white text-stone-900 shadow-lg flex items-center justify-center hover:bg-teal-600 hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <h3 class="font-bold text-lg text-stone-900 mb-1 leading-snug">
                                    <a href="{{ route('shop.show', $related->slug) }}"
                                        class="hover:text-teal-600 transition-colors">
                                        {{ $related->name }}
                                    </a>
                                </h3>
                                <div class="text-stone-500 font-medium">GHS {{ number_format($related->price, 2) }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>