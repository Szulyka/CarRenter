<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reservation;
use \App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $cars = collect();
        for ($i = 1; $i <= 4; $i++) {
            $v = Vehicle::factory()->create();
            $cars->add($v);
        }

        for ($i = 1; $i <= 6; $i++) {
            Reservation::factory()->create(['vehicle_id' => $cars->random()->id]);
        }
    }
}
