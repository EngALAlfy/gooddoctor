<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'list',
        'user_id',
        'info',
    ];

    function appointment(){
        return $this->hasMany(Appointment::class);
    }

    function patientsCount(){
        $patients = [];
        $appointments = $this->hasMany(Appointment::class)->get();
        foreach ($appointments as  $appointment) {
            $patients[$appointment->patient->id] = $appointment->patient->name;
        }

        return count($patients);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
