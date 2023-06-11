<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimeoutSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $maxIdleTime = 600; // Waktu idle maksimum dalam detik (10 menit)

        // Mengambil waktu terakhir akses dari sesi saat ini
        $lastActivityTime = session('last_activity_time');

        // Mengambil waktu sekarang
        $currentTime = time();

        // Cek jika sesi ada dan waktu idle lebih dari $maxIdleTime
        if ($lastActivityTime && ($currentTime - $lastActivityTime > $maxIdleTime)) {
            // Menghapus sesi dan logout pengguna
            Session::flush();
            return redirect('/'); // Ganti dengan URL logout yang sesuai
        }

        // Menyimpan waktu terakhir akses ke sesi
        session(['last_activity_time' => $currentTime]);

        return $next($request);
    }
}
