<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDataFahrzeug extends Model
{
    use HasFactory;

    protected $table = 'lead_data_fahrzeug';

   protected $guarded = [];
   protected $hidden = [];
}
