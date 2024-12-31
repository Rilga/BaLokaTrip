<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function toggleDarkMode(Request $request)
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login
        $user->dark_mode = !$user->dark_mode; // Toggle mode
        $user->save(); // Menyimpan preferensi ke database

        return back(); // Mengembalikan pengguna ke halaman sebelumnya
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->usertype == 'user') {
            return $next($request);
        }

        return redirect()->back();
    }
}
