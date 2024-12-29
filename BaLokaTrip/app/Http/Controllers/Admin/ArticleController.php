<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.article', compact('articles'));
    }

    public function index2(){
        $articles = Article::all();
        return view('article', compact('articles'));
    }

    public function index3(){
        $articles = Article::paginate(2);;
        return view('article', compact('articles'));
    }

    public function show2($id)
    {
        $article = Article::findOrFail($id); // Jika ID tidak ditemukan, akan menghasilkan 404
        return view('articles.show', compact('article'));
    }

    // Menampilkan detail article berdasarkan ID
    public function show($id)
    {
        $articles = Article::findOrFail($id);
        return view('admin.articles.show', compact('articles'));
    }

    // Menampilkan form untuk membuat artikel baru
    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan file gambar jika ada
        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images/article', 'public');
        }

        Article::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.article')->with('success', 'Artikel berhasil dibuat.');
    }

     // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         // Menyimpan file gambar jika ada pembaruan
         $imagePath = $article->gambar; // gunakan gambar lama jika tidak diupdate
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images/article', 'public');
        }
        $article->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('admin.article')->with('success', 'Artikel berhasil diperbarui.');
    }

    // Menghapus artikel dari database
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus file gambar jika ada
        if ($article->gambar && \Storage::disk('public')->exists($article->gambar)) {
            \Storage::disk('public')->delete($article->gambar);
        }

        $article->delete();

        return redirect()->route('admin.article')->with('success', 'Artikel berhasil dihapus.');
    }

    
}
