<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "address",
        "phone_number",
        "days_reserved",
        //"price",
        "vehicle_id",
        "reservation_start",
        "reservation_end"
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
