<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;
use App\Models\Transaction;


class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('shop');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('shop.checkout', [
            'cart' => $cart,
            'total' => $total,
            'addresses' => auth()->check() ? auth()->user()->addresses : collect([])
        ]);
    }

    public function place(Request $request, \App\Services\PaystackService $paystack)
    {
        $user = auth()->user();

        // Validate basic fields
        $rules = [
            'email' => 'required|email',
        ];

        // Conditional validation based on address selection
        if ($request->has('address_id') && $request->address_id != 'new') {
            $rules['address_id'] = 'required|exists:addresses,id';
        } else {
            $rules['first_name'] = 'required|string';
            $rules['last_name'] = 'required|string';
            $rules['line_1'] = 'required|string';
            $rules['city'] = 'required|string';
            $rules['state'] = 'required|string';
            $rules['zip'] = 'required|string';
        }

        $request->validate($rules);

        // Determine address data
        $addressData = [];
        if ($request->address_id && $request->address_id != 'new') {
            $address = \App\Models\Address::find($request->address_id);
            // Assuming Address model has compatible fields.
            // We need to map Address model fields to Order shipping fields if they differ.
            // Address model has: line_1, line_2, city, state, zip.
            // It might NOT have first_name/last_name if those are on User.
            // For now, we'll use User's name if Address doesn't have it, or request input.
            // Let's assume for simplicity we use the form input for names even if address is selected,
            // OR we just use the user's name. Let's use User's name for now if using saved address.

            $addressData = [
                'shipping_first_name' => collect(explode(' ', $user->name))->first(),
                'shipping_last_name' => collect(explode(' ', $user->name))->slice(1)->join(' '),
                'shipping_email' => $user->email,
                'shipping_line_1' => $address->line_1,
                'shipping_line_2' => $address->line_2,
                'shipping_city' => $address->city,
                'shipping_state' => $address->state,
                'shipping_zip' => $address->zip,
            ];
        } else {
            // New Address Input
            $addressData = [
                'shipping_first_name' => $request->first_name,
                'shipping_last_name' => $request->last_name,
                'shipping_email' => $request->email,
                'shipping_line_1' => $request->line_1,
                'shipping_line_2' => $request->line_2,
                'shipping_city' => $request->city,
                'shipping_state' => $request->state,
                'shipping_zip' => $request->zip,
            ];

            // Save this new address for the user?
            if ($user) {
                $user->addresses()->create([
                    'type' => 'shipping',
                    'line_1' => $request->line_1,
                    'line_2' => $request->line_2,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                ]);
            }
        }

        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 1. Create Order
        $order = Order::create([
            'user_id' => $user ? $user->id : null,
            'number' => 'OR-' . strtoupper(Str::random(10)), // Changed to Str::random
            'status' => 'pending', // Pending payment
            'currency' => 'GHS',
            'total_price' => $total,
            'shipping_price' => 0,
            'shipping_method' => 'Standard',
            'notes' => 'Placed via Checkout',
            'shipping_first_name' => $addressData['shipping_first_name'],
            'shipping_last_name' => $addressData['shipping_last_name'],
            'shipping_email' => $addressData['shipping_email'],
            'shipping_line_1' => $addressData['shipping_line_1'],
            'shipping_line_2' => $addressData['shipping_line_2'],
            'shipping_city' => $addressData['shipping_city'],
            'shipping_state' => $addressData['shipping_state'],
            'shipping_zip' => $addressData['shipping_zip'],
        ]);

        // 2. Create Order Items
        foreach ($cart as $item_id => $details) {
            $order->items()->create([ // Changed to use relationship
                'product_id' => $item_id,
                'quantity' => $details['quantity'],
                'unit_price' => $details['price'],
                'total_price' => $details['price'] * $details['quantity'],
            ]);
        }

        // Handle Payment
        $paymentMethod = $request->input('payment_method', 'paystack');

        if ($paymentMethod === 'cod') {
            // Create pending transaction for COD
            Transaction::create([
                'order_id' => $order->id,
                'payment_method' => 'cash_on_delivery',
                'transaction_id' => 'COD-' . strtoupper(Str::random(10)),
                'amount' => $total,
                'currency' => 'GHS', // Default to GHS
                'status' => 'pending',
            ]);

            // Clear cart
            session()->forget('cart');

            // Send Email
            try {
                $recipient = $order->shipping_email ?? ($user ? $user->email : null); // Use user email if shipping email is null
                if ($recipient) {
                    Mail::to($recipient)->send(new OrderPlaced($order));
                }
            } catch (\Exception $e) {
                // Log error, e.g., Log::error('Failed to send order confirmation email: ' . $e->getMessage());
            }

            return redirect()->route('dashboard.orders.show', $order)->with('success', 'Order placed successfully! Please pay on delivery.');
        } else { // Paystack Logic
            try {
                $reference = Str::uuid(); // Changed to Str::uuid
                // Create pending transaction
                Transaction::create([
                    'order_id' => $order->id,
                    'payment_method' => 'paystack',
                    'transaction_id' => $reference,
                    'amount' => $total,
                    'currency' => 'GHS',
                    'status' => 'pending',
                ]);

                $response = $paystack->initializeTransaction($addressData['shipping_email'], $total, $reference); // Used $addressData['shipping_email']

                if ($response['status']) {
                    return redirect($response['data']['authorization_url']);
                }

                return back()->with('error', 'Payment initialization failed: ' . $response['message']);

            } catch (\Exception $e) {
                return back()->with('error', 'Payment connection error: ' . $e->getMessage());
            }
        }
    }
}
