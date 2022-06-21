<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestellungen extends Model
{
    use HasFactory;
    protected $table = 'bestellungens';
    protected $guarded = [];
    public function admin(){
        return $this->belongsTo(Admins::class,'employee_id');
    }
}
