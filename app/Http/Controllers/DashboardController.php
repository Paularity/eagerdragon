<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Lab404\Impersonate\Services\ImpersonateManager;

class DashboardController extends Controller
{
    public function index(ImpersonateManager $manager)
    {
        if (!Bouncer::allows('view-dashboard')) {
            return redirect('/home');
        }

        $firstTimeLogin = Auth::user()->first_time_login;

        if ($firstTimeLogin && !$manager->isImpersonating()) {
            Auth::user()->first_time_login = false;
            Auth::user()->save();
        }

        $accounts = User::whereHas('roles', function ($q) {
            $q->orWhere('name', 'merchant');
            $q->orWhere('name', 'agent');
        })->where('id', '<>', Auth::user()->id)
            ->paginate(10);

        return view('dashboard.index', compact('firstTimeLogin', 'accounts'));
    }

    public function inactiveAccount()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $status = strtolower(str_replace(' ', '-', Auth::user()->status));

        $view = sprintf('errors.account-status.%s', $status);

        if (View::exists($view)) {
            return view($view);
        }

        abort(403);
    }
}
