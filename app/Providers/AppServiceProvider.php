<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        // Correct usage of middleware
        Auth::extend('custom-auth', function ($app, $name, array $config) {
            $guard = Auth::createGuard($name, $config);

            $guard->middleware([
                // Add your middleware here
                \App\Http\Middleware\CommentMiddleware::class,
            ]);

            return $guard;
        });
    }
}