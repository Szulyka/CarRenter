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
            $table->string('image_file_name')->nullable();
            $table->date('reservation_start')->nullable();
            $table->date('reservation_end')->nullable();
            $table->timestamps();

        });
    }
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};