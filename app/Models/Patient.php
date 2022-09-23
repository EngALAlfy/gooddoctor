<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'sex',
        'address',
        // 'disease_history',
        'info',
        'user_id',
        'phone',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function recipes()
    {
        return $this->hasManyThrough(Recipe::class, Appointment::class);

    }

    function history()
    {
        return $this->belongsToMany(Disease::class);
    }

    function rays()
    {
        return $this->hasMany(Ray::class);
    }

    function tests()
    {
        return $this->hasMany(Test::class);
    }

    function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    function next_appointments()
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at' , '>' , Carbon::today());
    }

    function today_appointments()
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at' , '=' , Carbon::today());
    }

    function previous_appointment()
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at' , '<' , Carbon::today());
    }

    // function getDiseaseHistoryAttribute($value)
    // {
    //     return explode(',', $value);
    // }

}
