<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerStatusZusatzversicherung extends Model
{
    use HasFactory;
    public $table = 'costumer_status_zusatzversicherung';

    public function person(){
        return $this->belongsTo(family::class,'person_idZ');
    }
}
