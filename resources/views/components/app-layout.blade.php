<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Anchor Stationery') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body
    class="font-sans antialiased bg-stone-50 text-stone-900 selection:bg-teal-200 selection:text-teal-900 flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav
        class="fixed w-full z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-stone-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <!-- Logo Placeholder (Anchor Icon) -->
                        <svg class="h-8 w-8 text-teal-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5">
                            <path d="M12 2C10.8954 2 10 2.89543 10 4V8H14V4C14 2.89543 13.1046 2 12 2Z"
                                class="fill-teal-600/20 stroke-teal-600" stroke-width="1.5" />
                            <path d="M12 2V8" stroke-linecap="round" />
                            <path d="M8 8H16" stroke-linecap="round" />
                            <path d="M12 8V16" stroke-linecap="round" />
                            <path d="M5 13C5 17.5 8.5 21 12 21C15.5 21 19 17.5 19 13" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 16L12 18" stroke-linecap="round" />
                        </svg>
                        <span class="font-bold text-2xl tracking-tight text-stone-800 hidden sm:block">Anchor<span
                                class="text-teal-600">.</span></span>
                    </a>
                </div>
                <div class="hidden lg:flex space-x-8 items-center">
                    <a href="{{ url('/') }}"
                        class="text-stone-600 hover:text-teal-600 font-medium transition-colors">Home</a>
                    <a href="{{ url('/shop') }}"
                        class="text-stone-600 hover:text-teal-600 font-medium transition-colors">Shop</a>

                    <a href="{{ route('about') }}"
                        class="text-stone-600 hover:text-teal-600 font-medium transition-colors">About Us</a>
                    <a href="{{ route('contact') }}"
                        class="text-stone-600 hover:text-teal-600 font-medium transition-colors">Contact</a>
                    <a href="{{ route('track') }}"
                        class="text-stone-600 hover:text-teal-600 font-medium transition-colors">Track Order</a>
                </div>
                <div class="flex items-center space-x-6">
                    <!-- Cart Icon -->
                    <a href="{{ url('/cart') }}" class="relative group">
                        <svg class="w-6 h-6 text-stone-600 group-hover:text-teal-600 transition-colors" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        @php
                            $cartCount = array_sum(array_column(session('cart', []), 'quantity'));
                        @endphp
                        @if($cartCount > 0)
                            <span
                                class="absolute -top-2 -right-2 bg-teal-600 text-white text-[10px] font-bold h-5 w-5 rounded-full flex items-center justify-center border-2 border-white">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Auth Links -->
                    @auth
                        <div class="relative ml-2 group" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false"
                                class="flex items-center gap-2 focus:outline-none">
                                <img class="h-9 w-9 rounded-full object-cover border-2 border-transparent hover:border-teal-500 transition-all"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D9488&color=ffffff&font-size=0.5"
                                    alt="{{ Auth::user()->name }}">
                            </button>
                            <!-- Dropdown -->
                            <div x-show="open" style="display: none;"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 border border-stone-100 z-50">
                                <div class="px-4 py-3 border-b border-stone-100">
                                    <p class="text-sm font-bold text-stone-900 truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-stone-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-stone-600 hover:bg-stone-50 hover:text-teal-600 transition-colors">Dashboard</a>
                                <a href="{{ route('dashboard.orders') }}"
                                    class="block px-4 py-2 text-sm text-stone-600 hover:bg-stone-50 hover:text-teal-600 transition-colors">My
                                    Orders</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition-colors">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="hidden md:flex items-center gap-4">
                            <a href="{{ route('login') }}"
                                class="text-sm font-bold text-stone-600 hover:text-teal-600">Login</a>
                            <a href="{{ route('register') }}"
                                class="text-sm font-bold bg-stone-900 text-white px-5 py-2 rounded-full hover:bg-teal-600 transition-colors shadow-lg hover:shadow-teal-500/20">Sign
                                Up</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-stone-900 text-white pt-20 pb-12 mt-auto relative overflow-hidden">
        <!-- Abstract Background -->
        <div class="absolute top-0 right-0 -mr-64 -mt-64 w-[500px] h-[500px] bg-teal-900/20 rounded-full blur-[100px]">
        </div>
        <div
            class="absolute bottom-0 left-0 -ml-64 -mb-64 w-[500px] h-[500px] bg-emerald-900/10 rounded-full blur-[100px]">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Brand Column -->
                <div class="space-y-6">
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <svg class="h-10 w-10 text-teal-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5">
                            <!-- Pen Nib (Top/Shank) -->
                            <path d="M12 2C10.8954 2 10 2.89543 10 4V8H14V4C14 2.89543 13.1046 2 12 2Z"
                                class="fill-teal-500/20 stroke-teal-500" stroke-width="1.5" />
                            <path d="M12 2V8" stroke-linecap="round" />
                            <!-- Anchor Crossbar (Stylized as Pen Clip concept or just bar) -->
                            <path d="M8 8H16" stroke-linecap="round" />
                            <!-- Anchor Shank & Flukes -->
                            <path d="M12 8V16" stroke-linecap="round" />
                            <path d="M5 13C5 17.5 8.5 21 12 21C15.5 21 19 17.5 19 13" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <!-- Pen Tip at the bottom of shank -->
                            <path d="M12 16L12 18" stroke-linecap="round" />
                        </svg>
                        <span class="font-bold text-2xl tracking-tight text-white">Anchor<span
                                class="text-teal-500">.</span></span>
                    </a>
                    <p class="text-stone-400 leading-relaxed text-sm">
                        Curating the finest analog tools for your creative journey. Designed for focus, crafted for
                        perfection.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-stone-800 flex items-center justify-center text-stone-400 hover:bg-teal-600 hover:text-white transition-all transform hover:-translate-y-1">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-stone-800 flex items-center justify-center text-stone-400 hover:bg-teal-600 hover:text-white transition-all transform hover:-translate-y-1">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465C9.673 2.013 10.03 2 12.315 2zm-1.012 3c-2.11 0-2.355.012-3.14.048-.795.036-1.222.18-1.506.29-.382.148-.654.332-.94.618-.285.286-.469.558-.617.94-.11.284-.254.71-.29 1.505-.036.786-.048 1.031-.048 3.141s.012 2.355.048 3.14c.036.795.18 1.222.29 1.506.148.382.332.654.618.94.286.285.558.469.94.617.284.11.71.254 1.505.29.786.036 1.031.048 3.141.048s2.355-.012 3.14-.048c.795-.036 1.222-.18 1.506-.29.382-.148.654-.332.94-.618.286-.285.469-.558.617-.94.11-.284.254-.71.29-1.505.036-.786.048-1.031.048-3.141s-.012-2.355-.048-3.14c-.036-.795-.18-1.222-.29-1.506-.148-.382-.332-.654-.618-.94-.285-.286-.558-.469-.94-.617-.284-.11-.71-.254-1.505-.29-.786-.036-1.031-.048-3.141-.048z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-stone-800 flex items-center justify-center text-stone-400 hover:bg-teal-600 hover:text-white transition-all transform hover:-translate-y-1">
                            <span class="sr-only">X (Twitter)</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Shop Column -->
                <div>
                    <h3 class="font-bold text-lg mb-6 text-white tracking-wide">Shop</h3>
                    <ul class="space-y-4">
                        @if(isset($footerCategories))
                            @foreach($footerCategories as $category)
                                <li>
                                    <a href="{{ route('shop', ['category' => $category->slug]) }}"
                                        class="text-stone-400 hover:text-teal-400 transition-colors inline-block hover:translate-x-1 duration-200">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                        <li>
                            <a href="{{ route('shop') }}"
                                class="text-teal-500 font-bold hover:text-teal-400 inline-block hover:translate-x-1 duration-200 mt-2">
                                View All &rarr;
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Help Column -->
                <div>
                    <h3 class="font-bold text-lg mb-6 text-white tracking-wide">Help</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('shipping') }}"
                                class="text-stone-400 hover:text-teal-400 transition-colors inline-block hover:translate-x-1 duration-200">Shipping
                                & Returns</a></li>
                        <li><a href="{{ route('faq') }}"
                                class="text-stone-400 hover:text-teal-400 transition-colors inline-block hover:translate-x-1 duration-200">FAQ</a>
                        </li>
                        <li><a href="{{ route('track') }}"
                                class="text-stone-400 hover:text-teal-400 transition-colors inline-block hover:translate-x-1 duration-200">Track
                                Order</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="text-stone-400 hover:text-teal-400 transition-colors inline-block hover:translate-x-1 duration-200">Contact
                                Us</a></li>
                    </ul>
                </div>

                <!-- Newsletter (Mini) -->
                <div>
                    <h3 class="font-bold text-lg mb-6 text-white tracking-wide">Stay Updated</h3>
                    <p class="text-stone-400 text-sm mb-4">Subscribe for exclusive offers and design drops.</p>
                    @if(session('success'))
                        <div class="mb-4 text-sm text-teal-400 font-bold">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-2">
                        @csrf
                        <input type="email" name="email" placeholder="Email address" required
                            class="w-full px-4 py-3 bg-stone-800 border border-stone-700 rounded-lg text-white placeholder-stone-500 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all">
                        <button type="submit"
                            class="w-full px-4 py-3 bg-teal-600 text-white font-bold rounded-lg hover:bg-teal-500 transition-colors shadow-lg hover:shadow-teal-500/20">Sign
                            Up</button>
                    </form>
                </div>
            </div>

            <div class="border-t border-stone-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-stone-500 text-sm">© {{ date('Y') }} Anchor Stationery. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="{{ route('privacy') }}"
                        class="text-stone-500 hover:text-teal-400 text-sm transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}"
                        class="text-stone-500 hover:text-teal-400 text-sm transition-colors">Terms of
                        Service</a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }
    </style>
</body>

</html>
