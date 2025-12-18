<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'author_id', 'guest_name', 'guest_email',
        'content', 'status', 'upvotes', 'downvotes', 'approved_at'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'upvotes' => 'integer',
        'downvotes' => 'integer',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function isByGuest()
    {
        return !$this->author_id;
    }
}
