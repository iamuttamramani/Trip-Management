<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{
    use HasFactory;
    Protected $table = "users";

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->username = $user->email;
        });
    }
}
