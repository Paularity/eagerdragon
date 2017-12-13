<?php

namespace App\Http\Controllers\Auth;

use App\Services\AccessCode;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $decayMinutes = 30;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectPath()
    {
        return '/dashboard';
    }

    /**
     * Override the username method used to validate login.
     *
     * @return string
     */
    public function username()
    {
        $validEmail = filter_var(request()->username, FILTER_VALIDATE_EMAIL);

        if ($validEmail) {
            request()->merge(['email' => request()->username]);

            return 'email';
        }

        return 'username';
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $accessCodeService = new AccessCode($request);
            $accessCodeService->destroySession();
        }

        session()->flush();
        Auth::logout();

        return redirect('/login');
    }
}
