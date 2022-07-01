<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\confirmcodee;

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
        //   if ($user->user()->confirmed == 0) {
        //     $number = random_int(1111,9999);
        //     $twilio = new \Aloha\Twilio\Twilio(env('TWILIO_SID'), env('TWILIO_TOKEN'), env('TWILIO_FROM'));
        //     $twilio->message(Auth::user()->phonenumber, $number);
        //     \Mail::to(auth()->user()->email)->send(new confirmcodee($number));
        //     auth()->user()->update(['pin' => $number]);
        //        return redirect()->route('smsconfirmation');
        //    } else {
        //        return $next($request);
        //    }

            return $next($request);
        }
        return redirect()->route('rnlogin');
    }
}
