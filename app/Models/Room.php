<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_category_id',
        'hotel_id',
        'city_id',
        'price',
        'description',
    ];

    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function hotel()
    {
        return $this->belongsTo(HotelName::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    // public function roomCategory()
    // {
    //     return $this->belongsTo(RoomCategory::class, );
    // }
    public function category()
{
    return $this->belongsTo(RoomCategory::class);
}
}
