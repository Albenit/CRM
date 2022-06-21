<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDataThings extends Model
{
    use HasFactory;

    protected $table = 'lead_data_s';

    protected $fillable = [
        'leads_id',
        'person_id',
        'nationality',
        'residence_permit',
        'zivilstand',
        'telephone_nr',
        'email',
        'employment_relationship',
        'job',
        'payment_frequency',
        'amount_per_month',
        'share_guarantee',
        'start_of_contract',
        'premium_exemption',
        'eu_pension',
        'death_benefit',
        'smoker',
        'desired',
    ];
}
