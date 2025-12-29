<x-app-layout>
    <div
        class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-stone-50">
        <!-- Background Elements -->
        <div
            class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-teal-100/50 rounded-full blur-[100px] -z-10 animate-pulse">
        </div>
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-emerald-100/50 rounded-full blur-[100px] -z-10 animate-pulse"
            style="animation-delay: 1.5s;"></div>

        <div
            class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-2xl relative z-10 border border-stone-100">
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-black text-stone-900 tracking-tight">Create Account</h2>
                <p class="mt-2 text-sm text-stone-500">
                    Already have an account? <a href="{{ route('login') }}"
                        class="font-bold text-teal-600 hover:text-teal-500 transition-colors">Sign in instead</a>
                </p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-bold text-stone-700 mb-1">Full Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="appearance-none relative block w-full px-6 py-3 border border-stone-200 placeholder-stone-400 text-stone-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent focus:z-10 sm:text-sm transition-all bg-stone-50 focus:bg-white"
                            placeholder="John Doe">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-stone-700 mb-1">Email Address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none relative block w-full px-6 py-3 border border-stone-200 placeholder-stone-400 text-stone-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent focus:z-10 sm:text-sm transition-all bg-stone-50 focus:bg-white"
                            placeholder="you@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div x-data="{ show: false }">
                        <label for="password" class="block text-sm font-bold text-stone-700 mb-1">Password</label>
                        <div class="relative">
                            <input id="password" name="password" :type="show ? 'text' : 'password'"
                                autocomplete="new-password" required
                                class="appearance-none relative block w-full px-6 py-3 border border-stone-200 placeholder-stone-400 text-stone-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent focus:z-10 sm:text-sm transition-all bg-stone-50 focus:bg-white pr-10"
                                placeholder="••••••••">
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 z-20 text-stone-400 hover:text-stone-600 focus:outline-none">
                                <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div x-data="{ show: false }">
                        <label for="password_confirmation" class="block text-sm font-bold text-stone-700 mb-1">Confirm
                            Password</label>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation"
                                :type="show ? 'text' : 'password'" autocomplete="new-password" required
                                class="appearance-none relative block w-full px-4 py-3 border border-stone-200 placeholder-stone-400 text-stone-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent focus:z-10 sm:text-sm transition-all bg-stone-50 focus:bg-white pr-10"
                                placeholder="••••••••">
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 z-20 text-stone-400 hover:text-stone-600 focus:outline-none">
                                <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-stone-900 hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300 shadow-lg hover:shadow-teal-500/30">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-stone-500 group-hover:text-teal-200 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0 1 1 0 002 0z" />
                            </svg>
                        </span>
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>