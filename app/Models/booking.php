<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'host_username',
        'trip_id',
        'bus_id',
        'passenger_id',
        'passenger_name',
        'booked_seat_ids',
        'seats_booked',
        'booking_status',
        'fare',
        'booked_by',
        'payment_mode',
        'payment_status',
        'transaction_id',
        'mobile_no',
        'email',
    ];
}
