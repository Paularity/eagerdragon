<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\AccessCode;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Controller;

class AccessCodesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verifiedAccessCode']);
    }

    public function index()
    {
        return view('auth.access-code');
    }

    public function verify(Request $request)
    {
        $accessCodeService = new AccessCode($request);

        if ($accessCodeService->validate()) {
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['error', 'Invalid Access Code!']);
    }

    public function resend(Request $request)
    {
        event(new Login($request->user(), true));

        return redirect()->back()->with('message', 'Access Code Sent!');
    }
}
