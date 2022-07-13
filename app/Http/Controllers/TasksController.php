<?php

namespace App\Http\Controllers;

use App\Events\SendNotification;
use App\Exports\LeadsExport;
use App\Models\Admins;
use App\Models\appointment;
use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\family;
use App\Models\lead;
use App\Models\notification;
use App\Models\Pendency;
use App\Models\PersonalAppointment;
use App\Notifications\SendNotificationn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Collection;
use phpDocumentor\Reflection\Types\Never_;
use PhpParser\Node\Name\FullyQualified;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\LeadDataFahrzeug;

class TasksController extends Controller
{
    public function assignpendency(Request $req){
        $id = (int) $req->id;
        $title = $req->title ? $req->title : "";

        $pendency = new Pendency();
        $pendency->title = $title;
        $fid = (int) $req->id;
        $pendency->admin_id = (int) $req->admin;
        $pendency->p = 1;
        $pendency->family_id = $fid;
        $pendency->description = filter_var($req->desc,FILTER_SANITIZE_STRING);
        if($fid == 0){
            $pendency->type = "Order";
        }
        else{
            $pendency->type = "Task";
        }
        $pendency->title = filter_var($req->task,FILTER_SANITIZE_STRING);
        $pendency->save();
        $url = '<a href="'. route('tasks') . '"> Ihnen wurde ein Anhängsel für ' . family::find((int) $req->id)->first_name . ' zugewiesen</a>';
        Admins::find((int) $req->admin)->notify(new SendNotificationn($url));

    }
    public function accepttask(Request $req)
    {
       Pendency::find($req->id)->update(['completed' => 1]);
       return back();
    }
    public function rejecttask($id){
        Pendency::find($id)->delete();
        return true;
    }
    public function dnotifications()
    {
        notification::where('receiver_id', Auth::guard('admins')->user()->id)->where('done', 0)->update(['done' => 1]);
    }
    public function today(Request $req)
    {
        $user = auth()->user();
        $urole = auth()->user()->getRoleNames();
        $some_date = Carbon::now()->format('H:i');
        $now = (int) str_replace(':', '', $some_date);
        $admin = Auth::guard('admins')->user();
        $today = Carbon::now()->format("Y-m-d");
        $data = null;
        $cnt = 0;
        if ($req->date != null) {
            if ($urole->contains('admin') || $urole->contains('salesmanager')) {
                foreach (lead::
                where('wantsonline', 0)
                             ->where('appointment_date', $req->date)
                             ->whereNotNull('assign_to_id')
                             ->orderBy('time','desc')
                             ->where('completed',0)
                             ->paginate(15) as $d){
                    $data[$cnt] = $d;
                    $val = (int) $d->id;
                    $data[$cnt]->id = $val;
                    $cnt++;
                }
            } elseif ($urole->contains('fs')) {
                foreach (lead::
                where('wantsonline', 0)
                             ->where('appointment_date', $req->date)
                             ->whereNotNull('assign_to_id')
                             ->orderBy('time','desc')
                             ->where('completed',0)
                             ->where('assign_to_id',$user->id)
                             ->paginate(15) as $d){
                    $data[$cnt] = $d;
                    $val = (int) $d->id;
                    $data[$cnt]->id = $val;
                    $cnt++;
                }
            }
            elseif($urole->contains('digital')) {
                foreach (lead::
                where('wantsonline', 1)
                             ->where('appointment_date', $req->date)
                             ->orderBy('time','desc')
                             ->where('completed',0)
                             ->paginate(15) as $d){
                    $data[$cnt] = $d;
                    $val = (int) $d->id;
                    $data[$cnt]->id = $val;
                    $cnt++;
                }
            }
        } else {
            if ($urole->contains('admin') || $urole->contains('salesmanager')) {
                if ($now > 2300) {
                    foreach (lead::
                    where('wantsonline', 0)
                                 ->whereNotNull('assign_to_id')
                                 ->orderBy('time','desc')
                                 ->where('completed',0)
                                 ->where('appointment_date', Carbon::now()->addDays()->toDateString())
                                 ->paginate(15) as $d){
                        $data[$cnt] = $d;
                        $val = (int) $d->id;
                        $data[$cnt]->id = $val;
                        $cnt++;
                    }
                } else {
                    foreach (lead::
                    where('wantsonline', 0)
                                 ->whereNotNull('assign_to_id')
                                 ->orderBy('time','desc')
                                 ->where('completed',0)
                                 ->where('appointment_date',Carbon::now()->format('Y-m-d'))
                                 ->select('first_name','last_name','address','id','nr','city','postal_code','time','number_of_persons')
                                 ->paginate(15) as $d){
                        $data[$cnt] = $d;
                        $val = (int) $d->id;
                        $data[$cnt]->id = $val;
                        $cnt++;
                    }
                }
            }
            if ($urole->contains('fs')) {
                if ($now > 2300) {
                    foreach (lead::
                    where('wantsonline', 0)
                                 ->whereNotNull('assign_to_id')
                                 ->orderBy('time','desc')
                                 ->where('completed',0)
                                 ->select('first_name','last_name','address','id','nr','city','postal_code','time','number_of_persons')
                                 ->where('appointment_date', Carbon::now()->addDays()->toDateString())
                                 ->where('assign_to_id',$user->id)
                                 ->paginate(15) as $d){
                        $data[$cnt] = $d;
                        $val = (int) $d->id;
                        $data[$cnt]->id = $val;
                        $cnt++;
                    }
                } else {
                    foreach (lead::
                    where('wantsonline', 0)
                                 ->whereNotNull('assign_to_id')
                                 ->orderBy('time','desc')
                                 ->where('completed',0)
                                 ->where('appointment_date',Carbon::now()->format('Y-m-d'))
                                 ->select('first_name','last_name','address','id','nr','city','postal_code','time','number_of_persons')
                                 ->where('assign_to_id',$user->id)
                                 ->paginate(15) as $d){
                        $data[$cnt] = $d;
                        $val = (int) $d->id;
                        $data[$cnt]->id = $val;
                        $cnt++;
                    }
                }
            }
            elseif($urole->contains('digital')){
                if ($now > 2300) {
                    foreach (lead::
                    where('wantsonline', 1)
                                 ->whereNotNull('assign_to_id')
                                 ->orderBy('time','desc')
                                 ->where('completed',0)
                                 ->select('first_name','last_name','address','id','nr','city','postal_code','time','number_of_persons')
                                 ->where('appointment_date', Carbon::now()->addDays()->toDateString())
                                 ->paginate(15) as $d){
                        $data[$cnt] = $d;
                        $val = (int) $d->id;
                        $data[$cnt]->id = $val;
                        $cnt++;
                    }
                } else {
                    foreach (lead::
                    where('wantsonline', 1)
                                 ->orderBy('time','desc')
                                 ->where('completed',0)
                                 ->select('first_name','last_name','address','id','nr','city','postal_code','number_of_persons')
                                 ->paginate(15) as $d){
                        $data[$cnt] = $d;
                        $val = (int) $d->id;
                        $data[$cnt]->id = $val;
                        $cnt++;
                    }
                }
            }
        }
       if($data == null) return 'null'; else return $data;
    }

