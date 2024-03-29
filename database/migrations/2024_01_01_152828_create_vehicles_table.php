<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->string('brand');
            $table->string('type');
            $table->integer('year');
            $table->integer('pricePerDay');
            $table->string('image_file_name')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
