<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use App\Customer;
use App\Transaction;
use App\Processor;
use App\Variables;
use App\VirtualTerminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateVirtualTerminalRequest;
use App\Http\Requests\UpdateVirtualTerminalRequest;

class VirtualTerminalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Bouncer::allows('use-virtual-terminal')) {
            abort(403);
        }

        $this->setTemplateVars();

        return view('virtual-terminal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Bouncer::allows('use-virtual-terminal')) {
            abort(403);
        }

        $this->setTemplateVars();
        return view('virtual-terminal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVirtualTerminalRequest $request)
    {

        if (!Bouncer::allows('use-virtual-terminal')) {
            abort(403);
        }

        $customer = Customer::findOrFail($request->customer_id);

        $data = $request->only([
                'amount',
                'credit_card_number',
                'credit_card_expiration_year',
                'credit_card_expiration_month',
            ]);

        $data['credit_card_number'] = Hash::make(
            $request->credit_card_number);
        // $data['credit_card_cvv'] = Hash::make(
        //     $request->credit_card_cvv);
        $data['credit_card_expiration_year'] = Hash::make(
            $request->credit_card_expiration_year);
        $data['credit_card_expiration_month'] = Hash::make(
            $request->credit_card_expiration_month);
        $data['merchant_id'] = $customer->user_id;
        $payment = Transaction::create($data);

        $request->merge(['payment_id' => $payment->id]);
        VirtualTerminal::create($request->except([
            'amount',
            'credit_card_number', 'credit_card_cvv',
            'credit_card_expiration_year',
            'credit_card_expiration_month',
        ]));

        return redirect()->back()
            ->with('success', 'New Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if (!Bouncer::allows('use-virtual-terminal') &&
            !Bouncer::allows('view', $user)
            ) {
            abort(403);
        }

        $vt = VirtualTerminal::findOrFail($id);

        $this->setTemplateVars();

        return view('virtual-terminal.show', compact('vt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if (!Bouncer::allows('use-virtual-terminal') &&
            !Bouncer::allows('edit', $user)
            ) {
            abort(403);
        }

        $vt = VirtualTerminal::findOrFail($id);
        $this->setTemplateVars();

        return view('virtual-terminal.edit', compact('vt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVirtualTerminalRequest $request)
    {
        $vt = VirtualTerminal::findOrFail($request->vt_id);
        $vt->update($request->all());

        return redirect()->back()
            ->with('success', 'A Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if (!Bouncer::allows('use-virtual-terminal') &&
            !Bouncer::allows('delete', $user)
            ) {
            abort(403);
        }

        $vt = VirtualTerminal::findOrFail($id);
        $vt->delete();

        return redirect()->back()
            ->with('message', 'A Record deleted successfully');
    }

    public function merchant( Request $request )
    {
        $merchant = User::findOrFail($request['id']);

        return $merchant->merchantAccount->processors;
    }

    private function setTemplateVars()
    {
        $variables = new Variables;
        $currencyList = $variables->getCurrencyList();
        $timezones = $variables->getTimezones();
        $countryList = $variables->getCountriesList();
        $statesList = $variables->getStatesList();
        $businessType = $variables->getBusinessType();
        $envList = $variables->getEnvironmentList();
        $expirationMonth = $variables->getExpirationMonth();
        
        $customerList = Customer::all();

        $merchantList = User::whereHas('roles', function($q){ 
            $q->where('name', 'merchant');
        })->get();

        \View::share('currencyList', $currencyList);
        \View::share('timezones', $timezones);
        \View::share('countryList', $countryList);
        \View::share('statesList', $statesList);
        \View::share('businessType', $businessType);
        \View::share('merchantList', $merchantList);
        \View::share('customerList', $customerList);
        \View::share('expirationMonth', $expirationMonth);
        \View::share('envList', $envList);
    }
}
