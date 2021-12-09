<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            return $next($request);
            // return $next($request);
            // if(auth()->user()->type === 'a'){
            //     return redirect('/usuarios');
            // }
            // else if(auth()->user()->type === 'u'){
            //     return redirect('/company');
            // }
            
        }
        
        return $next($request);
    }
}