    public function vuedate(Request $req)
    {
        $page = $req->page;
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $fullcalendar = [];
        $br = 1;
        $dayofweek = 6;
   $days  = collect([['day' => 'Montag','name' => 'Monday'],['day'=>'Dienstag','name'=>'Tuesday'],['day' => 'Mittwoch','name'=> 'Wednesday'],['day' =>'Donnerstag','name'=>'Thursday'],['day'=>'Freitag','name'=>'Friday'],['day'=>'Samstag','name'=>'Saturday'],['day'=>'Sonntag','name'=> 'Sunday']]);
   $months = collect([['day' => 'Januar','name' => 'January'],['day'=>'Februar','name'=>'February'],['day' => 'März','name'=> 'March'],['day' =>'April','name'=>'April'],['day'=>'Mai','name'=>'May'],['day'=>'Juni','name'=>'June'],['day'=>'Juli','name'=> 'July'],['day'=>'August','name'=>'August'],['day'=>'September','name'=> 'September'],['day'=>'Oktober','name'=> 'October'],['day'=>'November','name'=> 'November'],['day'=>'Dezember','name'=> 'December']]);

        for ($i = 0; $i <= 365; $i++) {
            $fullcalendar[$i]['date'] =  Carbon::now()->addDays($i)->format('Y-m-d');
            $fullcalendar[$i]['dayn'] =  substr($days->firstWhere('name',Carbon::now()->addDays($i)->format('l'))['day'],0,2);
            $fullcalendar[$i]['day'] =   Carbon::now()->addDays($i)->format('d');
            $fullcalendar[$i]['month'] = substr($months->firstWhere('name',Carbon::now()->addDays($i)->format('F'))['day'],0,3);
            $fullcalendar[$i]['year'] =  Carbon::now()->addDays($i)->format('Y');
        }

        $calendar = [];
        $calendar[0] = $fullcalendar[$page - 4];
        $calendar[1] = $fullcalendar[$page - 3];
        $calendar[2] = $fullcalendar[$page - 2];
        $calendar[3] = $fullcalendar[$page - 1];
        return $calendar;


        return $fullcalendar;
    }

