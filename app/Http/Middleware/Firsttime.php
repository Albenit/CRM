<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Firsttime
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
        if (Auth::guard('admins')->user()->firsttime == 1){
            return redirect('smsconfirm');
        }elseif (Auth::guard('admins')->user()->confirmed == 0){
            return redirect()->route('confirmsmscode');
        }
        else{
        return $next($request);
        }
    }
}
