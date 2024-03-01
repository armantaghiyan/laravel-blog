<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Faker::word();

        return [
            COL_POST_TITLE => $title,
            COL_POST_SLUG => Str::slug($title),
            COL_POST_THUMBNAIL => rand(1, 10) . '.webp',
            COL_POST_CONTENT => Faker::paragraph(),
            COL_POST_STATUS => 'published',
        ];
    }
}