    public function searchword()
    {

        $beraters = Admins::role(['fs'])->get();
        $sumGegen = $totaliGegen = $sumNeuen = $totaliNeuen = $statusGegen = $statusNeuen = $grundversicherungP = $retchsschutzP = $vorsorgeP = $zusatzversicherungP = $autoversicherungP = $hausratP = $family_person = collect();

        if(Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('fs')){
            $data = DB::table('family_person')
                ->join('leads','family_person.leads_id','=','leads.id')
                ->where('leads.assign_to_id','=',Auth::guard('admins')->user()->id)
                ->where('family_person.status','Done')
                ->select('family_person.*')
                ->orderBy('family_person.first_name','asc')
                ->get();

            $cnt = 0;

            $mandatiert = [];
            foreach ($data as $dat) {
                $grundversicherungP[$cnt] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->first();
                $retchsschutzP[$cnt] = CostumerProduktRechtsschutz::where('person_id_PR',$dat->id)->first();
                $vorsorgeP[$cnt] = CostumerProduktVorsorge::where('person_id_PV',$dat->id)->first();
                $zusatzversicherungP[$cnt] = CostumerProduktZusatzversicherung::where('person_id_PZ',$dat->id)->first();
                $autoversicherungP[$cnt] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->first();
                $hausratP[$cnt] = CostumerProduktHausrat::where('person_id_PH', $dat->id)->first();
                $family_person[$cnt] = family::where('id',$dat->id)->first();
                if(LeadDataFahrzeug::where('person_id',$dat->id)->first()){
                    if(LeadDataFahrzeug::where('person_id',$dat->id)->first()->mandatiert == null){
                        $mandatiert[$cnt]['mandatiert'] = false;
                    }
                    else{
                        $mandatiert[$cnt]['mandatiert'] = true;
                    }
                }
                else{
                    $mandatiert[$cnt]['mandatiert'] = false;
                }

                $sumGegen[$cnt]['grsum'] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->get()->sum('total_commisions_PG');
                $totaliGegen[$cnt]['totali'] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->count();
                $sumNeuen[$cnt]['nesum'] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->get()->sum('total_commisions_PA');
                $totaliNeuen[$cnt]['netotali'] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->count();
                $statusGegen[$cnt]['statusGegen'] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->get();
                $statusNeuen[$cnt]['statusNeuen'] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->get();

                $cnt++;
            }
            return view('costumers', compact('data','statusGegen','statusNeuen','sumGegen','sumNeuen','totaliNeuen','totaliGegen', 'mandatiert','grundversicherungP','retchsschutzP','vorsorgeP','autoversicherungP','hausratP','zusatzversicherungP','family_person','beraters'));

        }else{
            $data = family::where('status','Done')->orderBy('first_name','asc')->get();
            $cnt = 0;
            $mandatiert = [];
            foreach ($data as $dat) {
                $grundversicherungP[$cnt] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->first();
                $retchsschutzP[$cnt] = CostumerProduktRechtsschutz::where('person_id_PR',$dat->id)->first();
                $vorsorgeP[$cnt] = CostumerProduktVorsorge::where('person_id_PV',$dat->id)->first();
                $zusatzversicherungP[$cnt] = CostumerProduktZusatzversicherung::where('person_id_PZ',$dat->id)->first();
                $autoversicherungP[$cnt] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->first();
                $hausratP[$cnt] = CostumerProduktHausrat::where('person_id_PH', $dat->id)->first();
                $family_person[$cnt] = family::where('id',$dat->id)->first();
                if(LeadDataFahrzeug::where('person_id',$dat->id)->first()){
                    if(LeadDataFahrzeug::where('person_id',$dat->id)->first()->mandatiert == null){
                        $mandatiert[$cnt]['mandatiert'] = false;
                    }
                    else{
                        $mandatiert[$cnt]['mandatiert'] = true;
                    }
                }
                else{
                    $mandatiert[$cnt]['mandatiert'] = false;
                }

                $sumGegen[$cnt]['grsum'] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->get()->sum('total_commisions_PG');
                $totaliGegen[$cnt]['totali'] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->count();
                $sumNeuen[$cnt]['nesum'] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->get()->sum('total_commisions_PA');
                $totaliNeuen[$cnt]['netotali'] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->count();
                $statusGegen[$cnt]['statusGegen'] = CostumerProduktGrundversicherung::where('person_id_PG', $dat->id)->get();
                $statusNeuen[$cnt]['statusNeuen'] = CostumerProduktAutoversicherung::where('person_id_PA', $dat->id)->get();
                $cnt++;
            }

            return view('costumers', compact('data','statusGegen','statusNeuen','sumNeuen','totaliNeuen','sumGegen','totaliGegen','mandatiert', 'grundversicherungP','retchsschutzP','vorsorgeP','autoversicherungP','hausratP','zusatzversicherungP','family_person','beraters'));

        }
    }
    public function costumers(Request $request)
    {
        $beraters = Admins::role(['fs'])->get();
        $grundversicherungP = null;
        $retchsschutzP = null;
        $vorsorgeP = null;
        $zusatzversicherungP = null;
        $autoversicherungP = null;
        $hausratP = null;
        $family_person = null;
        $sumGegen = null;
        $totaliGegen = null;
        $sumNeuen = null;
        $totaliNeuen = null;
        $statusGegen = null;
        $statusNeuen = null;
        $mandatiert = [];
        $data = collect();
        $cnt = 0;
        $date1 = date('Y-m-d', strtotime($request->searchdate1));
        $n = date('Y-m-d', strtotime($request->searchdate2));
        $date2 = date('Y-m-d', strtotime($n . "+1 days"));
        $searchname = $request->searchname ? $request->searchname : '';
        $user = auth()->user();
        if(Auth::user()->hasRole('fs') || Auth::user()->hasRole('digital')){
            $family = auth()->user()->kunden()->whereIn('status',['Done'])->with('hausrat')->with('datak')->with('lead')->with('grund')->with('rech')->with('vor')->with('zus')->with('auto');
            if (isset($request->searchdate1) && isset($request->searchdate2)) {
                $family->whereBetween('family_person.created_at', [$date1, $date2]);
            }
            if (isset($request->searchname)) {
                $family->where('family_person.first_name', 'like', '%' . $searchname . '%');
            }
         

            if(isset($request->status)){
                auth()->user()->kunden()->whereIn('status', ['Done'])->with('hausrat')->with('datak')->with('lead')->with('grund')->with('rech')->with('vor')->with('zus')->with('auto')
					->whereHas('hausrat',function($query) use($request){
                    $query->where('status_PH',$request->status);
                })->orWhereHas('rech',function($query) use($request){
                    $query->where('status_PR',$request->status);
                })->orWhereHas('vor',function($query) use($request){
                    $query->where('status_PV',$request->status);
                })->orWhereHas('zus',function($query) use($request){
                    $query->where('status_PZ',$request->status);
                })->orWhereHas('auto',function($query) use($request){
                    $query->where('status_PA',$request->status);
                })->orWhereHas('grund',function($query) use($request){
                    $query->where('status_PG',$request->status);
                })->paginate(30);
            }
            
           $data= $family->paginate(30);

            $cnt = 0;

            foreach ($data as $dat) {

                $grundversicherungP[$cnt] = $dat->grund->first();
                $retchsschutzP[$cnt] = $dat->rech->first();
                $vorsorgeP[$cnt] = $dat->vor->first();
                $zusatzversicherungP[$cnt] = $dat->zus->first();
                $autoversicherungP[$cnt] = $dat->auto->first();
                $hausratP[$cnt] = $dat->hausrat->first();
                $family_person[$cnt] = $dat;
                if($dat->datak){
                    if($dat->datak->mandatiert_file == null){
                        $mandatiert[$cnt]['mandatiert'] = false;
                    }
                    else{
                        $mandatiert[$cnt]['mandatiert'] = true;
                    }
                }
                else{
                    $mandatiert[$cnt]['mandatiert'] = false;
                }
//                $statusGegen[$cnt]['statusGegen'] = $dat->grund;
//                $sumGegen[$cnt]['grsum'] = $dat->grund->sum('total_commisions_PG');
//                $totaliGegen[$cnt]['totali'] = $dat->grund->count();

                // Per Autoversicherung
                $sumNeuen[$cnt]['nesum'] = $dat->auto->sum('total_commisions_PA');
                $totaliNeuen[$cnt]['netotali'] = $dat->auto->count();
                $statusNeuen[$cnt]['statusNeuen'] = $dat->auto;
                //
            

                $cnt++;
            }


            return view('costumers', compact('statusNeuen','sumNeuen','totaliNeuen','data','mandatiert','grundversicherungP','retchsschutzP','vorsorgeP','autoversicherungP','hausratP','zusatzversicherungP','family_person','date1','date2','searchname','beraters'));

        }else {
 
         
        
                $family = family::query()->with('hausrat')->with('datak')->with('lead')->with('grund')->with('rech')->with('vor')->with('zus')->with('auto')->whereIn('status', ['Done']);
            
                if (isset($request->searchdate1) && isset($request->searchdate2)) {
                    $family->whereBetween('family_person.created_at', [$date1, $date2]);
                }
                if (isset($request->searchname)){
                    $family->where('first_name', 'like', '%' . $searchname . '%');
                }
                if(isset($request->status) && $request->status != 'alle'){
                    $family->whereHas('hausrat',function($query) use($request){
                        $query->where('status_PH',$request->status);
                    })->orWhereHas('rech',function($query) use($request){
                        $query->where('status_PR',$request->status);
                    })->orWhereHas('vor',function($query) use($request){
                        $query->where('status_PV',$request->status);
                    })->orWhereHas('zus',function($query) use($request){
                        $query->where('status_PZ',$request->status);
                    })->orWhereHas('auto',function($query) use($request){
                        $query->where('status_PA',$request->status);
                    })->orWhereHas('grund',function($query) use($request){
                        $query->where('status_PG',$request->status);
                    });
                }
           
                $data = $family->paginate(30);
               
                $curr = $data->currentPage();
            
                $data2 = collect();
                if(isset($request->berater)){
                 
                    if($request->berater[0] != 'Alle'){
               $data = $data->each(function($item) use($request,$data2){
                  if(in_array($item->lead->assign_to_id,$request->berater)){
                       $data2->push($item);
                  }
               });
      
$data = $data2;}
            }
$data->currentPagee = $curr;


            $cnt = 0;

            foreach ($data as $dat) {
                $grundversicherungP[$cnt] = $dat->grund->first();
                $retchsschutzP[$cnt] = $dat->rech->first();
                $vorsorgeP[$cnt] = $dat->vor->first();
                $zusatzversicherungP[$cnt] = $dat->zus->first();
                $autoversicherungP[$cnt] = $dat->auto->first();
                $hausratP[$cnt] = $dat->hausrat->first();
                $family_person[$cnt] = $dat;
                if($dat->datak){
                    if($dat->datak->mandatiert_file == null){
                        $mandatiert[$cnt]['mandatiert'] = false;
                    }
                    else{
                        $mandatiert[$cnt]['mandatiert'] = true;
                    }
                }
                else{
                    $mandatiert[$cnt]['mandatiert'] = false;
                }
//                $statusGegen[$cnt]['statusGegen'] = $dat->grund;
//                $sumGegen[$cnt]['grsum'] = $dat->grund->sum('total_commisions_PG');
//                $totaliGegen[$cnt]['totali'] = $dat->grund->count();

                $sumNeuen[$cnt]['nesum'] = $dat->auto->sum('total_commisions_PA');
                $totaliNeuen[$cnt]['netotali'] = $dat->auto->count();
                $statusNeuen[$cnt]['statusNeuen'] = $dat->auto;
            
                $cnt++;
            }
          
            $contracts = [];

            return view('costumers', compact('mandatiert',
                'data','contracts','grundversicherungP','retchsschutzP','vorsorgeP',
                'autoversicherungP','hausratP','zusatzversicherungP','family_person','sumNeuen',
                'totaliNeuen','statusNeuen','date1','date2','searchname','beraters'));
        }
    }


