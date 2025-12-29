<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');
    }

    public function track(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $order = Order::where('number', $request->order_number)
            ->whereHas('user', function ($query) use ($request) {
                $query->where('email', $request->email);
            })
            ->with(['items.product', 'transactions'])
            ->first();

        if (!$order) {
            return back()->with('error', 'Order not found. Please check your details and try again.');
        }

        return view('tracking.result', compact('order'));
    }
}
