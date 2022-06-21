<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumerStatusHausrat extends Model
{
    use HasFactory;
    public $table = 'costumer_status_hausrat';

    public function person(){
        return $this->belongsTo(family::class,'person_idH');
    }
}
