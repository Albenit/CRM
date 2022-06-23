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
$roles = collect();
 
    if(auth()->user()->roless != null){
   
        auth()->user()->childrens->each(function($item) use($roles){
          
            $roles->push($item->getRoleNames()[0]);
        });
    }

    if(auth()->user()->roless != null){
            return response()->view('selectrole',compact('roles'));
        }
        return $next($request);
    }
}
