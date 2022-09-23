<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'user_id',
        'info',
    ];


    function appointments(){
        return $this->hasMany(Appointment::class);
    }

    function user(){
        return $this->hasOne(User::class);

    }
}
