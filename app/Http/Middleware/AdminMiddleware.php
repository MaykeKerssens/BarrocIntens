<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if (Auth::check() && Auth::user()->role_id == 7) {
            return $next($request); // Allow access for admin
        }

        // For non-admin users, apply the default role-based middleware logic
        return $next($request);
    }
}
