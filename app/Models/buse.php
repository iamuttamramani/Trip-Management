<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buse extends Model
{
    use HasFactory;

    protected $fillable = ([
        'username',
        'busUsername',
        'bus_name',
        'state_code',
        'region_code',
        'vehicle_alfa_code',
        'vehicle_num_code',
        'bus_type',
        'seats',
        'seat_type',
        'seatsIds'
    ]);
}
