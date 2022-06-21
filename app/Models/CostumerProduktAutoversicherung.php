<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerProduktAutoversicherung extends Model
{
    use HasFactory;
    public $table = 'costumer_produkt_autoversicherung';
    protected $guarded = [];
    public function person(){
        return $this->belongsTo(family::class,'person_id_PA');
    }
}
