<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class pengguna
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
        if( auth()->guest() || auth()->user()->role !== 'pengguna'){
        abort(403);
        }

        return $next($request);
        return redirect('login')->withErrors('Silahkan Login Terlebih Dahulu');
    }
}
