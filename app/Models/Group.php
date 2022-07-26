<?php

namespace App\Models;

use Database\Seeders\AdminSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function provision(){
        return $this->belongsTo(Provisions::class,'provision_id')->withDefault(['name' => 'Keines']);
    }

    public function members(){
        return $this->hasMany(Admins::class,'group_id');
    }
    public function getsalary(){
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
    }
}
