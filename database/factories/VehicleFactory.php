<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $r = rand(10, 300);
        return [
            'license_plate' => fake()->unique()->regexify('[A-Z]{3}'.'-'.'[0-4]{3}'),
            'brand' => fake()->word(),
            'type' => fake()->word(),
            'year' => fake()->year(),
            'pricePerDay' => fake()->numberBetween(20000, 60000),
            'isReserved' => 'false',
            'reservation_start' => fake()->dateTimeInInterval('+'.$r.' days', '+6 days'),
            'reservation_end' => fake()->dateTimeInInterval('+'.($r+7).' days', '+6 days')
        ];
    }
}
