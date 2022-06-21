<?php

namespace App\Imports;

use App\Models\campaigns;
use App\Models\CostumerProduktAutoversicherung;
use App\Models\CostumerProduktGrundversicherung;
use App\Models\CostumerProduktHausrat;
use App\Models\CostumerProduktRechtsschutz;
use App\Models\CostumerProduktVorsorge;
use App\Models\CostumerProduktZusatzversicherung;
use App\Models\family;
use App\Models\lead;
use App\Models\LeadDataFahrzeug;
use App\Models\LeadDataKK;
use App\Models\LeadDataPrevention;
use App\Models\newgegen;
use App\Models\newnue;
use App\Models\Pendency;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CostumerImport implements ToModel
{
    /**
    * @param Collection $collection
    */


    public function model(array $row){


        $lead = new lead();
        $lead->assign_to_id = Auth::user()->id;
        $lead->first_name = $row[0];
        $lead->last_name = $row[1];
        $lead->birthdate = $row[2];
        $lead->telephone = $row[3];
        $lead->city = $row[4];
        $lead->address = $row[5];
        $lead->postal_code = $row[6];
        $lead->nationality = $row[7];


        $lead->campaign_id = 1;
        $lead->completed = 1;
        $lead->save();
        if(isset($row[8])){
            $kunden = 1;
        }else{
            $kunden = 0;
        }
        $family = family::create([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'birthdate' => $row[2],
            'leads_id' => $lead->id,
            'kundportfolio' => $kunden,
            'status' => 'done'
        ]);


        $dataKK = new LeadDataKK();
        $dataKK->person_id = $family->id;
        $dataKK->imported = 1;
        $dataKK->leads_id = $lead->id;

        $dataFahrzeug = new LeadDataFahrzeug();
        $dataFahrzeug->person_id = $family->id;
        $dataFahrzeug->leads_id = $lead->id;

        $dataPrevention = new LeadDataPrevention();
        $dataPrevention->person_id = $family->id;
        $dataPrevention->leads_id = $lead->id;

        $dataPrevention->save();
        $dataFahrzeug->save();
        $dataKK->save();
       $pendency = new Pendency();
       $pendency->done = 1;
       $pendency->completed = 1;
       $pendency->family_id = $family->id;
       $pendency->save();

       if(isset($row[8])){

        $grundversicherungP = new CostumerProduktGrundversicherung();
        $grundversicherungP->person_id_PG = $family->id;
        $grundversicherungP->graduation_date_PG = $row[8];
        $grundversicherungP->society_PG = $row[9];
        $grundversicherungP->product_PG = $row[10];
        $grundversicherungP->status_PG = $row[11];
        $grundversicherungP->last_adjustment_PG = $row[12];
        $grundversicherungP->total_commisions_PG = $row[13];

        $grundversicherungP->save();
       }
       if(isset($row[14])){
        $zusatzversicherungP = new CostumerProduktZusatzversicherung();
        $zusatzversicherungP->person_id_PZ = $family->id;

        $zusatzversicherungP->graduation_date_PZ = $row[14];
        $zusatzversicherungP->society_PZ = $row[15];
        $zusatzversicherungP->produkt_PZ = $row[16];
        $zusatzversicherungP->vvg_premium_PZ = $row[17];
        $zusatzversicherungP->duration_from_PZ = $row[18];
        $zusatzversicherungP->duration_to_PZ = $row[19];
        $zusatzversicherungP->status_PZ = $row[20];
        $zusatzversicherungP->last_adjustment_PZ = $row[21];
        $zusatzversicherungP->provision_PZ = $row[22];
        $zusatzversicherungP->total_commisions_PZ = $row[23];
        $zusatzversicherungP->save();
       }
       if(isset($row[24])){
        $retchsschutzP = new CostumerProduktRechtsschutz();
        $retchsschutzP->person_id_PR = $family->id;
        $retchsschutzP->graduation_date_PR = $row[24];
        $retchsschutzP->society_PR = $row[25];
        $retchsschutzP->produkt_PR = $row[26];
        $retchsschutzP->status_PR = $row[27];
        $retchsschutzP->last_adjustment_PR = $row[28];
        $retchsschutzP->total_commisions_PR = $row[29];
        $retchsschutzP->save();
       }
        if(isset($row[30])){
        $autoversicherungP = new CostumerProduktAutoversicherung();
        $autoversicherungP->person_id_PA = $family->id;
        $autoversicherungP->society_PA = $row[30];
        $autoversicherungP->beginning_insurance_PA = $row[31];
        $autoversicherungP->insurance_PA = $row[32];
        $autoversicherungP->status_PA = $row[33];
        $autoversicherungP->last_adjustment_PA = $row[34];
        $autoversicherungP->total_commisions_PA = $row[35];
        $autoversicherungP->save();
        }
        if(isset($row[36])){
        $hausratP = new CostumerProduktHausrat();
        $hausratP->person_id_PH = $family->id;
        $hausratP->society_PH = $row[36];
        $hausratP->beginning_insurance_PH = $row[37];
        $hausratP->insurance_PH = $row[38];
        $hausratP->status_PH = $row[39];
        $hausratP->last_adjustment_PH = $row[40];
        $hausratP->total_commisions_PH = $row[41];
        $hausratP->save();
        }
        if(isset($row[42])){
        $vorsorgeP = new CostumerProduktVorsorge();
        $vorsorgeP->person_id_PV = $family->id;
        $vorsorgeP->graduation_date_PV = $row[42];
        $vorsorgeP->begin_PV = $row[43];
        $vorsorgeP->society_PV = $row[44];
        $vorsorgeP->pramie_PV = $row[45];
        $vorsorgeP->payment_rythm_PV = $row[46];
        $vorsorgeP->duration_from_PV = $row[47];
        $vorsorgeP->duration_to_PV = $row[48];
        $vorsorgeP->production_PV = $row[49];
        $vorsorgeP->status_PV = $row[50];
        $vorsorgeP->last_adjustment_PV = $row[51];
        $vorsorgeP->total_commisions_PV = $row[52];
        $vorsorgeP->save();
        }
        return $family;


    }
}
