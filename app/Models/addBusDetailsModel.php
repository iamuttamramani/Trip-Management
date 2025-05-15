<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addBusDetailsModel extends Model
{
    use HasFactory;

    protected $fillable = ([
        'seats',
        'seat_type'
    ]);
}
