<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = "user";

    protected $fillable = [
        'name',
        'email',
        'fk_id_role'
    ];

    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'fk_id_role',
            'id'
        );
    }

    public function hasRole($role)
    {
        if ($this->role()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->fk_id_role == Role::ADMIN;
    }

    public function isBuyer()
    {
        return $this->fk_id_role == Role::BUYER;
    }

    public function buyer(){

        return $this->hasOne(
            Buyer::class,
            'fk_id_user',
            'id'
        );

    }
}
