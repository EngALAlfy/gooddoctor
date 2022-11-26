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
        return $this->hasManyThrough(Ray::class, Appointment::class);
    }

    function tests()
    {
        return $this->hasManyThrough(Test::class, Appointment::class);
    }

    function appointments()
    {
        return $this->hasMany(Appointment::class)->latest();
    }

    function next_appointments()
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at', '>', Carbon::today());
    }

    function today_appointments()
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at', '=', Carbon::today());
    }

    function previous_appointments()
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at', '<', Carbon::today());
    }

    public function getSymptomsList()
    {
        $symptoms = "";

        foreach ($this->appointments as $key => $value) {
            if ($value->symptoms) {
                $symptoms .= "\n";
                $symptoms .= $value->symptoms;
            }
        }


        if (!$symptoms || $symptoms == "" || empty($symptoms)) return null;
        $array = explode("\n",  $symptoms);

        $array = array_filter($array);
        $array = array_unique($array);

        $html = '';

        foreach ($array as $key => $val) {
            $html .= '<li>' . $val . '</li>';
        }

        return $html;
    }
}
