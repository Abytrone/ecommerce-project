<x-app-layout>
    <!-- Hero Section -->
    <div class="relative pt-20 pb-24 lg:pt-32 lg:pb-40 overflow-hidden bg-stone-900 text-white">
        <!-- Abstract Background -->
        <div
            class="absolute top-0 right-0 -mr-32 -mt-32 w-[600px] h-[600px] bg-teal-900/30 rounded-full blur-[120px] animate-pulse">
        </div>
        <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-[500px] h-[500px] bg-emerald-900/20 rounded-full blur-[100px]"
            style="animation-delay: 2s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-teal-900/50 border border-teal-700 text-teal-300 text-xs font-bold tracking-widest uppercase mb-6 backdrop-blur-sm">
                Since 2024
            </span>
            <h1 class="text-5xl md:text-7xl font-black mb-8 tracking-tight leading-none">
                Crafting <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-emerald-400">Clarity &
                    Focus.</span>
            </h1>
            <p class="text-xl text-stone-400 max-w-2xl mx-auto leading-relaxed font-light">
                Anchor Stationery was born from a simple belief: that the tools we use shape the work we do.
                We curate premium analog essentials for the modern digital creator.
            </p>
        </div>
    </div>

    <!-- Our Story / Timeline -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-stone-100 rounded-[2.5rem] transform -rotate-2"></div>
                    <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=1000&auto=format&fit=crop"
                        alt="Our Workshop"
                        class="relative rounded-[2rem] shadow-2xl w-full object-cover aspect-[4/5] transform rotate-1 hover:rotate-0 transition-transform duration-500">
                </div>
                <div class="space-y-8">
                    <h2 class="text-3xl md:text-4xl font-black text-stone-900">From a Small Desk in Accra</h2>
                    <div class="space-y-6 text-lg text-stone-600 leading-relaxed">
                        <p>
                            It started with a frustration. In a world overflowing with cheap, disposable office
                            supplies,
                            we couldn't find a notebook that felt worthy of our best ideas.
                        </p>
                        <p>
                            So we set out to change that. We traveled to find the smoothest paper, weighted the perfect
                            pens,
                            and designed a collection that values quality over quantity.
                        </p>
                        <p>
                            Today, Anchor Stationery is more than a shop—it's a community of writers, designers, and
                            thinkers
                            who believe in the power of putting pen to paper.
                        </p>
                    </div>

                    <!-- Values Grid -->
                    <div class="grid grid-cols-2 gap-6 pt-8">
                        <div class="p-6 bg-stone-50 rounded-2xl border border-stone-100">
                            <h3 class="font-bold text-stone-900 text-lg mb-2">Quality First</h3>
                            <p class="text-sm text-stone-500">We test every product for months before it reaches our
                                shelves.</p>
                        </div>
                        <div class="p-6 bg-stone-50 rounded-2xl border border-stone-100">
                            <h3 class="font-bold text-stone-900 text-lg mb-2">Sustainable</h3>
                            <p class="text-sm text-stone-500">Responsibly sourced materials and plastic-free packaging.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Process Section -->
    <section class="py-24 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-teal-600 font-bold tracking-widest uppercase text-xs mb-2 block">How We Work</span>
                <h2 class="text-3xl md:text-4xl font-black text-stone-900">The Anchor Standard</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-stone-100 relative group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="absolute top-0 right-0 p-8 opacity-10 font-black text-6xl text-stone-900 group-hover:text-teal-600 transition-colors">
                        01</div>
                    <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900 mb-4">Curated Selection</h3>
                    <p class="text-stone-500 leading-relaxed">
                        We don't stock everything. We scour the globe for the finest stationery, testing hundreds of
                        pens and papers to find the few that meet our exacting standards.
                    </p>
                </div>

                <!-- Step 2 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-stone-100 relative group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="absolute top-0 right-0 p-8 opacity-10 font-black text-6xl text-stone-900 group-hover:text-teal-600 transition-colors">
                        02</div>
                    <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900 mb-4">Functional Design</h3>
                    <p class="text-stone-500 leading-relaxed">
                        Aesthetics matter, but utility is paramount. Every item in our shop is chosen for its ability to
                        improve your workflow, focus, and creativity.
                    </p>
                </div>

                <!-- Step 3 -->
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-stone-100 relative group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="absolute top-0 right-0 p-8 opacity-10 font-black text-6xl text-stone-900 group-hover:text-teal-600 transition-colors">
                        03</div>
                    <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900 mb-4">Sustainable Future</h3>
                    <p class="text-stone-500 leading-relaxed">
                        We prioritize brands that respect the planet. From recycled papers to refillable pens, we're
                        building a catalog that you can feel good about using.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us / CTA -->
    <section class="py-24 bg-stone-900 text-white relative overflow-hidden">
        <!-- Abstract Background -->
        <div class="absolute top-0 left-0 -ml-32 -mt-32 w-[600px] h-[600px] bg-teal-900/20 rounded-full blur-[120px]">
        </div>
        <div
            class="absolute bottom-0 right-0 -mr-32 -mb-32 w-[600px] h-[600px] bg-emerald-900/20 rounded-full blur-[120px]">
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-black mb-8 leading-tight">Ready to upgrade your workspace?</h2>
            <p class="text-xl text-stone-400 mb-10 font-light leading-relaxed">
                Join thousands of creators who have found their perfect tools with Anchor.
                Experience the difference that quality stationery makes.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('shop') }}"
                    class="px-8 py-4 bg-teal-600 text-white font-bold rounded-full hover:bg-teal-500 transition-all shadow-lg hover:shadow-teal-500/30 transform hover:-translate-y-1">
                    Shop Collection
                </a>
                <a href="{{ route('contact') }}"
                    class="px-8 py-4 bg-white/10 text-white font-bold rounded-full hover:bg-white/20 transition-all backdrop-blur-sm">
                    Get in Touch
                </a>
            </div>
        </div>
    </section>
</x-app-layout>