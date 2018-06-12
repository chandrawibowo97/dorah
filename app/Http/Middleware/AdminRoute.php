<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminRoute
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (Auth::guest()) {
            return abort(403, 'Unauthorized action.');
        }
        if ($user->hasRole('admin')) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
