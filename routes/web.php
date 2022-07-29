<?php

use App\Events\SendNotification;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\HumanResourcesController;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\CostumerStatusGrundversicherung;
use App\Models\CostumerStatusHausrat;
use App\Models\CostumerStatusRetchsschutz;
use App\Models\CostumerStatusVorsorge;
use App\Models\CostumerStatusZusatzversicherung;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\confirmcode;
use App\Http\Middleware\confirmedadmin;
use App\Http\Middleware\confirmedcode;
use App\Mail\confirmcode as MailConfirmcode;
use Carbon\Carbon;
use App\Http\Controllers\TasksController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CostumerFormController;
use App\Http\Controllers\TodoController;
use App\Models\Admins;
use App\Models\todo;
use App\Models\family;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\FamilyPersonsController;
use App\Http\Controllers\LeadDataController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TeamController;
use App\Imports\leadinfo;
use App\Imports\newlead;
use Illuminate\Support\Facades\DB;
use App\Listeners\SendNotificationListener;
use App\Models\campaigns;
use App\Models\data;
use App\Models\lead;
use App\Models\lead_info;
use App\Models\LeadDataPlus;
use App\Imports\CostumerImport;
use App\Models\notification;
use App\Notifications\SendNotification as NotificationsSendNotification;
use App\Notifications\SendNotificationn;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Musonza\Chat\Chat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use function Clue\StreamFilter\fun;
use App\Models\TestClass;
use Facade\FlareClient\Http\Response;
use FontLib\TrueType\Collection;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Monolog\Test\TestCase;
use App\Http\Controllers\RouteController;
use App\Http\Test;
use App\Mail\confirmcodee;
use App\Models\LogsActivity;
use App\Models\Provisions;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\HeadingRowImport;

