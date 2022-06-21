<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerProduktGrundversicherung extends Model
{
    use HasFactory;
    public $table = 'costumer_produkt_grundversicherung';
    protected $guarded = [];
    public function person(){
        return $this->belongsTo(family::class,'person_id_PG');
    }
}
