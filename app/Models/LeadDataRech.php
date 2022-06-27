<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDataRech extends Model
{
    use HasFactory;

    protected $table = 'lead_data_rech';


    protected $fillable = [
        'leads_id',
        'person_id',
        'id_select',
        'vertrag_select',
        'upload_file',
        'zugeisen_person',
        'gesellchaft',
    ];
}
