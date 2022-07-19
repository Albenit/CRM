<?php

namespace App\Http\Controllers;

use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\CostumerStatusGrundversicherung;
use App\Models\CostumerStatusHausrat;
use App\Models\CostumerStatusRetchsschutz;
use App\Models\CostumerStatusVorsorge;
use App\Models\CostumerStatusZusatzversicherung;
use App\Models\family;
use App\Models\LeadDataFahrzeug;
use App\Models\LeadDataPrevention;
use App\Models\LeadDataThings;
use App\Models\newgegen;
use App\Models\newnue;
use App\Models\lead;
use App\Notifications\SendNotificationn;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Admins;
use App\Models\LeadDataKK;
use App\Models\Pendency;
use Database\Seeders\AdminSeeder;
use App\Models\Activity;
use App\Models\LogsActivity;
use Throwable;

// use Wnx\SwissCantons\CantonManager;


class CostumerFormController extends Controller
{

    public function costumer_form($id){
        $id = Crypt::decrypt($id) / 1244;
        $cantonManager = new \Wnx\SwissCantons\CantonManager();
        $cantonName = '';
        try{
            $familyyy = family::find($id);
            $postali = $familyyy->lead->postal_code;
            $kantoni = $cantonManager->getByZipcode($postali);

            $cantonName = $kantoni->setLanguage('de')->getName();
        }catch(Throwable $e){
           $cantonName = '';
        }

        
        

        if(Auth::guard('admins')->user()->hasRole('backoffice') ||Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('salesmanager') ||Auth::guard('admins')->user()->hasRole('fs') || Auth::guard('admins')->user()->hasRole('management')){
            $family = family::where('id',$id)->first();
            if ($family->kundportfolio == 0 && (Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice'))) {
                $costumer = family::with('lead')->findOrFail($id);

                CostumerProduktGrundversicherung::where('person_id_PG', $id)->update(['status_PG' => 'Offen (Innendienst)','last_adjustment_PG' => Carbon::now()->format('Y/m/d')]);
                CostumerProduktZusatzversicherung::where('person_id_PZ', $id)->update(['status_PZ' => 'Offen (Innendienst)','last_adjustment_PZ' => Carbon::now()->format('Y/m/d')]);
                CostumerProduktAutoversicherung::where('person_id_PA', $id)->update(['status_PA' => 'Offen (Innendienst)','last_adjustment_PA' => Carbon::now()->format('Y/m/d')]);
                CostumerProduktHausrat::where('person_id_PH', $id)->update(['status_PH' => 'Offen (Innendienst)','last_adjustment_PH' => Carbon::now()->format('Y/m/d')]);
                CostumerProduktRechtsschutz::where('person_id_PR', $id)->update(['status_PR' => 'Offen (Innendienst)','last_adjustment_PR' => Carbon::now()->format('Y/m/d')]);
                CostumerProduktVorsorge::where('person_id_PV', $id)->update(['status_PV' => 'Offen (Innendienst)','last_adjustment_PV' => Carbon::now()->format('Y/m/d')]);
                family::where('id',$id)->update(['status_of_produkts' => 'Offen (Innendienst)','kundportfolio' => 1]);

                $dataKK = LeadDataKK::where('person_id', $id)->first();
                $dataFahrzeug = LeadDataFahrzeug::where('person_id',$id)->first();
                $dataPrevention = LeadDataPrevention::where('person_id',$id)->first();
                $newGegenOfertenCount = newgegen::where('person_id',$id)->count();
                $newNeueOfertenCount = newnue::where('person_id',$id)->count();
                $grundversicherungP = CostumerProduktGrundversicherung::where('person_id_PG', $id)->first();
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('person_id_PZ', $id)->first();
                $autoversicherungPP = CostumerProduktAutoversicherung::where('person_id_PA', $id)->get();
                $autoversicherungPPFirst = CostumerProduktAutoversicherung::where('person_id_PA', $id)->first();
                $hausratP = CostumerProduktHausrat::where('person_id_PH', $id)->first();
                $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR', $id)->first();
                $vorsorgeP = CostumerProduktVorsorge::where('person_id_PV', $id)->first();
                

                return view('costumer_form')->with(compact('costumer','newNeueOfertenCount',
                    'grundversicherungP','zusatzversicherungP','newGegenOfertenCount','dataKK','dataFahrzeug',
                    'dataPrevention','autoversicherungPP','hausratP','retchsschutzP','vorsorgeP','autoversicherungPPFirst','cantonName'));

            }else{
                if(Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice')) {
                    $grundversicherungPP = CostumerProduktGrundversicherung::where('person_id_PG', $id)->first();
                    $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR', $id)->first();
                    $vorsorgeP = CostumerProduktVorsorge::where('person_id_PV', $id)->first();
                    $zusatzversicherungPP = CostumerProduktZusatzversicherung::where('person_id_PZ', $id)->first();
                    $hausratP = CostumerProduktHausrat::where('person_id_PH', $id)->first();
                    $autoversicherungPP = CostumerProduktAutoversicherung::where('person_id_PA', $id)->get();
                    $autoversicherungPPFirst = CostumerProduktAutoversicherung::where('person_id_PA', $id)->first();
                    $costumer = family::findOrFail($id);
                    $dataKK = LeadDataKK::where('person_id', $id)->first();
                    $dataFahrzeug = LeadDataFahrzeug::where('person_id',$id)->first();
                    $dataPrevention = LeadDataPrevention::where('person_id',$id)->first();


                    return view('edit_costumer_form')
                        ->with(compact('costumer',
                            'grundversicherungPP',
                            'retchsschutzP', 'vorsorgeP','hausratP','autoversicherungPP',
                            'zusatzversicherungPP','dataKK','dataFahrzeug','dataPrevention','autoversicherungPPFirst','cantonName'));


                }
                if(Auth::guard('admins')->user()->hasRole('salesmanager') || Auth::guard('admins')->user()->hasRole('fs')|| Auth::guard('admins')->user()->hasRole('management')){

                    $grundversicherungPP = CostumerProduktGrundversicherung::where('person_id_PG', $id)->first();
                    $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR', $id)->first();
                    $vorsorgeP = CostumerProduktVorsorge::where('person_id_PV', $id)->first();
                    $zusatzversicherungPP = CostumerProduktZusatzversicherung::where('person_id_PZ', $id)->first();
                    $autoversicherungPP = CostumerProduktAutoversicherung::where('person_id_PA', $id)->get();
                    $autoversicherungPPFirst = CostumerProduktAutoversicherung::where('person_id_PA', $id)->first();
                    $hausratP = CostumerProduktHausrat::where('person_id_PH', $id)->first();
                    $costumer = family::findOrFail($id);

                    $dataKK = LeadDataKK::where('person_id', $id)->first();
                    $dataFahrzeug = LeadDataFahrzeug::where('person_id',$id)->first();
                    $dataPrevention = LeadDataPrevention::where('person_id',$id)->first();

                    return view('view_costumer_form')
                        ->with(compact('costumer',
                            'grundversicherungPP',
                            'retchsschutzP', 'vorsorgeP','hausratP','autoversicherungPP',
                            'zusatzversicherungPP','dataKK','dataFahrzeug','dataPrevention','autoversicherungPPFirst','cantonName'));

                }
            }
        }else{
            echo 'Sie haben keine Berechtigung zum Zugriff auf diese Seite';
        }
    }


    public function save_costumer_form(Request $request, $id){


        $id = Crypt::decrypt($id) / 1244;


        $aufcnt = 0;
        $provcnt= 0;

        $statusGrund = CostumerProduktGrundversicherung::select('status_PG','last_adjustment_PG')->where('person_id_PG',$id)->first();

        if ($request->status_PG != $statusGrund->status_PG){
            if ($statusGrund->status_PG == null){
                $todayG = $statusGrund->last_adjustment_PG;
            }else {
                $todayG = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayG = $statusGrund->last_adjustment_PG;
        }

        $lgrund = CostumerProduktGrundversicherung::firstWhere('person_id_PG',$id);

        $grund = CostumerProduktGrundversicherung::where('person_id_PG',$id)->update([
            'graduation_date_PG' => $request->graduation_date_PG,
            'society_PG' => filter_var($request->society_PG,FILTER_SANITIZE_STRING),
            'product_PG' => filter_var($request->product_PG,FILTER_SANITIZE_STRING),
            'status_PG' => filter_var($request->status_PG,FILTER_SANITIZE_STRING),
            'last_adjustment_PG' => $todayG,
            'total_commisions_PG' => (int) filter_var($request->total_commisions_PG,FILTER_SANITIZE_STRING),
            'prov_id' => $lgrund->prov_id ? $lgrund->prov_id : Admins::find($lgrund->admin_id)->provision->id
        ]);
        $grund = CostumerProduktGrundversicherung::firstWhere('person_id_PG',$id);
        $grund->prov_id = Admins::find($grund->admin_id)->provision->id;
        $grund->save();





            if($request->status_PG == 'Provisionert' && $lgrund->status_PG != 'Provisionert'){
                $provcnt++;
                $familyperson = family::find($id)->lead->assign_to_id;
                $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
                Admins::find($familyperson)->notify(new SendNotificationn($url));
            }
            elseif($request->status_PG == 'Aufgenomen'){
                $aufcnt++;
            }

        $statusRech = CostumerProduktRechtsschutz::select('status_PR','last_adjustment_PR')->where('person_id_PR',$id)->first();

        if ($request->status_PR != $statusRech->status_PR){
            if ($statusRech->status_PR == null){
                $todayR = $statusRech->last_adjustment_PR;
            }else{
                $todayR = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayR = $statusRech->last_adjustment_PR;
        }

        $lretchsschutzP = CostumerProduktRechtsschutz::firstWhere('person_id_PR',$id);
        $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR',$id)->update([
            'graduation_date_PR'=> $request->graduation_date_PR,
            'society_PR' => filter_var($request->society_PR,FILTER_SANITIZE_STRING),
            'produkt_PR'=> filter_var($request->produkt_PR,FILTER_SANITIZE_STRING),
            'status_PR' => filter_var($request->status_PR,FILTER_SANITIZE_STRING),
            'last_adjustment_PR'=> $todayR,
            'total_commisions_PR'=> (int) filter_var($request->total_commisions_PR,FILTER_SANITIZE_STRING),
            'prov_id' => $lretchsschutzP->prov_id ? $lretchsschutzP->prov_id : Admins::find($lretchsschutzP->admin_id)->provision->id
        ]);
        $retchsschutzP = CostumerProduktRechtsschutz::firstWhere('person_id_PR',$id);
     $retchsschutzP->prov_id = Admins::find($retchsschutzP->admin_id)->provision->id;
     $retchsschutzP->save();

            if($request->status_PR == 'Provisionert' && $lretchsschutzP->status_PR != 'Provisionert'){
                $provcnt++;
                $familyperson = family::find($id)->lead->assign_to_id;
                $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
                Admins::find($familyperson)->notify(new SendNotificationn($url));
            }
            elseif($request->status_PR == 'Aufgenomen') {
                $aufcnt++;
            }

        $statusVor = CostumerProduktVorsorge::select('status_PV','last_adjustment_PV')->where('person_id_PV',$id)->first();

        if ($request->status_PV != $statusVor->status_PV){
            if ($statusVor->status_PV == null){
                $todayV = $statusVor->last_adjustment_PV;
            }else{
                $todayV = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayV = $statusVor->last_adjustment_PV;
        }
        $lvorsorgeP = CostumerProduktVorsorge::firstWhere('person_id_PV',$id);
        $vorsorgeP = CostumerProduktVorsorge::where('person_id_PV',$id)->update([
            'graduation_date_PV'=> $request->graduation_date_PV,
            'begin_PV' => $request->begin_PV,
            'society_PV'=> filter_var($request->society_PV,FILTER_SANITIZE_STRING),
            'pramie_PV'=> filter_var($request->pramie_PV,FILTER_SANITIZE_STRING),
            'payment_rythm_PV'=> filter_var($request->payment_rythm_PV,FILTER_SANITIZE_STRING),
            'duration_from_PV'=>  $request->duration_from_PV,
            'duration_to_PV'=> $request->duration_to_PV,
            'production_PV'=> filter_var($request->production_PV,FILTER_SANITIZE_STRING),
            'status_PV'=> filter_var($request->status_PV,FILTER_SANITIZE_STRING),
            'last_adjustment_PV'=> $todayV,
            'total_commisions_PV'=> (int) filter_var($request->total_commisions_PV,FILTER_SANITIZE_STRING),
            'prov_id' => $lvorsorgeP->prov_id ? $lvorsorgeP->prov_id : Admins::find($lvorsorgeP->admin_id)->provision->id
        ]);
        $vorsorgeP = CostumerProduktVorsorge::firstWhere('person_id_PV',$id);
        $vorsorgeP->prov_id = Admins::find($vorsorgeP->admin_id)->provision->id;
        $vorsorgeP->save();

            if($request->status_PV == 'Provisionert' && $lvorsorgeP->status_PV != 'Provisionert'){
                $provcnt++;
                $familyperson = family::find($id)->lead->assign_to_id;
                $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
                Admins::find($familyperson)->notify(new SendNotificationn($url));
            }
            elseif($request->status_PV == 'Aufgenomen') {
                $aufcnt++;
            }

            $statusAuto = CostumerProduktAutoversicherung::select('status_PA','last_adjustment_PA')->where('person_id_PA',$id)->first();

            if ($request->status_PA != $statusAuto->status_PA){
                if ($statusAuto->status_PA == null){
                    $todayA = $statusAuto->last_adjustment_PA;
                }else{
                    $todayA = Carbon::now()->format('Y/m/d');
                }
            }else{
                $todayA = $statusAuto->last_adjustment_PA;
            }
            $lautoversicherung = CostumerProduktAutoversicherung::firstWhere('person_id_PA',$id);
            $autoversicherung = CostumerProduktAutoversicherung::where('person_id_PA',$id)->update([
                'society_PA' => filter_var($request->society_PA,FILTER_SANITIZE_STRING),
                'beginning_insurance_PA' => $request->beginning_insurance_PA,
                'insurance_PA' => filter_var($request->insurance_PA,FILTER_SANITIZE_STRING),
                'status_PA' => filter_var($request->status_PA,FILTER_SANITIZE_STRING),
                'last_adjustment_PA' => $todayA,
                'total_commisions_PA' => (int) filter_var($request->total_commisions_PA,FILTER_SANITIZE_STRING),
                'prov_id' => $lautoversicherung->prov_id ? $lautoversicherung->prov_id : Admins::find($lautoversicherung->admin_id)->provision->id

            ]);
            $autoversicherung = CostumerProduktAutoversicherung::firstWhere('person_id_PA',$id);
            $autoversicherung->prov_id = Admins::find($autoversicherung->admin_id)->provision->id;
            $autoversicherung->save();

        $cnt =  newnue::where('person_id',$id)->count();

        $pcnt = 2;
        for ($i = 1; $i <= $cnt; $i++) {
            $auto = new CostumerProduktAutoversicherung();
            $auto->person_id_PA = $id;
            $auto->society_PA = $request->input('society_PA' . $pcnt);
            $auto->beginning_insurance_PA = $request->input('beginning_insurance_PA' . $pcnt);
            $auto->insurance_PA = $request->input('insurance_PA' . $pcnt);
            $auto->status_PA = $request->input('status_PA' . $pcnt);
            $auto->last_adjustment_PA = $todayA;
            $auto->total_commisions_PA = (int) $request->input('total_commisions_PA' . $pcnt);
            $auto->save();
            $pcnt++;
        }


            if($request->status_PA == 'Provisionert' && $lautoversicherung->status_PA != 'Provisionert'){
                $familyperson = family::find($id)->lead->assign_to_id;
                $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
                Admins::find($familyperson)->notify(new SendNotificationn($url));
            }
            elseif($request->status_PA == 'Aufgenomen') {
                $aufcnt++;
            }

        $statusHaus = CostumerProduktHausrat::select('status_PH','last_adjustment_PH')->where('person_id_PH',$id)->first();

        if ($request->status_PH != $statusHaus->status_PH){
            if ($statusHaus->status_PH == null){
                $todayH = $statusHaus->last_adjustment_PH;
            }else{
                $todayH = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayH = $statusHaus->last_adjustment_PH;
        }

        $hausratP = CostumerProduktHausrat::where('person_id_PH',$id)->update([
            'society_PH'=> filter_var($request->society_PH,FILTER_SANITIZE_STRING),
            'beginning_insurance_PH' => $request->beginning_insurance_PH,
            'insurance_PH'=> filter_var($request->insurance_PH,FILTER_SANITIZE_STRING),
            'status_PH'=> filter_var($request->status_PH,FILTER_SANITIZE_STRING),
            'last_adjustment_PH'=> $todayH,
            'total_commisions_PH'=> (int) filter_var($request->total_commisions_PH,FILTER_SANITIZE_STRING),
        ]);
            if($request->status_PH == 'Provisionert' && $statusHaus->status_PH != 'Provisionert'){
                $familyperson = family::find($id)->lead->assign_to_id;
                $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
                Admins::find($familyperson)->notify(new SendNotificationn($url));
            }
            elseif($request->status_PH == 'Aufgenomen') {
                $aufcnt++;
            }
            $hausratP = CostumerProduktHausrat::firstWhere('person_id_PH',$id);
            $hausratP->prov_id = Admins::find($hausratP->admin_id)->provision->id;
            $hausratP->save();
        $statusZus = CostumerProduktZusatzversicherung::select('status_PZ','last_adjustment_PZ')->where('person_id_PZ',$id)->first();

        if ($request->status_PZ != $statusZus->status_PZ){
            if ($statusZus->status_PZ == null){
                $todayZ = $statusZus->last_adjustment_PZ;
            }else{
                $todayZ = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayZ = $statusZus->last_adjustment_PZ;
        }

        $zusat = CostumerProduktZusatzversicherung::where('person_id_PZ',$id)->update([
            'graduation_date_PZ' => $request->graduation_date_PZ,
            'society_PZ' => filter_var($request->society_PZ,FILTER_SANITIZE_STRING),
            'produkt_PZ' => filter_var($request->produkt_PZ,FILTER_SANITIZE_STRING),
            'vvg_premium_PZ' => filter_var($request->vvg_premium_PZ,FILTER_SANITIZE_STRING),
            'duration_from_PZ'=> $request->duration_from_PZ,
            'duration_to_PZ' => $request->duration_to_PZ,
            'status_PZ' => filter_var($request->status_PZ,FILTER_SANITIZE_STRING),
            'last_adjustment_PZ' => $todayZ,
            'provision_PZ' => filter_var($request->provision_PZ,FILTER_SANITIZE_STRING),
            'total_commisions_PZ' => (int) filter_var($request->total_commisions_PZ,FILTER_SANITIZE_STRING)
        ]);
        $zusat = CostumerProduktZusatzversicherung::firstWhere('person_id_PZ',$id);
        $zusat->prov_id = Admins::find($zusat->admin_id)->provision->id;
        $zusat->save();

            if($request->statusPZ == 'Provisionert' && $zusat->statusPZ != 'Provisionert'){
                $provcnt++;
                $familyperson = family::find($id)->lead->assign_to_id;
                $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
            }   elseif($request->status_PG == 'Aufgenomen') {
                $aufcnt++;
            }
            if($aufcnt > 0 || $provcnt > 0) $provisionert = 1; else $provisionert = 1;
                family::where('id',$id)->update(['kundportfolio'=>1,'provisionert' => $provisionert,'status_changed'=>1]);

            LogsActivity::create([
                'admin_id' => Auth::user()->id,
                'person_id' => $id,
                'new_data' => json_encode($request->all()),
                'description' => 'Client Products Inserted'
            ]);
            
            return redirect()->route('costumer_form', Crypt::encrypt($id * 1244))->with('success', 'Aktion erfolgreich durchgeführt');
    }

    public function edit_costumer_kundportfolio(Request $request, $id){

        $id = Crypt::decrypt($id) / 1244;
        $aufcnt = 0;
        $provcnt = 0;

        $oldGrund = CostumerProduktGrundversicherung::find($id);
        $oldZus = CostumerProduktZusatzversicherung::find($id);
        $oldAuto = CostumerProduktAutoversicherung::find($id);
        $oldHaus = CostumerProduktHausrat::find($id);
        $oldVor = CostumerProduktVorsorge::find($id);
        $oldRech = CostumerProduktRechtsschutz::find($id);
        $col = collect();
        $totalOld = $col->merge($oldGrund)->merge($oldAuto)->merge($oldZus)->merge($oldHaus)->merge($oldRech)->merge($oldVor);

        LogsActivity::create([
            'admin_id' => Auth::user()->id,
            'person_id' => $id,
            'old_data' => json_encode($totalOld),
            'new_data' => json_encode($request->except(['_method','_token'])),
            'description' => 'Client Products Edited'
        ]);

     
        $statusGrund = CostumerProduktGrundversicherung::select('status_PG','last_adjustment_PG')->where('person_id_PG',$id)->first();

        if ($request->status_PG != $statusGrund->status_PG){
            if ($statusGrund->status_PG == null){
                $todayG = $statusGrund->last_adjustment_PG;
            }else{
                $todayG = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayG = $statusGrund->last_adjustment_PG;
        }

        $table_PG = null;
        if($request->status_PG == 'Storniert'){
            $table_PG =  'stoiner_PG';
        }else{
            $table_PG = 'status_PG';
        }

        $lgrund = CostumerProduktGrundversicherung::firstWhere('person_id_PG',$id);
        $grund = CostumerProduktGrundversicherung::where('person_id_PG',$id)->update([
                'graduation_date_PG' => $request->graduation_date_PG,
                'society_PG' => filter_var($request->society_PG,FILTER_SANITIZE_STRING),
                'product_PG' => filter_var($request->product_PG,FILTER_SANITIZE_STRING),
                 $table_PG => filter_var($request->status_PG,FILTER_SANITIZE_STRING),
                'last_adjustment_PG' => $todayG,
                'total_commisions_PG' => (int) filter_var($request->total_commisions_PG,FILTER_SANITIZE_STRING),
                'prov_id' => $lgrund->prov_id ? $lgrund->prov_id : Admins::find($lgrund->admin_id)->provision->id
        ]);

        if($request->status_PG == 'Provisionert' && $lgrund->status_PG != 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde : ' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PG == 'Aufgenomen') {
            $aufcnt++;
        }
        elseif ($request->status_PG == 'Eingereicht'){
            $affected = Pendency::where('family_id', $id)->update(array('completed' => 1));
        }


        $statusRech = CostumerProduktRechtsschutz::select('status_PR','last_adjustment_PR')->where('person_id_PR',$id)->first();
        if ($request->status_PR != $statusRech->status_PR){
            if ($statusRech->status_PR == null){
                $todayR = $statusRech->last_adjustment_PR;
            }else{
                $todayR = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayR = $statusRech->last_adjustment_PR;
        }

        $table_PR = null;
        if($request->status_PR == 'Storniert'){
            $table_PR =  'stoiner_PR';
        }else{
            $table_PR = 'status_PR';
        }
        $lretchsschutzP = CostumerProduktRechtsschutz::firstWhere('person_id_PR',$id);
        $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR',$id)->update([
            'graduation_date_PR'=> $request->graduation_date_PR,
            'society_PR' => filter_var($request->society_PR,FILTER_SANITIZE_STRING),
            'produkt_PR'=> filter_var($request->produkt_PR,FILTER_SANITIZE_STRING),
             $table_PR=> filter_var($request->status_PR,FILTER_SANITIZE_STRING),
            'last_adjustment_PR'=> $todayR,
            'total_commisions_PR'=> (int) filter_var($request->total_commisions_PR,FILTER_SANITIZE_STRING),
            'prov_id' => $lretchsschutzP->prov_id ? $lretchsschutzP->prov_id : Admins::find($lretchsschutzP->admin_id)->provision->id
        ]);
        if($request->status_PR == 'Provisionert' && $lretchsschutzP->status_PR != 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif ($request->status_PR == 'Eingereicht'){
            $affected = Pendency::where('family_id', $id)->update(array('completed' => 1));
        }

        $statusVor = CostumerProduktVorsorge::select('status_PV','last_adjustment_PV')->where('person_id_PV',$id)->first();

        if ($request->status_PV != $statusVor->status_PV){
            if ($statusVor->status_PV == null){
                $todayV = $statusVor->last_adjustment_PV;
            }else{
                $todayV = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayV = $statusVor->last_adjustment_PV;
        }

        $table_PV = null;
        if($request->status_PV == 'Storniert'){
            $table_PV =  'stoiner_PV';
        }else{
            $table_PV = 'status_PV';
        }
        $lvorsorgeP = CostumerProduktVorsorge::firstWhere('person_id_PV',$id);
        $vorsorgeP = CostumerProduktVorsorge::where('person_id_PV',$id)->update([
            'graduation_date_PV'=> $request->graduation_date_PV,
            'begin_PV' => $request->begin_PV,
            'society_PV'=> filter_var($request->society_PV,FILTER_SANITIZE_STRING),
            'pramie_PV'=> filter_var($request->pramie_PV,FILTER_SANITIZE_STRING),
            'payment_rythm_PV'=> filter_var($request->payment_rythm_PV,FILTER_SANITIZE_STRING),
            'duration_from_PV'=>  $request->duration_from_PV,
            'duration_to_PV'=> $request->duration_to_PV,
            'production_PV'=> filter_var($request->production_PV,FILTER_SANITIZE_STRING),
             $table_PV => filter_var($request->status_PV,FILTER_SANITIZE_STRING),
            'last_adjustment_PV'=> $todayV,
            'total_commisions_PV'=> (int) filter_var($request->total_commisions_PV,FILTER_SANITIZE_STRING),
            'prov_id' => $lvorsorgeP->prov_id ? $lvorsorgeP->prov_id : Admins::find($lvorsorgeP->admin_id)->provision->id
        ]);
        if($request->status_PV == 'Provisionert' && $lvorsorgeP->status_PV != 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PV == 'Aufgenomen') {
            $aufcnt++;
        }
        elseif ($request->status_PV == 'Eingereicht'){
            $affected = Pendency::where('family_id', $id)->update(array('completed' => 1));
        }
      $lauto = CostumerProduktAutoversicherung::firstWhere('person_id_PA',$id);
       CostumerProduktAutoversicherung::where('person_id_PA',$id)->update([
        'prov_id' => $lauto->prov_id ? $lauto->prov_id : Admins::find($lauto->admin_id)->provision->id
       ]);
        $statusAuto = CostumerProduktAutoversicherung::select('status_PA','last_adjustment_PA')->where('person_id_PA',$id)->first();

        if ($request->status_PA != $statusAuto->status_PA){
            if ($statusAuto->status_PA == null){
                $todayA = $statusAuto->last_adjustment_PA;
            }else{
                $todayA = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayA = $statusAuto->last_adjustment_PA;
        }

        $pcnt = 1;
        foreach (CostumerProduktAutoversicherung::where('person_id_PA',$id)->get() as $objekt){
            $objekt->society_PA= filter_var($request->input('society_PA' . $pcnt),FILTER_SANITIZE_STRING);
            $objekt->beginning_insurance_PA = $request->input('beginning_insurance_PA' . $pcnt);
            $objekt->insurance_PA= filter_var($request->input('insurance_PA' . $pcnt),FILTER_SANITIZE_STRING);

            if($request->input('status_PA' . $pcnt) == 'Storniert'){
                $objekt->stoiner_PA = filter_var($request->input('status_PA' . $pcnt),FILTER_SANITIZE_STRING);
            }else{
                $objekt->status_PA = filter_var($request->input('status_PA' . $pcnt),FILTER_SANITIZE_STRING);
            }

            $objekt->last_adjustment_PA= $todayA;
            $objekt->total_commisions_PA= (int) filter_var($request->input('total_commisions_PA' . $pcnt),FILTER_SANITIZE_STRING);
            $objekt->save();
            $pcnt++;
        }

        if($request->status_PA == 'Provisionert' &&  $statusAuto != 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif ($request->status_PA == 'Eingereicht'){
            $affected = Pendency::where('family_id', $id)->update(array('completed' => 1));
        }

        $statusHaus = CostumerProduktHausrat::select('status_PH','last_adjustment_PH')->where('person_id_PH',$id)->first();

        if ($request->status_PH != $statusHaus->status_PH){
            if ($statusHaus->status_PH == null){
                $todayH = $statusHaus->last_adjustment_PH;
            }else{
                $todayH = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayH = $statusHaus->last_adjustment_PH;
        }


        $table_PH = null;
        if($request->status_PH == 'Storniert'){
            $table_PH =  'stoiner_PH';
        }else{
            $table_PH = 'status_PH';
        }
        $lhausratP = CostumerProduktHausrat::where('person_id_PH',$id)->first();
        $hausratP = CostumerProduktHausrat::where('person_id_PH',$id)->update([
            'society_PH'=> filter_var($request->society_PH,FILTER_SANITIZE_STRING),
            'beginning_insurance_PH' => $request->beginning_insurance_PH,
            'insurance_PH'=> filter_var($request->insurance_PH,FILTER_SANITIZE_STRING),
            $table_PH => filter_var($request->status_PH,FILTER_SANITIZE_STRING),
            'last_adjustment_PH'=> $todayH,
            'total_commisions_PH'=> (int) filter_var($request->total_commisions_PH,FILTER_SANITIZE_STRING),
            'prov_id' => $lhausratP->prov_id ? $lhausratP->prov_id : Admins::find($lhausratP->admin_id)->provision->id
        ]);
        if($request->status_PH == 'Provisionert' && $statusHaus->status_PH != 'Provisionert'){
        
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PG == 'Aufgenomen') {
            $aufcnt++;
        }
        elseif ($request->status_PG == 'Eingereicht'){
            $affected = Pendency::where('family_id', $id)->update(array('completed' => 1));
        }

        $statusZus = CostumerProduktZusatzversicherung::select('status_PZ','last_adjustment_PZ')->where('person_id_PZ',$id)->first();

        if ($request->status_PZ != $statusZus->status_PZ){
            if ($statusZus->status_PZ == null){
                $todayZ = $statusZus->last_adjustment_PZ;
            }else{
                $todayZ = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayZ = $statusZus->last_adjustment_PZ;
        }
        $table_PZ = null;
        if($request->status_PZ == 'Storniert'){
            $table_PZ =  'stoiner_PZ';
        }else{
            $table_PZ = 'status_PZ';
        }
        $lzusat = CostumerProduktZusatzversicherung::firstWhere('person_id_PZ',$id);
        $zusat = CostumerProduktZusatzversicherung::where('person_id_PZ',$id)->update([
            'graduation_date_PZ' => $request->graduation_date_PZ,
            'society_PZ' => filter_var($request->society_PZ,FILTER_SANITIZE_STRING),
            'produkt_PZ' => filter_var($request->produkt_PZ,FILTER_SANITIZE_STRING),
            'vvg_premium_PZ' => filter_var($request->vvg_premium_PZ,FILTER_SANITIZE_STRING),
            'duration_from_PZ'=> $request->duration_from_PZ,
            'duration_to_PZ' => $request->duration_to_PZ,
             $table_PZ => filter_var($request->status_PZ,FILTER_SANITIZE_STRING),
            'last_adjustment_PZ' => $todayZ,
            'provision_PZ' => filter_var($request->provision_PZ,FILTER_SANITIZE_STRING),
            'total_commisions_PZ' => (int) filter_var($request->total_commisions_PZ,FILTER_SANITIZE_STRING),
            'prov_id' => $lzusat->prov_id ? $lzusat->prov_id : Admins::find($lzusat->admin_id)->provision->id
        ]);


        if($request->status_PZ == 'Provisionert' && $lzusat->status_PZ != 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PZ1 == 'Aufgenomen') {
            $aufcnt++;
        }
        elseif ($request->status_PZ1 == 'Eingereicht'){
            $affected = Pendency::where('family_id', $id)->update(array('completed' => 1));
        }

        if($aufcnt > 0 || $provcnt > 0){
            $famely = family::find($id);
            $famely->provisionert = 1;
        
            $famely->save();
        }
        family::find($id)->update(['status_changed'=>1]);



        return back();

    }

    public function savecostumer(Request $req){
        $req->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' =>'required',
            'city' => 'required',
            'postal_code' => 'required',
            'address' => 'required'
        ],
        [
            'fname.required' => 'Vorname required',
            'lname.required' => 'Nachname required',
            'phone.required' => 'Telefon required',
            'city.required' => 'Ort required',
            'postal_code.required' => 'PLZ required',
            'address.required' => 'Strasse required',
        ]);
    


        $lead = new lead();
        $lead->assign_to_id = $req->berater;
        $lead->first_name = $req->fname[0];
        $lead->last_name = $req->lname[0];
        $lead->telephone = $req->phone;
        $lead->campaign_id = 0;
        $lead->nationality = $req->country;
        $lead->insertedManualy = 1;
        $lead->city =$req->city;
        $lead->postal_code = $req->postal_code;
        $lead->address = $req->address;
        $lead->save();
   
        for($i = 0; $i < (int) $req->cnt; $i++){
        $family = new family();
        $family->first_name = filter_var($req->input('fname')[$i],FILTER_SANITIZE_STRING);
        $family->birthdate = filter_var($req->input('birthdate')[$i],FILTER_SANITIZE_STRING);
        $family->last_name = filter_var($req->input('lname')[$i],FILTER_SANITIZE_STRING);
        $family->leads_id = (int) $lead->id;
        $family->status = "Done";
        $family->status_of_produkts = 'Offen (Berater)';
        $family->save();
        Pendency::create(['admin_id' => auth()->user()->id,'family_id'=> $family->id,'p' => 0]);
        \App\Models\LeadDataKK::create(['person_id'=> $family->id,'leads_id'=> (int) $lead->id]);
        \App\Models\LeadDataFahrzeug::create(['person_id'=> $family->id,'leads_id'=> (int) $lead->id]);
        \App\Models\LeadDataPrevention::create(['person_id'=> $family->id,'leads_id' => (int) $lead->id]);
        \App\Models\LeadDataThings::create(['person_id'=> $family->id,'leads_id'=> (int) $lead->id]);
        \App\Models\LeadDataCounteroffered::create(['person_id'=> $family->id,'leads_id'=> (int) $lead->id]);
        \App\Models\LeadDataRech::create(['person_id' => $family->id, 'leads_id' => (int) $lead->id]);
        \App\Models\CostumerProduktGrundversicherung::create(['person_id_PG'=> $family->id,'status_PG' => 'Offen (Berater)','admin_id' => $req->berater]);
        \App\Models\CostumerProduktZusatzversicherung::create(['person_id_PZ'=> $family->id,'status_PZ' => 'Offen (Berater)','admin_id' => $req->berater]);
        \App\Models\CostumerProduktAutoversicherung::create(['person_id_PA'=> $family->id,'status_PA' => 'Offen (Berater)','admin_id' => $req->berater]);
        \App\Models\CostumerProduktHausrat::create(['person_id_PH'=> $family->id,'status_PH' => 'Offen (Berater)','admin_id' => $req->berater]);
        \App\Models\CostumerProduktRechtsschutz::create(['person_id_PR'=> $family->id,'status_PR' => 'Offen (Berater)','admin_id' => $req->berater]);
        \App\Models\CostumerProduktVorsorge::create(['person_id_PV'=> $family->id,'status_PV' => 'Offen (Berater)','admin_id' => $req->berater]);

        LogsActivity::create([
                'admin_id' => Auth::user()->id,
                'person_id' => $family->id,
                'new_data' => json_encode($req->all()),
                'description' => 'Client Added Manualy'
            ]);
      
    }
        return redirect()->route('costumers')->with('success' ,'Kunde erfolgreich eingefügt');
    }
    
    public function updateBeraterKunden(Request $req){

        lead::where('id',(int) $req->lead_id)->update(['assign_to_id' => (int) $req->id]);
        lead::find((int) $req->lead_id)->family->each(function($item) use($req){
            CostumerProduktHausrat::where('person_id_PH',(int) $item->id)->update(['admin_id' => $req->id]);
            CostumerProduktVorsorge::where('person_id_PV',(int) $item->id)->update(['admin_id' => $req->id]);
            CostumerProduktAutoversicherung::where('person_id_PA',(int) $item->id)->update(['admin_id' => $req->id]);
            CostumerProduktGrundversicherung::where('person_id_PH',(int) $item->id)->update(['admin_id' => $req->id]);
            CostumerProduktZusatzversicherung::where('person_id_PZ',(int) $item->id)->update(['admin_id' => $req->id]);
            CostumerProduktRechtsschutz::where('person_id_PR',(int) $item->id)->update(['admin_id' => $req->id]);
        });
     
    }
}
