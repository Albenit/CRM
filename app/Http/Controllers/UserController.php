<?php

namespace App\Http\Controllers;

use App\Enums\FolderPaths;
use App\Events\RejectLead;
use App\Imports\LeadImport;
use App\Imports\LeadsImport;
use App\Imports\TestImport;
use App\Models\Admins;
use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\Deletedlead;
use App\Models\EmployeePersonalData;
use App\Models\LeadDataCounteroffered;
use App\Models\LeadDataFahrzeug;
use App\Models\LeadDataKK;
use App\Models\LeadDataPrevention;
use App\Models\LeadDataThings;
use App\Models\Pendency;
use App\Models\PendingRejectedLead;
use App\Models\PersonalAppointment;
use App\Models\rejectedlead;
use App\Models\Trainings;
use App\Models\User;
use App\Mail\confirmcode;
use App\Models\appointment;
use App\Models\campaigns;
use App\Models\chat;
use App\Models\Costumer;
use App\Models\family;
use App\Models\lead;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Nexmo;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Middleware\confirmedcode;
use App\Models\Absence;
use App\Models\BankInformation;
use App\Models\lead_history;
use App\Models\lead_info;
use App\Traits\FileManagerTrait;
use Illuminate\Support\Facades\DB;
use Faker;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;
use App\Models\LeadDataPlus;
use App\Models\LeadDataRech;
use App\Notifications\SendNotificationn;
use Illuminate\Support\Facades\URL;
use function Clue\StreamFilter\fun;

class UserController extends Controller
{
    use FileManagerTrait;

    public function __construct()
    {
        $this->middleware(confirmedcode::class);
    }
    public function changerole(){
        Auth::loginUsingId(auth()->user()->headadmin->id);
        return redirect()->route('dashboard');
    }
public function folgetermin($id){
        $id = (int) $id;
    $leads = lead::find((int) $id);

    return view('folge',compact('leads'));
}
    public function rleads()
    {

        $leads = DB::table('leads_history')
            ->join('leads', 'leads_history.leads_id', 'leads.id')
            ->select('leads.first_name', 'leads.id', 'leads.telephone', 'leads_history.status', 'leads.number_of_persons')
            ->get();
        return view('rleads', compact('leads'));

    }

    public function closenots()
    {
        notification::where('receiver_id', Auth::guard('admins')->user()->id)->update(['done' => 1]);
    }

    public function addrole(Request $req){
        $admin = Admins::find((int) $req->admin);
        $roles = collect();
        
        if($admin->roless != null){
         $role = $req->input('role_name') . $admin->email;
         if(!Admins::firstWhere('email',$role)){
             $admin2 = new Admins();
             $admin2->name = $admin->name;
             $admin2->password = $admin->password;
             $admin2->phonenumber = $admin->phonenumber;
             $admin2->admin_id = $admin->id;
             $admin2->email = $req->input('role_name') . $admin->email;
             $admin2->save();
             $admin2->assignRole($req->input('role_name'));
             $roles->push($req->input('role_name'));
         }
         for($i = 1; $i <= $req->addedroles2; $i++){
             $role = $req->input('role_name' . $i) . $admin->email;
             if(!Admins::firstWhere('email',$role)){
             $admin2 = new Admins();
             $admin2->name = $admin->name;
             $admin2->password = $admin->password;
             $admin2->phonenumber = $admin->phonenumber;
             $admin2->admin_id = $admin->id;
             $admin2->email = $req->input('role_name' . $i) . $admin->email;
             $admin2->save();
             $admin2->assignRole($req->input('role_name' . $i));
             $roles->push($req->input('role_name' . $i));
         }
     }
 }
        else{
         $roles->push($req->input('role_name'));
         for($i = 1; $i <= $req->addedroles2; $i++){
           $roles->push($req->input('role_name' . $i));
         }
         $admin->roless = json_decode($roles);
 
         $admin->hasAnyRole() ? $admin->removeRole($admin->getRoleNames()[0]) : '';
         $admin->save();
         $role = $req->input('role_name') . $admin->email;
         if(!Admins::firstWhere('email',$role)){
             $admin2 = new Admins();
             $admin2->name = $admin->name;
             $admin2->password = $admin->password;
             $admin2->phonenumber = $admin->phonenumber;
             $admin2->admin_id = $admin->id;
             $admin2->email = $req->input('role_name') . $admin->email;
             $admin2->save();
             $admin2->assignRole($req->input('role_name'));
           }
           if(!Admins::firstWhere('email',$admin->getRoleNames()[0] . $admin->email)){
            $admin2 = new Admins();
            $admin2->name = $admin->name;
            $admin2->password = $admin->password;
            $admin2->phonenumber = $admin->phonenumber;
            $admin2->admin_id = $admin->id;
            $admin2->email = $admin->getRoleNames()[0] . $admin->email;
            $admin2->save();
            $admin2->assignRole($admin->getRoleNames()[0]);
          }
          
         for($i = 1; $i <= $req->addedroles2; $i++){
             $role = $req->input('role_name' . $i) . $admin->email;
             if(!Admins::firstWhere('email',$role)){
             $admin2 = new Admins();
             $admin2->name = $admin->name;
             $admin2->password = $admin->password;
             $admin2->phonenumber = $admin->phonenumber;
             $admin2->admin_id = $admin->id;
             $admin2->email = $req->input('role_name' . $i) . $admin->email;
             $admin2->save();
             $admin2->assignRole($req->input('role_name' . $i));
           }
         }
         
        }
        $admin = Admins::find((int) $req->admin)->update(['roless' => '[]']);
        return redirect()->back()->with('success','Erfolgreich hinzugefügt');
     }

    public function addslead(Request $req){
        
        $lead = new lead();
        $lead->first_name = filter_var($req->name, FILTER_SANITIZE_STRING);
        $lead->last_name = filter_var($req->lname, FILTER_SANITIZE_STRING);
        $lead->telephone = filter_var($req->telephone, FILTER_SANITIZE_STRING);
        $lead->birthdate = filter_var($req->geburstdatum, FILTER_SANITIZE_STRING);
        $lead->number_of_persons = (int)$req->haushalt;
        $lead->campaign_id = (int)$req->campaign;
        $lead->address = filter_var($req->plzort,FILTER_SANITIZE_STRING);
        $lead->save();
        $leadi = new lead_info();
        $leadi->grund = filter_var($req->grund,FILTER_SANITIZE_STRING);
        $leadi->kampagne = filter_var($req->kampagne,FILTER_SANITIZE_STRING);
        $leadi->lead_id = (int) $lead->id;
        $leadi->krankenkasse = filter_var($req->krankenkasse,FILTER_SANITIZE_STRING);
        $leadi->wichtig = filter_var($req->wichtig,FILTER_SANITIZE_STRING);
        $leadi->bewertung = filter_var($req->bewertung,FILTER_SANITIZE_STRING);
        $leadi->teilnahme = filter_var($req->teilnahme,FILTER_SANITIZE_STRING);
        $leadi->save();
        $lead->slug = 'qwessse12wssew-' . uniqid();
        if ($lead->save()) {
            return redirect()->route('leads')->with('success', 'Lead wurde erfolgreich eingefügt');
        } else {
            return redirect()->back()->with('fail', 'Fehler beim Einfügen');
        }
    }

