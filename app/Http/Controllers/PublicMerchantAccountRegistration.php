<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use App\Variables;
use App\MerchantAccount;
use App\BusinessInformation;
use App\Http\Requests\CreateMerchantAccountRequest;

class PublicMerchantAccountRegistration extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		$this->templateVars();

		return view('merchant.register');
	}

    public function store(CreateMerchantAccountRequest $request)
    {
        $request->merge([
        	'password' => mt_rand(000000, 999999),
        	'status' => 'for verification'
    	]);

        $user = User::create($request->all());

        $user->merchantAccount()->create(
            $request->only((new MerchantAccount)->getFillableFields())
        );

        $user->businessInformation()->create(
            $request->only((new BusinessInformation)->getFillableFields())
        );

        Bouncer::assign('merchant')->to($user);

        Bouncer::allow($user)->toManage($user);

        Bouncer::allow($user)->to(
            (new User)->getAbilitiesPerRole('merchant')
        );

        return redirect()->back()->with('success',
            'Your account has been submitted for verification.
            You will be notified thru email once your account is ready.'
        );
    }

    public function templateVars()
    {
        $variables = new Variables;
        $timezones = $variables->getTimezones();
        $countryList = $variables->getCountriesList();
        $statesList = $variables->getStatesList();
        $businessType = $variables->getBusinessType();

        \View::share('timezones', $timezones);
        \View::share('countryList', $countryList);
        \View::share('statesList', $statesList);
        \View::share('businessType', $businessType);
    }
}
