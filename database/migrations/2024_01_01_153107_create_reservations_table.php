<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->integer('phone_number');
            $table->integer('days_reserved')->nullable();
            $table->date('reservation_start');
            $table->date('reservation_end');
            $table->integer('price')->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