    public function acceptapp($id)
    {
        $lead = lead::find($id);
        if (Auth::guard('admins')->user()->hasRole('admin')) {
            $lead->assigned = 1;
            $lead->save();
            return redirect()->back();
        } else if ($lead->assign_to_id == Auth::guard('admins')->user()->id) {
            $lead->assigned = 1;
            $lead->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function smsconfirmation()
    {
        return view('confirmcode');
    }

    public function rnlogin()
    {

        if (!auth()->check()) {

            return view('login');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function notifications()
    {

    }

    public function getlead($campaign)
    {
        $campaign = campaigns::where('name', $campaign)->get();

        return view('getlead', compact('campaign'));
    }

    public function addappointment(\App\Http\Requests\Appointment $req)
    {

        $lead = new lead();
        $lead->agent = filter_var($req->input('agent'), FILTER_SANITIZE_STRING);
        $lead->berater = filter_var($req->input('berater'), FILTER_SANITIZE_STRING);
        $lead->first_name = filter_var($req->input('fname'), FILTER_SANITIZE_STRING);
        $lead->last_name = filter_var($req->input('lname'), FILTER_SANITIZE_STRING);
        $lead->telephone = filter_var($req->input('phone'), FILTER_SANITIZE_STRING);
        $lead->address = $req->input('address');
        $lead->birthdate = $req->input('birthdate');
        $lead->postal_code = filter_var($req->input('postal'), FILTER_SANITIZE_STRING);
        $lead->city =  $req->input('location');
        $lead->nr = filter_var($req->input('nr'),FILTER_SANITIZE_STRING);
        $lead->nationality = filter_var($req->input('country'), FILTER_SANITIZE_STRING);
        $lead->appointment_date = filter_var($req->input('appdate'), FILTER_SANITIZE_STRING);
        $lead->time = filter_var($req->input('apptime'), FILTER_SANITIZE_STRING);
        $lead->sprache = filter_var($req->input('sprache'), FILTER_SANITIZE_STRING);
        $lead->zufriedenheit = filter_var($req->input('zufriedenheit'), FILTER_SANITIZE_STRING);
        $lead->bemerkung = filter_var($req->input('bemerkung'), FILTER_SANITIZE_STRING);
        $lead->number_of_persons = (int)$req->input('count');
        $lead->campaign_id = (int)$req->input('campaign');
        $lead->assigned = 1;
        $lead->apporlead = 'appointment';
        $campaign = campaigns::where('id', $req->input('campaign'))->get();
        if ($req->input('online') == 'yes') {
            $lead->wantsonline = 1;
        } else {
            $lead->wantsonline = 0;
            if (Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('callagent')) {
                $lead->assign_to_id = Auth::guard('admins')->user()->id;
            } else {
                if ($req->input('admin') != '') {
                    Admins::findorFail($req->input('admin'));
                    $lead->assign_to_id = (int)$req->input('admin');
                } else {
                    $lead->assigned = 0;
                }
            }
           


        }
        $address = [];

        $address = filter_var($req->input('address'), FILTER_SANITIZE_STRING);
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyDscxZzYju_pJGNA2zu1lXOqJuubCdPu0o';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $responseJson = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($responseJson);
        if ($response->status == 'OK') {
            $latitude = $response->results[0]->geometry->location->lat;
            $longitude = $response->results[0]->geometry->location->lng;
        } else {

            $lead->latitude = "0";
            $lead->longitude = "0";
        }


        if ($lead->save()) {
            if (Auth::user()->hasRole('salesmanager') || auth()->user()->hasRole('callagent')) {
                $lead->assign_to_id = null;
            }
            $lead->slug = Str::slug(filter_var($req->input('fname'),FILTER_SANITIZE_STRING)) . '-' . $lead->id;
            $lead->save();
            if(auth()->user()->hasRole('callagent')){
                Admins::role(['salesmanager'])->get()->each(function($item){
                   $item->notify(new SendNotificationn('<a href="' . route('Appointments') . '">ein Termin wurde von einem Call Agent importiert </a>"'));
                });
            }
            if(auth()->user()->hasRole('fs')){
                Admins::role(['salesmanager'])->get()->each(function($item){
                    $item->notify(new SendNotificationn('<a href="' . route('Appointments') . '">ein Termin wurde von einem ' . auth()->user()->name .' importiert </a>'));
                 });
            }
            return redirect()->back()->with('success', 'Termin wurde erfolgreich hinzugefügt!');
        } else {
            return redirect()->back()->with('fail', 'Ihre Aktion schlägt fehl');
        }
    }

    public function dlead($id)
    {
        //   lead::where('id',$id)->delete();
        $id = Crypt::decrypt($id) / 1244;
        $leads = lead::find($id);
        return view('deletedlead', compact('leads'));
    }

    public function deletedlead(Request $request, $id)
    {

        $leads = lead::find($id);
        if (Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice') || $leads->assign_to_id == Auth::guard('admins')->user()->id) {
            $deletedlead = new Deletedlead();
            $deletedlead->name = filter_var($leads->first_name,FILTER_SANITIZE_STRING);
            $deletedlead->address = filter_var($leads->address,FILTER_SANITIZE_STRING);
            $deletedlead->count = (int) $leads->number_of_persons;
            $deletedlead->date = Carbon::now();
            $deletedlead->reason = filter_var($request->reason,FILTER_SANITIZE_STRING);
            $deletedlead->comment = filter_var($request->comment,FILTER_SANITIZE_STRING);

            $deletedlead->save();


            if ($leads->delete()) {
                return redirect()->route('leads')->with('success', 'Lead erfolgreich gelöscht');
            } else {
                return redirect()->route('leads')->with('fail', 'Lead gelöscht fehlgeschlagen');
            }
        } else {
            return redirect()->back();
        }
    }

    public function addappointmentfile(Request $request)
    {

  
        $file = $request->file('costumerfile');

        if (\Maatwebsite\Excel\Facades\Excel::import(new LeadImport, $file)) {
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }


    public function insertappointment()
    {
        if (Auth::guard('admins')->user()->hasRole('fs')) {
            $admins = Auth::guard('admins')->user();
        } else {
            $admins = Admins::role(['fs'])->get();
        }
        return view('insterappointment', compact('admins'));
    }


    public function leads(Request $req)
    {
        return view('leads');
    }

    public function asignlead(Request $req, $id)
    {
        $req->validate([
            'personen' => 'required',
            'apptime' => 'required',
            'appointmentdate' => 'required'
        ]);

        $lead = lead::find($id);
        $lead->berater =  $req->berater ?  filter_var($req->berater,FILTER_SANITIZE_STRING) : $lead->berater;
        $lead->address =  $req->address ?  filter_var($req->address,FILTER_SANITIZE_STRING) : $lead->address;
        $lead->assign_to_id = Auth::user()->id;
        $lead->nationality = $req->nationality ?  filter_var($req->nationality,FILTER_SANITIZE_STRING) : $lead->nationality;
        $lead->telephone = $req->telephone ?  filter_var($req->telephone,FILTER_SANITIZE_STRING) : $lead->telephone;
        $lead->time = $req->apptime ? filter_var($req->input('apptime'), FILTER_SANITIZE_STRING) : null;
        $lead->postal_code = $req->postal ?  filter_var($req->postal,FILTER_SANITIZE_STRING) : $lead->postal_code;
        $lead->first_name = $req->name ?  filter_var($req->name,FILTER_SANITIZE_STRING) : $lead->first_name;
        $lead->last_name = $req->lname ?  filter_var($req->lname,FILTER_SANITIZE_STRING) : $lead->last_name;
        $lead->number_of_persons = $req->personen ?  filter_var($req->personen,FILTER_SANITIZE_STRING) : $lead->number_of_persons;
        $lead->city = $req->ort ?  filter_var($req->ort,FILTER_SANITIZE_STRING) : $lead->city;
        $lead->appointment_date = $req->appointmentdate ? filter_var($req->input('appointmentdate'), FILTER_SANITIZE_STRING) : null;
        $lead->nr = $req->nr ? filter_var($req->input('nr'),FILTER_SANITIZE_STRING) : $lead->nr;
        $lead->assigned = 1;
        $lead->birthdate = $req->birthdate;
        $lead->gesundheit = $req->gesundheit ?  filter_var($req->gesundheit,FILTER_SANITIZE_STRING) : $lead->gesundheit;
        $lead->zufriedenheit = $req->zufriedenheit ?  filter_var($req->zufriedenheit,FILTER_SANITIZE_STRING) : $lead->zufriedenheit;
        $lead->bemerkung = $req->bemerkung ?  filter_var($req->bemerkung,FILTER_SANITIZE_STRING) : $lead->bemerkung;
        $lead->sprache = $req->sprache ?  filter_var($req->sprache,FILTER_SANITIZE_STRING) : $lead->sprache;
        $lead->agent = $req->agent ?  filter_var($req->agent,FILTER_SANITIZE_STRING) : $lead->agent;
        $lead->duration_time = Carbon::now();
        // $lead->apporlead = 'appointment';


        if ($lead->save()) {
            Admins::role(['salesmanager'])->get()->each(function($admin){
               $admin->notify(new SendNotificationn('<a href="' . route('Appointments') . '">' . ucfirst(auth()->user()->name) .' wandelte einen Lead in einen Termin um'));
            });
            return redirect()->route('leads')->with('success', 'Ihre Aktion wurde erfolgreich ausgeführt');
        } else {
            return redirect()->route('leads')->with('fail', 'Ihre Aktion ist fehlgeschlagen');
        }
    }

    public function appointbyadmin($id)
    {
        $lead = lead::find($id);
        return view('appointadmin', compact('lead'));
    }

    public function reject($id)
    {
        $lead = lead::find($id);
        $lead->assigned = 0;
        $lead->save();
        return redirect()->route('');
    }

    public function alead($id)
    {
        // $id = Crypt::decrypt($id) / 1244;

        if (lead::find($id)->assigned == 1 && lead::find($id)->assign_to_id != null) {
            return redirect()->back();
        } else {
            $role = Role::find(1);
            $admin = Admins::find(lead::find($id)->assign_to_id);
            $lead = lead::find($id);
            return view('alead', compact('admin', 'lead'));
        }
    }


    public function trylogin(Request $req)
    {
        $email = filter_var($req->input('email'), FILTER_SANITIZE_STRING);
        $password = filter_var($req->input('password'), FILTER_SANITIZE_STRING);

        $remember = $req->input('remember') == 'on' ? true : false;
        if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password], $remember)) {
            session()->regenerate();
            $pin = random_int(1000, 99999);
            $user = auth()->user();
            $user->confirmed = 0;
            $user->pin = $pin;



            //  Nexmo::message()->send([
            //  'to' => '38345917726',
            //  'from' => env('NEXMO_KEY'),
            // 'text' => '12345']);
            $user->save();
            // \Mail::to(Auth::guard('admins')->user()->email)->send(new confirmcode($pin));


            return redirect()->route('dashboard');


        } else {
            return redirect()->route('rnlogin')->with('message','Anmeldeinformationen falsch');
        }
    }

    public function confirmcode(Request $req)
    {
        $c1 = (int)$req->input('c1');
        $c2 = (int)$req->input('c2');
        $c3 = (int)$req->input('c3');
        $c4 = (int)$req->input('c4');
        $pin = $c1 . $c2 . $c3 . $c4;
        $pin = (int)$pin;
        $user = Admins::find(Auth::guard('admins')->user()->id);
        if ($pin === $user->pin) {
            $user->confirmed = 1;
            $user->save();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('notauth', 'PIN war falsch');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admins')->check()) {
            $perdoruesi = Admins::where('id', Auth::guard('admins')->user()->id)->first();
            $perdoruesi->online = 0;
            $perdoruesi->confirmed = 0;
            $perdoruesi->save();
            Auth::guard('admins')->logout();
            $request->session()->regenerateToken();
            request()->session()->flush();
        }
        return redirect()->route('rnlogin');
    }
    public function updateperson(Request $req,$id){

        $person = family::find($id);
        $person->first_name = $req->first_name ? $req->first_name : $person->first_name;
        $person->last_name = $req->last_name ? $req->last_name : $person->last_name;
        $person->birthdate = $req->birthdate ? $req->birthdate : $person->birthdate;
        $person->save();

        $persons = lead::find($req->idLead);
        $persons->address = $req->address ? $req->address : $person->address;
        $persons->postal_code = $req->postal_code ? $req->postal_code : $person->postal_code;
        $persons->city = $req->city ? $req->city : $person->city;
        $persons->nr = $req->nr ? $req->nr : $person->nr;
        $persons->save();

        return redirect()->back();
    }

    public function completeapp(Request $req, $id)
    {
        $idd = Crypt::decrypt($id);
        $idd /= 1244;
        $lead = lead::find($idd);

        $cnt = $lead->number_of_persons;
        $pcnt = 0;
        for ($i = 1; $i <= $cnt; $i++) {
            if ($req->input('fname' . $i) != null && $req->input('birthday' . $i) != null && $req->input('lname' . $i) != null) {
                $family = new family();
                $family->first_name = filter_var($req->input('fname' . $i),FILTER_SANITIZE_STRING);
                $family->birthdate = filter_var($req->input('birthday' . $i),FILTER_SANITIZE_STRING);
                $family->last_name = filter_var($req->input('lname' . $i),FILTER_SANITIZE_STRING);
                $family->leads_id = (int) $idd;
                $family->status = "Done";
                $family->status_of_produkts = 'Offen (Berater)';
                $family->save();
                $pcnt++;
                Pendency::create(['admin_id' => auth()->user()->id,'family_id'=> $family->id,'p' => 0]);
                LeadDataKK::create(['person_id'=> $family->id,'leads_id'=> (int) $idd]);
                LeadDataFahrzeug::create(['person_id'=> $family->id,'leads_id'=> (int) $idd]);
                LeadDataPrevention::create(['person_id'=> $family->id,'leads_id' => (int) $idd]);
                LeadDataThings::create(['person_id'=> $family->id,'leads_id'=> (int) $idd]);
                LeadDataCounteroffered::create(['person_id'=> $family->id,'leads_id'=> (int) $idd]);
                LeadDataRech::create(['person_id' => $family->id, 'leads_id' => (int) $idd]);
                CostumerProduktGrundversicherung::create(['person_id_PG'=> $family->id,'status_PG' => 'Offen (Berater)','admin_id' => lead::find((int) $idd)->assign_to_id]);
                CostumerProduktZusatzversicherung::create(['person_id_PZ'=> $family->id,'status_PZ' => 'Offen (Berater)','admin_id' => lead::find((int) $idd)->assign_to_id]);
                CostumerProduktAutoversicherung::create(['person_id_PA'=> $family->id,'status_PA' => 'Offen (Berater)','admin_id' => lead::find((int) $idd)->assign_to_id]);
                CostumerProduktHausrat::create(['person_id_PH'=> $family->id,'status_PH' => 'Offen (Berater)','admin_id' => lead::find((int) $idd)->assign_to_id]);
                CostumerProduktRechtsschutz::create(['person_id_PR'=> $family->id,'status_PR' => 'Offen (Berater)','admin_id' => lead::find((int) $idd)->assign_to_id]);
                CostumerProduktVorsorge::create(['person_id_PV'=> $family->id,'status_PV' => 'Offen (Berater)','admin_id' => lead::find((int) $idd)->assign_to_id]);
            }
        }
        $bo = Admins::role(['backoffice', 'admin'])->get();
        foreach ($bo as $b) {
            $url = '<a href="' . route("tasks") . '">' . $pcnt . ' Personen wurden aus einem Termin hinzugefügt </a>';
            $b->notify(new SendNotificationn($url));
        }
        $lead->completed = 1;
        $lead->save();
        return redirect()->route('dashboard');
    }

    public function filterbydateapp(Request $req)
    {
        $req->validate([
            'fbydate' => 'required'
        ]);

        $appointments = lead::where('appointment_date', date('Y-m-d', strtotime($req->input('fbydate'))))->where('admin_id', Auth::guard('admins')->user()->id)->where('wantsonline', 0)->get();

        $leadscount = lead::where('assign_to_id', null)->where('assigned', 0)->get()->count() ;
        $todayAppointCount = lead::where('assign_to_id', Auth::guard('admins')->user()->id)->where('appointmentdate', Carbon::now()->format('Y-m-d'))->where('wantsonline', 0)->where('assigned', 1)->get()->count();

        return view('dashboard', compact('appointments', 'leadscount', 'todayAppointCount'));
    }

    public function dealclosed($id)
    {
        $id = Crypt::decrypt($id) / 1244;

        $app = lead::where('id', $id)->first();
        if ($app->assign_to_id == Auth::guard('admins')->user()->id || Auth::guard('admins')->user()->hasRole('admin') || $app->wantsonline == 1 && Auth::user()->hasRole('digital')) {
            return view('completelead', compact('app'));
        } else {
            return redirect()->back();
        }
    }

    public function dealnotclosed($id)
    {
        $leads = lead::where('id', $id)->first();
        if ($leads->assign_to_id != null && $leads->assign_to_id == Auth::guard('admins')->user()->id || Auth::guard('admins')->user()->hasRole('admin')) {
            return view('rejectedleads', compact('leads'));
        } else {
            return redirect()->back();
        }
    }

    public function pending_rejectedlead(Request $request)
    {
        $leads_id = (int)$request->leadsid;

        if ($request->pending == 1) {
            $pending_rejcted = new PendingRejectedLead();
            $pending_rejcted->lead_id = $leads_id;
            $pending_rejcted->begrundung =  filter_var($request->reason,FILTER_SANITIZE_STRING);
            $pending_rejcted->pending_or_reject = 1;
            if ($pending_rejcted->save()) {
                lead::where('id', $leads_id)->update(['assign_to_id' => null, 'assigned' => 0,'duration_time' => Carbon::now()]);
                return redirect()->back()->with('success', 'Erfolgreich abgelehnt');
            } else {
                return redirect()->back()->with('fail', 'Kann nicht abgelehnt werden');
            }
        } else {
            $pending_rejcted = new PendingRejectedLead();
            $pending_rejcted->lead_id = $leads_id;
            $pending_rejcted->begrundung =  filter_var($request->reason,FILTER_SANITIZE_STRING);
            $pending_rejcted->pending_or_reject = 0;

            if ($pending_rejcted->save()) {
                lead::where('id', $leads_id)->update(['assigned' => 0, 'rejected' => 1,'duration_time' => Carbon::now(),'deleted_at' => Carbon::now()]);
                return redirect()->back()->with('success', 'Erfolgreich abgelehnt');
            } else {
                return redirect()->back()->with('fail', 'Kann nicht abgelehnt werden');
            }
        }

    }

    public function rejectedleads(Request $request)
    {
        $leads_id = (int)$request->leadsid;

        $image = $request->hasFile('image') ? $this->storeFile($request->input('image'), 'img') : null;

        $rejectedlead = new lead_history();

        $rejectedlead->leads_id = $leads_id;
        $rejectedlead->status =  filter_var($request->reason,FILTER_SANITIZE_STRING);
        $rejectedlead->image = $image;
        $rejectedlead->admin_id = Auth::user()->id;

        if ($rejectedlead->save()) {
            $lead = lead::find($leads_id);
            $lead->duration_time = Carbon::now();
            $lead->save();
            $lead->delete();
            return redirect()->back()->with('success', 'Aktion wurde erfolgreich durchgeführt');
        } else {
            return redirect()->back()->with('success', 'Aktion fehlgeschlagen');
        }

    }

    public function rejectlead(Request $request, $id)
    {
        $id = Crypt::decrypt($id) / 1244;

        $lead = lead::find($id);

        //$file = $request->file('begrundungfile2');
        $lead->begrundung = $request->begrundung;
        $lead->begrundung2 = $request->begrundung2;
        $lead->begrundungfile2 = $request->begrundungfile2 ? $this->storeFile($request->file('begrundungfile2'),'imgs') : null;
            //$this->storeFile($file, 'img');

        if($lead->save()){
            
			 Admins::role(['salesmanager'])->get()->each(function($item) use($lead){
                   $item->notify(new SendNotificationn('ein Begriff wurde von' . Admins::find($lead->assign_to_id)->name . 'abgelehnt'));
				 $lead->delete();
                });

            return redirect()->route('dashboard')->with('success', 'Aktion erfolgreich durchgeführt');
			
        }else {
           return redirect()->route('dashboard')->with('fail', 'Aktion fehlgeschlagen');
        }
    }

    public function dashboard(Request $req)
    {
        $user = auth()->user();

        $pendingg = Pendency::where('completed',0)
            ->with(['family', 'adminpend'])
            ->where('p',0)
            ->paginate(20,['*'],'pendP');

        $pendinggg = Pendency::where('completed',0)
            ->where('created_at','<',Carbon::now()->subDays(14))
            ->with(['family', 'adminpend'])
            ->where('p',1)
            ->paginate(20,['*'],'pendP');

        $urole = $user->getRoleNames()->toArray();

        $getmonth = isset($req->getmonth) ? $req->getmonth : "";
                $taskcnt = 0;
                date_default_timezone_set('Europe/Berlin');
                $provcnt = collect();
                //codi per statistics
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Provisionert')->get()->each(function ($item) use ($provcnt){
                    if(!$provcnt->contains($item->person_id_PG)){
                        $provcnt->push($item->person_id_PG);
                    }
                });
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Provisionert')->get()->each(function ($item) use ($provcnt){
                    if(!$provcnt->contains($item->person_id_PR)){
                        $provcnt->push($item->person_id_PR);
                    }
                });
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Provisionert')->get()->each(function ($item) use ($provcnt){
                    if(!$provcnt->contains($item->person_id_PV)){
                        $provcnt->push($item->person_id_PV);
                    }
                });
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Provisionert')->get()->each(function ($item) use ($provcnt){
                    if(!$provcnt->contains($item->person_id_PZ)){
                        $provcnt->push($item->person_id_PZ);
                    }
                });
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Provisionert')->get()->each(function ($item) use ($provcnt){
                    if(!$provcnt->contains($item->person_id_PA)){
                        $provcnt->push($item->person_id_PA);
                    }
                });
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Provisionert')->get()->each(function ($item) use ($provcnt){
                    if(!$provcnt->contains($item->person_id_PH)){
                        $provcnt->push($item->person_id_PH);
                    }
                });


                ////////////////////////////
                $eingerichtcnt = collect();

                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Eingereicht')->get()->each(function ($item) use ($eingerichtcnt){
                    if(!$eingerichtcnt->contains($item->person_id_PG)){
                        $eingerichtcnt->push($item->person_id_PG);
                    }
                });
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Eingereicht')->get()->each(function ($item) use ($eingerichtcnt){
                    if(!$eingerichtcnt->contains($item->person_id_PR)){
                        $eingerichtcnt->push($item->person_id_PR);
                    }
                });
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Eingereicht')->get()->each(function ($item) use ($eingerichtcnt){
                    if(!$eingerichtcnt->contains($item->person_id_PV)){
                        $eingerichtcnt->push($item->person_id_PV);
                    }
                });
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Eingereicht')->get()->each(function ($item) use ($eingerichtcnt){
                    if(!$eingerichtcnt->contains($item->person_id_PZ)){
                        $eingerichtcnt->push($item->person_id_PZ);
                    }
                });
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Eingereicht')->get()->each(function ($item) use ($eingerichtcnt){
                    if(!$eingerichtcnt->contains($item->person_id_PA)){
                        $eingerichtcnt->push($item->person_id_PA);
                    }
                });
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Eingereicht')->get()->each(function ($item) use ($eingerichtcnt){
                    if(!$eingerichtcnt->contains($item->person_id_PH)){
                        $eingerichtcnt->push($item->person_id_PH);
                    }
                });

                //////////////////
                $aufgenomencnt = collect();
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Aufgenommen')->get()->each(function ($item) use ($aufgenomencnt){
                    if(!$aufgenomencnt->contains($item->person_id_PG)){
                        $aufgenomencnt->push($item->person_id_PG);
                    }
                });
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Aufgenommen')->get()->each(function ($item) use ($aufgenomencnt){
                    if(!$aufgenomencnt->contains($item->person_id_PR)){
                        $aufgenomencnt->push($item->person_id_PR);
                    }
                });
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Aufgenommen')->get()->each(function ($item) use ($aufgenomencnt){
                    if(!$aufgenomencnt->contains($item->person_id_PV)){
                        $aufgenomencnt->push($item->person_id_PV);
                    }
                });
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Aufgenommen')->get()->each(function ($item) use ($aufgenomencnt){
                    if(!$aufgenomencnt->contains($item->person_id_PZ)){
                        $aufgenomencnt->push($item->person_id_PZ);
                    }
                });
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Aufgenommen')->get()->each(function ($item) use ($aufgenomencnt){
                    if(!$aufgenomencnt->contains($item->person_id_PA)){
                        $aufgenomencnt->push($item->person_id_PA);
                    }
                });
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Aufgenommen')->get()->each(function ($item) use ($aufgenomencnt){
                    if(!$aufgenomencnt->contains($item->person_id_PH)){
                        $aufgenomencnt->push($item->person_id_PH);
                    }
                });


                $offenBeratercnt = collect();
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Offen (Berater)')->get()->each(function ($item) use ($offenBeratercnt){
                    if(!$offenBeratercnt->contains($item->person_id_PG)){
                        $offenBeratercnt->push($item->person_id_PG);
                    }
                });
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Offen (Berater)')->get()->each(function ($item) use ($offenBeratercnt){
                    if(!$offenBeratercnt->contains($item->person_id_PR)){
                        $offenBeratercnt->push($item->person_id_PR);
                    }
                });
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Offen (Berater)')->get()->each(function ($item) use ($offenBeratercnt){
                    if(!$offenBeratercnt->contains($item->person_id_PV)){
                        $offenBeratercnt->push($item->person_id_PV);
                    }
                });
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Offen (Berater)')->get()->each(function ($item) use ($offenBeratercnt){
                    if(!$offenBeratercnt->contains($item->person_id_PZ)){
                        $offenBeratercnt->push($item->person_id_PZ);
                    }
                });
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Offen (Berater)')->get()->each(function ($item) use ($offenBeratercnt){
                    if(!$offenBeratercnt->contains($item->person_id_PA)){
                        $offenBeratercnt->push($item->person_id_PA);
                    }
                });
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Offen (Berater)')->get()->each(function ($item) use ($offenBeratercnt){
                    if(!$offenBeratercnt->contains($item->person_id_PH)){
                        $offenBeratercnt->push($item->person_id_PH);
                    }
                });


                $offeniddentineiestcnt = collect();
                $grundversicherungP = CostumerProduktGrundversicherung::where('status_PG', 'Offen (Innendienst)')->get()->each(function ($item) use ($offeniddentineiestcnt){
                    if(!$offeniddentineiestcnt->contains($item->person_id_PG)){
                        $offeniddentineiestcnt->push($item->person_id_PG);
                    }
                });
                $retchsschutzP = CostumerProduktRechtsschutz::where('status_PR', 'Offen (Innendienst)')->get()->each(function ($item) use ($offeniddentineiestcnt){
                    if(!$offeniddentineiestcnt->contains($item->person_id_PR)){
                        $offeniddentineiestcnt->push($item->person_id_PR);
                    }
                });
                $vorsorgeP = CostumerProduktVorsorge::where('status_PV', 'Offen (Innendienst)')->get()->each(function ($item) use ($offeniddentineiestcnt){
                    if(!$offeniddentineiestcnt->contains($item->person_id_PV)){
                        $offeniddentineiestcnt->push($item->person_id_PV);
                    }
                });
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('status_PZ', 'Offen (Innendienst)')->get()->each(function ($item) use ($offeniddentineiestcnt){
                    if(!$offeniddentineiestcnt->contains($item->person_id_PZ)){
                        $offeniddentineiestcnt->push($item->person_id_PZ);
                    }
                });
                $autoversicherungP = CostumerProduktAutoversicherung::where('status_PA', 'Offen (Innendienst)')->get()->each(function ($item) use ($offeniddentineiestcnt){
                    if(!$offeniddentineiestcnt->contains($item->person_id_PA)){
                        $offeniddentineiestcnt->push($item->person_id_PA);
                    }
                });
                $hausratP = CostumerProduktHausrat::where('status_PH', 'Offen (Innendienst)')->get()->each(function ($item) use ($offeniddentineiestcnt){
                    if(!$offeniddentineiestcnt->contains($item->person_id_PH)){
                        $offeniddentineiestcnt->push($item->person_id_PH);
                    }
                });






                $grundversicherungOffen = CostumerProduktGrundversicherung::where('status_PG', 'Offen (Berater)')->count();
                $retchsschutzOffen = CostumerProduktRechtsschutz::where('status_PR', 'Offen (Berater)')->count();
                $vorsorgeOffen = CostumerProduktVorsorge::where('status_PV', 'Offen (Berater)')->count();
                $zusatzversicherungOffen = CostumerProduktZusatzversicherung::where('status_PZ', 'Offen (Berater)')->count();
                $autoversicherungOffen = CostumerProduktAutoversicherung::where('status_PA', 'Offen (Berater)')->count();
                $hausratOffen = CostumerProduktHausrat::where('status_PH', 'Offen (Berater)')->count();


                $grundversicherungAuf = CostumerProduktGrundversicherung::where('status_PG', 'Aufgenomen')->count();
                $retchsschutzAuf = CostumerProduktRechtsschutz::where('status_PR', 'Aufgenomen')->count();
                $vorsorgeAuf = CostumerProduktVorsorge::where('status_PV', 'Aufgenomen')->count();
                $zusatzversicherungAuf = CostumerProduktZusatzversicherung::where('status_PZ', 'Aufgenomen')->count();
                $autoversicherungAuf = CostumerProduktAutoversicherung::where('status_PA', 'Aufgenomen')->count();
                $hausratAuf = CostumerProduktHausrat::where('status_PH', 'Aufgenomen')->count();

                $grundversicherungA = CostumerProduktGrundversicherung::where('status_PG', 'Abgelehnt')->count();
                $retchsschutzA = CostumerProduktRechtsschutz::where('status_PR', 'Abgelehnt')->count();
                $vorsorgeA = CostumerProduktVorsorge::where('status_PV', 'Abgelehnt')->count();
                $zusatzversicherungA = CostumerProduktZusatzversicherung::where('status_PZ', 'Abgelehnt')->count();
                $autoversicherungA = CostumerProduktAutoversicherung::where('status_PA', 'Abgelehnt')->count();
                $hausratA = CostumerProduktHausrat::where('status_PH', 'Abgelehnt')->count();

                $grundversicherungZ = CostumerProduktGrundversicherung::where('status_PG', 'Zuruckgezogen')->count();
                $retchsschutzZ = CostumerProduktRechtsschutz::where('status_PR', 'Zuruckgezogen')->count();
                $vorsorgeZ = CostumerProduktVorsorge::where('status_PV', 'Zuruckgezogen')->count();
                $zusatzversicherungZ = CostumerProduktZusatzversicherung::where('status_PZ', 'Zuruckgezogen')->count();
                $autoversicherungZ = CostumerProduktAutoversicherung::where('status_PA', 'Zuruckgezogen')->count();
                $hausratZ = CostumerProduktHausrat::where('status_PH', 'Zuruckgezogen')->count();
                //perfundion


                if (auth()->check()) {
                    $pendingcnt = !auth()->user()->hasRole('fs') ? Pendency::where('done',0)->where('p',1)->where('completed',0)
                        ->count() : Pendency::where('done',0)->where('completed',0)->where('admin_id',auth()->id())->where('p',1)->count();
                    $opencnt = 0;
                    $done = 0;
                    $recorded = 0;
                    $morethan30 = collect();
                    $pendencies = collect();
                    $taskcnt = 0;
                    $tasks = null;

                    if (in_array('backoffice',$urole) || in_array('admin',$urole) || in_array('salesmanager',$urole)) {
                        $pcnt = 0;
                        $mcnt = 0;
                        foreach (family::with('adminpend')
                                     ->join('pendencies', 'family_person.id', '=', 'pendencies.family_id')
                                     ->select('family_person.first_name', 'pendencies.family_id', 'family_person.id', 'family_person.last_name', 'pendencies.created_at', 'pendencies.done', 'pendencies.completed', 'pendencies.admin_id', 'pendencies.id as pid', 'pendencies.description','family_person.provisionert')
                                     ->orderBy('family_person.first_name', 'asc')
                                     ->where('done', 1)
                                     ->orderBy('pendencies.created_at','desc')
                                     ->paginate(50,'*','pendP') as $task) {
                            if ($task->completed == 0) {
                                $pendencies->push($task);
                            }

                        }
                        foreach (family::with(['pendency'])->get() as $f){
                           $morethan = $f->morethan14(); if($morethan->count() > 0) $morethan30->push(['person' =>$f,'data'=> $morethan->implode(',')]);
                        }



                        $pendencies->page = $req->pendP ? $req->pendP : 1;
                    }
                    if (in_array('fs',$urole) || in_array('admin',$urole) || in_array('salesmanager',$urole) || in_array('digital',$urole)) {
                        if (in_array('fs',$urole)) {
                            $pending = auth()->user()->pendencies()->where('done',0)->count();
                            $tasks = DB::table('leads')
                                ->where('completed', '=', '0')
                                ->count();
                            $done = auth()->user()->pendencies()->where('completed',1)->count();
                        } elseif (in_array('admin',$urole)) {
                            $pending = DB::table('family_person')
                                ->join('pendencies', 'family_person.id', '=', 'pendencies.family_id')
                                ->where('pendencies.done', '=', 0)
                                ->select('family_person.first_name as first_name', 'family_person.last_name as last_name', 'pendencies.*', 'family_person.id as id')
                                ->count();
                            $tasks = DB::table('leads')
                                ->where('completed', '=', '0')
                                ->where('status_contract', '!=', 'Done')
                                ->orWhereNull('status_contract')
                                ->where('status_task', '!=', 'Done')
                                ->count();
                            $done = DB::table('family_person')
                                ->join('pendencies', 'family_person.id', 'pendencies.family_id')
                                ->where('pendencies.completed', 1)
                                ->count();
                        } else {
                            $pending = DB::table('family_person')
                                ->join('pendencies', 'family_person.id', '=', 'pendencies.family_id')
                                ->where('pendencies.done', '=', 0)
                                ->select('family_person.first_name as first_name', 'family_person.last_name as last_name', 'pendencies.*', 'family_person.id as id')
                                ->where('pendencies.admin_id', $user->id)
                                ->count();
                            $tasks = DB::table('leads')
                                ->where('completed', '=', '0')
                                ->where('status_task', '!=', 'Done')
                                ->where('assign_to_id', $user->id)
                                ->count();
                            $done = DB::table('leads')
                                ->where('completed', 1)
                                ->where('status_contract', 'Done')
                                ->where('assign_to_id', $user->id)
                                ->where('status_task', 'Done')
                                ->count();
                        }
                        $percnt = 0.00;

                        if ($tasks != 0) {
                            $percnt = (100 / $tasks) * $done;
                        }

                        if (in_array('fs',$urole)) {
                            $offen = DB::table('leads')
                            ->join('family_person','leads.id','family_person.leads_id')
                            ->where('leads.assign_to_id',$user->id)
                            ->whereIn('family_person.status',['Open'])
                            ->count();

                            $leadscount = $leadscount = DB::table('leads')->where('completed', '0')->where('deleted_at',null)->where('assigned', 0)->orderBy('updated_at', 'asc')->where('leads.assign_to_id', $user->id)->where('wantsonline', 0)->where('rejected', 0)->count();
                        } else {
                            $offen = DB::table('family_person')
                                ->join('leads', 'family_person.leads_id', '=', 'leads.id')
                                ->whereIn('family_person.status',['Open'])
                                ->where('leads.assign_to_id', $user->id)
                                ->count();

                            $leadscount = DB::table('leads')
                                ->whereNull('assign_to_id')
                                ->where('assigned', 0)
                                ->where('completed', 0)
                                ->where('rejected', 0)
                                ->where('wantsonline', 0)
                                ->where('apporlead','lead')
                                ->count();
                        }
                    }
                    if (in_array('fs',$urole) || in_array('digital',$urole)) {
                        if (in_array('fs',$urole)) {
                            $todayAppointCount = lead::where('assign_to_id', $user->id)->where('appointment_date', Carbon::now()->format('Y-m-d'))->where('wantsonline', 0)->where('assigned', 1)->where('completed',0)->count();
                        } else {
                            $todayAppointCount = lead::where('assign_to_id', $user->id)->where('appointment_date', Carbon::now()->format('Y-m-d'))->where('wantsonline', 1)->where('assigned', 1)->where('completed',0)->count();
                        }

                        $grundprov = 0;
                        $grundoffen = 0;
                        $grundauf = 0;
                        $autoprov = 0;
                        $autoffen = 0;
                        $autoauf = 0;
                        $zusaprov = 0;
                        $zusaoffen = 0;
                        $zusauf = 0;
                        $hausprov = 0;
                        $hausoffen = 0;
                        $hausauf = 0;
                        $rechprov = 0;
                        $rechoffen = 0;
                        $rechauf = 0;
                        $vorsprov = 0;
                        $voroff = 0;
                        $vorauf = 0;
                        $provcnt = collect();



                        // foreach (DB::table('family_person')
                        //              ->join('leads', 'family_person.leads_id', 'leads.id')
                        //              ->where('leads.assign_to_id', $user->id)
                        //              ->join('costumer_produkt_grundversicherung', 'costumer_produkt_grundversicherung.person_id_PG', 'family_person.id')
                        //              ->select('costumer_produkt_grundversicherung.status_PG','family_person.id as fid')
                        //              ->get() as $status) {
                        //     if ($status->status_PG == 'Provisionert') {
                        //         if($provcnt->doesntContain($status->fid)){
                        //             $provcnt->push($status->fid);
                        //         }
                        //     }

                        // }
                        // foreach (DB::table('family_person')
                        //              ->join('leads', 'family_person.leads_id', 'leads.id')
                        //              ->where('leads.assign_to_id', $user->id)
                        //              ->join('costumer_produkt_autoversicherung', 'costumer_produkt_autoversicherung.person_id_PA', 'family_person.id')
                        //              ->select('costumer_produkt_autoversicherung.status_PA','family_person.id as fid')
                        //              ->get() as $status) {
                        //     if ($status->status_PA == 'Provisionert') {
                        //         if($provcnt->doesntContain($status->fid)){
                        //             $provcnt->push($status->fid);
                        //         }
                        //     }
                        // }
                        // foreach (DB::table('family_person')
                        //              ->join('leads', 'family_person.leads_id', 'leads.id')
                        //              ->where('leads.assign_to_id', $user->id)
                        //              ->join('costumer_podukt_zusatzversicherung', 'costumer_podukt_zusatzversicherung.person_id_PZ', 'family_person.id')
                        //              ->select('costumer_podukt_zusatzversicherung.status_PZ','family_person.id as fid')
                        //              ->get() as $status) {
                        //     if ($status->status_PZ == 'Provisionert') {
                        //         if($provcnt->doesntContain($status->fid)){
                        //             $provcnt->push($status->fid);
                        //         }
                        //     }
                        // }
                        // foreach (DB::table('family_person')
                        //              ->join('leads', 'family_person.leads_id', 'leads.id')
                        //              ->where('leads.assign_to_id', $user->id)
                        //              ->join('costumer_produkt_hausrat', 'costumer_produkt_hausrat.person_id_PH', 'family_person.id')
                        //              ->select('costumer_produkt_hausrat.status_PH','family_person.id as fid')
                        //              ->get() as $status) {
                        //     if ($status->status_PH == 'Provisionert') {
                        //         if($provcnt->doesntContain($status->fid)){
                        //             $provcnt->push($status->fid);
                        //         }
                        //     }

                        // }
                        // foreach (DB::table('family_person')
                        //              ->join('leads', 'family_person.leads_id', 'leads.id')
                        //              ->where('leads.assign_to_id', $user->id)
                        //              ->join('costumer_produkt_rechtsschutz', 'costumer_produkt_rechtsschutz.person_id_PR', 'family_person.id')
                        //              ->select('costumer_produkt_rechtsschutz.status_PR','family_person.id as fid')
                        //              ->get() as $status) {
                        //     if ($status->status_PR == 'Provisionert') {
                        //         if($provcnt->doesntContain($status->fid)){
                        //             $provcnt->push($status->fid);
                        //         }
                        //     }
                        // }
                        // foreach (DB::table('family_person')
                        //              ->join('leads', 'family_person.leads_id', 'leads.id')
                        //              ->where('leads.assign_to_id', $user->id)
                        //              ->join('costumer_produkt_vorsorge', 'costumer_produkt_vorsorge.person_id_PV', 'family_person.id')
                        //              ->select('costumer_produkt_vorsorge.status_PV','family_person.id as fid')
                        //              ->get() as $status) {
                        //     if ($status->status_PV == 'Provisionert') {
                        //         if($provcnt->doesntContain($status->fid)){
                        //             $provcnt->push($status->fid);
                        //         }
                        //     }
                        // }

                        $leed = lead::where('assign_to_id',Auth::user()->id)->withTrashed()->count();
                        if($leed > 0){
                            $leadssAll = 100 / $leed;
                            $leadsAbschlose = lead::where('assign_to_id',Auth::user()->id)->where('completed', 1)->where('rejected',0)->count();
    
                            $leadsAll = $leadsAbschlose * $leadssAll;
                        }else{
                            $leadsAll = 0;
                        }
                        
                        

                        $provisionertCount = $provcnt->count();
                        $offenCount = $eingerichtcnt->count();
                        $aufgenomenCount = $aufgenomencnt->count();
                        $offens = $offenBeratercnt->count() + $offeniddentineiestcnt->count();

                        $counterat = [
                            'provisionertCount' => $provisionertCount,
                            'offenCount' => $offenCount,
                            'aufgenomenCount' => $aufgenomenCount,
                            'familyCount' => $leadsAll,
                            'offens' => $offens
                        ];


                        return view('dashboard', compact('user','urole','zusatzversicherungP','grundversicherungP','vorsorgeP','autoversicherungP','retchsschutzP','hausratP','done', 'tasks', 'pendingcnt', 'leadscount', 'todayAppointCount', 'percnt', 'pendencies', 'pendingcnt', 'counterat', 'offen'));

                    } elseif (in_array('backoffice',$urole)) {
                        $tasks = lead::whereHas('family', function ($q){
                            $q->whereIn('status',['Open']);
                        })->with(['family' => function ($q){
                            $q->whereIn('status',['Open']);
                        }])->paginate(5,'*','taskk');

                        $leadsss = Crypt::encrypt(Auth::user()->id * 1244);
                        $absences = Absence::whereHas('admin')->with('admin')->where('type',0)->orderBy('created_at', 'desc')->get();
                        return view('dashboard', compact('absences','pendinggg','zusatzversicherungP','grundversicherungP','vorsorgeP','autoversicherungP','retchsschutzP','hausratP','user','tasks','urole','pendencies', 'morethan30','leadsss','pendingg'));
                    } elseif (in_array('salesmanager',$urole)) {


                        $consultation = PersonalAppointment::where('AppOrCon', 2)->where('date', '>=', Carbon::now()->format('Y-m-d'))->get()->groupBy('commen_id');

                        // $consultation = $new->filter(function ($item) use($user){
                        //     return $item->user_id == $user->id || $item->assignfrom == $user->id;
                        // });

                        $countconsultation = $consultation->count();

                        $todayAppointCount = lead::where('appointment_date', Carbon::now()->format('Y-m-d'))->where('assigned', 1)->where('completed',0)->count();

                        $admins = Admins::role(['fs','salesmanager'])->get();
                        $adminsStat = Admins::role(['fs'])->with('kunden')->get();

                        $personalApp = PersonalAppointment::where('AppOrCon', 1)->where('user_id', $user->id)->where('date', '>=', Carbon::now()->format('Y-m-d'))->get();
                        $countpersonalApp = $personalApp->count();


                        $provisionertCount = $grundversicherungP->count() + $retchsschutzP->count() + $vorsorgeP->count() + $zusatzversicherungP->count() + $autoversicherungP->count() + $hausratP->count();
                        $offenCount = $grundversicherungOffen + $retchsschutzOffen + $vorsorgeOffen + $zusatzversicherungOffen + $autoversicherungOffen + $hausratOffen;
                        $aufgenomenCount = $grundversicherungAuf + $retchsschutzAuf + $vorsorgeAuf + $zusatzversicherungAuf + $autoversicherungAuf + $hausratAuf;
                        $zuruckCount = $grundversicherungZ + $retchsschutzZ + $vorsorgeZ + $zusatzversicherungZ + $autoversicherungZ + $hausratZ;
                        $abgCount = $grundversicherungA + $retchsschutzA + $vorsorgeA + $zusatzversicherungA + $autoversicherungA + $hausratA;

                        return view('dashboard', compact('user','admins','zusatzversicherungP','grundversicherungP','vorsorgeP','autoversicherungP','retchsschutzP','hausratP','adminsStat','urole','personalApp', 'consultation', 'done', 'tasks', 'pending', 'leadscount', 'todayAppointCount', 'percnt', 'pendencies', 'pendingcnt', 'morethan30', 'recorded', 'countpersonalApp', 'countconsultation', 'provisionertCount', 'offenCount', 'aufgenomenCount', 'zuruckCount', 'abgCount', 'offen','adminsStat'));
                    } elseif (in_array('admin',$urole)) {
                        $personalApp = PersonalAppointment::where('AppOrCon', 1)->where('assignfrom', $user->id)->where('date', '>=', Carbon::now()->format('Y-m-d'))->get();
                        $countpersonalApp = $personalApp->count();

                        $neww = PersonalAppointment::where('AppOrCon', 2)->where('date', '>=', Carbon::now()->format('Y-m-d'))->get()->unique('commen_id');
                        $consultation = $neww->filter(function ($item) use($user){
                            return $item->user_id == $user->id || $item->assignfrom == $user->id;
                        });
                        $countconsultation = $consultation->count();

                        $admins =  Admins::all();

                        $todayAppointCount = lead::where('appointment_date', Carbon::now()->format('Y-m-d'))->where('assigned', 1)->where('completed',0)->count();


                        $provisionertCount = $provcnt->count();
                        $offenCount = $eingerichtcnt->count();
                        $aufgenomenCount = $aufgenomencnt->count();
                        $offens = $offenBeratercnt->count() + $offeniddentineiestcnt->count();
                        // $offenCount = $grundversicherungOffen + $retchsschutzOffen + $vorsorgeOffen + $zusatzversicherungOffen + $autoversicherungOffen + $hausratOffen;
                        // $aufgenomenCount = $grundversicherungAuf + $retchsschutzAuf + $vorsorgeAuf + $zusatzversicherungAuf + $autoversicherungAuf + $hausratAuf;
                        $zuruckCount = $grundversicherungZ + $retchsschutzZ + $vorsorgeZ + $zusatzversicherungZ + $autoversicherungZ + $hausratZ;
                        $abgCount = $grundversicherungA + $retchsschutzA + $vorsorgeA + $zusatzversicherungA + $autoversicherungA + $hausratA;


                        $leed = lead::withTrashed()->count();
                        if($leed > 0){
                            $leadssAll = 100 / $leed;
                            $leadsAbschlose = lead::where('completed', 1)->where('rejected',0)->count();

                            $leadsAll = $leadsAbschlose * $leadssAll;
                        }else{
                            $leadsAll = 0;
                        }
                        

                        $counterat = [
                            'provisionertCount' => $provisionertCount,
                            'offenCount' => $offenCount,
                            'aufgenomenCount' => $aufgenomenCount,
                            'abgCount' => $abgCount,
                            'zuruckCount' => $zuruckCount,
                            'familyCount' => $leadsAll,
                            'offens' => $offens
                        ];

                        $tasks = lead::whereHas('family', function ($q){
                            $q->whereIn('status',['Open']);
                        })->with(['family' => function ($q){
                            $q->whereIn('status',['Open']);
                        }])->paginate(5,'*','taskk');

                        $leadsss = Crypt::encrypt(Auth::user()->id * 1244);
                        $absences = Absence::whereHas('admin')->with('admin')->where('type', 0)->orderBy('created_at', 'desc')->get();

                return view('dashboard', compact('absences','pendinggg','zusatzversicherungP','grundversicherungP','vorsorgeP','autoversicherungP','retchsschutzP','hausratP','consultation','leadsss','tasks','countconsultation','user','urole','done', 'admins', 'counterat', 'personalApp', 'tasks', 'pending', 'leadscount', 'todayAppointCount', 'percnt', 'pendencies', 'pendingcnt', 'morethan30', 'recorded', 'countpersonalApp', 'offen','pendingg'));
            }
        }
    }

    public function addnewuser(){
            $admins = Admins::all()->whereNull('admin_id');
            $roles = Role::all();
            return view('addnewuser', compact('roles','admins'));
        
       
    }
    public function changePassword(Request $req){
        $admini = Admins::select('password')->find(auth()->user()->id);

        if(Hash::check($req->current_password ,$admini->password)){
            Admins::find(auth()->user()->id)->update([
                'password' => Hash::make($req->new_password)
            ]);

            return back()->with('success','Passwort geändert');
        }else{
            return back()->with('fail','Kennwort konnte nicht geändert werden');
        }
    }
    public function loginas(Request  $req){
        $email = auth()->user()->email;
        $email = $req->role . $email;
        $admin = Admins::where('email',$email)->first();
        if($admin){
           Auth::loginUsingId($admin->id);
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('fail',"Falsche!");
        }
    }

    public function registernewuser(Request $request)
    {
        $request->validate(['user_email' => 'unique:admins,email']);
        $cnt = (int) $request->input('addedroles');
        $roles = collect();
        $roles->push($request->input('role_name'));

        for ($i = 1; $i <= $cnt; $i++) {
            $roles->push($request->input('role_name' . $i));
        }

        if ($cnt > 0) {
            if ($request->user_password == $request->retype_password) {
                if ($request->user_password != '' && ($request->user_password > 7)) {
                    $admins = new Admins();
                    $admins->name = filter_var($request->user_name, FILTER_SANITIZE_STRING);
                    $admins->email = filter_var($request->user_email, FILTER_SANITIZE_STRING);
                    $admins->phonenumber = filter_var($request->phone_number, FILTER_SANITIZE_STRING);
                    $admins->roless = json_encode($roles);
                    $admins->password = Hash::make($request->user_password);
                    $admins->save();
                    $personalData = EmployeePersonalData::create([
                        'admin_id' => $admins->id,
                        'name' => filter_var($request->user_name, FILTER_SANITIZE_STRING),
                        'phone' => filter_var($request->phone_number, FILTER_SANITIZE_STRING)
                    ]);
                  $roles->each(function($item) use($request,$admins){
                        $admin = new Admins();
                        $admin->name = filter_var($request->user_name, FILTER_SANITIZE_STRING);
                        $admin->phonenumber = filter_var($request->phone_number, FILTER_SANITIZE_STRING);
                        $admin->email = $item . $request->user_email;
                        $admin->password = Hash::make($request->user_password);
                        $admin->admin_id = $admins->id;
                        $admin->save();
                        $admin->assignRole($item);
                        EmployeePersonalData::create(['name' => $admin->name, 'admin_id' => $admins->id, 'phone' => $admin->phonenumber]);
                        BankInformation::create(['employee_id' => $admins->id]);
                  });
                    return redirect()->back()->with('success', 'Erfolgreich hinzugefügt');
                }
            }
            return redirect()->back()->with('fail', 'Falsche!');
        } else {
            $admins = new Admins();
            $admins->name = filter_var($request->user_name, FILTER_SANITIZE_STRING);
            $admins->email = filter_var($request->user_email, FILTER_SANITIZE_STRING);
            $admins->phonenumber = filter_var($request->phone_number, FILTER_SANITIZE_STRING);
            if ($request->user_password == $request->retype_password) {
                if ($request->user_password != '' && ($request->user_password > 7)) {
                    $admins->roless = null;
                    $admins->password = Hash::make($request->user_password);
                    $admins->save();
                    $admins->assignRole($request->role_name);

                    $personalData = EmployeePersonalData::create([
                        'admin_id' => $admins->id,
                        'name' => filter_var($request->user_name, FILTER_SANITIZE_STRING),
                        'phone' => filter_var($request->phone_number, FILTER_SANITIZE_STRING)
                    ]);
                    return redirect()->back()->with('success', 'Erfolgreich hinzugefügt');
                }
            } else {
                return redirect()->back()->with('fail', 'Falsche!');
            }
        }
    }

}




