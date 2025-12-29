<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $recentOrders = $user->orders()->latest()->take(5)->get();
        return view('dashboard.index', compact('user', 'recentOrders'));
    }

    public function orders()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        // Ensure user owns the order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        return view('dashboard.orders.show', compact('order'));
    }
}
