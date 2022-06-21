<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerStatusGrundversicherung extends Model
{
    public $table = 'costumer_status_grundversicherung';

    public function person(){
        return $this->belongsTo(family::class,'person_idG');
    }
}
