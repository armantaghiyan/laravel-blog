<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            COL_USER_NAME => Faker::fullName(),
            COL_USER_EMAIL => fake()->unique()->safeEmail(),
            COL_USER_AVATAR => rand(1, 10) . '.jpg',
//            COL_USER_AVATAR => null,
            COL_USER_USERNAME => fake()->userName(),
            COL_USER_EMAIL_VERIFIED_AT => now(),
            COL_USER_PASSWORD => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            COL_USER_REMEMBER_TOKEN => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            COL_USER_EMAIL_VERIFIED_AT => null,
        ]);
    }
}
