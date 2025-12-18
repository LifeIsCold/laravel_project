<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        $isByAuthor = $this->faker->boolean(60);
        $status = $this->faker->randomElement(['pending', 'approved', 'spam', 'trash']);
        
        return [
            'post_id' => Post::factory(),
            'author_id' => $isByAuthor ? Author::factory() : null,
            'guest_name' => $isByAuthor ? null : $this->faker->name(),
            'guest_email' => $isByAuthor ? null : $this->faker->safeEmail(),
            'content' => $this->faker->paragraphs(rand(1, 3), true),
            'status' => $status,
            'upvotes' => $this->faker->numberBetween(0, 50),
            'downvotes' => $this->faker->numberBetween(0, 20),
            'approved_at' => $status === 'approved' 
                ? $this->faker->dateTimeBetween('-30 days', 'now') 
                : null,
        ];
    }
}
