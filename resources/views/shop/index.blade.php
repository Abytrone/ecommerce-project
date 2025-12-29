<x-app-layout>
    <!-- Minimalist Header -->
    <div class="bg-white border-b border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 text-center">
            <h1 class="text-4xl md:text-6xl font-black text-stone-900 tracking-tight mb-4">
                The <span class="text-teal-600">Collection</span>
            </h1>
            <p class="text-stone-500 max-w-xl mx-auto text-lg font-medium">
                Thoughtfully designed stationery for the modern aesthetic.
            </p>
        </div>
    </div>

    <div class="bg-stone-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Main Layout Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                <!-- Left Sidebar (Categories) - Spans 3 columns -->
                <aside class="lg:col-span-3">
                    <div class="sticky top-24 space-y-8">
                        <!-- Categories Section -->
                        <div>
                            <h3 class="font-black text-xl text-stone-900 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                Browse
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('shop') }}"
                                    class="group flex items-center justify-between p-3 rounded-xl transition-all duration-300 {{ !request('category') ? 'bg-white shadow-md border-l-4 border-teal-500 text-stone-900' : 'text-stone-500 hover:bg-white hover:shadow-sm hover:text-stone-900' }}">
                                    <span class="font-bold">All Items</span>
                                    <span
                                        class="text-xs font-bold px-2 py-1 rounded-full {{ !request('category') ? 'bg-stone-100 text-stone-900' : 'bg-stone-200/50 text-stone-400 group-hover:bg-stone-100 group-hover:text-stone-600' }}">
                                        {{ \App\Models\Product::where('is_visible', true)->count() }}
                                    </span>
                                </a>
                                @foreach($categories as $category)
                                    <a href="{{ route('shop', ['category' => $category->slug]) }}"
                                        class="group flex items-center justify-between p-3 rounded-xl transition-all duration-300 {{ request('category') == $category->slug ? 'bg-white shadow-md border-l-4 border-' . ($category->color ?? 'teal') . '-500 text-stone-900' : 'text-stone-500 hover:bg-white hover:shadow-sm hover:text-stone-900' }}">
                                        <span class="font-medium">{{ $category->name }}</span>
                                        @if($category->products_count > 0)
                                            <span
                                                class="text-xs font-bold px-2 py-1 rounded-full {{ request('category') == $category->slug ? 'bg-stone-100 text-stone-900' : 'bg-stone-200/50 text-stone-400 group-hover:bg-stone-100 group-hover:text-stone-600' }}">
                                                {{ $category->products_count }}
                                            </span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Filters (Visual Mock) -->
                        <div class="pt-8 border-t border-stone-200 hidden lg:block">
                            <h3 class="font-bold text-sm text-stone-400 uppercase tracking-wider mb-4">Filter By</h3>
                            <div class="space-y-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <div
                                        class="w-5 h-5 rounded border border-stone-300 flex items-center justify-center group-hover:border-teal-500 transition-colors">
                                        <!-- Checked state would have a checkmark -->
                                    </div>
                                    <span class="text-stone-600 group-hover:text-stone-900 transition-colors">In
                                        Stock</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <div
                                        class="w-5 h-5 rounded border border-stone-300 flex items-center justify-center group-hover:border-teal-500 transition-colors">
                                    </div>
                                    <span class="text-stone-600 group-hover:text-stone-900 transition-colors">On
                                        Sale</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Product Grid Area - Spans 9 columns -->
                <div class="lg:col-span-9">
                    <!-- Flash Message -->
                    @if(session('success'))
                        <div
                            class="bg-teal-50 border border-teal-200 text-teal-800 px-6 py-4 rounded-xl flex items-center gap-4 shadow-sm mb-8 animate-fade-in-up">
                            <svg class="w-6 h-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-bold">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Top Bar -->
                    <div
                        class="flex flex-col lg:flex-row justify-between items-end lg:items-center mb-8 border-b border-stone-200 pb-4 gap-4">
                        <div class="w-full lg:w-auto">
                            <h2 class="text-2xl font-black text-stone-900">
                                {{ request('category') ? $categories->firstWhere('slug', request('category'))->name : 'All Products' }}
                            </h2>
                            @if(request('search'))
                                <p class="text-stone-500 text-sm mt-1">Search results for "<span
                                        class="font-bold text-stone-800">{{ request('search') }}</span>"</p>
                            @else
                                <p class="text-stone-500 text-sm mt-1">Found {{ $products->total() }} premium items</p>
                            @endif
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto items-center">
                            <!-- Search Form -->
                            <form action="{{ route('shop') }}" method="GET" class="relative w-full sm:w-64 group">
                                @if(request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search collection..."
                                    class="w-full pl-16 pr-4 py-3 bg-white border border-stone-200 rounded-full text-sm focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all shadow-sm group-hover:shadow-md placeholder-stone-400"
                                    style="padding-left: 3.5rem;">
                                <svg class="w-5 h-5 text-stone-400 absolute left-5 top-1/2 -translate-y-1/2 bg-transparent"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </form>

                            <!-- Pagination Links (Top) -->
                            <div class="w-full sm:w-auto">
                                {{ $products->links('pagination::simple-tailwind') }}
                            </div>
                        </div>
                    </div>

                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                            @foreach($products as $product)
                                <div class="group flex flex-col">
                                    <!-- Creative Card -->
                                    <div
                                        class="relative w-full aspect-[3/4] bg-white rounded-2xl overflow-hidden shadow-sm group-hover:shadow-2xl transition-all duration-500 ease-out border border-stone-100">
                                        <a href="{{ route('shop.show', $product->slug) }}"
                                            class="block w-full h-full relative z-10">
                                            @if($product->images)
                                                <img src="{{ Storage::disk('public')->url($product->images[0]) }}"
                                                    alt="{{ $product->name }}"
                                                    class="object-cover w-full h-full transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                            @else
                                                <div class="flex items-center justify-center h-full bg-stone-50 text-stone-300">
                                                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </a>

                                        <!-- Badges -->
                                        <div class="absolute top-3 left-3 flex flex-col gap-2 z-20">
                                            @if($product->stock <= 0)
                                                <span
                                                    class="bg-stone-900 text-white text-[10px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">Sold
                                                    Out</span>
                                            @elseif($product->is_featured)
                                                <span
                                                    class="bg-teal-500 text-white text-[10px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">Featured</span>
                                            @endif
                                        </div>

                                        <!-- Quick Add Button (Bottom Overlay) -->
                                        @if($product->stock > 0)
                                            <div
                                                class="absolute inset-x-0 bottom-0 p-4 z-30 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full bg-white/90 backdrop-blur text-stone-900 font-bold py-3 rounded-xl shadow-lg hover:bg-stone-900 hover:text-white transition-all flex items-center justify-center gap-2 text-sm uppercase tracking-wide">
                                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                        </svg>
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Minimal Info -->
                                    <div class="pt-4 px-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h3
                                                class="font-bold text-lg text-stone-900 group-hover:text-teal-600 transition-colors leading-tight">
                                                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <span
                                                class="font-bold text-stone-900 bg-stone-100 px-2 py-0.5 rounded-md text-sm">GHS
                                                {{ number_format($product->price, 2) }}</span>
                                        </div>
                                        <p class="text-xs text-stone-500 font-medium uppercase tracking-wide">
                                            {{ $product->category->name ?? 'Stationery' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-16">
                            {{ $products->links() }}
                        </div>

                    @else
                        <div
                            class="flex flex-col items-center justify-center py-24 bg-white rounded-3xl border border-stone-100 border-dashed text-center">
                            <div
                                class="w-24 h-24 bg-stone-50 rounded-full flex items-center justify-center mb-6 text-stone-300">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-stone-900">No products found</h3>
                            <p class="text-stone-500 max-w-xs mt-2 mb-8">Try adjusting your category filter or search terms
                                to find what you're looking for.</p>
                            <a href="{{ route('shop') }}"
                                class="px-8 py-3 bg-stone-900 text-white font-bold rounded-full hover:bg-teal-600 transition-colors">Clear
                                Filters</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>