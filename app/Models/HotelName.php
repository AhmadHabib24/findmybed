<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelName extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id', 'hotel_cat_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function hotelCategory()
    {
        return $this->belongsTo(HotelCategory::class, 'hotel_cat_id');
    }
}
