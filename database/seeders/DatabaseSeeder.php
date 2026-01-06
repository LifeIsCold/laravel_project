<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\PostUserLike;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Truncate tables in correct order (child tables first)
        PostUserLike::truncate();
        Comment::truncate();
        Post::truncate();
        Profile::truncate();
        User::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Create test user
        $testUser = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
        
        // Create 10 random users
        $randomUsers = User::factory(10)->create();
        
        // Combine all users
        $allUsers = User::all();
        
        // Create profiles for all users
        $allUsers->each(function ($user) {
            Profile::create([
                'user_id' => $user->id,
                'bio' => 'Bio for ' . $user->name,
                'avatar' => 'https://i.pravatar.cc/150?u=' . $user->id,
            ]);
        });
        
        // Create posts for each user
        $allUsers->each(function ($user) {
            Post::factory()
                ->count(rand(3, 8))
                ->for($user)
                ->create();
        });
        
        // Create extra posts for test user
        Post::factory()
            ->count(15)
            ->for($testUser)
            ->create(['status' => 'published']);
        
        // Get all posts
        $posts = Post::all();
        
        // Create comments for each post
        $posts->each(function ($post) use ($allUsers) {
            Comment::factory()
                ->count(rand(5, 15))
                ->for($post)
                ->create([
                    'user_id' => $allUsers->random()->id
                ]);
        });
        
        // Create likes (many-to-many relationships)
        $allUsers->each(function ($user) use ($posts) {
            $posts->random(rand(2, 5))->each(function ($post) use ($user) {
                PostUserLike::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'created_at' => now()->subDays(rand(0, 30))
                ]);
            });
        });
    }
}
