<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(10),
            'image' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 50) . '/800/400',
            'body' => $this->faker->paragraph(10),
            'slug' => $this->faker->unique()->slug(),
            'user_id' => User::factory(),
            'published_at' => $this->faker->optional()->dateTime(),
            'promoted' => $this->faker->boolean(),
            
        ];
    }
}
