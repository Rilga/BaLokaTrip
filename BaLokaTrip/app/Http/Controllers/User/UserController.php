<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Filter pencarian produk (opsional, jika ada form search)
        $search = $request->input('search');

        // Ambil semua produk atau berdasarkan pencarian
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        // Kirim data produk ke view
        return view('dashboard', compact('products'));
    }
}