route::prefix('')->middleware(['confirmcode',\App\Http\Middleware\ChangeRole::class,'throttle:trynal',\App\Http\Middleware\isagent::class])->group(function(){
    route::get('addlead',function(){
        $campaigns = campaigns::all();
        return view('addlead',compact('campaigns'));
    })->middleware('role:admin|fs|salesmanager');
        route::post('createbst',[HumanResourcesController::class,'createBestellunge'])->name('createBestellunge');
    route::post('importleads',function(Request $req){
        if($req->hasFile('file')){
            $file = $req->file('file');
            \Maatwebsite\Excel\Facades\Excel::import(new newlead, $file);
            \Maatwebsite\Excel\Facades\Excel::import(new leadinfo, $file);
        }
        else{
            return redirect()->back();
        }
        $admins = Admins::role(['salesmanager','admin'])->get();
        foreach($admins as $admin){
            $admin->notify(new SendNotificationn('<a href="' . route('leads') . '">Bestimmte Leads wurden gerade importiert</a>'));
        }
        return redirect()->back();
    })->name('importleads')->middleware('role:admin|salesmanager');
    route::get('getleads',function(){
        $user = auth()->user();

        $urole = $user->getRoleNames();

        if ($urole->contains('admin') || $urole->contains('salesmanager')) {
            $leads['leads'] = lead::with('campaign')->with('info')->where('completed', '0')->where('assigned', 0)->where('assign_to_id', null)->where('wantsonline',0)->where('rejected',0)->whereNull('appointment_date')->orderBy('updated_at','asc')->whereNull('insertedManualy')->paginate(100);
        } elseif ($urole->contains('fs')) {
            $leads['leads'] = lead::with('campaign')->with('info')->where('completed', '0')->where('assigned', 0)->orderBy('updated_at','asc')->where('leads.assign_to_id',Auth::user()->id)->where('wantsonline',0)->where('rejected',0)->whereNull('appointment_date')->whereNull('insertedManualy')->paginate(100);
        }
        $instagram = 0;
        $sanascout = 0;
        $facebook = 0;
        for($i = 0; $i < count($leads['leads']); $i++){
            $leadinfo = $leads['leads'][$i]->info;
            $leads['leads'][$i]->grund = $leadinfo ? $leadinfo->grund : null;
            $leads['leads'][$i]->krankenkasse = $leadinfo ? $leadinfo->krankenkasse : null;
            $leads['leads'][$i]->bewertung = $leadinfo ? $leadinfo->bewerung : null;
            $leads['leads'][$i]->wichtig = $leadinfo ? $leadinfo->wichtig : null;
            $leads['leads'][$i]->kampagne = $leadinfo ? $leadinfo->kampagne : null;
            $leads['leads'][$i]->teilnahme = $leadinfo ? $leadinfo->teilnahme : null;
            if($leads['leads'][$i]->campaign_id == 1) $instagram++;
            elseif($leads['leads'][$i]->campaign_id == 2) $facebook++;
            else $sanascout++;
        }
        $leads['admins'] = Admins::role(['fs'])->get();
        $leads['admin'] = Auth::user()->getRoleNames();
        $leads['sanascout'] = $sanascout;
        $leads['instagram'] = $instagram;
        $leads['facebook'] = $facebook;

        return $leads;
    })->middleware('role:admin|fs|salesmanager');
    route::post('addslead',[UserController::class,'addslead'])->name('addslead')->middleware('role:admin|fs|salesmanager');
    route::get('assigntofs/{admin}',function($admin = null,Request $req){
        $array = $req->array;
        $array = explode(",",$array);
        if(Admins::find($admin)->hasRole('fs')){
            foreach($array as $arr){
                lead::find($arr)->update(['assign_to_id' => $admin,'updated_at' => Carbon::now()->format('Y-m-d')]);
            }
        }
        else{
            foreach($array as $arr){
                lead::find($arr)->update(['assign_to_id' => $admin,'updated_at' => Carbon::now()->format('Y-m-d'),'assigned' => 1]);
            }
        }
        Admins::find($admin)->notify(new SendNotificationn('<a href="' . route('leads') . '">Ihnen wurden ' . count($array) . ' Leads zugewiesen!</a>'));
    })->name('assigntofs')->middleware('role:admin|salesmanager');
    route::post('importcostumer',function (Request $req){
        $file = $req->file('costumerfile');
        \Maatwebsite\Excel\Facades\Excel::import(new CostumerImport, $file);

        return back();
    })->name('importcostumer')->middleware('role:admin');
    route::get('assignpendency',[TasksController::class,'assignpendency'])->middleware('role:backoffice|admin');
    route::get('acceptapp/{id}',[UserController::class,'acceptapp']);
    route::get('closenots',[UserController::class,'closenots']);
    route::get('notifications',[UserController::class,'notifications']);
    route::get('insterappointment',[UserController::class,'insertappointment'])->name('insertappointment')->middleware('role:admin|salesmanager|fs|callagent');
    route::get('/',[UserController::class,'dashboard'])->name('dashboard');
    route::get('leads',[UserController::class,'leads'])->name('leads')->middleware('role:admin|fs|salesmanager');
    route::post('asignlead/{id}',[UserController::class,'asignlead'])->name('asignlead')->middleware('role:admin|fs|salesmanager');
    route::get('alead/{id}',[UserController::class,'alead'])->name('alead');
    route::get('dlead/{id}',[UserController::class,'dlead'])->name('dlead');
    route::post('deletedlead/{id}',[UserController::class,'deletedlead'])->name('deletedlead')->middleware('role:admin|fs|salesmanager');
    route::post('addappointment',[UserController::class,'addappointment'])->name('addappointment')->middleware('role:admin|fs|salesmanager|callagent')->withoutMiddleware(\App\Http\Middleware\isagent::class);
    route::post('edit_costumer_kundportfolio/{id}',[\App\Http\Controllers\CostumerFormController::class,'edit_costumer_kundportfolio'])->name('edit_costumer_kundportfolio')->middleware('role:admin|backoffice,admins');
    route::get('dealclosed/{id}',[UserController::class,'dealclosed'])->name('dealclosed')->middleware('role:admin|fs|salesmanager');
    Route::get('changeTS', 'App\Http\Controllers\AppointmentsController@changeTS')->name('changeTS')->middleware('role:admin|salesmanager|fs');
    route::post('completeapp/{id}',[UserController::class,'completeapp'])->name('completeapp')->middleware('role:admin|fs|salesmanager');
    route::get('dealnotclosed/{id}',[UserController::class,'dealnotclosed'])->name('dealnotclosed')->middleware('role:admin|fs|salesmanager');
    route::post('rejectedleads',[UserController::class,'rejectedleads'])->name('rejectedleads')->middleware('role:admin|fs|salesmanager');
    route::post('pending_rejectedlead',[UserController::class,'pending_rejectedlead'])->name('pending_rejectedlead')->middleware('role:admin|fs|salesmanager');
    route::post('rejectlead/{id}',[UserController::class,'rejectlead'])->name('rejectlead')->middleware('role:admin|fs|salesmanager');
    route::get('addnewuser',[UserController::class,'addnewuser'])->name('addnewuser');
    route::post('changePassword',[UserController::class,'changePassword'])->name('changePassword');
    route::post('registernewuser',[UserController::class,'registernewuser'])->name('registernewuser')->middleware('role:admin');
    route::get('folgetermin/{id}',[UserController::class,'folgetermin'])->name('folge');
    route::get('insertPerson/{id}',function ($id){
        $lead = lead::select('number_of_persons')->where('id',$id)->first();
        $count = $lead->number_of_persons + 1;
        lead::where('id',$id)->update(['number_of_persons' => $count]);
        return redirect()->back();
    })->name('insertPerson');
    route::post('folgepost/{id}',function ($id,Request $req){
        $id = Crypt::decrypt($id);
        $id = $id / 1244;
        lead::find($id)->update(array('appointment_date' => $req->ndate,"time" => $req->time, 'folged' => 1,'folgeComment' => $req->folgecomment));
        Admins::role(['salesmanager'])->get()->each(function($item) use ($id,$req){
            $item->notify(new SendNotificationn('<a href="' . route('Appointments') .'">Ein Termin von ' . lead::find($id)->admin->name . ' bei ' .  lead::find($id)->name . ' wurde auf den '. $req->ndate . ' verschoben</a>'));});
        return redirect()->route('dashboard');
    })->name('folgepost');
    route::get('acceptappointment/{id}',function ($id){
        $lead = lead::find($id);
        return view('acceptappointment',compact('lead'));
    })->name('acceptappointment');
    route::get('acceptleadinfo/{id}',function ($id){
        $idd = Crypt::decrypt($id);
        $idd /= 1244;
        $app = lead::find($idd)->update(['assigned' => 1]);
        return redirect()->back();
    })->name('acceptleadinfo')->middleware('role:admin|fs|salesmanager');
    route::get('costumer_documents/{id}/{admin_id?}',[FamilyPersonsController::class,'family_persons'])->name('leadfamilyperson')->middleware('role:admin|backoffice');
    route::post('createLeadDataKK/{leadIdd}/{personIdd}',[LeadDataController::class,'createLeadDataKK'])->name('createLeadDataKK')->middleware('role:admin|backoffice');
    route::post('updateLeadDataKK/{leadId}/{personId}',[LeadDataController::class,'updateLeadDataKK'])->name('updateLeadDataKK')->middleware('role:admin|backoffice');
    route::get('changerole','App\Http\Controllers\UserController@changerole');
    route::post('addrole',[UserController::class,'addrole'])->name('addrole');
    route::any('tasks',[TasksController::class,'tasks'])->name('tasks')->middleware('role:admin|fs|backoffice');
    route::get('searchword',[TasksController::class,'searchword'])->name('searchword')->middleware('role:admin|fs|backoffice|salesmanager');
    route::get('costumer/{costumerId}',[TodoController::class,'getDataForTaskByCostumerId'])->name('getDataForTaskByCostumerId');
    route::any('costumers',[TasksController::class,'costumers'])->name('costumers')->middleware('role:admin|fs|backoffice|salesmanager|digital');
    route::get('costumer_form/{id}',[\App\Http\Controllers\CostumerFormController::class,'costumer_form'])->name('costumer_form');
    route::post('save_costumer_form/{id}',[\App\Http\Controllers\CostumerFormController::class,'save_costumer_form'])->name('save_costumer_form');
    route::any('search',[TasksController::class,'costumers'])->name('search');
    route::get('todayappointments',[TasksController::class,'today'])->middleware('role:admin|fs|backoffice');
    route::get('vuedate',[TasksController::class,'vuedate'])->middleware('role:admin|fs|backoffice');
    route::get('chat/{u1}/{u2}',[ChatController::class,'chat'])->name('chat');
    route::any('addappointmentfile',[UserController::class,'addappointmentfile'])->name('addappointmentfile')->middleware('role:admin|fs|backoffice|salesmanager');
    route::get('addtodo',[TodoController::class,'addtodo']);
    route::get('addToDoList',[TodoController::class,'addToDoList'])->name('addToDoList');
    route::get('getToDo',[TodoController::class,'getToDo']);
    route::get('deleteToDoList',[TodoController::class,'deleteToDoList']);
    route::get('fmembers/{family}/{lid}','App\Http\Controllers\FamilyPersonsController@fmembers')->middleware('role:fs|admin|backoffice');
    route::get('linkthat/{id}/{pid}','App\Http\Controllers\FamilyPersonsController@linkthat');
    route::get('updateperson/{id}',[UserController::class,'updateperson'])->name('updateperson');
    route::get('historyTermine', [AppointmentsController::class,'historyTermine'])->name('rejectedAppointment');

    include 'Hr.php';
    include 'webv2.php';
    include 'Finance.php';
    include 'Statistics.php';

    route::get('fmembers/{family}/{lid}','App\Http\Controllers\FamilyPersonsController@fmembers')->middleware('role:fs|admin|backoffice');
    route::get('todos',[TodoController::class,'todos']);
    route::get('deletetodo',[TodoController::class,'deletetodo']);
    route::get('donetodo',[TodoController::class,'donetodo']);
    route::get('addnumber',[TodoController::class,'addnumber']);
    route::get('deletenumber',[TodoController::class,'deletenumber']);

    route::get('numbers',[TodoController::class,'numbers']);
    route::get('rejecttask/{id}',[TasksController::class,'rejecttask'])->name('rejecttask')->middleware('role:admin|fs|salesmanager');
    route::get('calendar',[CalendarController::class,'calendar'])->name('calendar')->middleware('role:admin|fs|salesmanager|management,admins');
    route::get('accepttask',[TasksController::class,'accepttask'])->name('accepttask')->middleware('role:admin|salesmanager|backoffice');
    route::post('addPersonalAppointment',[\App\Http\Controllers\PersonalAppointmentController::class,'addPersonalAppointment'])->name('addPersonalAppointment')->middleware('role:admin|fs|salesmanager');
    route::post('confirmsms',[TasksController::class,'confirmsms'])->name('confirmsms');
    route::any('costumer_documentss/{id}/{accept?}',[LeadDataController::class,'acceptdata'])->name('acceptdata')->middleware('role:admin|backoffice|salesmanager');
    route::get('smsverification',[UserController::class,'smsconfirmation'])->name('smsconfirmation')->withoutMiddleware([confirmedcode::class]);
    route::get('smsconfirm',function (){
        return view('confirm_sms');
    })->name('smsconfirm')->withoutMiddleware([confirmedcode::class]);
    route::post('confirmcode',[UserController::class,'confirmcode'])->name('confirmcode')->withoutMiddleware([confirmedcode::class]);
    route::get('status',[StatusController::class,'status'])->name('status');
// route::get('editclientdata/{id}',[StatusController::class,'editclientdata'])->name('editclientdata');
// route::post('editclientform/{id}',[StatusController::class,'editclientform'])->name('editclientform');
    route::get('file/{file}',function($file,Request $request){
        if(Storage::disk('img')->exists($file)){
            ob_end_clean();
            return response()->file(Storage::disk('img')->path($file));
        
// return response()->download(storage_path('app/img/' . $file));
        }
    })->middleware('role:admin|backoffice|salesmanager|management|fs')->name('showfile');
    route::get('file2/{file}',function($file,Request $request){
        if(Storage::disk('imgs')->exists($file)){
            ob_end_clean();
            $file = Storage::disk('imgs')->get($file);
            $response = Illuminate\Support\Facades\Response::make($file,200);
            $response->header('Content-Type','file');
            return $response;
        }
    })->middleware('role:admin|backoffice|salesmanager|management|fs')->name('showfile2');
    Route::get('Appointments', 'App\Http\Controllers\AppointmentsController@index')->name('Appointments')->middleware('role:admin|fs|salesmanager');
    Route::get('Dropajax', 'App\Http\Controllers\AppointmentsController@Dropajax')->name('Dropajax')->middleware('role:admin|fs|salesmanager');
    route::get('getchat/{u1}/{u2}',[ChatController::class,'getchat']);
    route::any('sendmessage/{u1}/{u2}',[ChatController::class,'sendmessage']);

    route::post('editclientform/{id}',[StatusController::class,'editclientform'])->name('editclientform');

    route::get('editclientdata/{id}',[StatusController::class,'editclientdata'])->name('editclientdata');
    route::get('rleads',[UserController::class,'rleads'])->name('rleads');
    route::get('leadhistory',function(Request $request){
        if(!Auth::user()->hasRole('fs')){
            $leads = lead::with('info')->with('admin')->whereNull('insertedManualy')->where('apporlead','lead')->orderBy('updated_at','asc')->withTrashed()->paginate(10);
        }
        else{
            $leads = lead::with('info')->with('admin')->where('leads.assign_to_id',Auth::user()->id)->whereNull('insertedManualy')->where('apporlead','lead')->orderBy('updated_at','asc')->withTrashed()->paginate(10);
        }
        return view('leadshistory',compact('leads'));
    })->name('leadshistory');
    route::get('fsadmins',[TodoController::class,'fsadmins'])->middleware('role:admin|backoffice');
    route::post('rejectupdate',[LeadDataController::class,'rejectupdate'])->name('rejectupdate')->middleware('role:admin|backoffice');
    route::get('getnotifications',function(){
        $cnt = 0;
        $user = auth()->user();
        $data['cnt'] = 0;
        foreach($user->notifications()->orderBy('created_at','desc')->select('notifications.data','notifications.created_at','notifications.read_at')->paginate(60) as $not){
            $data['notifications'][$cnt] = $not;
            $obj = Carbon::parse($not->created_at);
            $data['notifications'][$cnt]['read_at'] = $not->read_at;
            $data['notifications'][$cnt]['data'] = $data['notifications'][$cnt]['data'] . ' <div style="color:#C9C9C9 !important;font-size:14px;font-weight: 600 !important">   ' . $obj->format('d/m/y | H:i'). '</div>';
            $cnt++;
            if($not->read_at == null) $data['cnt']++;
        }
        return $data;
    });
    route::get('readnotifications',function(){
        Auth::user()->notifications->markAsRead();
    });
    route::get('getrole',function(){
        return Auth::user()->getRoleNames()[0];
    });
});
route::get('forgot_password',function (){
    return view('forgot_password');
})->name('forgot_password_blade');
route::post('forgotpassword',[\App\Http\Controllers\ForgotPassController::class,'forgot_password'])->name('forgot_password');
route::get('changepasswrd/{token}/{id}',[\App\Http\Controllers\ForgotPassController::class,'changepasswrd'])->name('changepasswrd');
route::post('update_password/{token}/{id}',[\App\Http\Controllers\ForgotPassController::class,'update_password'])->name('update_password');
route::get('logout',[UserController::class,'logout'])->name('logout')->withoutMiddleware([confirmedcode::class]);
Route::get('login',[UserController::class,'rnlogin'])->name('rnlogin')->withoutMiddleware([confirmedcode::class,\App\Http\Middleware\isagent::class]);
route::post('trylogin',[UserController::class,'trylogin'])->name('trylogin')->withoutMiddleware([confirmedcode::class,\App\Http\Middleware\isagent::class]);
route::post('loginas',[UserController::class,'loginas'])->name('loginas');
route::get('approveAbsense','App\Http\Controllers\HumanResourcesController@approveAbsense')->middleware('role:admin|salesmanager|backoffice');
route::get('declineAbsense','App\Http\Controllers\HumanResourcesController@declineAbsense')->middleware('role:admin|salesmanager|backoffice');
route::get('filterhrcalendar','App\Http\Controllers\AppointmentsController@filterhrCalendar')->middleware('role:admin|salesmanager|backoffice');
route::get('test',function (){
    $admins = Admins::role(['fs'])->with('kunden')->get();
    $leads = lead::get();
    $leads->each(function ($item){
        if($item->duration_time != null){
            $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$item->created_at);
            $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$item->duration_time);

            $duration =  date_diff($created_at,$duration_time)->format('%y years %m months %d days %h hours %i minutes');
            $item['duration'] = $duration;}
        else{
            $item['duration'] = "";
        }
    });
    return view('test',compact('admins','leads'));
})->name('test');
route::get('hrcalendar','App\Http\Controllers\AppointmentsController@hrcalendar')->name('hrcalendar');
route::get('insertcostumer',function (){
    $admins = Admins::role(['fs'])->get();
    return view('insertcostumer',compact('admins'));
})->name('insertcostumer');
route::post('savecostumer',[CostumerFormController::class,'savecostumer'])->name('savecostumer')->middleware('role:backoffice|admin');
// route::get('haha',function(){
//     $authyUser = app('rinvex.authy.user');
//     $user = $authyUser->register('bulzarti@gmail.com', '38345917726', '54'); // Register user
//     dd($user);
//     $authyToken = app('rinvex.authy.token');
//     $smsTokenSent = $authyToken->send(auth()->user()->authy_id, 'sms');
    
//     $tokenVerified = $authyToken->verify('4135553', auth()->user()->authy_id);

// });
route::get('changepagination/{x}',function($x){
    Cache::pull('paginationCount');
     Cache::forever('paginationCount', $x);
});
route::get('tokeni/{x}',function($x){
    Cache::pull('tokeni');
     Cache::forever('tokeni', $x);
})->name('tokeni');


route::get('updateBeraterKunden',[\App\Http\Controllers\CostumerFormController::class,'updateBeraterKunden'])->name('updateBeraterKunden');

route::get('test',function(){
    $logs= LogsActivity::find(8);
    $collection1 = json_decode($logs->old_data,true);

    $collection2 = json_decode($logs->new_data,true);
    dd($collection1,$collection2);

    $tot = array_diff($collection2,$collection1);

    dd($tot);
});
route::get('extend',function(Request $req){
    $prov = Provisions::find((int)$req->id);
   Provisions::find((int)$req->id)->update(['from' => Carbon::createFromFormat('Y-m',$prov->from)->addMonths((int) $req->months)->format('Y-m')]); 
})->name('extend');



