<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provisions extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function members(){
        return $this->hasManyThrough(Admins::class,Group::class,'provision_id','group_id');
    }
    public function groups(){
        return $this->hasMany(Group::class,'provision_id');
    }
}
