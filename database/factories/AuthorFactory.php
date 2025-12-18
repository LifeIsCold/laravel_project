<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->name();
        
        return [
            'username' => strtolower(str_replace(' ', '_', $name)),
            'full_name' => $name,
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->paragraph(rand(1, 2)), // Shorter bio
            'profile_image' => $this->faker->imageUrl(200, 200, 'people'),
            'account_type' => $this->faker->randomElement(['basic', 'premium', 'admin']),
            'is_verified' => $this->faker->boolean(70),
            'last_login_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
