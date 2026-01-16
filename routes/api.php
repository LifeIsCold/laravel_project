<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Api\ArticleApiController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::apiResource('comments', CommentController::class)
    ->middleware([
        'auth:api',
        \App\Http\Middleware\CommentMiddleware::class,
    ]);
Route::apiResource('articles', ArticleApiController::class);
