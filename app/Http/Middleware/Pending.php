<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Pending
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
        if(Auth::user()->role == "pending") {
            return $next($request);
        }
        else
        {
            return redirect('/pending')->with('status', 'Anda tidak diizinkan kehalaman tersebut :)');
        }
    }
    
}
