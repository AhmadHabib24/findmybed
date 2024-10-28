<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
protected $table = 'bookings';

    // Define the fillable fields
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'special_requests',
        'arrival_date',
        'departure_date',
        'city',
        'hotel',
        'room_category',
        'price',
    ];
}
