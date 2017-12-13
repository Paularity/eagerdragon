<?php

namespace App\Http\Middleware;

use Closure;
use Bouncer;

class ManageUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Bouncer::allows('manage-users')) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
