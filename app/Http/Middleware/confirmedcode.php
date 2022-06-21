<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class confirmedcode
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth();
        if ($user->check()) {

//            if ($user->user()->firsttime == 1) {
//                return redirect()->route('smsconfirm');
//            } else if ($user->user()->confirmed == 0) {
//                return redirect()->route('smsconfirmation');
//            } else {
//                return $next($request);
//            }

            return $next($request);
        }
        return redirect()->route('rnlogin');
    }
}
