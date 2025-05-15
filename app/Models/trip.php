<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'bus_id',
        'from',
        'deprature_datetime',
        'deprature_date',
        'deprature_time',
        'to',
        'arrival_datetime',
        'arrival_date',
        'arrival_time',
        'booked_seats',
        'total_seats',
        'price'
    ];
}
