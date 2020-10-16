<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const BUYER = 1;
    const ADMIN = 2;

    protected $table = 'role';
}
