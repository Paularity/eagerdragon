<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class UpdatedUserPassword
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
        if (config('app.env') === 'local') {
            return $next($request);
        }

        if (!Auth::check()) {
            return redirect('/login');
        }

        $lastPasswordResetAt = Auth::user()->last_password_reset_at
            ->diffInDays(Carbon::now());
        $days = 90;

        // User is required to reset the password every 90 days.
        if ($lastPasswordResetAt < $days) {
            return $next($request);
        }

        if (session()->has(Auth::user()->email.'_password_reset_token')) {
            $token = session(Auth::user()->email.'_password_reset_token');
        } else {
            $token = app('auth.password.broker')->createToken(Auth::user());
            session([Auth::user()->email.'_password_reset_token' => $token]);
        }

        Auth::logout();

        return redirect(sprintf(
            '/password/reset/%s',
            $token
        ))
        ->with('info', 'Please reset your password to enhance your account security.');
    }
}
