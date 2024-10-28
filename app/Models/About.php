<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow the Laravel convention
    protected $table = 'about';

    // Define the fillable fields
    protected $fillable = [
        'heading',
        'description',
        'image',
    ];

    // Enable timestamps
    public $timestamps = true; // This is true by default

    // If you want to customize the names of the timestamp fields
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
