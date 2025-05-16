<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        return [
            'from' => $this->faker->randomElement(['Vancouver', 'Toronto', 'Montreal','Tokyo', 'Osaka', 'Fukuoka']),
            'to' => $this->faker->randomElement(['Vancouver', 'Toronto', 'Montreal','Tokyo', 'Osaka', 'Fukuoka']),
            'departure_date' => $this->faker->dateTimeBetween('now', '+2 weeks')->format('Y-m-d'),
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            // 'trip_type' => $this->faker->randomElement(['one_way', 'round_trip']),
            'price' => $this->faker->randomFloat(2, 300, 1500),
            'trip_category' => $this->faker->randomElement(['1', '0']),
        ];
    }
}
