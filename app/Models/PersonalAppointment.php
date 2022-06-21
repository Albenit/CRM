<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAppointment extends Model
{
    use HasFactory;
    public $table = 'personalappointment';

    public function Admins(){
        return $this->belongsTo(Admins::class,'user_id',);
    }
    public function siblingsApp(){
        return $this->hasMany(PersonalAppointment::class,'commen_id','commen_id');
    }
    protected $guarded = [];
}
