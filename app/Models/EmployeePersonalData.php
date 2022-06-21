<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePersonalData extends Model
{
    use HasFactory;

    protected $table = 'employee_personal_data';

    protected $fillable = [
        'name',
        'prename',
        'email',
        'address',
        'zip',
        'city',
        'phone',
        'admin_id'
    ];
}
