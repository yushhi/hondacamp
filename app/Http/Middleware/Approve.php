<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Approve
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
        if(Auth::user()->role == "approve") {
            return $next($request);
        }
        elseif(Auth::user()->role == "admin") {
            return $next($request);
        }
        else
        {
            return redirect('/pending')->with('status', 'Anda tidak diizinkan kehalaman tersebut :)');
        }
    }
    
}
