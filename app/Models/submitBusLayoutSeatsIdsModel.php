<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submitBusLayoutSeatsIdsModel extends Model
{
    use HasFactory;
    protected $table = "buses";

    protected $fillable =[
        'busUsername',
        'seatsIds'
    ];
}
