<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq', compact('faqs'));
    }
    public function index2()
    {
        $faqs = Faq::all();
        return view('faqs', compact('faqs'));
    }

    // Menampilkan detail FAQ berdasarkan ID
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.show', compact('faq'));
    }

    // Menampilkan form untuk membuat FAQ baru
    public function create()
    {
        return view('admin.faqs.create');
    }

    // Menyimpan FAQ baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq')->with('success', 'FAQ created successfully.');
    }

    // Menampilkan form untuk mengedit FAQ
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    // Memperbarui data FAQ di database
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq')->with('success', 'FAQ updated successfully.');
    }

    // Menghapus FAQ dari database
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq')->with('success', 'FAQ deleted successfully.');
    }
}
