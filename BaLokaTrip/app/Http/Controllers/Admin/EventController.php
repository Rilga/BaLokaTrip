<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Menampilkan daftar semua event
    public function index()
    {
        $events = Event::all();
        return view('admin.event', compact('events'));
    }

    // Menampilkan halaman semua event untuk pengguna biasa
    public function index2()
    {
        $events = Event::all();
        return view('event', compact('events'));
    }

    // Menampilkan detail event berdasarkan ID
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    // Menampilkan form untuk membuat event baru
    public function create()
    {
        return view('admin.events.create');
    }

    // Menyimpan event baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required|max:255',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/events', $fileName);
            $data['image'] = $fileName;
        }

        Event::create($data);

        return redirect()->route('admin.event')->with('success', 'Event created successfully.');
    }

    // Menampilkan form untuk mengedit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // Memperbarui data event di database
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required|max:255',
            'event_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::delete('public/events/' . $event->image);
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/events', $fileName);
            $data['image'] = $fileName;
        }

        $event->update($data);

        return redirect()->route('admin.event')->with('success', 'Event updated successfully.');
    }

    // Menghapus event dari database
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->image) {
            Storage::delete('public/events/' . $event->image);
        }

        $event->delete();

        return redirect()->route('admin.event')->with('success', 'Event deleted successfully.');
    }
}
