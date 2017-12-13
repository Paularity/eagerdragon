<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\AccessCode;
use Illuminate\Support\Facades\Auth;

class AccessCodeProtection
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
        if (!Auth::check()) {
            return redirect('/login');
        }

        if ('local' === config('app.env') || Auth::user()->isImpersonated()) {
            return $next($request);
        }

        if (!AccessCode::isValidAccessCodeSession($request)) {
            return redirect('/access-code');
        }

        return $next($request);
    }
}
