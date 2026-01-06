<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class LikeController extends Controller
{
    // Many-to-Many: User's liked posts
    public function showLikedPosts()
    {
        $user = User::find(1);
        $likedPosts = $user->likedPosts()->get();
        
        foreach ($likedPosts as $post) {
            $title[] = $post->title;
        }
        dd($title);
    }

    // Many-to-Many: Post's likers
    public function showPostLikers()
    {
        $post = Post::find(2);
        $likers = $post->likers()->get();
        
        foreach ($likers as $user) {
            echo $user->name . "<br>";
        }
    }
}
