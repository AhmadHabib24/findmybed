<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category','image','hotel_name'];
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_category_id');
    }
        public function hotelName()
    {
        return $this->belongsTo(HotelName::class, 'hotel_name'); // Adjust if the foreign key is different
    }
   
}
