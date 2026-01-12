<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;

Route::apiResource('comments', CommentController::class)
    ->middleware([
        'auth:api',
        \App\Http\Middleware\CommentMiddleware::class,
    ]);