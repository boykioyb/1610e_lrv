<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckModerator
{
    /**
     * Handle an incoming request.
     * @author ThienTH
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @date 2017-05-24
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->checkRole(500)){
            return response()->view('forbidden', [], 403);
        }
        
        return $next($request);
    }
}
