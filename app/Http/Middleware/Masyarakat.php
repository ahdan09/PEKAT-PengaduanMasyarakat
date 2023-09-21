<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

// class Masyarakat
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         // Periksa apakah pengguna adalah masyarakat (contoh: peran dengan nama 'masyarakat')
//         if (Auth::check() && Auth::user()->role === 'user') {
//             // Langsung arahkan ke metode index() dalam MasyarakatController
//             return app('App\Http\Controllers\MasyarakatController')->index();
//         }

//         // Jika pengguna bukan masyarakat, Anda dapat mengarahkannya ke halaman lain atau memberikan respon sesuai kebutuhan.
//         return redirect('/'); // Ganti dengan halaman yang sesuai
//     }
// }
