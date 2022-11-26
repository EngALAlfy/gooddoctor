<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar_name',
        'user_id',
        'info',
    ];

    function recipes(){
        return $this->belongsToMany(Recipe::class);
    }
    function user(){
        return $this->hasOne(User::class);
    }
}
