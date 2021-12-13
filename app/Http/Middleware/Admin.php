<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == "admin") {
            return $next($request);
        }
        else
        {
            return redirect('/home')->with('status', 'Anda tidak diizinkan kehalaman tersebut :)');
        }
    }
    
}
