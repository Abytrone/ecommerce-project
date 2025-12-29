<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use App\Services\PaystackService;

class PaymentController extends Controller
{
    protected $paystack;

    public function __construct(PaystackService $paystack)
    {
        $this->paystack = $paystack;
    }

    public function callback()
    {
        $reference = request()->query('reference');

        if (!$reference) {
            return redirect()->route('shop')->with('error', 'No payment reference provided.');
        }

        $response = $this->paystack->verifyTransaction($reference);

        if ($response['status'] && $response['data']['status'] === 'success') {

            // Find transaction by reference (which we should have stored or linked)
            // Or find order by email/amount if needed? Best practice: pass order ID in metadata during init.
            // But Paystack init payload only allowed `reference`. We can use our own reference for the transaction.

            // Re-fetch the transaction reference used.
            // In init, we can pass our own unique ref.
            // Let's assume the reference passed back matches one we generated?
            // Actually, in CheckoutController we should generate a ref and save it first.

            $transaction = Transaction::where('transaction_id', $reference)->first();

            if ($transaction) {
                $transaction->update(['status' => 'success']);

                $order = Order::find($transaction->order_id);
                if ($order) {
                    $order->update(['status' => 'processing']); // Paid

                    // Clear cart
                    session()->forget('cart');

                    // Trigger Email
                    try {
                        $recipient = $order->shipping_email ?? $order->user;
                        if ($recipient) {
                            \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\OrderPlaced($order));
                        }
                    } catch (\Exception $e) {
                        // Log error
                    }

                    return redirect()->route('dashboard.orders.show', $order)->with('success', 'Payment successful! Order #' . $order->number);
                }
            }

            return redirect()->route('shop')->with('error', 'Order not found for this payment.');
        }

        return redirect()->route('shop')->with('error', 'Payment failed or invalid.');
    }
}
