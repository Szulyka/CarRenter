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
        "price"
    ];
    public function vehicle()
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
