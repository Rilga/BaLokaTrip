<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisualController extends Controller
{
    public function index()
    {
        // Ambil jumlah user yang registrasi berdasarkan bulan
        $registrations = DB::table('users')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Mapping data ke format yang dapat digunakan
        $months = [];
        $counts = [];

        foreach ($registrations as $registration) {
            $months[] = Carbon::create()->month($registration->month)->format('F');
            $counts[] = $registration->count;
        }

        // Kirim data ke view
        return view('admin.visual', compact('months', 'counts'));
    }
}
