<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'user_id',
        'info',
    ];

    function appointment(){
        return $this->belongsTo(Appointment::class);
    }

    function patient(){
        return $this->hasOneThrough(Patient::class,Appointment::class , 'id' , 'id' , 'appointment_id' , 'patient_id');

    }
    function user(){
        return $this->hasOne(User::class);

    }
    function drugs(){
        return $this->belongsToMany(Drug::class)->withPivot(['amount' , 'info' , 'repeat_every_hours']);
    }
}
