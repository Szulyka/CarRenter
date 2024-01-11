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

        $r = Reservation::factory()->create(['vehicle_id' => $cars->random()->id]);

        //összár és foglalt napok kiszámolása
        $daysSum = Carbon::parse($r->reservation_end)->diffInDays(Carbon::parse($r->reservation_start));
        $r->days_reserved = $daysSum;
        $r->price = $daysSum * $r->vehicle->pricePerDay;
        $r->save();
    }
}
