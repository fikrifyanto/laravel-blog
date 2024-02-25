<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => User::factory()->create()->id,
            'media_id' => Media::factory()->create()->id,
            'slug' => fake()->slug(),
            'title' => fake()->sentence(10),
            'content' => fake()->sentence(45),
            'date' => fake()->date()
        ];
    }
}
