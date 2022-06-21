<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadDataPrevention extends Model
{
    use HasFactory;

    protected $table = 'lead_data_s_w';

    protected $fillable = [
        'leads_id',
        'person_id',
        'upload_police',
        'comparison_type',
        'comment',
        'number_of_people',
        'number_of_rooms',
        'sum_insured',
        'desired_additional_coverage',
        'personal_liability',
        'society',
        'n_of_p_legal_protection',
        'Hvergleichsart_select',
        'newoffer',
    ];
}
