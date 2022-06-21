<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendency extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "pendencies";
    public function family()
    {
        return $this->belongsTo(family::class,'family_id');
    }
    public function adminpend()
    {
        return $this->belongsTo(Admins::class,'admin_id');
    }
    protected $guarded = [];


}
