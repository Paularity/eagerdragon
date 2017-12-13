<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use App\Variables;
use App\AgentAccount;
use Illuminate\Http\Request;

class PublicAgentAccountRegistrationController extends Controller
{
    public function __construct(  )
    {
        return $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setTemplateVars();

        return view('agent.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'username' => mt_rand(000000, 999999),
            'password' => mt_rand(000000, 999999),
        ]);
        return $request->all();
        exit();
        $dataUser = $request->only([
            'username', 'password', 'email',
        ]);
        $dataUser['firstname'] = $request->primary_contact;
        $dataUser['mobile_number'] = $request->phone;

        $user = User::create($dataUser);

        $dataAgent = $request->only([
            'business_name', 'legal_name', 'website',
            'business_type',
            'city', 'us_state', 'zippostal_code',
            'timezone', 'tax_id',
        ]);
        $dataAgent['address1'] = $request->business_street_address;
        $dataAgent['user_id'] = $user->id;

        $user->agentAccount()->create($dataAgent);

        Bouncer::assign('agent')->to($user);
        Bouncer::allow($user)->toManage($user);
        Bouncer::allow($user)->to(
            (new User)->getAbilitiesPerRole('agent')
        );

        return redirect()->back()->with('success', 
            'Successfully submitted. We will inform you once 
            your application is approve.');
    }

    public function setTemplateVars(  )
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
