<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,40),
            'post_id' => fake()->numberBetween(1,200),
            'body' => collect($this->faker->paragraphs(2))->map(fn($item) => "<p>$item</p>")->implode(''),
        ];
    }
}
