<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function postedUser()
    {
        $post = Post::find(3);
        $post_user = $post->user->name;
        dd($post_user);
    }
}
