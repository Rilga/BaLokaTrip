<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ticket;

class BookController extends Controller
{
    public function index()
    {
        // Fetch all products (which are related to tickets)
        $products = Product::all();
        $ticket = Ticket::all();
        // Pass products to the view
        return view('book', compact('products', 'ticket'));
    }
}
