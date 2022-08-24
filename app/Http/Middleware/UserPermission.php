<?php

namespace App\Http\Middleware;
use App\Traits\UserPermission as TraitsUserPermission;

use Closure;
use Illuminate\Http\Request;

class UserPermission
{
    use TraitsUserPermission;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->checkRequestPermission()){
            // return response()->view('back.dashboard');
            return $next($request);
        }
        return $next($request);
    }
}
