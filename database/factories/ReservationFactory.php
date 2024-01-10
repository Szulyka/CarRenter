<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->email(),
            'address' => fake()->address(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'reservation_start' => fake()->dateTimeInInterval('+'.$r.' days', '+6 days'),
            'reservation_end' => fake()->dateTimeInInterval('+'.($r+7).' days', '+6 days'),
        ];
        //Csak teszthez - még nem jó, mert a keresésnél nem lehet már foglalt autót foglalni, ez a random módszer generálhat duplán foglalt autót
        //azonban, élesben csak a keresés -> majd foglalásból jönnének létre foglalások, ott viszont már nem lehet többször
        //ugyanazon időpontban foglalt autót látni, így ez megfelel a kritériumnak.
    }
}
