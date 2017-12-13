<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function impersonate(User $user)
    {
        if (!Bouncer::allows('impersonate-user')) {
            abort(403);
        }

        Bouncer::allow($user)->toManage($user);
        Auth::user()->impersonate($user);

    	return redirect('/dashboard');
    }

    public function leave()
    {
    	Auth::user()->leaveImpersonation();

    	return redirect('/dashboard');
    }
}
