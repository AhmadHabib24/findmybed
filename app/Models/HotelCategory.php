<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category'];

    public function hotelNames()
    {
        return $this->hasMany(HotelName::class);
    }
}
