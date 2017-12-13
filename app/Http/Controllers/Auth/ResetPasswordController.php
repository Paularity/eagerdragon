<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules($request->email), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            $user = User::where('email', $request->email)->first();
            $user->last_password_reset_at = carbon::now();
            $user->status = 'active';
            $user->save();

            $this->savePassword($user, $request->password);

            return $this->sendResetResponse($response);
        }

        return $this->sendResetFailedResponse($request, $response);
    }

    public function savePassword( $user, $password )
    {
        DB::table('passwords')->insert(
            [
                'user_id' => $user->id,
                'password' => bcrypt($password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }

    public function rules($email)
    {
        return [
            'token' => 'required',
            'email' => 'required|exists:users,email',
            'password' => ['required',
                        'min:7',
                        'confirmed',
                        'not_used:'.$email,
                        'regex:/(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[_\W]).*$/'],
        ];
    }

    public function validationErrorMessages(  )
    {
        return [
            'password.regex' => 'Must be a combination of letters and numbers
                                & must have atleast 1 special character',
        ];
    }
}
