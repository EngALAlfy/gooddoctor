<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar_name',
        'user_id',
        'info',
    ];


    function patientsCount()
    {
        $patients = [];
        $appointments = $this->belongsToMany(Appointment::class)->get();
        foreach ($appointments as  $appointment) {
            $patients[$appointment->patient->id] = $appointment->patient->name;
        }

        return count($patients);
    }

    function patients()
    {
        $patients = [];
        $appointments = $this->belongsToMany(Appointment::class)->get();
        foreach ($appointments as  $appointment) {
            $patients[$appointment->patient->id] = $appointment->patient;
        }

        return $patients;
    }

    function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }
}
