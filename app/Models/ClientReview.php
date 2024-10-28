<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientReview extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's naming convention
    protected $table = 'client_review';

    // Fillable fields
    protected $fillable = [
        'client_name',
        'client_review',
        'rating',
        'image_path',
    ];

    // Optionally, you can add timestamps
    public $timestamps = true; // This is true by default, so you can omit it if not needed
}
