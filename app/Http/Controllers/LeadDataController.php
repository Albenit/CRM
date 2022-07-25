<?php

namespace App\Http\Controllers;

use App\Enums\FolderPaths;
use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\data;
use App\Models\family;
use App\Models\LeadDataCounteroffered;
use App\Models\LeadDataFahrzeug;
use App\Models\LeadDataKK;
use App\Models\LeadDataPrevention;
use App\Models\LeadDataThings;
use App\Models\Pendency;
use App\Traits\FileManagerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Admins;
use App\Models\LeadDataRech;
use App\Models\newgegen;
use App\Models\newnue;
use App\Notifications\SendNotificationn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Svg\Tag\Rect;
use App\Models\LogsActivity;

class LeadDataController extends Controller
{
    use FileManagerTrait;
    public function acceptdata($id, Request $req,$accept = false)
    {
        $id = Crypt::decrypt($id) / 1244;

        $admin_id = $req->admin_id;

        $user = Auth::user();
        $urole = $user->getRoleNames()->toArray();

        $cid = Crypt::decrypt($req->admin_id);
        if(is_string($cid)){
            $admin_id = Crypt::decrypt($cid) / 1244;
        }
        else{
            $admin_id = $cid / 1244;
        }

        $lead = family::find($id);

        if (!in_array('fs',$urole) || Pendency::find(Session::get('pend_id'))->admin_id == $user->id) {
            if (!$accept) {
                $data = new data();
                $data->getdata($id);
                $grundversicherungP = CostumerProduktGrundversicherung::where('person_id_PG', $id)->get();
                $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR', $id)->first();
                $vorsorgeP = CostumerProduktVorsorge::where('person_id_PV', $id)->first();
                $zusatzversicherungP = CostumerProduktZusatzversicherung::where('person_id_PZ', $id)->first();
                $hausratP = CostumerProduktHausrat::where('person_id_PH', $id)->first();
                $autoversicherungP = CostumerProduktAutoversicherung::where('person_id_PA', $id)->get();

                $leadfh = $data->fahrzeug;
                if($leadfh){
                    $mandatiert = $leadfh->mandatiert != null ? true : false;
                }
                else{
                    $mandatiert = false;
                }
                $mandatiert ? $mandatierturl = $leadfh->mandatiert : $mandatierturl = "";

                return view('updatedocument')->with('data',$data)->with('lead',$lead)
                    ->with('admin_id',$admin_id)->with('mandatiert',$mandatiert)->with('mandatierturl',$mandatierturl)
                    ->with('id',$id)->with('vorsorge',$req->vorsorge)->with('grundversicherungP',$grundversicherungP)
                    ->with('retchsschutzP',$retchsschutzP)->with('vorsorgeP',$vorsorgeP)->with('zusatzversicherungP',$zusatzversicherungP)
                    ->with('hausratP',$hausratP)->with('autoversicherungP',$autoversicherungP);


            } else {
                if(in_array('backoffice',$urole) || in_array('admin',$urole)) {
                    family::find($id)->update(['first'=> 0]);
                    $pend = Pendency::find(Session::get('pend_id'));
                    $pend->completed = 1;
                    $pend->type = 'Eingereicht';
                    $pend->save();
                    $person = family::find($pend->family_id);
                    $person->status = "Done";
                    $person->save();
                    Pendency::where('family_id',$pend->family_id)->update(array('completed' => 1));
                    return redirect()->route('tasks');
                }
                else{
                    return redirect()->back();
                }
            }
        }
    }

    public function rejectupdate(Request $req){
        $pend = Pendency::find(Session::get('pend_id'));
        $pend->done = 0;
        $pend->completed = 0;
        $pend->save();
        return redirect()->route('tasks');
    }

    public function createLeadDataKK($leadIdd, $personIdd, Request $request, $pendency = false)
    {


        $id = Crypt::decrypt($personIdd) / 1244;
        $aufcnt = 0;
        $provcnt= 0;

        if ($request->status_PG1 != 'Offen (Berater)' || $request->status_PG1 != 'Offen (Innendienst)'){
            $today = Carbon::now()->format('Y/m/d');
        }else{
            $today = null;
        }

        $cnt =  newgegen::where('person_id',$id)->count() +1;
        $pcnt = 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $grundversicherungP = new CostumerProduktGrundversicherung();
            $grundversicherungP->person_id_PG = filter_var($id,FILTER_SANITIZE_STRING);
            $grundversicherungP->graduation_date_PG = $request->input('graduation_date_PG' . $i);
            $grundversicherungP->society_PG = filter_var($request->input('society_PG' . $i),FILTER_SANITIZE_STRING);
            $grundversicherungP->product_PG = filter_var($request->input('product_PG' . $i),FILTER_SANITIZE_STRING);
            $grundversicherungP->status_PG = filter_var($request->input('status_PG' . $i),FILTER_SANITIZE_STRING);
            $grundversicherungP->last_adjustment_PG = $today;
            $grundversicherungP->total_commisions_PG = (int)$request->input('total_commisions_PG' . $i);
            $grundversicherungP->save();
            $pcnt++;

        }



        if($request->status_PG == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PG == 'Aufgenomen') {
            $aufcnt++;
        }

        if ($request->status_PZ1 != 'Offen (Berater)' || $request->status_PZ1 != 'Offen (Innendienst)'){
            $today = Carbon::now()->format('Y/m/d');
        }else{
            $today = null;
        }

        $cnt =  newnue::where('person_id',$id)->count() +1;
        $pcnt = 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $zusatzversicherungP = new CostumerProduktZusatzversicherung();
            $zusatzversicherungP->person_id_PZ = $id;

