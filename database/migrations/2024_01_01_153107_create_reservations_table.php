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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->integer('phone_number');
            $table->integer('days_reserved');
            $table->integer('price');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
