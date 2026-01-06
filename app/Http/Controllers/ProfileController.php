<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::find(1);
        $user_name = $profile->user->name;
        dd($user_name);
    }
}
