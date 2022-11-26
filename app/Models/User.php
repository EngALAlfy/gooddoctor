<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'job',
        'salary',
        'password',
        'note',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attachRole($role)
    {
        if($this->checkRole($role)){
            return;
        }

        $roleModel = Role::where('name', $role)->first();

        if (!isset($roleModel)) {
            $roleModel = new Role;
            $roleModel->name = $role;
            $roleModel->save();
        }


        $this->roles()->attach([$roleModel->id]);
    }

    public function attachRoles(Array $roles)
    {
        foreach ($roles as $role) {
            if($this->checkRole($role)){
                return;
            }

            $roleModel = Role::where('name', $role)->first();

            if (!isset($roleModel)) {
                $roleModel = new Role;
                $roleModel->name = $role;
                $roleModel->save();
            }

            $this->roles()->attach([$roleModel->id]);
        }
    }

    public function  checkRole ($role)
    {
        return $this->roles()->where('name' , $role)->exists();
    }

    public function  removeRole ($role)
    {
        $roleModel = Role::where('name', $role)->first();

        return $this->roles()->detach($roleModel->id);
    }

    public function  removeRoles (...$roles)
    {

        foreach ($roles as $key => $role) {
            $roleModel = Role::where('name', $role)->first();

            $this->roles()->detach($roleModel->id);
        }

        return $this;
    }

    public function  removeAllRoles ()
    {
        return $this->roles()->detach();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
