<?php

namespace App\Http\Middleware;

use App\Models\Admins;
use Closure;
use Illuminate\Http\Request;

class isagent
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
        if(!auth()->user()->hasRole('callagent')){
            return $next($request);
        }
        else{
            $admins = auth()->user();
            return response()->view('insterappointment',compact('admins'));
        }
    }
}
