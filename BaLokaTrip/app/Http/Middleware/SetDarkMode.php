<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetDarkMode
{
    public function handle(Request $request, Closure $next)
    {
        // Mengecek session atau preferensi database pengguna
        $darkMode = session('dark_mode', false); // Ambil dari session atau default false

        // Menyebarkan variabel ke view
        view()->share('darkMode', $darkMode);

        return $next($request);
    }
}
