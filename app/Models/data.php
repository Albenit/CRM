<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;
    public $counter,$fahrzeug,$datakk,$prevention,$things;
     public function getdata($id){
      $this->counter = LeadDataCounteroffered::where('person_id',$id)->first();
      $this->fahrzeug = LeadDataFahrzeug::where('person_id',$id)->first();
      
      $this->datakk = LeadDataKK::where('person_id',$id)->first();
      $this->prevention = LeadDataPrevention::where('person_id',$id)->first();
      $this->things = LeadDataThings::where('person_id',$id)->first();
     }
}
