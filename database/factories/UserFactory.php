<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'second_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'patronymic' => $this->faker->firstName(),
            'telephone' => '89125919145',
            'email' => $this->faker->unique()->safeEmail(),
            'login' => $this->faker->userName(),
            'password' => $this->faker->password()
        ];
    }
}
