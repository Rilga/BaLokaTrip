<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('product')->get(); // Ambil semua tiket dengan data produk terkait
        return view('admin.ticket', compact('tickets'));
    }

    public function create()
    {
        $products = Product::all(); // Ambil semua wisata (products)
        return view('admin.tickets.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Pastikan ada produk yang valid
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Membuat tiket baru dengan menghubungkannya ke produk yang valid
        Ticket::create([
            'product_id' => $request->product_id, // Menyimpan produk yang valid
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.ticket')->with('success', 'Tiket berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit tiket
    public function edit(Ticket $ticket)
    {
        $products = Product::all(); // Ambil semua produk (wisata)
        return view('admin.tickets.edit', compact('ticket', 'products'));
    }

    // Mengupdate tiket yang sudah ada
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Pastikan produk valid
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Perbarui tiket dengan data yang diberikan
        $ticket->update([
            'product_id' => $request->product_id, // Update produk yang valid
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.ticket')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.ticket')->with('success', 'Tiket berhasil dihapus.');
    }
}
