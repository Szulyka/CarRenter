<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        "license_plate",
        "brand",
        "type",
        "year",
        "pricePerDay",
        "image_file_name",
        "is_active"
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'vehicle_id');
    }
}
