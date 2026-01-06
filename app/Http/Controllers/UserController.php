<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // One-to-One Relationship Test
    public function index()
    {
        $users = User::with('profile')->get();
        $user = $users[1];
        $bio = $user->profile->bio;
        $user_id = $user->profile->user_id;
        dd($bio, $user_id);
    }

    // One-to-Many Relationship Test
    public function postList()
    {
        $user_posts = User::find(3)->posts;
        foreach ($user_posts as $user_post) {
            $user_post_title[] = $user_post->title;
        }
        dd($user_post_title);
    }

    // Has One Through Test
    public function showLatestComment($userId)
    {
        $user = User::find($userId);
        $latestComment = $user->latestCommentThroughPost;
        dd($latestComment->comment);
    }

    // Has Many Through Test
    public function showUserComments($id)
    {
        $user = User::find($id);
        $comments = $user->commentsThroughPosts;
        
        foreach ($comments as $comment) {
            echo $comment->comment . "<br>";
        }
    }
}
