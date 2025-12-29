<x-app-layout>
    <div class="bg-stone-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-24">
                        <div class="flex items-center gap-4 mb-8">
                            <div
                                class="w-12 h-12 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center font-bold text-xl">
                                {{ $user->name[0] }}
                            </div>
                            <div>
                                <h3 class="font-bold text-stone-900">{{ $user->name }}</h3>
                                <p class="text-xs text-stone-500">{{ $user->email }}</p>
                            </div>
                        </div>
                        <nav class="space-y-2">
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl bg-teal-50 text-teal-700 font-bold">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                Overview
                            </a>
                            <a href="{{ route('dashboard.orders') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl text-stone-600 hover:bg-stone-50 font-medium transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                My Orders
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 font-medium transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <h1 class="text-3xl font-black text-stone-900 mb-8">Dashboard</h1>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                            <h3 class="text-stone-500 text-sm font-bold mb-2 uppercase tracking-wide">Total Orders</h3>
                            <p class="text-4xl font-black text-teal-600">{{ $user->orders()->count() }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                            <h3 class="text-stone-500 text-sm font-bold mb-2 uppercase tracking-wide">Pending</h3>
                            <p class="text-4xl font-black text-yellow-500">
                                {{ $user->orders()->where('status', 'pending')->count() }}
                            </p>
                        </div>
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                            <h3 class="text-stone-500 text-sm font-bold mb-2 uppercase tracking-wide">Delivered</h3>
                            <p class="text-4xl font-black text-green-500">
                                {{ $user->orders()->where('status', 'delivered')->count() }}
                            </p>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
                        <div class="p-6 border-b border-stone-100 flex justify-between items-center">
                            <h2 class="text-xl font-bold text-stone-900">Recent Orders</h2>
                            <a href="{{ route('dashboard.orders') }}"
                                class="text-teal-600 font-bold text-sm hover:underline">View All</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <tbody class="divide-y divide-stone-100">
                                    @forelse($recentOrders as $order)
                                        <tr class="hover:bg-stone-50/50 transition-colors">
                                            <td class="p-6">
                                                <span class="block font-bold text-stone-900">#{{ $order->number }}</span>
                                                <span
                                                    class="text-xs text-stone-500">{{ $order->created_at->format('M d, Y') }}</span>
                                            </td>
                                            <td class="p-6">
                                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                                                @if($order->status == 'completed' || $order->status == 'delivered') bg-green-100 text-green-700
                                                                @elseif($order->status == 'processing') bg-blue-100 text-blue-700
                                                                @elseif($order->status == 'shipped') bg-purple-100 text-purple-700
                                                                @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                                                                @else bg-yellow-100 text-yellow-700 @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td class="p-6 font-bold text-stone-900">
                                                {{ $order->currency }} {{ number_format($order->total_price, 2) }}
                                            </td>
                                            <td class="p-6 text-right">
                                                <a href="{{ route('dashboard.orders.show', $order) }}"
                                                    class="text-teal-600 font-bold text-sm hover:underline">Details</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="p-12 text-center text-stone-500">
                                                No orders found. <a href="{{ route('shop') }}"
                                                    class="text-teal-600 font-bold hover:underline">Start shopping</a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>