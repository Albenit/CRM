<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rejectedlead extends Model
{
    use HasFactory;
    
    protected $table = 'rejectedleads';

    protected $fillable = [
        'leads_id',
        'admin_id',
        'reason',
        'image'
    ];

    public function lead(){
        return $this->belongsTo(lead::class,'id');
    }
}
