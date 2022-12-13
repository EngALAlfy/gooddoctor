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

    function appointments(){
        return $this->hasMany(Appointment::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
