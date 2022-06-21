<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeRole
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

        $roles = json_decode(auth()->user()->roless);

    if(!is_null($roles) && count($roles) > 1){
            return response()->view('selectrole',compact('roles'));
        }
        return $next($request);
    }
}
