<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function showCheckout($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('checkout', compact('ticket'));
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'ticket_id' => 'required|integer',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $discount = Discount::where('code', $request->code)
            ->where('valid_from', '<=', Carbon::now())
            ->where('valid_until', '>=', Carbon::now())
            ->first();

        if (!$discount) {
            return back()->withErrors(['code' => 'Kode promo tidak valid atau telah kedaluwarsa']);
        }

        // Hitung harga setelah diskon
        $discountedPrice = $ticket->price;

        if ($discount->percentage) {
            $discountedPrice -= ($ticket->price * $discount->percentage / 100);
        }

        if ($discount->fixed_amount) {
            $discountedPrice -= $discount->fixed_amount;
        }

        // Simpan hasil diskon di session
        session([
            'discountedPrice' => max($discountedPrice, 0),
            'code' => $discount->code,
        ]);

        return back()->with('success', 'Kode promo berhasil diterapkan.');
    }

    public function process(Request $request)
    {
        // Validasi input dari form checkout
        $request->validate([
            'ticket_id' => 'required|integer',
            'quantity' => 'required|integer|min:1', // Validasi jumlah tiket
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        // Ambil tiket berdasarkan ID
        $ticket = Ticket::findOrFail($request->ticket_id);

        // Cek apakah stok cukup
        if ($request->quantity > $ticket->stock) {
            return back()->withErrors(['quantity' => 'Jumlah tiket yang diminta melebihi stok yang tersedia.']);
        }

        // Hitung harga setelah diskon jika ada
        $discountedPrice = session('discountedPrice') ?? $ticket->price;

        // Hitung total harga berdasarkan jumlah tiket
        $totalPrice = $discountedPrice * $request->quantity;

        // Simpan data order
        $order = new Order();
        $order->user_id = auth()->id();
        $order->ticket_id = $request->ticket_id;
        $order->quantity = $request->quantity; // Jumlah tiket yang dipesan
        $order->total_price = $totalPrice; // Total harga
        $order->voucher_code = session('code', null); // Kode voucher dari session
        $order->discount = ($ticket->price * $request->quantity) - $totalPrice; // Total diskon yang didapat
        $order->save();

        // Kurangi stok tiket sesuai jumlah yang dipesan
        $ticket->stock -= $request->quantity;
        $ticket->save();

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.sanitize');
        Config::$is3ds = config('services.midtrans.3ds');

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),
                'gross_amount' => $totalPrice, // Total harga
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ],
        ];

        try {
            // Buat transaksi dengan Midtrans
            $transaction = Snap::createTransaction($params);
            $snapToken = $transaction->token;

            // Redirect ke halaman pembayaran dengan Snap Token
            return view('checkout.payment', compact('snapToken'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan pada pembayaran.']);
        }
    }

    public function notificationHandler(Request $request)
    {
        $notif = $request->all();
        $orderId = $notif['order_id'];
        $transactionStatus = $notif['transaction_status'];

        $order = Order::where('order_id', $orderId)->first();

        if ($order) {
            if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                $order->status = 'paid'; // Atur status menjadi "Sudah Dibayar"
            } elseif ($transactionStatus == 'pending') {
                $order->status = 'pending'; // Masih menunggu pembayaran
            } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'expire') {
                $order->status = 'canceled'; // Transaksi dibatalkan atau kedaluwarsa
            }

            $order->save();
        }

        return response()->json(['status' => 'success']);
    }


    public function paymentCallback(Request $request)
    {
        // Handle the callback from Midtrans
        $notif = $request->all();
        
        // Process the notification data (e.g., update order status)
        // Handle payment status, such as "capture", "settlement", etc.
    }
    
}