    public function tasks(Request $req,$az = false)
    {
        $user = auth();
        $start = microtime(true);
        $cnt = 0;
        $cnt1 = 0;
        $leadsss = Crypt::encrypt(Auth::user()->id * 1244);
        if ($user->user()->hasRole('backoffice') || $user->user()->hasRole('admin')) {
            $tasks = lead::whereHas('family', function ($q){
                $q->whereIn('status',['Open']);
            })->with(['family' => function ($q){
                $q->whereIn('status',['Open']);
            }])->paginate(5,'*','taskk');

            $familyMemberCount = family::where('status','Open')->count();

            if (isset($req->searchpend)) {
                $pend = Pendency::
                where('completed',0)
                ->with(['family','adminpend'])
                ->whereHas('family',function($query) use ($req) {
                   $query->where('first_name', 'like', '%' . $req->searchpend . '%');
                    })
                    ->where('p',0)
                    ->get();

            }else {
                $pend = Pendency::
                    where('completed',0)
                    ->with(['family', 'adminpend'])
                    ->where('p',0)
                    ->get();
            }
            if (isset($req->searchopen)) {
               $open = Pendency::whereHas('family')->where('done',0)
                    ->where('completed',0)
                    ->with(['family','adminpend'])
                   ->where('p',1)
                //    ->whereHas('family',function($query) use ($req){
                //        $query->where('first_name', 'like', '%' . $req->searchopen . '%')->where('first',1);
                //    })
                    ->paginate(20,['*'],'openP');
            } else {
                $open = Pendency::
                    where('completed',0)
                    ->where('p',1)
                    ->with(['family','adminpend'])->paginate(20,['*'],'openP');
            }




            $answered = [];
            $opened = [];

            $answered = $pend;

            $opened = $open;

        }
        if ($user->user()->hasRole('fs') || $user->user()->hasRole('admin')) {
            if($user->user()->hasRole('admin')){
                $tasks = lead::with(['family' => function ($q){
                    $q->where('first',1)->with('pendency');
                }])->paginate(5,'*','taskk');

                $cntt = 0;

                $realopen = [];
                $pending = [];
                $opencnt = 0;
                $pendingcnt = 0;



                $opencnt = $tasks->count();

                $pending = Pendency::where('completed',0)->where('p',1)->with('family')->get();


            }else{
                $tasks = collect();
//                $tasks = lead::with(['family' => function ($q){
//                    $q->where('status',['Open']);
//                }])->get();

                $tasks2 = [];
                $cntt = 0;
                
                $realopen = [];
                $pending = [];
                $opencnt = 0;
                $pendingcnt = 0;

                $opencnt = $tasks->count();

                $pending = Pendency::where('completed',0)->with('family')->where('p',1)->where('admin_id',auth()->user()->id)->get();
            }
            $cnt = 0;
            $birthdays = [];
         
        }
          if(auth()->user()->hasRole('fs')){
            $todaydate = Carbon::now()->format('m-d');
            
           foreach(family::rightjoin('leads','leads.id','family_person.leads_id')
            ->where('leads.assign_to_id',auth()->id())
            ->where('family_person.birthdate','like','%'.Carbon::now()->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDay()->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDays(2)->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDays(3)->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDays(4)->format('m-d').'%')
            ->select('family_person.birthdate as birthdate','family_person.first_name as first_name','family_person.last_name as last_name','family_person.id as id')
            ->get()  as $cos){
                        $birthdays[$cnt]['birthday'] = $cos->birthdate;
                        $now = (int) Carbon::now()->format('Y');
                        $birth = (int) substr($cos->birthdate, -10, -6);
                        $birthdays[$cnt]['age'] = $now - $birth;
                        $birthdays[$cnt]['id'] = $cos->id;
                        $birthdays[$cnt]['name'] = ucfirst($cos->first_name);
                        $birthdays[$cnt]['lname'] = ucfirst($cos->last_name);
                        $cnt++;
                }
            
            
          }else{
            $todaydate = Carbon::now()->format('m-d');
            
            foreach(family::rightjoin('leads','leads.id','family_person.leads_id')
            ->where('family_person.birthdate','like','%'.Carbon::now()->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDay()->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDays(2)->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDays(3)->format('m-d').'%')
            ->orWhere('family_person.birthdate','like','%'.Carbon::now()->addDays(4)->format('m-d').'%')
            ->select('family_person.birthdate as birthdate','family_person.first_name as first_name','family_person.last_name as last_name','family_person.id as id')
            ->get()  as $cos){
                        $birthdays[$cnt]['birthday'] = $cos->birthdate;
                        $now = (int) Carbon::now()->format('Y');
                        $birth = (int) substr($cos->birthdate, -10, -6);
                        $birthdays[$cnt]['age'] = $now - $birth;
                        $birthdays[$cnt]['id'] = $cos->id;
                        $birthdays[$cnt]['name'] = ucfirst($cos->first_name);
                        $birthdays[$cnt]['lname'] = ucfirst($cos->last_name);
                        $cnt++;
                }
          }
        $personalApp = DB::table('personalappointment')->where('AppOrCon',1)->where('user_id',Auth::user()->id)->where('date','>=',Carbon::now()->format('Y-m-d'))->get();
        $consultation = DB::table('personalappointment')->where('AppOrCon',2)->where('user_id',Auth::user()->id)->where('date','>=',Carbon::now()->format('Y-m-d'))->get();

        if($user->user()->hasRole('backoffice')) return view('tasks',compact('answered','pend','opened','leadsss','familyMemberCount','tasks'));
        if($user->user()->hasRole('fs')) return view('tasks', compact('consultation','opencnt', 'pendingcnt', 'realopen', 'pending', 'birthdays', 'tasks','leadsss'));
        if($user->user()->hasRole('admin')) return view('tasks', compact('personalApp','opencnt', 'pendingcnt', 'realopen','familyMemberCount', 'pending', 'birthdays', 'tasks','answered','pend','opened','leadsss'));


    }

    public function confirmsms(Request $request)
    {
        $user_id = Auth::guard('admins')->user()->id;
        $cc = $request->cc;
        $number = $request->numberphone;
        $phonenumber = $cc . $number;
        if (Admins::where('id', $user_id)->update(['phonenumber' => $phonenumber, 'firsttime' => 0])) {
            return redirect()->route('dashboard');
        }
    }
    public function dates()
    {


    }
}
