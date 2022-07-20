<?php
use App\Http\Controllers\HumanResourcesController;
use App\Models\Absence;
use App\Models\Admins;
use App\Models\bestellungen;
use App\Models\EmployeePersonalData;
use App\Models\family;
use App\Models\Provisions;
use Carbon\Carbon;
use Illuminate\Http\Request;
    route::post('createbst',[HumanResourcesController::class,'createBestellunge'])->name('createBestellunge');
route::post('createAbsence',[HumanResourcesController::class,'createAbsence'])->name('createAbsence');
    route::post('updateAbsence',[HumanResourcesController::class,'updateAbsenceById'])->name('updateAbsenceById');
    route::get('getAllEmployeeAbsences',[HumanResourcesController::class,'getAllEmployeeAbsences'])->name('getAllEmployeeAbsences');
    route::post('removeAbsence',[HumanResourcesController::class,'removeAbsence'])->name('removeAbsence');
    route::post('addBankInformationData',[HumanResourcesController::class,'addBankInformationData'])->name('addBankInformationData');
    route::get('updateBankInformation',[HumanResourcesController::class,'updateBankInformation'])->name('updateBankInformation');
    //route::get('getEmployeeBankInformation',[HumanResourcesController::class,'getEmployeeBankInformation'])->name('getEmployeeBankInformation');
    route::get('getBankInfo/{id}',[HumanResourcesController::class,'getEmployeeBankInformation'])->name('getBankInfo');
    route::post('updatePersonalData',[HumanResourcesController::class,'updatePersonalData'])->name('updatePersonalData');
    route::get('getEmployeePersonalDataById',[HumanResourcesController::class,'getEmployeePersonalDataById'])->name('getEmployeePersonalDataById');
    //route::get('getAllEmployees',[HumanResourcesController::class,'getAllEmployees'])->name('getAllEmployees');
    route::get('getAllEmployees/{id}',[HumanResourcesController::class,'getHRs'])->name('getAllEmployees');
    route::post('removePersonalData',[HumanResourcesController::class,'removePersonalData'])->name('removePersonalData');
    route::get('cancelAbsence/{id}',[HumanResourcesController::class,'cancelAbsence'])->name('cancelAbsence');
    route::get('acceptAbsense/{id}',[HumanResourcesController::class,'acceptAbsense'])->name('acceptAbsense');
    route::get('acceptbestellung/{id}',[HumanResourcesController::class,'acceptbestellung'])->name('acceptbestellung');
    route::get('rejectbestellung/{id}',[HumanResourcesController::class,'rejectbestellung'])->name('rejectbestellung');
    route::get('hr_view', function (Request $request){
        $user = Auth::guard('admins')->user();
        $input = $request->all();
        if(array_key_exists('date_in', $input)){
            $date_in = $input['date_in'];} else { $date_in = date('Y-m-d');
        }
        $contracts = collect();
        foreach (\App\Models\CostumerProduktGrundversicherung::where('admin_id',auth()->id())->whereIn('status_PG',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PG,'field' => 'Grund','company' => $produkt->society_PG,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktZusatzversicherung::where('admin_id',auth()->id())->whereIn('status_PZ',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PZ,'field' => 'Zusat','company' =>$produkt->society_PZ,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktRechtsschutz::where('admin_id',auth()->id())->whereIn('status_PR',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PR,'field' => 'Rech','company' =>$produkt->society_PR,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktAutoversicherung::where('admin_id',auth()->id())->whereIn('status_PA',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PA,'field' => 'Auto','company' =>$produkt->society_PA,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktHausrat::where('admin_id',auth()->id())->whereIn('status_PH',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PH,'field' => 'Haus','company' =>$produkt->society_PH,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktVorsorge::where('admin_id',auth()->id())->whereIn('status_PV',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PV,'field' => 'Vor','company' =>$produkt->society_PV,'prov_id' => $produkt->prov_id]);
        }
        $rroga = 0;
        foreach ($contracts as $contract){
            $rroga += getsalary($contract['company'],$contract['field'],$contract['val'],$contract['prov_id']);
        }
        $rroga2 = $rroga;
        $rroga += auth()->user()->salary->expenses + auth()->user()->salary->salary;

        $admins = null;

        if($user->hasRole('admin')  || $user->hasRole('backoffice')){
            $date_in =  new DateTime($date_in);
            $absences = Absence::whereHas('admin')->with('admin')->orderBy('created_at', 'desc')->get();
            $date_to = new DateTime(Carbon::now());
            $bestellungen = bestellungen::orderBy('created_at', 'desc')->get();
        } else{
            $date_in =  new DateTime($date_in);
            $absences = Absence::whereHas('admin')->with('admin')->where('employee_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
            $date_to = new DateTime(Carbon::now());
            $bestellungen = bestellungen::where('employee_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
        if ($request->searchEmployes == null){
            $admins = \App\Models\Admins::with('personaldata')->where('admin_id', null)->get();
        }else{
            $admins = \App\Models\Admins::where('name', 'LIKE', '%'.$request->searchEmployes.'%')->with('personaldata')->where('admin_id', null)->get();
        }
        
        $admini = Admins::find(auth()->user()->id);
        if($admini->admin_id == null){
            $personalData = EmployeePersonalData::where('admin_id',auth()->user()->id)->first();
            $personalDatas = EmployeePersonalData::where('admin_id',auth()->user()->id)->get();
            $bankInfo = \App\Models\BankInformation::where('employee_id',auth()->user()->id)->first();
        
        }else{
            $personalDatas = EmployeePersonalData::where('admin_id',auth()->user()->headadmin->id)->get();
            $personalData = EmployeePersonalData::where('admin_id',auth()->user()->headadmin->id)->first();
            $bankInfo = \App\Models\BankInformation::where('employee_id',auth()->user()->headadmin->id)->first();
        }


       
if(auth()->user()->hasRole('fs')){
        return view('hr',['rroga2'=> $rroga2,'personalDatas' => $personalDatas,'bestellungen' => $bestellungen,'admins' => $admins,'personalData' => $personalData,'bankInfo' => $bankInfo])->with('admins',$admins)->with('absences',$absences)->with('date_in',$date_in)->with('date_to',$date_to)->with('rroga',$rroga);
}
else{

    return view('hr',['rroga2'=> $rroga2,'personalDatas' => $personalDatas,'bestellungen' => $bestellungen,'admins' => $admins,'personalData' => $personalData,'bankInfo' => $bankInfo])->with('admins',$admins)->with('absences',$absences)->with('date_in',$date_in)->with('date_to',$date_to)->with('rroga',$rroga);
}
})->name('hr_view');

    route::get('addMoreOption',[HumanResourcesController::class,'addMoreOption'])->name('addMoreOption');
    route::get('getMoreOption',[HumanResourcesController::class,'getMoreOption'])->name('getMoreOption');
    route::get('sendmail',function (){
       \App\Jobs\SendEmp::dispatch('bulzarti@gmail.com','Bulzarti')->delay(now()->addSeconds(5));
    });

    route::post('updateinfo',[HumanResourcesController::class,'updateinfo'])->name('updateinfo');
    route::get('employeProfile/{id}',function ($id){

        $personalData = EmployeePersonalData::where('admin_id',$id)->first();
        $bankInfo = \App\Models\BankInformation::where('employee_id',$id)->first();
        $person = Admins::find($id);
        $contracts = collect();

        foreach (\App\Models\CostumerProduktGrundversicherung::where('admin_id',$id)->whereIn('status_PG',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PG,'field' => 'Grund','company' => $produkt->society_PG,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktZusatzversicherung::where('admin_id',$id)->whereIn('status_PZ',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PZ,'field' => 'Zusat','company' =>$produkt->society_PZ,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktAutoversicherung::where('admin_id',$id)->whereIn('status_PA',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PA,'field' => 'Auto','company' =>$produkt->society_PA,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktHausrat::where('admin_id',$id)->whereIn('status_PH',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PH,'field' => 'Haus','company' =>$produkt->society_PH,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktVorsorge::where('admin_id',$id)->whereIn('status_PV',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PV,'field' => 'Vor','company' =>$produkt->society_PV,'prov_id' => $produkt->prov_id]);
        }
        foreach (\App\Models\CostumerProduktRechtsschutz::where('admin_id',$id)->whereIn('status_PR',['Provisionert'])->get() as $produkt){
            $contracts->push(['val' => $produkt->total_commisions_PR,'field' => 'Rech','company' =>$produkt->society_PR,'prov_id' => $produkt->prov_id]);
        }

        
        $rroga = 0;
        foreach ($contracts as $contract){
    
            $rroga += getsalary($contract['company'],$contract['field'],$contract['val'],$contract['prov_id']);
        }
        $rroga2 = $rroga;
        $rroga += $person->salary->expenses + $person->salary->salary;

        $employeID = $id;
        $admini =  Admins::find($id);

        $allCosumersPerEmp = $admini->kunden(function($query){
            $query->whereIn('status', ['Done']); 
        })->count();
        $monthlyCosumersPerEmp = $admini->kunden()->get()->where('created_at','>',Carbon::now()->subDay(30))->count();

        $totalErnings = $admini->kunden(function($query){
            $query->whereIn('status', ['Done']); 
        })->with('grund')->with('rech')->with('zus')->get();
        $totali = 0;
        foreach($totalErnings as $total){
            foreach($total->grund as $grunding){
                $totali += getsalary($grunding->society_PG,'Grund',$grunding->total_commisions_PG,$grunding->prov_id);
            }
            foreach($total->rech as $rechts){
                $totali += getsalary($rechts->society_PR,'Rech',$rechts->total_commisions_PR,$rechts->prov_id);
            }
            foreach($total->zus as $zuzati){
                $totali += getsalary($zuzati->society_PZ,'Zusat',$zuzati->total_commisions_PZ,$zuzati->prov_id);
            }
            foreach($total->auto as $zuzati){
                $totali += getsalary($zuzati->society_PA,'Auto',$zuzati->total_commisions_PA,$zuzati->prov_id);
            }
            foreach($total->vor as $zuzati){
                $totali += getsalary($zuzati->society_PV,'Vor',$zuzati->total_commisions_PV,$zuzati->prov_id);
            }
            foreach($total->hausrat as $zuzati){
                $totali += getsalary($zuzati->society_PH,'Haus',$zuzati->total_commisions_PH,$zuzati->prov_id);
            }
        }
        
    


        return view('personalData',compact('rroga2','personalData','bankInfo','person','rroga','employeID','allCosumersPerEmp','monthlyCosumersPerEmp','totali'));

    })->name('employeProfile');

//    route::get('searchEmploye',[HumanResourcesController::class,'searchEmploye'])->name('searchEmploye');\

    route::get('logsHistory',[HumanResourcesController::class,'logsHistory'])->name('logsHistory');
?>
