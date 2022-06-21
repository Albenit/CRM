<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\PersonalAppointment;
use App\Notifications\SendNotificationn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PersonalAppointmentController extends Controller
{
    public function addPersonalAppointment(Request $request){

        
        $randomi = Str::random(7);

        foreach($request->roleid as $key => $roles){

            $personalApp = new PersonalAppointment();
            $personalApp->title = $request->title;
            $personalApp->date = $request->date;
            $personalApp->time = $request->time;
            $personalApp->address = $request->address;
            $personalApp->comment = $request->comment;
            if(Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('salesmanager')){
            if($request->apporconId == 1){
                $personalApp->user_id = Auth::user()->id;
                $personalApp->assignfrom = Auth::user()->id;
            }else {
                $personalApp->user_id = $roles;
                $personalApp->assignfrom = Auth::user()->id;
                
            }
            }else {
                $personalApp->user_id = Auth::user()->id;
                $personalApp->assignfrom = Auth::user()->id;
            }
            $personalApp->AppOrCon = $request->apporconId;
            $personalApp->commen_id = $randomi;
            if($key == 0){
                $personalApp->parent_column = 1;
            }else{
                $personalApp->parent_column = 0;
            }
            $personalApp->save();
        }
        if($personalApp){
            $url = '<a href="' . route('Appointments') . '"> Sie haben heute einen persönlichen Termin</a>';
            Admins::find($personalApp->user_id)->notify(new SendNotificationn($url));
            return redirect()->route('dashboard')->with('success','Ihre Aktion erfolgreich abgeschlossen');
        }else{
            return redirect()->route('dashboard')->with('fail','Ihre Aktion schlägt fehl');

        }
    }
}
