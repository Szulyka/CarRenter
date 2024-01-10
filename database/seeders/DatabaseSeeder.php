<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reservation;
use \App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $cars = collect();
        for ($i = 1; $i <= 4; $i++) {
            $v = Vehicle::factory()->create([
                'is_active' => true
            ]);
            $cars->add($v);
        }
        $reservations = collect();
        for ($i = 1; $i <= 6; $i++) {
            $r = Reservation::factory()->create([
                'vehicle_id' => $cars->random()->id,
            ]);
            $reservations->add($r);
        }

        //összár és foglalt napok kiszámolása
        foreach ($reservations as $r) {
            $daysSum = Carbon::parse($r->reservation_end)->diffInDays(Carbon::parse($r->reservation_start));
            $r->days_reserved = $daysSum;
            $r->price = $daysSum * $r->vehicle->pricePerDay;
            $r->save();
        }


    }
}
