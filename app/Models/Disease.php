<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'info',
        'user_id',
    ];


    function historyPatients()
    {
        return $this->belongsToMany(Patient::class);
    }

    function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
