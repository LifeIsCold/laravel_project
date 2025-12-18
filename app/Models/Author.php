<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 'full_name', 'email', 'bio', 
        'profile_image', 'account_type', 'is_verified', 'last_login_at'
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
