<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    public $table = 'costumers';

    protected $fillable = [
        'name', 
        'surname',
        'email',
        'dateofbirth',
        'phone',
        'admin_id',
        'mandated',
        'actions',
        'birthday',
        'age',
        'nationality',
        'civilstatus',
        'kvg',
        'vvg',
        'health'
    ];
}
