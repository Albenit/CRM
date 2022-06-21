<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerProduktZusatzversicherung extends Model
{
    use HasFactory;
    public $table = 'costumer_podukt_zusatzversicherung';
    protected $guarded = [];
    public function person(){
        return $this->belongsTo(family::class,'person_id_PZ');
    }
}
