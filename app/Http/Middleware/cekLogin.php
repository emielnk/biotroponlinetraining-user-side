<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        $response = $next($request);
        $user = Auth::user();
        //dd($response);
        if ( !$request->session()->has('email') && !$request->session()->has('password')){
            return redirect('login');
         }
        return $response;
    }
}
