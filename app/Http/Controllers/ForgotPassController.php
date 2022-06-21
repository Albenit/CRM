<?php

namespace App\Http\Controllers;

use App\Mail\sendToken;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPassController extends Controller
{
    public function forgot_password(Request $request){
        $email = $request->email;
        $user = Admins::where('email','=', $email)->first();
        if ($user){
            $token = Str::random(60);
            if (Admins::where('email','=', $email)->update(['forgotpass_token'=>$token])){
                return $this->sendResetEmail($email, $token ,$user->id);
            }
        }
        else {
            return redirect()->back()->with('message','Falsche E-mail');
        }
    }


    public function sendResetEmail($email , $token, $user)
    {
        Mail::to($email)->send(new sendToken($token, $email, $user));
            return redirect()->route('rnlogin')->with('msg', 'Ein Link zum Zurücksetzen wurde an Ihre E-Mail-Adresse gesendet.');
    }
    public function changepasswrd($token,$id){
        if(Admins::find($id)->forgotpass_token == $token){
            return view('new_password')->with('token',$token)->with('id',$id);
        }
    }
    public function update_password($token, $id ,Request $request){
        $user =Admins::find($id);
        if($user->forgotpass_token == $token){
            if ($request->password == $request->repeat_password){
                if ($request->password != '' && $request->password > 8) {
                    $user->password = Hash::make($request->password);
                    $user->forgotpass_token = null;
                    if($user->save()){
                        return redirect()->route('rnlogin')->with('msg','Ihr Passwort wurde geändert');
                    }
                }
            }else{
                return redirect()->back()->with('fail', 'Falche');
            }
        }
    }



}
