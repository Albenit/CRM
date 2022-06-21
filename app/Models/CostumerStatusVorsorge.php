<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerStatusVorsorge extends Model
{
    use HasFactory;
    public $table = 'costumer_status_vorsorge';

    public function person(){
        return $this->belongsTo(family::class,'person_idV');
    }
}
