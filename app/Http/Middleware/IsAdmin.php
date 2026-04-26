<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return $next($request);
    }
    
    // Kalau bukan admin tapi maksa masuk, lempar ke dashboard biasa atau home
    return redirect('/dashboard')->with('error', 'Kamu bukan admin!');
}
}
