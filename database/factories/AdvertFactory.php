<?php

namespace Database\Factories;

use App\Models\AdvertAddress;
use App\Models\AdvertStatus;
use App\Models\AnimalType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advert>
 */
class AdvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(25),
            'animal_type_id' => AnimalType::all()->random()->id,
            'advert_address_id' => AdvertAddress::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'advert_status_id' => AdvertStatus::all()->random()->id
        ];
    }
}
