<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Product\ProductController;

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
