<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory(10)->create();
        Task::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // Create 20 authors without firing model events
        $authors = Author::factory(20)->create();
        
        // Create a featured admin author
        $adminAuthor = Author::factory()->create([
            'username' => 'admin',
            'full_name' => 'Administrator',
            'email' => 'admin@blog.com',
            'account_type' => 'admin',
            'is_verified' => true,
        ]);
        
        // Create posts for each author (without events)
        $authors->each(function ($author) {
            Post::factory()
                ->count(rand(3, 8))
                ->for($author)
                ->create();
        });
        
        // Create extra posts for admin
        Post::factory()
            ->count(15)
            ->for($adminAuthor)
            ->create(['status' => 'published']);
        
        // Get all posts
        $posts = Post::all();
        
        // Create comments for each post (without events)
        $posts->each(function ($post) use ($authors) {
            Comment::factory()
                ->count(rand(5, 15))
                ->for($post)
                ->create();
        });
    }
}
