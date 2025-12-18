<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(4, 8));
        $status = $this->faker->randomElement(['draft', 'published', 'archived']);
        
        return [
            'author_id' => Author::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(rand(10, 30), true),
            'excerpt' => $this->faker->paragraph(),
            'featured_image' => $this->faker->imageUrl(800, 400, 'nature'),
            'status' => $status,
            'visibility' => $this->faker->randomElement(['public', 'private', 'password_protected']),
            'view_count' => $this->faker->numberBetween(0, 10000),
            'like_count' => $this->faker->numberBetween(0, 500),
            'published_at' => $status === 'published' 
                ? $this->faker->dateTimeBetween('-1 year', 'now') 
                : null,
        ];
    }
}
