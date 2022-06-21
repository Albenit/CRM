<?php

namespace App\Models;

use Database\Seeders\AdminSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function provision(){
        return $this->belongsTo(Provisions::class,'provision_id')->withDefault(['name' => 'Keines']);
    }

    public function members(){
        return $this->hasMany(Admins::class,'group_id');
    }
}
