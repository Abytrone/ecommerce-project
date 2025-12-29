<x-app-layout>
    <!-- Hero Section -->
    <div class="relative pt-12 pb-20 md:pt-32 md:pb-32 overflow-hidden bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-24 items-center">
                <div class="space-y-8 animate-fade-in-up">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-stone-200 text-teal-700 text-xs font-bold tracking-widest uppercase shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                        New Collection 2025
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-stone-900 leading-[1.05] tracking-tight">
                        Elevate Your <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-emerald-500">Creative
                            Flow.</span>
                    </h1>
                    <p class="text-xl text-stone-500 max-w-lg leading-relaxed font-medium">
                        Premium stationery for the modern creator. Discover our curated collection of pens, notebooks,
                        and desk essentials designed to inspire your best work.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ url('/shop') }}"
                            class="inline-flex justify-center items-center px-8 py-4 bg-stone-900 text-white rounded-2xl font-bold text-lg hover:bg-teal-600 transition-all duration-300 shadow-xl hover:shadow-teal-500/30 transform hover:-translate-y-1">
                            Start Shopping
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center items-center px-8 py-4 bg-white text-stone-900 border border-stone-200 rounded-2xl font-bold text-lg hover:bg-stone-50 transition-all duration-300 shadow-sm hover:shadow-md">
                            View Lookbook
                        </a>
                    </div>
                </div>
                <div class="relative group perspective-1000">
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-teal-500 to-emerald-500 rounded-[2.5rem] blur-xl opacity-20 group-hover:opacity-40 transition duration-1000 group-hover:duration-200">
                    </div>
                    <div
                        class="relative bg-stone-100 rounded-[2rem] overflow-hidden shadow-2xl aspect-[4/5] transform transition-transform duration-500 hover:rotate-y-2 hover:scale-[1.02]">
                        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1200&auto=format&fit=crop"
                            alt="Anchor Stationery Hero" class="object-cover w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <!-- Floating Card -->
                    <div
                        class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl shadow-xl border border-stone-100 hidden md:block animate-bounce-slow">
                        <div class="flex items-center gap-4">
                            <div class="bg-teal-50 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-stone-500 font-bold uppercase tracking-wider">Guarantee</p>
                                <p class="text-lg font-black text-stone-900">100% Premium</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Abstract Background -->
        <div class="absolute top-0 right-0 -mr-24 -mt-24 w-96 h-96 bg-teal-100/30 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 -ml-24 -mb-24 w-64 h-64 bg-emerald-100/30 rounded-full blur-3xl -z-10">
        </div>
    </div>

    <!-- Features Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-teal-600 font-bold tracking-widest uppercase text-sm">Why Choose Anchor</span>
                <h2 class="text-3xl md:text-5xl font-black text-stone-900 mt-2 mb-4">Crafted for Perfection</h2>
                <p class="text-stone-500 text-lg max-w-2xl mx-auto">We believe in the power of touch. Our products are
                    chosen for their texture, weight, and lasting quality.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="group relative p-8 bg-stone-50 rounded-[2rem] hover:bg-stone-900 transition-colors duration-500 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-stone-200/20 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-150 duration-500">
                    </div>
                    <div
                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900 mb-3 group-hover:text-white transition-colors">Exquisite
                        Writing</h3>
                    <p class="text-stone-500 leading-relaxed group-hover:text-stone-400 transition-colors">Smooth ink
                        flow and precision tips for a writing
                        experience that feels effortless and refined.</p>
                </div>
                <!-- Feature 2 -->
                <div
                    class="group relative p-8 bg-stone-50 rounded-[2rem] hover:bg-stone-900 transition-colors duration-500 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-stone-200/20 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-150 duration-500">
                    </div>
                    <div
                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900 mb-3 group-hover:text-white transition-colors">Premium
                        Paper</h3>
                    <p class="text-stone-500 leading-relaxed group-hover:text-stone-400 transition-colors">Sourced from
                        sustainable forests, our paper is thick,
                        acid-free, and a joy to touch.</p>
                </div>
                <!-- Feature 3 -->
                <div
                    class="group relative p-8 bg-stone-50 rounded-[2rem] hover:bg-stone-900 transition-colors duration-500 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-stone-200/20 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-150 duration-500">
                    </div>
                    <div
                        class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900 mb-3 group-hover:text-white transition-colors">Modern
                        Design</h3>
                    <p class="text-stone-500 leading-relaxed group-hover:text-stone-400 transition-colors">Minimalist
                        aesthetics that declutter your desk and clarify
                        your mind. Designed for focus.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Philosophy Section -->
    <section class="py-24 bg-stone-900 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-teal-500 blur-[100px] opacity-20"></div>
                    <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=1000&auto=format&fit=crop"
                        alt="Our Philosophy"
                        class="relative rounded-[2rem] shadow-2xl opacity-90 border border-stone-700 w-full object-cover aspect-square">
                </div>
                <div>
                    <span class="text-teal-400 font-bold tracking-widest uppercase text-sm">Our Philosophy</span>
                    <h2 class="text-4xl md:text-5xl font-black mt-4 mb-6 leading-tight">Analog Tools for a <br><span
                            class="text-stone-400">Digital World.</span></h2>
                    <div class="space-y-6 text-lg text-stone-300 font-light leading-relaxed">
                        <p>
                            In an age of constant notifications and digital noise, we believe in the sanctity of the
                            blank page.
                            There is something undeniably powerful about putting pen to paper—it disconnects you from
                            the
                            chaos and reconnects you with your thoughts.
                        </p>
                        <p>
                            Anchor Stationery isn't just about selling pens; it's about providing the tools you need to
                            slow down,
                            think deeply, and create something that lasts.
                        </p>
                    </div>
                    <div class="mt-10">
                        <a href="#"
                            class="text-white border-b-2 border-teal-500 pb-1 font-bold hover:text-teal-400 transition-colors">Read
                            Our Story &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-stone-900 mb-4">Loved by Creatives</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                    <div class="flex text-teal-500 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-stone-600 mb-6 font-medium">"The quality of the notebooks is unmatched. The paper
                        handles fountain pen ink beautifully without any feathering."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-stone-200 rounded-full overflow-hidden">
                            <img src="https://i.pravatar.cc/150?u=1" alt="User" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-stone-900 text-sm">Sarah Jenkins</p>
                            <p class="text-xs text-stone-400 uppercase tracking-wider">Illustrator</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-100 transform md:-translate-y-4">
                    <div class="flex text-teal-500 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-stone-600 mb-6 font-medium">"I've tried every premium brand out there, but Anchor has
                        become my go-to. Minimalist perfection."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-stone-200 rounded-full overflow-hidden">
                            <img src="https://i.pravatar.cc/150?u=2" alt="User" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-stone-900 text-sm">Marcus Chen</p>
                            <p class="text-xs text-stone-400 uppercase tracking-wider">Architect</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-100">
                    <div class="flex text-teal-500 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-stone-600 mb-6 font-medium">"Fast shipping to Accra and the packaging was so
                        beautiful I didn't want to open it. Highly recommended!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-stone-200 rounded-full overflow-hidden">
                            <img src="https://i.pravatar.cc/150?u=3" alt="User" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-stone-900 text-sm">Ama Osei</p>
                            <p class="text-xs text-stone-400 uppercase tracking-wider">Writer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter / CTA -->
    <section class="py-24 bg-teal-900 text-white overflow-hidden relative">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-teal-500/30 blur-[150px] rounded-full"></div>

        <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-black mb-6 tracking-tight">Stay Anchored.</h2>
            <p class="text-teal-100 text-lg mb-10 max-w-xl mx-auto">Join our community of creative minds. Get exclusive
                access to new drops, design tips, and 10% off your first order.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Your email address"
                    class="flex-1 px-6 py-4 rounded-xl bg-teal-800/50 border border-teal-700 text-white placeholder-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent transition-all backdrop-blur-sm">
                <button type="submit"
                    class="px-8 py-4 bg-white text-teal-900 font-bold rounded-xl hover:bg-stone-50 transition-all shadow-lg">Subscribe</button>
            </form>
        </div>
    </section>
</x-app-layout>