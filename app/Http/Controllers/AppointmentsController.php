<?php

namespace App\Http\Controllers;
use App\Models\Absence;
use App\Models\PersonalAppointment;
use App\Notifications\SendNotificationn;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Flash;
use Auth;
use App\Models\Admins;
use App\Models\lead;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;

class AppointmentsController extends Controller
{
public function hrcalendar(Request  $request){
    $user = Auth::guard('admins')->user();
    $input = $request->all();
    if(array_key_exists('date_in', $input)){ $date_in = $input['date_in'];} else { $date_in = date('Y-m-d'); }
    if($user->hasRole('admin') || $user->hasRole('salesmanager'))
    {
        $date_in =  new DateTime($date_in);
        $absences = Absence::whereHas('admin')->with('admin')->orderBy('created_at', 'desc')->get();
        $admins = Admins::role(['fs'])->get();
        $date_to = new DateTime(Carbon::now());
        return view('hrcalendar')->with('absences',$absences)->with('date_in',$date_in)->with('admins',$admins)->with('date_to',$date_to);

    }
    elseif($user->hasRole('fs')){
        $date_in =  new DateTime($date_in);
        $absences = Absence::whereHas('admin')->with('admin')->where('employee_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $date_to = new DateTime(Carbon::now());

        return view('hrcalendar')->with('absences',$absences)->with('date_in',$date_in)->with('date_to',$date_to);

    }
}
public function filterhrcalendar(Request  $req){

    $input = $req->all();
    $date_in = $req->input('date_in');
    $status = $req->input('status');
    $admin = $req->input('admin');
    $date_in = $input['date_in'];


    if($admin == 'all'){

            if($status == 'all') {
                $absences = Absence::with('admin')->where('from',$date_in = $input['date_in'])->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');
            }
            else{
                $absences = Absence::with('admin')->where('from',$date_in = $input['date_in'])->where('type',$status)->orderBy('created_at', 'desc')->get();
            }

    }
    else{
        $user = auth()->user()->id;
        $user = $admin;
        if($date_in == 'all'){
            if($status == 'all') {
                $absences = Absence::where('employee_id',$user)->where('from',$date_in = $input['date_in'])->with('admin')->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');
            }
            else{
                $absences = Absence::where('employee_id',$user)->where('from',$date_in = $input['date_in'])->with('admin')->where('type',$status)->orderBy('created_at', 'desc')->get();
            }
        }
        else{
            if($status == 'all') {
                $absences = Absence::where('employee_id',$user)->where('from',$date_in = $input['date_in'])->with('admin')->where('from',$date_in)->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');
            }
            else{
                $absences = Absence::where('employee_id',$user)->where('from',$date_in = $input['date_in'])->with('admin')->where('from',$date_in)->where('type',$status)->orderBy('created_at', 'desc')->get();
            }
        }
    }

    $date_in = Carbon::rawCreateFromFormat('Y-m-d',$date_in);




    $admins = Admins::role(['fs'])->get();


    return view('hrcalendar')->with('absences',$absences)->with('date_in',$date_in)->with('admins',$admins)->with('admini',Admins::find($admin))->with('status',$status);

}
    public function index(Request $request)
    {
		$user = Auth::guard('admins')->user();
		$input = $request->all();

        if(array_key_exists('trie', $input) && ( $input['trie'] == "asc" || $input['trie']== "desc" )){$trie = $input['trie'];}else{$trie = "asc" ;};
		if(array_key_exists('date_in', $input) ){ $date_in = $input['date_in'];}else { $date_in = date('Y-m-d'); }
		$date_in =  new DateTime($date_in);
		if(array_key_exists('region', $input) ){if($input['region'] == "all"){$regionQ='appointment_date' ; $regionI = $date_in ; $regionO="all";}else{$regionQ='city' ; $regionI  = $input['region'];$regionO= $input['region'] ;}}else{ $regionQ='appointment_date' ; $regionI = $date_in ;$regionO="all";};
		if(array_key_exists('rejected', $input) ){if($input['rejected'] == "all"){$rejectedQ='appointment_date' ; $rejectedI = $date_in ;$rejectedO="all";}else{$rejectedQ='rejected' ; $rejectedI = $input['rejected'];$rejectedO=$input['rejected'];}}else{ $rejectedQ='appointment_date' ; $rejectedI = $date_in ;$rejectedO="all";};
		if(array_key_exists('sprache', $input) ){if($input['sprache'] == "all"){$spracheQ='appointment_date' ; $spracheI = $date_in ; $spracheO="all"; }else{$spracheQ='sprache' ; $spracheI = $input['sprache']; $spracheO=$input['sprache']; }}else{ $spracheQ='appointment_date' ; $spracheI = $date_in ;$spracheO="all";};
		if(auth()->user()->admin_id == null && auth()->user()->roless == null){
        if($user->hasRole('admin') || $user->hasRole('salesmanager'))
		{
           $absences = Absence::with('admin')->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');

			$users = Admins::role(['fs'])->get();
            if($user->hasRole('admin')) {
                $personalApp = PersonalAppointment::where('date', '>=', Carbon::now()->format('Y-m-d'))->get();
            }else{
                $personalApp = PersonalAppointment::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('date','>=',Carbon::now()->format('Y-m-d'))->with('Admins')->get();
            }
            $regions = lead::select('city')->distinct()->orderBy('city', 'asc')->whereNotNull('city')->get();
			$langues = lead::select('sprache')->whereNull('assign_to_id')->distinct()->orderBy('sprache', 'asc')->whereNotNull('sprache')->get();


			$appointments_events = lead::select('*')->whereNull('assign_to_id')->where('appointment_date',$date_in)->orderBy('time', $trie)->where($regionQ,$regionI)->where($rejectedQ,$rejectedI)->where($spracheQ,$spracheI)->where('completed',0)->paginate(30,['*'],'events_page');
			$appointments = lead::with('admin')->whereNotNull('assign_to_id')->where('assigned',1)->where('completed',0)->whereNotNull('appointment_date')->where('rejected',0)->get();
            $rejected = lead::with('admin')->whereNotNull('appointment_date')->where('rejected',1)->get();


			$maps = DB::table('leads')->where('appointment_date',Carbon::now()->format('Y-m-d'))->select('leads.first_name','leads.last_name')->get();

			return view('appointment')->with('users',$users)->with('appointments_events',$appointments_events)->with('appointments',$appointments)->with('regions',$regions)->with('langues',$langues)->with('regionO',$regionO)->with('rejectedO',$rejectedO)->with('spracheO',$spracheO)->with('trie',$trie)->with('maps',$maps)->with('date_in',$date_in)->with('absences',$absences)->with('personalApp',$personalApp)->with('rejected',$rejected);
		}else{
            $absences = Absence::where('employee_id',auth()->user()->id)->with('admin')->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');
			$users="";$appointments_events = "";
			$regions ="";
			$langues = "";
			$appointments = lead::select('*')->where('assign_to_id',$user->id)->whereNotNull('appointment_date')->where('completed',0)->where('wantsonline',0)->where('rejected',0)->get();
       
            $personalApp = PersonalAppointment::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('date','>=',Carbon::now()->format('Y-m-d'))->with('Admins')->get();
            $maps = DB::table('leads')->where('appointment_date',Carbon::now()->format('Y-m-d'))->where('assign_to_id',$user->id)->select('leads.first_name','leads.last_name','leads.latitude','leads.longitude')->get();
			return view('appointment')
                ->with('users',$users)
                ->with('appointments_events',$appointments_events)
                ->with('appointments',$appointments)
                ->with('regions',$regions)
                ->with('langues',$langues)
                ->with('regionO',$regionO)
                ->with('rejectedO',$rejectedO)
                ->with('spracheO',$spracheO)
                ->with('trie',$trie)
                ->with('personalApp',$personalApp)
                ->with('maps',$maps)
				->with('date_in',$date_in)
                ->with('absences',$absences)
                ->with('personalApp',$personalApp);
		}}
        else{
       if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('salesmanager') || auth()->user()->headadmin->hasRole('salesmanager') || auth()->user()->headadmin->hasRole('admin')){
        $absences = Absence::with('admin')->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');
  $users = Admins::role(['fs'])->get();
            $personalApp = PersonalAppointment::where('date', '>=', Carbon::now()->format('Y-m-d'))->get();
        $regions = lead::select('city')->distinct()->orderBy('city', 'asc')->whereNotNull('city')->get();
        $langues = lead::select('sprache')->whereNull('assign_to_id')->distinct()->orderBy('sprache', 'asc')->whereNotNull('sprache')->get();


        $appointments_events = lead::select('*')->whereNull('assign_to_id')->where('appointment_date',$date_in)->orderBy('time', $trie)->where($regionQ,$regionI)->where($rejectedQ,$rejectedI)->where($spracheQ,$spracheI)->where('completed',0)->paginate(30,['*'],'events_page');
        $appointments = lead::with('admin')->whereNotNull('assign_to_id')->where('assigned',1)->where('completed',0)->whereNotNull('appointment_date')->where('rejected',0)->get();
        $rejected = lead::with('admin')->whereNotNull('appointment_date')->where('rejected',1)->get();


        $maps = DB::table('leads')->where('appointment_date',Carbon::now()->format('Y-m-d'))->select('leads.first_name','leads.last_name')->get();

        return view('appointment')->with('users',$users)->with('appointments_events',$appointments_events)->with('appointments',$appointments)->with('regions',$regions)->with('langues',$langues)->with('regionO',$regionO)->with('rejectedO',$rejectedO)->with('spracheO',$spracheO)->with('trie',$trie)->with('maps',$maps)->with('date_in',$date_in)->with('absences',$absences)->with('personalApp',$personalApp)->with('rejected',$rejected);
       }
       else{
     
        $absences = Absence::where('employee_id',auth()->user()->id)->with('admin')->orderBy('created_at', 'desc')->paginate(30, ['*'], 'events_page');

        $users="";$appointments_events = "";
        $regions ="";
        $langues = "";
        $appointments = lead::select('*')->where('assign_to_id',$user->id)->whereNotNull('appointment_date')->where('completed',0)->where('wantsonline',0)->where('rejected',0)->get();

        $personalApp = PersonalAppointment::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('date','>=',Carbon::now()->format('Y-m-d'))->with('Admins')->get();
        $maps = DB::table('leads')->where('appointment_date',Carbon::now()->format('Y-m-d'))->where('assign_to_id',$user->id)->select('leads.first_name','leads.last_name','leads.latitude','leads.longitude')->get();
        return view('appointment')
            ->with('users',$users)
            ->with('appointments_events',$appointments_events)
            ->with('appointments',$appointments)
            ->with('regions',$regions)
            ->with('langues',$langues)
            ->with('regionO',$regionO)
            ->with('rejectedO',$rejectedO)
            ->with('spracheO',$spracheO)
            ->with('trie',$trie)
            ->with('personalApp',$personalApp)
            ->with('maps',$maps)
            ->with('date_in',$date_in)
            ->with('absences',$absences)
            ->with('personalApp',$personalApp);
       }
        }
	}

