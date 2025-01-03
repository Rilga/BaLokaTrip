<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Midtrans\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function riwayatPesanan()
    {
        
        $orders = Order::with(['ticket.product'])
                ->where('user_id', auth()->id())
                ->get();

        return view('checkout.riwayatpesanan', compact('orders'));
            
    }
    
    public function downloadPDF($id)
    {
        $order = Order::with('ticket.product')->findOrFail($id);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.ticket', compact('order'))
                ->setPaper('a4', 'portrait');

        // Return PDF for download
        return $pdf->download($order->ticket->name.'.pdf');
    }

}
