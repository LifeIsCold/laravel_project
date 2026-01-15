<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Product\ProductController;
use App\Models\Article;

Route::get('/test-dd', function () {
    $articles= Article::all();
    dd($articles);   // Dump and Die here
});
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', function () {
 return 'Article List';
});

/*
Route::get('/articles/detail', function () {
 return 'Article Detail';
});
*/

Route::get('/articles/detail', function () {
 return 'Article Detail';
})->name('article.detail');

/*Route::get('/articles/detail/{id}', function ( $id ) {
 return "Article Detail - $id";
});
*/

Route::get('/articles/more', function() {
 return redirect()->route('article.detail');
});


Route::get('/article/index/{id}', [ProductController::class, 'index']);


// One-to-One Relationships
Route::get('/test-relation', [UserController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);

// One-to-Many Relationships
Route::get('/post-list', [UserController::class, 'postList']);
Route::get('/post-user', [PostController::class, 'postedUser']);

// Many-to-Many Relationships
Route::get('/user/likes', [LikeController::class, 'showLikedPosts']);
Route::get('/post/likers', [LikeController::class, 'showPostLikers']);

// Has One Through Relationship
Route::get('/user/{id}/latest-comment', [UserController::class, 'showLatestComment']);

// Has Many Through Relationship
Route::get('/user/{id}/comments', [UserController::class, 'showUserComments']);
Route::get('/profile', [ProfileController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin', function () {
    return 'Admin Page - Only admin can access';
})->middleware('check.email');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
	Route::get('/articles/create', [ArticleController::class, 'create']);
	Route::post('/articles/store', [ArticleController::class, 'store']);
});
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::put('/articles/update/{id}', [ArticleController::class, 'update']);
Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
