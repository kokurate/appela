<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Can_Sistem_Informasi
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
    // Kalo yang login itu sesuai dengan levelnya return next
         if (auth()->user()->level == 'admin' OR 
            auth()->user()->level == 'sistem_informasi' OR 
            auth()->user()->can_sistem_informasi == 1 ){
            return $next($request);
            }
        // kalo nda sesuai redirect ke cannot access 
        return redirect()->route('cannot_access');
    }
}
