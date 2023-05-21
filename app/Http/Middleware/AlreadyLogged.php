<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Session()->has('loginId') && (url('login-owner') == $request->url() || url('register-owner') == $request->url() || url('login-guest') == $request->url() || url('register-guest') == $request->url())){
            return back();
        }

        return $next($request);
    }
}
