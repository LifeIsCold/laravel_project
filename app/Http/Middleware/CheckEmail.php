<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Not logged in → redirect to login
        if (!$user) {
            return redirect('/login')->with('error', 'Please login first');
        }

        // Only allow admin email
        if ($user->email !== 'admin@example.com') {
            abort(403, 'You do not have permission');
        }

        return $next($request);
    }

}
