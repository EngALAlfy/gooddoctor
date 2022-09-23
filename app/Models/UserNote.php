<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'list',
        'type',
        'user_id',
    ];

    function user(){
        return $this->hasOne(User::class);
    }
}
