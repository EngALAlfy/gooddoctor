<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'instructions_id',
        'user_id',
        'appointment_type_id',
        'date',
        'enter_time',
        'exit_time',
        'status',
        'expected_time',
        'order',
        'info',
        'symptoms',
    ];

    public function type()
    {
        return $this->belongsTo(AppointmentType::class , 'appointment_type_id' , 'id');
    }

    public function instructions()
    {
        return $this->belongsToMany(Instructions::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class)->withPivot(['treatment_method' , 'diagnosis' ,'symptoms' , 'info']);
    }

    public function rays()
    {
        return $this->belongsToMany(Ray::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getSymptomsAttribute($value)
    {
        $array = explode("\n" ,  $value);
        $html = '';

        foreach ($array as $key => $val) {
            $html .= '<li>'.$val.'</li>';
        }

        return $html;
    }

}
