<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)

    {

        $user = $request->user();

        // Check if the user is an instance of Admin
        if (!$user || !$user instanceof \App\Models\Admin) {
            return response()->json([
                'message' => 'Access denied. Admins only.'
            ], 403);
        }
        return $next($request);
    }
}
