<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use App\Variables;
use App\BankInformation;
use App\MerchantAccount;
use Illuminate\Http\Request;
use App\BusinessInformation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMerchantAccountRequest;
use App\Http\Requests\UpdateMerchantAccountRequest;

class MerchantAccountsController extends Controller
{
    public function index()
    {
        if (!Bouncer::allows('manage-merchants')) {
            abort(403);
        }

        $merchants = User::whereHas('roles', function($q){
            $q->where('name', 'merchant');
        })->with([
            'businessInformation' => function ($q) {
                $q->addSelect(['id', 'user_id', 'business_name']);
            },
            'merchantAccount' => function ($q) {
                $q->addSelect(['id', 'user_id', 'created_by']);
            },
        ])->paginate(10);

        $this->templateVars();

        return view('merchant.index', compact('merchants'));
    }

    public function create()
    {
        if (!Bouncer::allows('manage-merchants')) {
            abort(403);
        }

        $this->templateVars();

        return view('merchant.create');
    }

    public function store(CreateMerchantAccountRequest $request)
    {
        if (!Bouncer::allows('manage-merchants')) {
            abort(403);
        }

        $role = Auth::user()->roles()->get(['name'])[0]->name;

        if ($role === 'agent') {
            $request->merge(['affiliate_id' => Auth::user()->id]);
        }

        $request->merge([
            'password' => bcrypt(mt_rand(000000, 999999)),
            'user_id' => Auth::user()->id,
            'created_by' => Auth::id(),
        ]);

        $user = User::create($request->all());

        $user->merchantAccount()->create(
            $request->only((new MerchantAccount)->getFillableFields())
        );

        $user->businessInformation()->create(
            $request->only((new BusinessInformation)->getFillableFields())
        );

        $user->bankInformation()->create(
            $request->only((new BankInformation)->getFillableFields())
        );

        Bouncer::assign('merchant')->to($user);

        Bouncer::allow($user)->toManage($user);

        Bouncer::allow($user)->to(
            (new User)->getAbilitiesPerRole('merchant')
        );

        return redirect()->back()->with('success',
            'New Merchant Account was added successfully!'
        );
    }

    public function edit(User $merchantAccount)
    {
        if (!Bouncer::allows('manage-merchants') &&
            !Bouncer::allows('edit', $merchantAccount)
            ) {
            abort(403);
        }

        $merchant = $merchantAccount;
        $account = $merchant->merchantAccount;
        $bankInfo = $merchant->bankInformation;
        $businessInfo = $merchant->businessInformation;

        $this->templateVars();

        return view('merchant.edit', compact(
            'merchant', 'businessInfo', 'account', 'bankInfo'
        ));
    }

    public function update(UpdateMerchantAccountRequest $request)
    {
        $user = User::findOrFail($request->user_id);

        if (!Bouncer::allows('manage-merchants') &&
            !Bouncer::allows('edit', $user)
            ) {
            abort(403);
        }

        $user->update($request->all());

        $user->merchantAccount()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only((new MerchantAccount)->getFillableFields())
        );

        $user->businessInformation()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only((new BusinessInformation)->getFillableFields())
        );

        $user->bankInformation()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only((new BankInformation)->getFillableFields())
        );

        return redirect()->back()->with('success',
            'Merchant Account was updated successfully!'
        );
    }

    public function show(User $merchantAccount)
    {
        if (!Bouncer::allows('manage-merchants') &&
            !Bouncer::allows('view', $merchantAccount)
            ) {
            abort(403);
        }

        $this->templateVars();

        $merchant = $merchantAccount;
        $account = $merchant->merchantAccount;
        $bankInfo = $merchant->bankInformation;
        $processors = $account->processors;
        $businessInfo = $merchant->businessInformation;

        return view('merchant.show', compact(
            'merchant', 'businessInfo', 'account', 'processors', 'bankInfo'
        ));
    }

    public function destroy(User $merchantAccount)
    {
        if (!Bouncer::allows('manage-merchants') &&
            !Bouncer::allows('delete', $merchantAccount)
            ) {
            abort(403);
        }

        $merchantAccount->delete();

        return redirect()->back()->with('message',
            'Merchant Account was deleted successfully!'
        );
    }

    public function templateVars()
    {
        $variables = new Variables;
        $countryList = $variables->getCountriesList();

        $statesList = $variables->getStatesList();
        $businessType = $variables->getBusinessType();

        $userPresetStatus = array_flip((new User())->getPresetSTatus());
        $accountType = [
            'personal' => 'Personal',
            'business' => 'Business',
        ];

        \View::share('countryList', $countryList);
        \View::share('accountType', $accountType);
        \View::share('businessType', $businessType);
        \View::share('userPresetStatus', $userPresetStatus);
        \View::share('statesList', $statesList);
    }
}
