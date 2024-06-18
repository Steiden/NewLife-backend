<?php

namespace Database\Factories;

use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvertAddress>
 */
class AdvertAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street_name' => fake()->streetName(),
            'house_number' => fake()->buildingNumber(),
            'locality_id' => Locality::all()->random()->id,
        ];
    }
}