	public function Dropajax(Request $request)
    {
        if(auth()->user()->hasRole('fs')){
            if(auth()->user()->admin_id != null && (in_array('salesmanager',json_decode(auth()->user()->headadmin->roless)) ||  in_array('admin',json_decode(auth()->user()->headadmin->roless)))){
                next($request);
            }
            else{
                return abort(401);
            }
        }
		$input = $request->all();
		$pieces = explode("-", $input['nom_lead']);
		$id_lead = (int) $pieces['0'];
		$date = Carbon::parse(substr($request->ctime,0,15))->format('Y-m-d');

	if(lead::find($id_lead)->appointment_date == $date){
	if(lead::find($id_lead)->wantsonline == 1 && Admins::find($input['id_user'])->getRoleNames()[0] == 'digital'){
	$appointment = lead::where('id', $pieces['0'])
              ->update(['assigned' => 1,'assign_to_id' => $input['id_user'],'rejected' => 0]);
		if($appointment){Admins::find($input['id_user'])->notify(new SendNotificationn('<a href="' . route('Appointments') .'">Es kam ein Termin von' . Admins::find($input['id_user'])->name . 'hinzu</a>'));
            return "Der Termin wurde dem Berater erfolgreich hinzugefügt.";} else { return "ERROR !!!"; }
	}
	elseif(strtotime(lead::find($id_lead)->time) > strtotime("22:00") || strtotime(lead::find($id_lead)->time) < strtotime("07:59")){
		return "Die Terminzeit ist nicht korrekt, sie sollte zwischen 8:00 und 22:00 Uhr liegen";
	}

        elseif(Absence::where('from','<=',lead::find($id_lead)->appointment_date)->where('to','>=',lead::find($id_lead)->appointment_date)->where('type',1)->firstWhere('employee_id',$input['id_user'])){
            return "Der Berater ist beurlaubt";
        }
        elseif(lead::find($id_lead)->wantsonline == 0 && Admins::find($input['id_user'])->getRoleNames()[0] == 'fs'){
            $appointment = lead::where('id', $pieces['0'])
                ->update(['assigned' => 1,'assign_to_id' => $input['id_user'],'rejected' => 0]);
            if($appointment){
                Admins::role(['salesmanager'])->get()->each(function($item) use($input){
                $item->notify(new SendNotificationn('<a href="' . route('Appointments') .'">Es kam ein Termin von' . Admins::find($input['id_user'])->name . 'hinzu</a>'));

            });
                Admins::find($input['id_user'])->notify(new SendNotificationn('<a href="' . route('Appointments') .'">Es kam ein Termin von' . Admins::find($input['id_user'])->name . 'hinzu</a>'));
					Admins::role(['salesmanager'])->get()->each(function($item) use($input){
                    $item->notify(new SendNotificationn('<a href="' . route('Appointments') .'">Es kam ein Termin von' . Admins::find($input['id_user'])->name . 'hinzu</a>'));
                return "Der Termin wurde dem Berater erfolgreich hinzugefügt.";
            }); 
            }else {
                return "ERROR !!!";
            }
        }
	else{
		return "Termin sollte nicht diesem Berater zugewiesen werden (vielleicht an Digital oder Außendienst) !";
	}

}

	else{
		return "Falsch, Termin sollte seinem Datum zugeordnet werden (" . lead::find($id_lead)->appointment_date . ") !!!";
	}
}