            $zusatzversicherungP->graduation_date_PZ = $request->input('graduation_date_PZ' . $i);
            $zusatzversicherungP->society_PZ = filter_var($request->input('society_PZ' . $i),FILTER_SANITIZE_STRING);
            $zusatzversicherungP->produkt_PZ = filter_var($request->input('produkt_PZ' . $i),FILTER_SANITIZE_STRING);
            $zusatzversicherungP->vvg_premium_PZ = filter_var($request->input('vvg_premium_PZ' . $i),FILTER_SANITIZE_STRING);
            $zusatzversicherungP->duration_from_PZ = $request->input('duration_from_PZ' . $i);
            $zusatzversicherungP->duration_to_PZ = $request->input('duration_to_PZ' . $i);
            $zusatzversicherungP->status_PZ = filter_var($request->input('status_PZ' . $i),FILTER_SANITIZE_STRING);
            $zusatzversicherungP->last_adjustment_PZ = $today;
            $zusatzversicherungP->provision_PZ = filter_var($request->input('provision_PZ' . $i),FILTER_SANITIZE_STRING);
            $zusatzversicherungP->total_commisions_PZ = (int) $request->input('total_commisions_PZ' . $i);
            $zusatzversicherungP->save();
            $pcnt++;

        }


        if($request->statusPZ == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }   elseif($request->status_PG == 'Aufgenomen') {
            $aufcnt++;
        }
        if ($request->status_PA != 'Offen (Berater)' || $request->status_PA != 'Offen (Innendienst)'){
            $today = Carbon::now()->format('Y/m/d');
        }else{
            $today = null;
        }

        $autoversicherung = new CostumerProduktAutoversicherung();
        $autoversicherung->person_id_PA = $id;
        $autoversicherung->society_PA = filter_var($request->society_PA,FILTER_SANITIZE_STRING);
        $autoversicherung->beginning_insurance_PA = $request->beginning_insurance_PA;
        $autoversicherung->insurance_PA = filter_var($request->insurance_PA,FILTER_SANITIZE_STRING);
        $autoversicherung->status_PA = filter_var($request->status_PA,FILTER_SANITIZE_STRING);
        $autoversicherung->last_adjustment_PA = $today;
        $autoversicherung->total_commisions_PA = (int) filter_var($request->total_commisions_PA,FILTER_SANITIZE_STRING);

        if($request->status_PA == 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PA == 'Aufgenomen') {
            $aufcnt++;
        }
        if ($request->status_PV != 'Offen (Berater)' || $request->status_PV != 'Offen (Innendienst)'){
            $today = Carbon::now()->format('Y/m/d');
        }else{
            $today = null;
        }


        $vorsorgeP = new CostumerProduktVorsorge();
            $vorsorgeP->person_id_PV = $id;
            $vorsorgeP->graduation_date_PV= $request->graduation_date_PV;
            $vorsorgeP->begin_PV = $request->begin_PV;
            $vorsorgeP->society_PV = filter_var($request->society_PV,FILTER_SANITIZE_STRING);
            $vorsorgeP->pramie_PV = filter_var($request->pramie_PV,FILTER_SANITIZE_STRING);
            $vorsorgeP->payment_rythm_PV = filter_var($request->payment_rythm_PV,FILTER_SANITIZE_STRING);
            $vorsorgeP->duration_from_PV = $request->duration_from_PV;
            $vorsorgeP->duration_to_PV = $request->duration_to_PV;
            $vorsorgeP->production_PV = filter_var($request->production_PV,FILTER_SANITIZE_STRING);
            $vorsorgeP->status_PV = filter_var($request->status_PV,FILTER_SANITIZE_STRING);
            $vorsorgeP->last_adjustment_PV = $today;
            $vorsorgeP->total_commisions_PV = (int) filter_var($request->total_commisions_PV,FILTER_SANITIZE_STRING);


        if($request->status_PV == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PV == 'Aufgenomen') {
            $aufcnt++;
        }

        if ($request->status_PH != 'Offen (Berater)' || $request->status_PH != 'Offen (Innendienst)'){
            $today = Carbon::now()->format('Y/m/d');
        }else{
            $today = null;
        }

        $hausratP = new CostumerProduktHausrat();
            $hausratP->person_id_PH = $id;
            $hausratP->society_PH = filter_var($request->society_PH,FILTER_SANITIZE_STRING);
            $hausratP->beginning_insurance_PH = $request->beginning_insurance_PH;
            $hausratP->insurance_PH = filter_var($request->insurance_PH,FILTER_SANITIZE_STRING);
            $hausratP->status_PH = filter_var($request->status_PH,FILTER_SANITIZE_STRING);
            $hausratP->last_adjustment_PH = $today;
            $hausratP->total_commisions_PH = (int) filter_var($request->total_commisions_PH,FILTER_SANITIZE_STRING);

        if($request->status_PH == 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PH == 'Aufgenomen') {
            $aufcnt++;
        }
        if ($request->status_PR != 'Offen (Berater)' || $request->status_PR != 'Offen (Innendienst)'){
            $today = Carbon::now()->format('Y/m/d');
        }else{
            $today = null;
        }
        $retchsschutzP = new CostumerProduktRechtsschutz();
            $retchsschutzP->person_id_PR =$id;
            $retchsschutzP->graduation_date_PR = $request->graduation_date_PR;
            $retchsschutzP->society_PR = filter_var($request->society_PR,FILTER_SANITIZE_STRING);
            $retchsschutzP->produkt_PR = filter_var($request->produkt_PR,FILTER_SANITIZE_STRING);
            $retchsschutzP->status_PR = filter_var($request->status_PR,FILTER_SANITIZE_STRING);
            $retchsschutzP->last_adjustment_PR = $today;
            $retchsschutzP->total_commisions_PR = (int) filter_var($request->total_commisions_PR,FILTER_SANITIZE_STRING);

        if($request->status_PR == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PR == 'Aufgenomen') {
            $aufcnt++;
        }


        if($grundversicherungP->save() && $hausratP->save() && $retchsschutzP->save() && $vorsorgeP->save() &&
            $zusatzversicherungP->save() && $retchsschutzP->save() && $vorsorgeP->save() && $autoversicherung->save()
            && $hausratP->save()) {
            if($aufcnt > 0 || $provcnt > 0) $provisionert = 1; else $provisionert = 1;
            family::where('id',$id)->update(['kundportfolio'=>0,'provisionert' => $provisionert]);
        }else{
            return redirect()->back()->with('fail', 'Aktion nicht erledigt');
        }



        $offer = 0;
        $leadId = Crypt::decrypt($leadIdd);
        $leadId /= 1244;
        $personId = Crypt::decrypt($personIdd);
        $personId /= 1244;
        $newgcount = (int) $request->input('newgcount');
        $newncount = (int) $request->input('newncount');
        $request->hasFile('offer') ? $offer++ : $offer += 0;

        $person = family::find($personId);
        $del = LeadDataKK::where('person_id',$personId)->first();
        if($del){
            $del->delete();
        }
        if ($person->lead->assign_to_id == Auth::guard('admins')->user()->id || Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice') || Auth::guard('admins')->user()->hasRole('salesmanager') || Pendency::where('family_id', $personId)->first()->admin_id == Auth::user()->id) {
            LeadDataKK::create([
                'leads_id' => $leadId,
                'person_id' => $personId,
                'kundingung_durch_select' => filter_var($request->kundingung_durch_select,FILTER_SANITIZE_STRING),
                'mandatiert_select' => filter_var($request->mandatiert_select,FILTER_SANITIZE_STRING),
                'id_notwending_select' => filter_var($request->id_notwending_select,FILTER_SANITIZE_STRING),
                'kundigung_step_two' => filter_var($request->kundigung_step_two,FILTER_SANITIZE_STRING),
                'vorversicherer_select' => filter_var($request->vorversicherer_select,FILTER_SANITIZE_STRING),
                'vollmacht_select' => filter_var($request->vollmacht_select,FILTER_SANITIZE_STRING),
                'kundingurung_durch_file_dlf' => $request->kundingurung_durch_file_dlf ? $this->storeFile($request->file('kundingurung_durch_file_dlf'), FolderPaths::KK_FILES) : null,
                'kundingurung_durch_file_kunde' => $request->kundingurung_durch_file_kunde ? $this->storeFile($request->file('kundingurung_durch_file_kunde'), FolderPaths::KK_FILES) : null,
                'mandatiert_file' => $request->mandatiert_file ? $this->storeFile($request->file('mandatiert_file'), FolderPaths::KK_FILES) : null,
                'kranken_file' => $request->kranken_file ? $this->storeFile($request->file('kranken_file'), FolderPaths::KK_FILES) : null,
            ]);
            $del = LeadDataCounteroffered::where('person_id',$personId)->first();
            if($del){
                $del->delete();
            }
            LeadDataCounteroffered::create([
                'leads_id' => $leadId,
                'person_id' => $personId,
                'upload_police' => $request->upload_police ? $this->storeFile($request->input('upload_police'), FolderPaths::KK_FILES) : null,
                'comparison_type' => filter_var($request->comparison_type,FILTER_SANITIZE_STRING),
                'comment' => filter_var($request->commentFILTER_SANITIZE_STRING)
            ]);
            $del = LeadDataFahrzeug::where('person_id',$personId)->first();
            if($del){
                $del->delete();
            }
            LeadDataFahrzeug::create([
                'nuekommentar' => filter_var($request->nuekommentar,FILTER_SANITIZE_STRING),
                'mandatiert' => $request->mandatiert ? $this->storeFile($request->file('mandatiert'), FolderPaths::KK_FILES) : null,
                'leads_id' => $leadId,
                'person_id' => $personId,
                'upload_police' => $request->upload_policeFahrzeug ? $this->storeFile($request->file('upload_policeFahrzeug'), FolderPaths::KK_FILES) : null,
                'vehicle_id' => $request->vehicle_id ? $this->storeFile($request->file('vehicle_id'), FolderPaths::KK_FILES) : null,
                'leasing' => filter_var($request->leasing,FILTER_SANITIZE_STRING),
                'leasing_name' => filter_var($request->leasing_name,FILTER_SANITIZE_STRING),
                'year_of_purchase' => filter_var($request->year_of_purchase,FILTER_SANITIZE_STRING),
                'placing_on_the_market' => filter_var($request->placing_on_the_market,FILTER_SANITIZE_STRING),
                'insurance_date' => $request->insurance_date,
                'redeemed' => filter_var($request->redeemed,FILTER_SANITIZE_STRING),
                'km_stood' => filter_var($request->km_stood,FILTER_SANITIZE_STRING),
                'issue_date' => filter_var($request->issue_date,FILTER_SANITIZE_STRING),
                'nationality' => filter_var($request->nationality,FILTER_SANITIZE_STRING),
                'most_common' => filter_var($request->most_common,FILTER_SANITIZE_STRING),
                'insurance' => filter_var($request->insurance,FILTER_SANITIZE_STRING),
                'deductible' => filter_var($request->deductible,FILTER_SANITIZE_STRING),
                'carried' => filter_var($request->carried,FILTER_SANITIZE_STRING),
                'repair_shop' => filter_var($request->repair_shop,FILTER_SANITIZE_STRING),
                'accident_coverage' => filter_var($request->accident_coverage,FILTER_SANITIZE_STRING),
                'traffic_legal_protection' => filter_var($request->traffic_legal_protection,FILTER_SANITIZE_STRING),
                'grossly' => filter_var($request->grossly,FILTER_SANITIZE_STRING),
                'glass_protection' => filter_var($request->glass_protection,FILTER_SANITIZE_STRING),
                'parking_damage' => filter_var($request->parking_damage,FILTER_SANITIZE_STRING),
                'hour_breakdown_assistance' => filter_var($request->hour_breakdown_assistance,FILTER_SANITIZE_STRING),
                'comment' => filter_var($request->commentFahrenzug,FILTER_SANITIZE_STRING),
                'first_intro' => filter_var($request->first_intro,FILTER_SANITIZE_STRING),
                'offer' => $request->hasFile('offer') ? $this->storeFile($request->file('offer'),FolderPaths::KK_FILES) : null,
                'vergleichsart_select' => $request->vergleichsart_select
            ]);
            $del = LeadDataThings::where('person_id',$personId)->first();
            if($del){
                $del->delete();
            }
            LeadDataThings::create([
                'leads_id' => $leadId,
                'person_id' => $personId,
                'nationality' => filter_var($request->nationality_sachen,FILTER_SANITIZE_STRING),
                'residence_permit' => filter_var($request->residence_permit,FILTER_SANITIZE_STRING),
                'telephone_nr' => filter_var($request->telephone_nr,FILTER_SANITIZE_STRING),
                'email' => filter_var($request->email,FILTER_SANITIZE_STRING),
                'zivilstand' => filter_var($request->zivilstand,FILTER_SANITIZE_STRING),
                'employment_relationship' => filter_var($request->employment_relationship,FILTER_SANITIZE_STRING),
                'job' => filter_var($request->job,FILTER_SANITIZE_STRING),
                'payment_frequency' => filter_var($request->payment_frequency,FILTER_SANITIZE_STRING),
                'amount_per_month' => filter_var($request->amount_per_month,FILTER_SANITIZE_STRING),
                'share_guarantee' => filter_var($request->share_guarantee,FILTER_SANITIZE_STRING),
                'start_of_contract' => filter_var($request->start_of_contract,FILTER_SANITIZE_STRING),
                'premium_exemption' => filter_var($request->premium_exemption,FILTER_SANITIZE_STRING),
                'eu_pension' => filter_var($request->eu_pension,FILTER_SANITIZE_STRING),
                'death_benefit' => filter_var($request->death_benefit,FILTER_SANITIZE_STRING),
                'smoker' => filter_var($request->smoker,FILTER_SANITIZE_STRING),
                'desired' => filter_var($request->desired,FILTER_SANITIZE_STRING),
            ]);
            $del = LeadDataPrevention::where('person_id',$personId)->first();
            if($del){
                $del->delete();
            }
            LeadDataPrevention::create([
                'leads_id' => $leadId,
                'person_id' => $personId,
                'upload_police' => $request->upload_police__ ? $this->storeFile($request->file('upload_police__'), FolderPaths::KK_FILES) : null,
                'comparison_type' => filter_var($request->comparison_type,FILTER_SANITIZE_STRING),
                'comment' => filter_var($request->comment__,FILTER_SANITIZE_STRING),
                'newoffer' => $request->newoffer ? $this->storeFile($request->file('newoffer'), FolderPaths::KK_FILES) : null,
                'number_of_people' => $request->number_of_people,
                'number_of_rooms' => $request->number_of_rooms,
                'sum_insured' => filter_var($request->sum_insured,FILTER_SANITIZE_STRING),
                'desired_additional_coverage' => filter_var($request->desired_additional_coverage,FILTER_SANITIZE_STRING),
                'personal_liability' => filter_var($request->personal_liability,FILTER_SANITIZE_STRING),
                'society' => filter_var($request->society,FILTER_SANITIZE_STRING),
                'n_of_p_legal_protection' => filter_var($request->n_of_p_legal_protection,FILTER_SANITIZE_STRING),
                'Hvergleichsart_select' => filter_var($request->Hvergleichsart_select,FILTER_SANITIZE_STRING),
            ]);
            $family = family::where('id', $personId)->first();
            $status = ['status' => 'Submited'];
            $family->update($status);

            for($i = 1; $i <= $newgcount; $i++){
                $file = $request->file('upload_policeFahrzeug' . $i);
                $request->hasFile('offer' . $i) ? $offer++ : $offer += 0;
                newgegen::create([
                    'comparison_type' => $request->input('comparison_type' . $i) ? filter_var($request->input('comparison_type' . $i),FILTER_SANITIZE_STRING) : null,
                    'upload_policeFahrzeug' => $request->hasFile('upload_policeFahrzeug' . $i) ? $this->storeFile($file, FolderPaths::KK_FILES) : null,
                    'commentFahrenzug' => $request->input('commentFahrenzug' . $i) ? filter_var($request->input('commentFahrenzug' . $i),FILTER_SANITIZE_STRING) : "",
                    'offer' => $request->file('offer'. $i) ? $this->storeFile($request->file('offer' . $i),FolderPaths::KK_FILES) : "",
                    'person_id' => $personId,
                    'vergleichsart_select' => filter_var($request->input('vergleichsart_select', $i),FILTER_SANITIZE_STRING)
                ]);
            }
            for($i = 1; $i <= $newncount; $i++){
                newnue::create([
                    'nuekommentar' => filter_var($request->input('nuekommentar' . $i),FILTER_SANITIZE_STRING),
                    'person_id' => $personId,
                    'first_intro' => filter_var($request->input('first_intro'. $i),FILTER_SANITIZE_STRING),
                    'vehicle_id' => $request->hasFile('vehicle_id' . $i) ? $this->storeFile($request->file('vehicle_id' . $i),FolderPaths::KK_FILES) : null,
                    'leasing' => filter_var($request->input('leasing' . $i),FILTER_SANITIZE_STRING),
                    'leasing_name' => filter_var($request->input('leasing_name' .$i),FILTER_SANITIZE_STRING),
                    'year_of_purchase' => filter_var($request->input('year_of_purchase' . $i),FILTER_SANITIZE_STRING),
                    'placing_on_the_market' => filter_var($request->input('placing_on_the_market' . $i),FILTER_SANITIZE_STRING),
                    'nationality' => filter_var($request->input('nationality' . $i),FILTER_SANITIZE_STRING),
                    'insurance_date' => $request->input('insurance_date' . $i),
                    'most_common' => filter_var($request->input('most_common' . $i),FILTER_SANITIZE_STRING),
                    'redeemed' => filter_var($request->input('redeemed' . $i),FILTER_SANITIZE_STRING),
                    'km_stood' => filter_var($request->input('km_stood' . $i),FILTER_SANITIZE_STRING),
                    'insurance' => filter_var($request->input('insurance' . $i),FILTER_SANITIZE_STRING),
                    'traffic_legal_protection' => filter_var($request->input('traffic_legal_protection' . $i),FILTER_SANITIZE_STRING),
                    'deductible' => filter_var($request->input('deductible' . $i),FILTER_SANITIZE_STRING),
                    'glass_protection' => filter_var($request->input('glass_protection' . $i),FILTER_SANITIZE_STRING),
                    'carried' => filter_var($request->input('carried' . $i),FILTER_SANITIZE_STRING),
                    'parking_damage' => filter_var($request->input('parking_damage' . $i),FILTER_SANITIZE_STRING),
                    'repair_shop' => filter_var($request->input('repair_shop' . $i),FILTER_SANITIZE_STRING),
                    'hour_breakdown_assistance' => filter_var($request->input('hour_breakFILTER_SANITIZE_STRING),down_assistance' . $i),FILTER_SANITIZE_STRING),
                    'accident_coverage' => filter_var($request->input('accident_coverage' . $i),FILTER_SANITIZE_STRING),
                ]);
            }
            $pend = Pendency::where('family_id', $personId)->first();
            if ($pend) {
                $pend->done = 1;
                $pend->type = 'Eingereicht';
                $pend->kranken_skip = $request->krankenSkip;
                $pend->auto_skip = $request->autoSkip;
                $pend->vorsorge_skip = $request->vorsorgenSkip;
                $pend->sachen_skip = $request->sachenSkip;
                $pend->save();
            }else {
                $pend = new Pendency();
                $pend->admin_id = Auth::user()->id;
                $pend->family_id = $personId;
                $pend->done = 1;
                $pend->kranken_skip = $request->krankenSkip;
                $pend->auto_skip = $request->autoSkip;
                $pend->vorsorge_skip = $request->vorsorgenSkip;
                $pend->sachen_skip = $request->sachenSkip;
                $pend->type = 'Eingereicht';
                $pend->save();
            }

            $person = family::find($pend->family_id);
            $person->status = "Done";
            $person->save();

            $bo = Admins::role(['backoffice','admin'])->get();
            foreach($bo as $b){
                $url =  '<a href="'  . route("leadfamilyperson",[Crypt::encrypt($personId * 1244),"admin_id" => Crypt::encrypt(Pendency::find($pend->id)->admin_id * 1244),"pend_id" => Pendency::find($pend->id)->id]) . '"> Dokumentation für :' . family::find($personId)->first_name . ' wurde eingereicht </a>';
                $b->notify(new SendNotificationn($url));
            }
            if($offer > 0){
                $url =  '<a href="'  . route("leadfamilyperson",[Crypt::encrypt($personId * 1244),"admin_id" => Crypt::encrypt(Pendency::find($pend->id)->admin_id * 1244),"pend_id" => Pendency::find($pend->id)->id]) . '"> Das erhaltene Angebot für den Kunden :' . family::find($personId)->first_name . ' wurde eingereicht </a>';
                Admins::find($pend->admin_id)->notify(new SendNotificationn($url));
                $pend1 = new Pendency();
                $pend1->admin_id = $pend->admin_id;
                $pend1->family_id = $pend->family_id;
                $pend1->description = 'Offer';
                $pend1->type = 'Offer';
                $pend1->save();
            }
            return redirect()->route('dashboard')->with('success', 'Erfolgreich eingereicht und wartet auf das Backoffice!');
        } else {
            return redirect()->back();
        }
    }


    public function updateLeadDataKK($leadId, $personId, Request $request,$vorsorge = false)
    {

        
        $id = Crypt::decrypt($personId) / 1244;
        $leadId = Crypt::decrypt($leadId) / 1244;
        $personId = Crypt::decrypt($personId) / 1244;

        $oldGrund = CostumerProduktGrundversicherung::find($id);
        $oldZus = CostumerProduktZusatzversicherung::find($id);
        $oldAuto = CostumerProduktAutoversicherung::find($id);
        $oldHaus = CostumerProduktHausrat::find($id);
        $oldVor = CostumerProduktVorsorge::find($id);
        $oldRecht = CostumerProduktRechtsschutz::find($id);
        $oldKK = LeadDataKK::where('person_id',$personId)->first();
        $oldCOF = LeadDataCounteroffered::where('person_id',$personId)->first();
        $oldFahr = LeadDataFahrzeug::where('person_id',$personId)->first();
        $oldThings = LeadDataThings::where('person_id',$personId)->first();
        $oldRech = LeadDataRech::where('person_id',$personId)->first();
        $oldPrev = LeadDataPrevention::where('person_id',$personId)->first();
        $collect = collect();

        $totalOld = $collect->merge($oldGrund)->merge($oldZus)->merge($oldRecht)->merge($oldFahr)->merge($oldAuto)->merge($oldThings)->merge($oldVor)->merge($oldPrev)->merge($oldHaus)->merge($oldKK)->merge($oldRech)->merge($oldCOF);

        LogsActivity::create([
            'edited_from' => Auth::user()->id,
            'person_id' => $id,
            'old_data'=> json_encode($totalOld->except(['id','created_at','updated_at','admin_id','prov_id','krank_id','skiped','person_id_PG','person_id_PA','person_id_PZ','person_id_PH','person_id_PV','selected','stoiner_PG','stoiner_PA','stoiner_PZ','leads_id','person_id','stoiner_PH','stoiner_PV','accepted','imported','provision_PZ2','last_adjustment_PZ2','status_PZ2','duration_to_PZ2','duration_from_PZ2','vvg_premium_PZ2','produkt_PZ2'])),
            'new_data' => json_encode($request->except(['_method','_token','newgcount','newncount','nofert','gofert','admin_id'])),
            'description' => 'Client Form Updated',
            'type' => 1
        ]);

        family::find($id)->update(['first'=> 0]);
        $aufcnt = 0;
        $provcnt = 0;
        $pcnt = 1;

        if($request->input('status_PG' . $pcnt) != 'Offen (Innendienst)' || $request->status_PZ != 'Offen (Innendienst)' || $request->input('status_PA' . $pcnt) != 'Offen (Innendienst)' || $request->status_PH != 'Offen (Innendienst)' || $request->status_PR != 'Offen (Innendienst)' || $request->status_PV != 'Offen (Innendienst)'){
            family::find($id)->update(['status_changed'=>1]);
        }
    
        Pendency::where('family_id',$id)->update(array('completed'=>1));
        $statusGrund = CostumerProduktGrundversicherung::select('status_PG','last_adjustment_PG')->where('person_id_PG',$id)->first();

        if ($request->status_PG1 != $statusGrund->status_PG){
            if ($statusGrund->status_PG == null){
                $todayG = $statusGrund->last_adjustment_PG;
            }else{
                $todayG = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayG = $statusGrund->last_adjustment_PG;
        }
        
        foreach (CostumerProduktGrundversicherung::where('person_id_PG',$id)->get() as $objekt){
            $objekt->graduation_date_PG = $request->input('graduation_date_PG' . $pcnt);
            $objekt->society_PG = filter_var($request->input('society_PG' . $pcnt),FILTER_SANITIZE_STRING);
            $objekt->product_PG = filter_var($request->input('product_PG' . $pcnt),FILTER_SANITIZE_STRING);

            if($request->input('status_PG' . $pcnt) == 'Storniert'){
                $objekt->stoiner_PG = filter_var($request->input('status_PG' . $pcnt),FILTER_SANITIZE_STRING);
            }else{
                $objekt->status_PG = filter_var($request->input('status_PG' . $pcnt),FILTER_SANITIZE_STRING);
            }
            $objekt->last_adjustment_PG= $todayG;
            $objekt->total_commisions_PG = (int) filter_var($request->input('total_commisions_PG' . $pcnt),FILTER_SANITIZE_STRING);
            $objekt->save();
            $pcnt++;
        }

        if($request->status_PG1 == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PG1 == 'Aufgenomen') {
            $aufcnt++;
        }

        $statusZus = CostumerProduktZusatzversicherung::select('status_PZ','last_adjustment_PZ')->where('person_id_PZ',$id)->first();

        if ($request->status_PZ1 != $statusZus->status_PZ){
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
        // $pcnt = 1;


        $zusat = CostumerProduktZusatzversicherung::where('person_id_PZ',$id)->update([
            'graduation_date_PZ'=> $request->graduation_date_PZ,
            'society_PZ' => $request->society_PZ,
            'produkt_PZ'=> filter_var($request->produkt_PZ,FILTER_SANITIZE_STRING),
            'vvg_premium_PZ'=> filter_var($request->vvg_premium_PZ,FILTER_SANITIZE_STRING),
            'duration_from_PZ'=> $request->duration_from_PZ,
            'duration_to_PZ'=>  $request->duration_to_PZ,
            'last_adjustment_PZ'=> $todayZ,
            'provision_PZ'=> filter_var($request->provision_PZ,FILTER_SANITIZE_STRING),
             $table_PZ => filter_var($request->status_PZ,FILTER_SANITIZE_STRING),
            'total_commisions_PZ'=> (int) $request->total_commisions_PZ,
        ]);


        // foreach (CostumerProduktZusatzversicherung::where('person_id_PZ',$id)->get() as $objekt){
        //     $objekt->graduation_date_PZ = $request->input('graduation_date_PZ' . $pcnt);
        //     $objekt->society_PZ = filter_var($request->input('society_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     $objekt->produkt_PZ = filter_var($request->input('produkt_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     $objekt->vvg_premium_PZ = filter_var($request->input('vvg_premium_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     $objekt->duration_from_PZ= $request->input('duration_from_PZ' . $pcnt);
        //     $objekt->duration_to_PZ = $request->input('duration_to_PZ' . $pcnt);

        //     if($request->input('status_PZ' . $pcnt) == 'Storniert'){
        //         $objekt->stoiner_PZ = filter_var($request->input('status_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     }else{
        //         $objekt->status_PZ = filter_var($request->input('status_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     }

        //     $objekt->last_adjustment_PZ = $todayZ;
        //     $objekt->provision_PZ = filter_var($request->input('provision_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     $objekt->total_commisions_PZ = (int) filter_var($request->input('total_commisions_PZ' . $pcnt),FILTER_SANITIZE_STRING);
        //     $objekt->save();
        //     $pcnt++;
        // }

        if($request->status_PZ == 'Provisionert'){

            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PZ == 'Aufgenomen') {
            $aufcnt++;
        }

        if($aufcnt > 0 || $provcnt > 0){
            $famely = family::find($id);
            $famely->provisionert = 1;
            $famely->save();
        }

        $statusAuto = CostumerProduktAutoversicherung::select('status_PA','last_adjustment_PA')->where('person_id_PA',$id)->first();

        if ($request->status_PA1 != $statusAuto->status_PA){
            if ($statusAuto->status_PA == null){
                $todayA = $statusAuto->last_adjustment_PA;
            }else{
                $todayA = Carbon::now()->format('Y/m/d');
            }
        }else{
            $todayA = $statusAuto->last_adjustment_PA;
        }

        $pcntt = 1;
        foreach (CostumerProduktAutoversicherung::where('person_id_PA',$id)->get() as $objekt){
            $objekt->society_PA= filter_var($request->input('society_PA' . $pcntt),FILTER_SANITIZE_STRING);
            $objekt->beginning_insurance_PA = $request->input('beginning_insurance_PA' . $pcntt);
            $objekt->insurance_PA= filter_var($request->input('insurance_PA' . $pcntt),FILTER_SANITIZE_STRING);
            if($request->input('status_PA' . $pcntt) == 'Storniert'){
                $objekt->stoiner_PA= filter_var($request->input('status_PA' . $pcntt),FILTER_SANITIZE_STRING);
            }else{
                $objekt->status_PA= filter_var($request->input('status_PA' . $pcntt),FILTER_SANITIZE_STRING);
            }
            $objekt->last_adjustment_PA= $todayA;
            $objekt->total_commisions_PA= (int) filter_var($request->input('total_commisions_PA' . $pcntt),FILTER_SANITIZE_STRING);
            $objekt->save();
            $pcntt++;
        }
        if($request->status_PA == 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
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
            'total_commisions_PV'=> (int) filter_var($request->total_commisions_PV,FILTER_SANITIZE_STRING)
        ]);
        if($request->status_PV == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PV == 'Aufgenomen') {
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

        $table_PR = null;
        if($request->status_PR == 'Storniert'){
            $table_PR =  'stoiner_PR';
        }else{
            $table_PR = 'status_PR'; 
        }

        $retchsschutzP = CostumerProduktRechtsschutz::where('person_id_PR',$id)->update([
            'graduation_date_PR'=> $request->graduation_date_PR,
            'society_PR' => filter_var($request->society_PR,FILTER_SANITIZE_STRING),
            'produkt_PR'=> filter_var($request->produkt_PR,FILTER_SANITIZE_STRING),
             $table_PR => filter_var($request->status_PR,FILTER_SANITIZE_STRING),
            'last_adjustment_PR'=> $todayR,
            'total_commisions_PR'=> (int) filter_var($request->total_commisions_PR,FILTER_SANITIZE_STRING)
        ]);
        if($request->status_PR == 'Provisionert'){
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
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
        $hausratP = CostumerProduktHausrat::where('person_id_PH',$id)->update([
            'society_PH'=> filter_var($request->society_PH,FILTER_SANITIZE_STRING),
            'beginning_insurance_PH' => $request->beginning_insurance_PH,
            'insurance_PH'=> filter_var($request->insurance_PH,FILTER_SANITIZE_STRING),
             $table_PH => filter_var($request->status_PH,FILTER_SANITIZE_STRING),
            'last_adjustment_PH'=> $todayH,
            'total_commisions_PH'=> (int) filter_var($request->total_commisions_PH,FILTER_SANITIZE_STRING),
        ]);
        if($request->status_PH == 'Provisionert'){
            $provcnt++;
            $familyperson = family::find($id)->lead->assign_to_id;
            $url = '<a href="' . route("costumer_form",[Crypt::encrypt($id * 1244)]) . '"> Ihr Kunde :' . family::find($id)->first_name . ' wurde bereitgestellt </a>';
            Admins::find($familyperson)->notify(new SendNotificationn($url));
        }
        elseif($request->status_PG == 'Aufgenomen') {
            $aufcnt++;
        }




        $pend = Pendency::find(Session::get('pend_id'));
        if($pend->completed == 0) {
            $pend->done = 1;
            $pend->type = "Aktualisiert";
            $pend->save();
        }
//        else{
//            Pendency::create(['done' => 0,'type'=>'Task','title'=> $pend->title, 'description'=> $pend->description,'admin_id'=> $pend->admin_id,'family_id'=> $pend->family_id]);
//        }


        $offer = 0;

        $existingLeadDataKK = LeadDataKK::where('person_id', $personId)->latest()->first();
        $admin_id = Crypt::decrypt($request->admin_id) / 1244;
        $leadDataKK = [
            'leads_id' => $leadId,
            'person_id' => $personId,
//            'pre_insurer' => $request->hasFile('pre_insurer') ? $this->storeFile($request->pre_insurer, FolderPaths::KK_FILES) : $existingLeadDataKK->pre_insurer,
//            'id_required' => $request->hasFile('id_required') ? $this->storeFile($request->id_required, FolderPaths::KK_FILES) : $existingLeadDataKK->id_required,
//            'notice_by' => $request->hasFile('notice_by') ? $this->storeFile($request->notice_by, FolderPaths::KK_FILES) : $existingLeadDataKK->notice_by,
//            'power_of_attorney' => $request->hasFile('power_of_attorney') ? $this->storeFile($request->power_of_attorney, FolderPaths::KK_FILES) : $existingLeadDataKK->power_of_attorney,
            'kundingung_durch_select' => filter_var($request->kundingung_durch_select,FILTER_SANITIZE_STRING),
            'mandatiert_select' => filter_var($request->mandatiert_select,FILTER_SANITIZE_STRING),
            'id_notwending_select' => filter_var($request->id_notwending_select,FILTER_SANITIZE_STRING),
            'kundigung_step_two' => filter_var($request->kundigung_step_two,FILTER_SANITIZE_STRING),
            'vorversicherer_select' => filter_var($request->vorversicherer_select,FILTER_SANITIZE_STRING),
            'vollmacht_select' => filter_var($request->vollmacht_select,FILTER_SANITIZE_STRING),
            'kundingurung_durch_file_dlf' => $request->kundingurung_durch_file_dlf ? $this->storeFile($request->file('kundingurung_durch_file_dlf'), FolderPaths::KK_FILES) : $existingLeadDataKK->kundingurung_durch_file_dlf,
            'kundingurung_durch_file_kunde' => $request->kundingurung_durch_file_kunde ? $this->storeFile($request->file('kundingurung_durch_file_kunde'), FolderPaths::KK_FILES) : $existingLeadDataKK->kundingurung_durch_file_kunde,
            'mandatiert_file' => $request->mandatiert_file ? $this->storeFile($request->file('mandatiert_file'), FolderPaths::KK_FILES) : $existingLeadDataKK->mandatiert_file,
            'kranken_file' => $request->kranken_file ? $this->storeFile($request->file('kranken_file'), FolderPaths::KK_FILES) : $existingLeadDataKK->kranken_file,
        ];
        if ($existingLeadDataKK) {
            $existingLeadDataKK->update($leadDataKK);
        }
        $count = (int) $request->input('newgcount');
        if($request->gofert != null){
            $garray = explode(',',$request->gofert);
            foreach($garray as $gofert){
                $newg = newgegen::find($gofert);
                if($newg){
                    $newg->delete();
                }
            }
        }
        $gegen = newgegen::where('person_id',$personId)->get();
        for($i = 0; $i< $count; $i++){
            $curr = $i+1;

            if(isset($gegen[$i])){

                $file = $request->file('upload_policeFahrzeug'. $curr);
                $gegen[$i]->upload_policeFahrzeug = $request->hasFile('upload_policeFahrzeug'. $curr) ? $this->storeFile($file,FolderPaths::KK_FILES) : $gegen[$i]->upload_policeFahrzeug;
                $gegen[$i]->comparison_type = $request->input('comparison_type' . $curr) ? $request->input('comparison_type' . $curr) : $gegen[$i]->comparison_type;
                $gegen[$i]->commentFahrenzug = $request->input('commentFahrenzug' . $curr) ? $request->input('commentFahrenzug' . $curr) : $gegen[$i]->commentFahrenzug;
                $gegen[$i]->offer = $request->file('offer' . $curr) ? $this->storeFile($request->file('offer' . $curr),FolderPaths::KK_FILES) : $gegen[$i]->offer;
                $gegen[$i]->vergleichsart_select =$request->input('vergleichsart_select' . $curr);
                $request->hasFile('offer' .$i) && !isset($gegen[$i]->offer) ? $offer++ : $offer += 0;
                $gegen[$i]->save();
            }
            else{
                $gegen = new newgegen();
                $file = $request->file('upload_policeFahrzeug'. $curr);
                $gegen->upload_policeFahrzeug = $request->hasFile('upload_policeFahrzeug'. $curr) ? $this->storeFile($file,FolderPaths::KK_FILES) : null;
                $gegen->comparison_type = $request->input('comparison_type' . $curr) ? $request->input('comparison_type' . $curr) : null;
                $gegen->commentFahrenzug = $request->input('commentFahrenzug' . $curr) ? $request->input('commentFahrenzug' . $curr) : null;
                $gegen->person_id = $personId;
                $gegen->offer = $request->file('offer' . $curr) ? $this->storeFile($request->file('offer'. $curr),FolderPaths::KK_FILES) : null;
                $gegen->vergleichsart_select = $request->input('vergleichsart_select' . $curr);
                $gegen->save();
                $request->hasFile('offer' . $curr) ? $offer++ : $offer += 0;
                $admin = CostumerProduktAutoversicherung::select('admin_id')->where('person_id_PA',$personId)->first();
                CostumerProduktAutoversicherung::create([
                    'person_id_PA' => $personId,
                    'status_PA' => 'Offen (Innendienst)',
                    'admin_id' => $admin->admin_id
                ]);
            }
        }



        $count = (int) $request->input('newncount');
        if($request->nofert != null){
            $narray = explode(',',$request->nofert);
            foreach($narray as $nofert){
                $newn = newgegen::find($nofert);
                if($newn){
                    $newn->delete();
                }
            }
        }

        
        $cc = 0;
        $gegen = newnue::where('person_id',$personId)->get();
      
        for($i = 0; $i < $count; $i++){
            if(!empty($gegen[$i])){
                $file = $request->file('vehicle_id'. $i);
                $gegen[$i]->nationality = $request->input('nationality' . $i) ? $request->input('nationality' . $i) : $gegen[$i]->nationality;
                $gegen[$i]->nuekommentar = $request->input('nuekommentar' . $i) ? $request->input('nuekommentar' . $i) : $gegen[$i]->nuekommentar;
                $gegen[$i]->vehicle_id = $request->hasFile('vehicle_id'. $i) ? $this->storeFile($file,FolderPaths::KK_FILES) : $gegen[$i]->vehicle_id;
                $gegen[$i]->leasing = $request->input('leasing' . $i) ? $request->input('leasing' . $i) : $gegen[$i]->leasing;
                $gegen[$i]->leasing_name = $request->input('leasing_name' . $i) ? $request->input('leasing_name' . $i) : $gegen[$i]->leasing_name;
                $gegen[$i]->year_of_purchase = $request->input('year_of_purchase' . $i) ? $request->input('year_of_purchase' . $i) : $gegen[$i]->year_of_purchase;
                $gegen[$i]->placing_on_the_market = $request->input('placing_on_the_market' . $i) ? $request->input('placing_on_the_market' . $i) : $gegen[$i]->placing_on_the_market;
                $gegen[$i]->nationality = $request->input('nationality' . $i) ? $request->input('nationality' . $i) : $gegen[$i]->nationality;
                $gegen[$i]->insurance_date = $request->input('insurance_date' . $i) ? $request->input('insurance_date' . $i) : $gegen[$i]->insurance_date;
                $gegen[$i]->most_common = $request->input('most_common' . $i) ? $request->input('most_common' . $i) : $gegen[$i]->most_common;
                $gegen[$i]->redeemed = $request->input('redeemed' . $i) ? $request->input('redeemed' . $i) : $gegen[$i]->redeemed;
                $gegen[$i]->km_stood = $request->input('km_stood' . $i) ? $request->input('km_stood' . $i) : $gegen[$i]->km_stood;
                $gegen[$i]->insurance = $request->input('insurance' . $i) ? $request->input('insurance' . $i) : $gegen[$i]->insurance;
                $gegen[$i]->traffic_legal_protection = $request->input('traffic_legal_protection' . $i) ? $request->input('traffic_legal_protection' . $i) : $gegen[$i]->traffic_legal_protection;
                $gegen[$i]->deductible = $request->input('deductible' . $i) ? $request->input('deductible' . $i) : $gegen[$i]->deductible;
                $gegen[$i]->grossly = $request->input('grossly' . $i) ? $request->input('grossly' . $i) : $gegen[$i]->grossly;
                $gegen[$i]->glass_protection = $request->input('glass_protection' . $i) ? $request->input('glass_protection' . $i) : $gegen[$i]->glass_protection;
                $gegen[$i]->carried = $request->input('carried' . $i) ? $request->input('carried' . $i) : $gegen[$i]->carried;
                $gegen[$i]->parking_damage = $request->input('parking_damage' . $i) ? $request->input('parking_damage' . $i) : $gegen[$i]->parking_damage;
                $gegen[$i]->repair_shop = $request->input('repair_shop' . $i) ? $request->input('repair_shop' . $i) : $gegen[$i]->repair_shop;
                $gegen[$i]->hour_breakdown_assistance = $request->input('hour_breakdown_assistance' . $i) ? $request->input('hour_breakdown_assistance' . $i) : $gegen[$i]->hour_breakdown_assistance;
                $gegen[$i]->accident_coverage = $request->input('accident_coverage' . $i) ? $request->input('accident_coverage' . $i) : $gegen[$i]->accident_coverage;
                $gegen[$i]->save();
            }
            else{
                $i2 = $i+1;
                $gegenn = new newnue();
                $file = $request->file('vehicle_id'. $i2);
                $gegenn->nuekommentar = $request->input('nuekommentar' . $i2);
                $gegenn->first_intro = $request->input('first_intro' . $i2);
                $gegenn->vehicle_id = $request->file('vehicle_id'.$i2);
                $gegenn->leasing = $request->input('leasing' . $i2);
                $gegenn->leasing_name = $request->input('leasing_name' . $i2);
                $gegenn->year_of_purchase = $request->input('year_of_purchase' . $i2);
                $gegenn->placing_on_the_market = $request->input('placing_on_the_market' . $i2);
                $gegenn->nationality = $request->input('nationality' . $i2);
                $gegenn->insurance_date = $request->input('insurance_date' . $i2);
                $gegenn->most_common = $request->input('most_common' . $i2);
                $gegenn->redeemed = $request->input('redeemed' . $i2);
                $gegenn->km_stood = $request->input('km_stood' . $i2) ;
                $gegenn->insurance = $request->input('insurance' . $i2);
                $gegenn->traffic_legal_protection = $request->input('traffic_legal_protection' . $i2);
                $gegenn->deductible = $request->input('deductible' . $i2);
                $gegenn->grossly = $request->input('grossly' . $i2);
                $gegenn->glass_protection = $request->input('glass_protection' . $i2);
                $gegenn->carried = $request->input('carried' . $i2);
                $gegenn->parking_damage = $request->input('parking_damage' . $i2);
                $gegenn->repair_shop = $request->input('repair_shop' . $i2);
                $gegenn->hour_breakdown_assistance = $request->input('hour_breakdown_assistance' . $i2);
                $gegenn->accident_coverage = $request->input('accident_coverage' . $i2);
                $gegenn->person_id = $personId;
                $gegenn->save();

            }

        }
     


        $existingLeadDataCounterOffered = LeadDataCounteroffered::where('person_id', $personId)->latest()->first();

        $leadDataCounteroffered = [
            'leads_id' => $leadId,
            'person_id' => $personId,
            'upload_police' => $request->hasFile('upload_police') ? $this->storeFile($request->upload_police, FolderPaths::KK_FILES) : $existingLeadDataCounterOffered->upload_police,
            'comparison_type' => $request->comparison_type,
            'comment' => $request->comment
        ];


        if ($existingLeadDataCounterOffered) {
            $existingLeadDataCounterOffered->update($leadDataCounteroffered);
        }

        $existingLeadDataFahrzeug = LeadDataFahrzeug::where('person_id', $personId)->latest()->first();
        $request->hasFile('offer') && !isset($existingLeadDataFahrzeug->offer) ? $offer++ : $offer += 0;
        $leadDataFahrzeug = [
            'mandatiert' => $request->hasFile('mandatiert') ? $this->storeFile($request->mandatiert, FolderPaths::KK_FILES) : $existingLeadDataFahrzeug->mandatiert,
            'leads_id' => $leadId,
            'person_id' => $personId,
            'upload_police' => $request->hasFile('upload_policeFahrzeug') ? $this->storeFile($request->upload_policeFahrzeug, FolderPaths::KK_FILES) : $existingLeadDataFahrzeug->upload_police,
            'vehicle_id' => $request->hasFile('vehicle_id') ? $this->storeFile($request->file('vehicle_id'), FolderPaths::KK_FILES) : $existingLeadDataFahrzeug->vehicle_id,
            'leasing' => $request->leasing ? $request->leasing : $existingLeadDataFahrzeug->leasing,
            'leasing_name' => $request->leasing_name ? $request->leasing_name : $existingLeadDataFahrzeug->leasing,
            'year_of_purchase' => $request->year_of_purchase,
            'placing_on_the_market' => $request->placing_on_the_market,
            'first_intro' => $request->first_intro,
            'insurance_date' => $request->insurance_date,
            'redeemed' => $request->redeemed,
            'km_stood' => $request->km_stood,
            'issue_date' => $request->issue_date,
            'nationality' => $request->nationality,
            'most_common' => $request->most_common,
            'insurance' => $request->insurance,
            'deductible' => $request->deductible,
            'carried' => $request->carried,
            'repair_shop' => $request->repair_shop,
            'accident_coverage' => $request->accident_coverage,
            'traffic_legal_protection' => $request->traffic_legal_protection,
            'grossly' => $request->grossly,
            'glass_protection' => $request->glass_protection,
            'parking_damage' => $request->parking_damage,
            'hour_breakdown_assistance' => $request->hour_breakdown_assistance,
            'comment' => $request->commentFahrenzug,
            'offer' => $request->hasFile('offer') ?  $this->storeFile($request->file('offer'),FolderPaths::KK_FILES) : $existingLeadDataFahrzeug->offer,
            'nuekommentar' => $request->input('nuekommentar') ? $request->input('nuekommentar') : $existingLeadDataFahrzeug->nuekommentar,
            'vergleichsart_select' => $request->vergleichsart_select
        ];

        if ($existingLeadDataFahrzeug) {
            $existingLeadDataFahrzeug->update($leadDataFahrzeug);
        }


        $existingLeadDataThings = LeadDataThings::where('person_id', $personId)->latest()->first();

        $leadDataThings = [
            'leads_id' => $leadId,
            'person_id' => $personId,
            'nationality' => $request->nationality_sachen ? $request->nationality_sachen : $existingLeadDataThings->nationality_sachen,
            'residence_permit' => $request->residence_permit ? $request->residence_permit : $existingLeadDataThings->residence_permit,
            'telephone_nr' => $request->telephone_nr ? $request->telephone_nr : $existingLeadDataThings->telephone_nr,
            'email' => $request->email ? $request->email : $existingLeadDataThings->email,
            'zivilstand' => $request->zivilstand ? $request->zivilstand : $existingLeadDataThings->zivilstand,
            'employment_relationship' => $request->employment_relationship ? $request->employment_relationship : $existingLeadDataThings->employment_relationship,
            'job' => $request->job ? $request->job : $existingLeadDataThings->job,
            'payment_frequency' => $request->payment_frequency,
            'amount_per_month' => $request->amount_per_month,
            'share_guarantee' => $request->share_guarantee,
            'start_of_contract' => $request->start_of_contract,
            'premium_exemption' => $request->premium_exemption,
            'eu_pension' => $request->eu_pension,
            'death_benefit' => $request->death_benefit,
            'smoker' => $request->smoker ? $request->smoker : $existingLeadDataThings->smoker,
            'desired' => $request->desired,
            'id_select_vorsorge' => $request->id_select_vorsorge,
            'vollmacht_select_vorsorge' => $request->vollmacht_select_vorsorge,
            'upload_file_vorsorge' => $request->hasFile('upload_file_vorsorge') ?  $this->storeFile($request->file('upload_file_vorsorge'),FolderPaths::KK_FILES) : $existingLeadDataThings->upload_file_vorsorge,
        ];


        if ($existingLeadDataThings) {
            $existingLeadDataThings->update($leadDataThings);
        }

        $existingLeadDataRech = LeadDataRech::where('person_id',$personId)->latest()->first();

        $leadDataRech = [
            'leads_id' => $leadId,
            'person_id' => $personId,
            'id_select' => $request->id_select_rech,
            'vertrag_select' => $request->vertrag_select_rech,
            'upload_file' => $request->hasFile('rech_uploadFile') ?  $this->storeFile($request->file('rech_uploadFile'),FolderPaths::KK_FILES) : $existingLeadDataRech->upload_file,
            'gesellchaft' => $request->gesellchaft,
        ];

        if ($existingLeadDataRech) {
            $existingLeadDataRech->update($leadDataRech);
        }

        $existingLeadDataPrevention = LeadDataPrevention::where('person_id', $personId)->latest()->first();
        $countoffer = 0;
        if ($request->hasFile('newoffer') && !isset($existingLeadDataPrevention->newoffer)){
            $url =  '<a href="'  . route("leadfamilyperson",[Crypt::encrypt($personId * 1244),"admin_id" => Crypt::encrypt(Pendency::find($pend->id)->admin_id * 1244),"pend_id" => Pendency::find($pend->id)->id]) . '"> Das erhaltene Angebot für den Sachen für Kunden:' . family::find($personId)->first_name . ' wurde eingereicht </a>';
            Admins::find($pend->admin_id)->notify(new SendNotificationn($url));
        }
        $leadDataPrevention = [
            'leads_id' => $leadId,
            'person_id' => $personId,
            'upload_police' => $request->hasFile('upload_police__') ? $this->storeFile($request->file('upload_police__'), FolderPaths::KK_FILES) : $existingLeadDataPrevention->upload_police,
            'comparison_type' => $request->comparison_type,
            'comment' => $request->comment__,
            'number_of_people' => $request->number_of_people,
            'number_of_rooms' => $request->number_of_rooms,
            'sum_insured' => $request->sum_insured,
            'desired_additional_coverage' => $request->desired_additional_coverage,
            'personal_liability' => $request->personal_liability,
            'society' => $request->society,
            'n_of_p_legal_protection' => $request->n_of_p_legal_protection,
            'Hvergleichsart_select' => $request->Hvergleichsart_select,
            'newoffer' => $request->hasFile('newoffer') ? $this->storeFile($request->file('newoffer'), FolderPaths::KK_FILES) : $existingLeadDataPrevention->newoffer,
            'id_select_sachen' => $request->id_select_sachen,
            'vollmacht_select_sachen' => $request->vollmacht_select_sachen,
            'upload_file_sachen' => $request->hasFile('upload_file_sachen') ? $this->storeFile($request->file('upload_file_sachen'), FolderPaths::KK_FILES) : $existingLeadDataPrevention->upload_file_sachen,
        ];


        if ($existingLeadDataPrevention) {
            $existingLeadDataPrevention->update($leadDataPrevention);
        }



        $bo = Admins::role(['backoffice','admin'])->get();

        foreach($bo as $b){
            $url =  '<a href="'  . route("leadfamilyperson",[Crypt::encrypt($personId * 1244),"admin_id" => Crypt::encrypt(Pendency::find($pend->id)->admin_id * 1244),"pend_id" => Pendency::find($pend->id)->id]) . '"> Dokumentation für :' . family::find($personId)->first_name . ' wurde eingereicht </a>';
            $b->notify(new SendNotificationn($url));
        }
        if($offer > 0){
            $url =  '<a href="'  . route("leadfamilyperson",[Crypt::encrypt($personId * 1244),"admin_id" => Crypt::encrypt(Pendency::find($pend->id)->admin_id * 1244),"pend_id" => Pendency::find($pend->id)->id]) . '"> Das erhaltene Angebot für den Kunden :' . family::find($personId)->first_name . ' wurde eingereicht </a>';
            Admins::find($pend->admin_id)->notify(new SendNotificationn($url));
//            $pend1 = new Pendency();
//            $pend1->admin_id = $pend->admin_id;
//            $pend1->family_id = $pend->family_id;
//            $pend1->description = 'Offer';
//            $pend1->type = 'Offer';
//            $pend1->save();
        }
        $person = family::find($pend->family_id);
        $person->status = "Done";
        $person->save();




        return redirect()->route('costumers')->with('success', 'Aufgabe erfolgreich übermittelt');
    }


    public function deleteLeadDataKK($dataId)
    {
        return LeadDataKK::where('id', $dataId)->delete();
    }

    public function deleteLeadDataCounteroffered($dataId)
    {
        return LeadDataCounteroffered::where('id', $dataId)->delete();
    }

    public function deleteLeadDataFahrzeug($dataId)
    {
        return LeadDataFahrzeug::where('id', $dataId)->delete();
    }

    public function deleteLeadDataThings($dataId)
    {
        return LeadDataThings::where('id', $dataId)->delete();
    }

    public function deleteLeadDataPrevention($dataId)
    {
        return LeadDataPrevention::where('id', $dataId)->delete();
    }
}
