<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,40),
            'category_id' => fake()->numberBetween(1, 8),
            'title' => fake()->sentence(1),
            'slug' => fake()->slug(),
            'excerpt' => collect($this->faker->paragraphs(2))->map(fn($item) => "<p>$item</p>")->implode(''),
            'body' => collect($this->faker->paragraphs(6))->map(fn($item) => "<p>$item</p>")->implode(''),
        ];
    }
}
