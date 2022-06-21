<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absences';
    protected $with = ['admin'];

    protected $guarded = [];
    public function admin(){
        return $this->belongsTo(Admins::class,'employee_id');
    }
}
