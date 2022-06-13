<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Jangan lupa registrasi di kernel.php. Agar middleware  terbaca oleh sistem.
        // Buka di folder app/Http/Kernel.php

        // return $next($request);
        // Cek jika belum login kembalikan ke login
        if (!Auth::check()) {
            return redirect('login'); // ada pake name login
        }
        $user = Auth::user();

        // Jika user yang login benar-benar admin etc maka lanjutkan ($next) requestnya yang di route (dilempar ke route)
        if($user->level == $roles)
            return $next($request);


        // return redirect('login')->with('error',"Kamu tidak memiliki Akses");
        return redirect()->route('cannot_access');

    }
}
