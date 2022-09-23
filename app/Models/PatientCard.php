<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'pulse',
        'glucose',
        'max_pressure',
        'min_pressure',
        'weight',
        'user_id',
        'appointment_id',
    ];

    function patient()
    {
        return $this->hasOneThrough(Patient::class , Appointment::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }

    function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}
