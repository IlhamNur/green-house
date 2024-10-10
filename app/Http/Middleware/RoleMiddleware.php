<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Check if the user is authenticated and has a role that matches the allowed roles
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect or abort if the user does not have the required role
        abort(403, 'Unauthorized access.');
        return $next($request);
    }
}
