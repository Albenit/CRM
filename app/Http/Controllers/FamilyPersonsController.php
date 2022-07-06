<?php

namespace App\Http\Controllers;

use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\family;
use App\Models\FamilyPerson;
use App\Models\lead;
use App\Models\data;
use App\Models\LeadDataKK;
use App\Models\Pendency;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\Crypt;


class FamilyPersonsController extends Controller
{
    public function fmembers($family,lead $lid){
        $user = auth()->user();
        $urole = $user->getRoleNames()->toArray();
        if($lid->assign_to_id == $user->id || in_array('backoffice',$urole) || in_array('admin',$urole)) {
            return $lid->family()->where('krank_id',0)->get()->toArray();
        }
    }
    public function linkthat($id,$pid){
            LeadDataKK::firstWhere('person_id',$id)->update(['leads_id' => family::find($id)->lead->id, 'skiped' => 1,'krank_id' => $pid]);
            family::where('id',$id)->update(['krank_id' => $pid]);
            $pend = Pendency::where('family_id', $pid)->first();

   
    }
    public function family_persons($id,Request $req,$admin_id = null)
    {
        Session::put('pend_id',(int) $req->pend_id);
        $idd = Crypt::decrypt($id);
        $idd /= 1244;
        $cnt = 0;
        $cnt1 = 0;


        $grundversicherung = CostumerProduktGrundversicherung::where('person_id_PG', $idd)->first();
        $zuzat = CostumerProduktZusatzversicherung::where('person_id_PZ', $idd)->first();
        $auto = CostumerProduktAutoversicherung::where('person_id_PA', $idd)->first();
        $hausrat = CostumerProduktHausrat::where('person_id_PH', $idd)->first();
        $rechsuchtz = CostumerProduktRechtsschutz::where('person_id_PR', $idd)->first();
        $vorsorge = CostumerProduktVorsorge::where('person_id_PV', $idd)->first();

        if ($grundversicherung->status_PG == 'Offen (Berater)' && $zuzat->status_PZ == 'Offen (Berater)' && $auto->status_PA == 'Offen (Berater)'
        && $hausrat->status_PH == 'Offen (Berater)' && $rechsuchtz->status_PR == 'Offen (Berater)' && $vorsorge->status_PV == 'Offen (Berater)') {
            CostumerProduktGrundversicherung::where('person_id_PG', $idd)->update(['status_PG' => 'Offen (Innendienst)', 'last_adjustment_PG' => Carbon::now()->format('Y/m/d')]);
            CostumerProduktZusatzversicherung::where('person_id_PZ', $idd)->update(['status_PZ' => 'Offen (Innendienst)', 'last_adjustment_PZ' => Carbon::now()->format('Y/m/d')]);
            CostumerProduktAutoversicherung::where('person_id_PA', $idd)->update(['status_PA' => 'Offen (Innendienst)', 'last_adjustment_PA' => Carbon::now()->format('Y/m/d')]);
            CostumerProduktHausrat::where('person_id_PH', $idd)->update(['status_PH' => 'Offen (Innendienst)', 'last_adjustment_PH' => Carbon::now()->format('Y/m/d')]);
            CostumerProduktRechtsschutz::where('person_id_PR', $idd)->update(['status_PR' => 'Offen (Innendienst)', 'last_adjustment_PR' => Carbon::now()->format('Y/m/d')]);
            CostumerProduktVorsorge::where('person_id_PV', $idd)->update(['status_PV' => 'Offen (Innendienst)', 'last_adjustment_PV' => Carbon::now()->format('Y/m/d')]);
            family::where('id',$idd)->update(['status_of_produkts' => 'Offen (Innendienst)','kundportfolio' => 1]);
        }
        $lead = family::with('lead')->find($idd);
        $admin_id = $req->admin_id;

        if (Auth::guard('admins')->user()->hasRole('fs')) {
            if (Auth::guard('admins')->user()->id == $lead->lead->assign_to_id || Pendency::find((int) $req->pend_id)->admin_id == Auth::user()->id) {
                try {
                    $data = LeadDataKK::where('person_id', '=', $idd)->where('imported',0)->where('skiped',0)->firstOrFail();
                    return redirect()->route('acceptdata', [Crypt::encrypt($idd*1244),'accept' => false,'admin_id' => $admin_id,'vorsorge' => $req->vorsorge]);
                }
                catch (Exception $e) {
                    return view('documentsform', compact('lead'));
                }
            }
            else {
                return redirect()->back();
            }
        }
        else {
            try {
                $data = LeadDataKK::where('person_id', '=', $idd)->where('imported',0)->firstOrFail();
                return redirect()->route('acceptdata', [Crypt::encrypt($idd*1244),'accept' => false,'admin_id' => $admin_id,'vorsorge' => $req->vorsorge]);
            }
            catch (Exception $e) {

           }
        }
    }

    public function getAllFamilyPersonsOfLead($id)
    {
        $familyPersons = family::where('leads_id', $id)->get();
        return $familyPersons;
    }

    public function updateFamilyPerson($id, Request $request)
    {
        $family =  family::where('id', $id)->get();
        if (Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice') ||  $family->lead->assign_to_id == Auth::guard('admins')->user()->id) {
            $family->update($request->all());
            return redirect()->back()->with('message', 'Familienmitglied wurde aktualisiert');
        } else {
            return redirect()->back();
        }
    }

    public function deleteFamilyPerson($id, $leadId)
    {
        $family = family::where('id', $id)->where('leads_id', $leadId)->get();
        if (Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice') || Auth::guard('admins')->user()->id == $family->lead->id) {
            $family->delete();
        }
    }

    public function updateleadfamilyperson(Request $request, $id)
    {
        $idd = Crypt::decrypt($id);
        $idd /= 1244;

        family::where('id', $idd)->update(['first_name' => $request->familyfirstname, 'last_name' => $request->familylastname]);
        return redirect()->back()->with('success', 'Update erfolgreich');
    }
}
