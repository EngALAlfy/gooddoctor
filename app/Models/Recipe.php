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
        return $this->hasOne(Appointment::class);
    }

    function patinet(){
        return $this->hasOneThrough(patinet::class,Appointment::class);

    }
    function user(){
        return $this->hasOne(User::class);

    }
    function drugs(){
        return $this->belongsToMany(Drug::class);
    }
}
