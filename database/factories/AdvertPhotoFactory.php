<?php

namespace Database\Factories;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvertPhoto>
 */
class AdvertPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'big_deer.png',
            'big_face_cat.png',
            'deer.png',
            'leopard.png',
            'rabbit.png',
            'small_cat.png',
            'squirrel.png'
        ];

        return [
            'image' => $images[rand(0, 6)],
            'advert_id' => Advert::all()->random()->id
        ];
    }
}
