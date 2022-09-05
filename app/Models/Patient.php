<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_name',
        'patient_age',
        'patient_id',
        'opration_name',
        "contract_type",
        'doctor_name',
        'entry_date'
    ];
}
