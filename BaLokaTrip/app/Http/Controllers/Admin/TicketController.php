<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input dari search bar
    $search = $request->input('search');

    // Query tiket dengan relasi 'product' dan pencarian
    $tickets = Ticket::with('product') // Load relasi 'product'
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%") // Filter berdasarkan nama tiket
                ->orWhereHas('product', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%"); // Filter berdasarkan nama produk terkait
                });
        })
        ->paginate(10); // Pagination

    // Map tiket untuk menambahkan properti 'product_name'
    $tickets->getCollection()->transform(function ($ticket) {
        $ticket->product_name = $ticket->product ? $ticket->product->name : 'No product';
        return $ticket;
    });

    return view('admin.ticket', compact('tickets'));
    }

    public function index2()
    {
        // Ambil tiket beserta produk yang terkait
        $tickets = Ticket::with('product')->get();

        // Menambahkan nama produk, gambar produk, nama tiket, dan harga tiket untuk setiap tiket
        $ticketsWithProductDetails = $tickets->map(function ($ticket) {
            $ticket->product_name = $ticket->product ? $ticket->product->name : 'No product';
            $ticket->product_image = $ticket->product ? $ticket->product->image : null;
            $ticket->ticket_name = $ticket->name; // Nama tiket
            $ticket->ticket_price = $ticket->price; // Harga tiket
            return $ticket;
        });

        return view('ticket', compact('ticketsWithProductDetails'));
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