	public function changeTS(Request $request){
        if(auth()->user()->hasRole('fs')){
          
            if(auth()->user()->admin_id != null && (in_array('salesmanager',json_decode(auth()->user()->headadmin->roless)) ||  in_array('admin',json_decode(auth()->user()->headadmin->roless)))){
                next($request);
            }
            else{
                return abort(401);
            }
        }
		$input = $request->all();
		if($input['ts_id'] == "0"){$input['ts_id'] = null;}
         Admins::find(lead::where('id', $input['id_lead_input'])->first()->assign_to_id)->notify(new SendNotificationn('<a href="' . route('Appointments') . '">Ein Termin wurde von Ihnen entfernt</a>'));
		$appointment = lead::where('id', $input['id_lead_input'])
              ->update(['assign_to_id' => $input['ts_id']]);
		if($appointment){session(['msg' => 'Erfolgreich !!!']);  return redirect()->back();} else {return "ERROR !!!";}
	}

    
    public function historyTermine(Request $req){
        $beraters = Admins::role(['fs'])->get();
        if($req->berater != null){
            if($req->status == 'all' && $req->berater == 'all'){
                $leads = lead::whereNotNull('appointment_date') ->withTrashed()->get();
            }elseif($req->status != 'all' && $req->berater == 'all'){
                if ($req->status == 'Abschluss'){
                    $leads = lead::whereNotNull('appointment_date')->where('completed',1)->withTrashed()->get();
                }elseif($req->status == 'Kein Abschluss'){
                    $leads = lead::whereNotNull('appointment_date')->where('assign_to_id','<>', null)->where('deleted_at','<>',null)->withTrashed()->get();
                }elseif($req->status == 'Folget'){
                    $leads = lead::whereNotNull('appointment_date')->where('completed',0)->where('rejected',0)->where('deleted_at',null)->where('folged',1)->withTrashed()->get();
                }elseif($req->status == 'Pending'){
                    $leads = lead::whereNotNull('appointment_date')->where('completed',0)->where('rejected',0)->where('deleted_at',null)->where('folged',0)->whereNotNull('appointment_date')->withTrashed()->get();
                }elseif($req->status == 'all'){
                    $leads = lead::whereNotNull('appointment_date')->withTrashed()->get();
                }
            }else{
                if ($req->status == 'Abschluss'){
                $leads = lead::whereNotNull('appointment_date')->where('assign_to_id',$req->berater)->where('completed',1)->withTrashed()->get();
                }elseif($req->status == 'Kein Abschluss'){
                    $leads = lead::whereNotNull('appointment_date')->where('assign_to_id',$req->berater)->where('assign_to_id','<>', null)->where('deleted_at','<>',null)->withTrashed()->get();
                }elseif($req->status == 'Folget'){
                    $leads = lead::whereNotNull('appointment_date')->where('assign_to_id',$req->berater)->where('completed',0)->where('rejected',0)->where('deleted_at',null)->where('folged',1)->withTrashed()->get();
                }elseif($req->status == 'Pending'){
                    $leads = lead::whereNotNull('appointment_date')->where('assign_to_id',$req->berater)->where('completed',0)->where('rejected',0)->where('deleted_at',null)->where('folged',0)->whereNotNull('appointment_date')->withTrashed()->get();
                    dd($leads);
                }elseif($req->status == 'all'){
                    $leads = lead::whereNotNull('appointment_date')->where('assign_to_id',$req->berater)->withTrashed()->get();
                }
            }
        }else{
            $leads = lead::whereNotNull('appointment_date')->withTrashed()->get();
        }


        return view('rejectedappointment', compact('leads','beraters'));
    }
}