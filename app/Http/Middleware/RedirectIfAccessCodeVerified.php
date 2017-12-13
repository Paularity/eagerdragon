<?php

namespace App\Http\Middleware;

use App\Services\AccessCode;
use Closure;

class RedirectIfAccessCodeVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ('local' === config('app.env') ||
            AccessCode::isValidAccessCodeSession($request)) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
