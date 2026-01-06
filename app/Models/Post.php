<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body'];

    // Inverse of One-to-Many: Post belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-Many: Post has many Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Many-to-Many: Post is liked by many Users
    public function likers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes')->withTimestamps();
    }
}
