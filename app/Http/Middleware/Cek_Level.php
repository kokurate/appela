<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cek_Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // Kalo yang login itu sesuai dengan levelnya return next
        if (in_array($request->user()->level, $levels)){
            return $next($request);
        }
        // kalo nda sesuai redirect ke cannot access 
        return redirect()->route('cannot_access');

    }
}
