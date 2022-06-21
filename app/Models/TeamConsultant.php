<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamConsultant extends Model
{
    use HasFactory;

    protected $table = 'team_consultants';

    protected $fillable = [
        'team_id',
        'consultant_id',
    ];
}
