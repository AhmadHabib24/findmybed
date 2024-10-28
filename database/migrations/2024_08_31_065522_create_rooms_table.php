<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->foreignId('room_category_id')->constrained('room_categories')->onDelete('cascade');
                $table->foreignId('hotel_id')->constrained('hotel_names')->onDelete('cascade');
                $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
                $table->decimal('price', 10, 2);
                $table->text('description');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
