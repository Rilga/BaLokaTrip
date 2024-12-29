<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\Voucher;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1',
            'voucher_code' => 'nullable|string',
        ]);

        $ticket = Ticket::find($request->ticket_id);
        $totalPrice = $ticket->price * $request->quantity;
        $discount = 0;

        if ($request->voucher_code) {
            $voucher = Voucher::where('code', $request->voucher_code)
                                ->where('usage_limit', '>', 0)
                                ->first();

            if ($voucher) {
                if ($voucher->discount_amount) {
                    $discount = $voucher->discount_amount;
                } elseif ($voucher->discount_percentage) {
                    $discount = ($voucher->discount_percentage / 100) * $totalPrice;
                }

                $totalPrice -= $discount;
                $voucher->decrement('usage_limit');
            }
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'voucher_code' => $request->voucher_code,
            'discount' => $discount,
        ]);

        return redirect()->route('orders.show', $order->id)->with('success', 'Order berhasil dibuat!');
    }
}
