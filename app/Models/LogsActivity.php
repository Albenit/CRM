<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogsActivity extends Model
{
    use HasFactory;
    public $table = 'logs_activity';

    protected $guarded = [];

    public function family(){
        return $this->belongsTo(family::class,'person_id','id');
    }
}
