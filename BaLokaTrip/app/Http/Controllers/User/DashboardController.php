<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    \Log::info("Search query: {$search}");

    // Query database untuk mendapatkan produk dengan pencarian
    $products = Product::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
    })->paginate(10);

    \Log::info("Products found: " . $products->total());

    // Kirim data produk ke view
    $discounts = Discount::all();

    return view('dashboard', compact('products' , 'discounts'));
    }
}
