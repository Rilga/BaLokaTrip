<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }
    public function index2()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }
    public function index3(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', "%{$search}%")->get();
        return view('dashboard', compact('products', 'search'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Cari produk berdasarkan ID
        return view('show', compact('product')); // Tampilkan view di folder products
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil file gambar yang diupload
        $image = $request->file('image');

        // Tentukan nama file gambar
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Simpan gambar di storage/public/images/product
        $imagePath = $image->storeAs('public/images/product', $imageName);

        // Simpan informasi produk ke database dengan path relatif
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'storage/images/product/' . $imageName, // Path relatif untuk digunakan dalam view
        ]);

        return redirect()->route('admin.product')->with('success', 'Product created successfully.');
    }



    public function edit($id)
    {
        // Cek produk berdasarkan ID
        $product = Product::findOrFail($id);
        
        // Jika produk tidak ditemukan, akan melempar error 404
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    // Cari produk berdasarkan ID, jika tidak ditemukan, maka akan menampilkan error 404
    $product = Product::findOrFail($id);

    // Validasi input yang diterima dari form
    $validated = $request->validate([
        'name' => 'required|max:255', // Nama produk wajib diisi dan tidak lebih dari 255 karakter
        'description' => 'required', // Deskripsi produk wajib diisi
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Validasi file gambar (optional)
    ]);

    // Jika ada gambar yang diupload, simpan gambar dan tambahkan ke data produk
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::delete($product->image);
        }

        // Tentukan nama file gambar
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        // Simpan gambar di storage/public/images/product
        $imagePath = $request->file('image')->storeAs('public/images/product', $imageName);

        // Set path relatif untuk digunakan dalam database
        $validated['image'] = 'storage/images/product/' . $imageName;
    }

    // Update produk dengan data yang sudah tervalidasi
    $product->update($validated);

    // Redirect ke halaman produk dengan pesan sukses
    return redirect()->route('admin.product')->with('success', 'Product berhasil diperbarui!');
}



    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Cek apakah file gambar ada dan sudah disimpan
        $imagePath = 'images/product/' . $product->image;

        if (Storage::exists($imagePath)) {
            // Log untuk memastikan gambar ada
            \Log::info("Deleting image: " . $imagePath);

            // Hapus gambar menggunakan Storage facade
            Storage::delete($imagePath);
        } else {
            \Log::info("Image not found: " . $imagePath);
        }

        // Hapus produk dari database
        $product->delete();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('admin.product')->with('success', 'Product deleted successfully.');
    }

}
