<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDataCounteroffered extends Model
{
    use HasFactory;

    protected $table = 'lead_data_a_counteroffered';

    protected $fillable = [
        'leads_id',
        'person_id',
        'upload_police',
        'comparison_type',
        'comment',
    ];
}
