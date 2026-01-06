<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // One-to-One: User has one Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // One-to-Many: User has many Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Many-to-Many: User likes many Posts
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes')->withTimestamps();
    }

    // Has One Through: User → Post → Comment (latest comment)
    public function latestCommentThroughPost()
    {
        return $this->hasOneThrough(
            Comment::class,  // Final model (C)
            Post::class,     // Intermediate model (B)
            'user_id',       // FK on posts table  posts.user_id
            'post_id',       // FK on comments table  comments.post_id
            'id',            // PK on users table
            'id'             // PK on posts table
        )->latestOfMany(); // get the latest comment
    }

    // Has Many Through: User → Post → Comment (all comments)
    public function commentsThroughPosts()
    {
        return $this->hasManyThrough(
            Comment::class, // Final model (C)
            Post::class,    // Intermediate model (B)
            'user_id',      // FK on posts table posts.user_id
            'post_id',      // FK on comments table comments.post_id
            'id',           // PK on users table
            'id'            // PK on posts table
        );
    }
}
