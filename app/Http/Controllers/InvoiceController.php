<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download(Order $order)
    {
        // Ensure user is authorized to view this order
        if (request()->user()->id !== $order->user_id && !request()->user()->hasRole('super_admin')) {
            abort(403);
        }

        $pdf = Pdf::loadView('orders.invoice', ['order' => $order]);

        return $pdf->download('invoice-' . $order->number . '.pdf');
    }
}
