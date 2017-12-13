<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use App\Variables;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\CreateCustomerRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Bouncer::allows('manage-customers')) {
            abort(403);
        }

        $customers = Customer::paginate(10);

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Bouncer::allows('manage-customers')) {
            abort(403);
        }

        $this->setTemplateVars();
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        if (!Bouncer::allows('manage-customers')) {
            abort(403);
        }

        Customer::create($request->all());

        return redirect()->back()->with('success', 'New customer added successfully!');
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
        if (!Bouncer::allows('manage-customers') &&
            !Bouncer::allows('view', $user)
            ) {
            abort(403);
        }

        $customer = Customer::findOrFail($id);
        $this->setTemplateVars();

        return view('customer.show', compact('customer'));
    }

    public function showData( $id )
    {
        return Customer::findOrFail($id);
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
        if (!Bouncer::allows('manage-customers') &&
            !Bouncer::allows('edit', $user)
            ) {
            abort(403);
        }

        $this->setTemplateVars();
        $customer = Customer::findOrFail($id);

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request)
    {
        if (!Bouncer::allows('manage-customers')) {
            abort(403);
        }
        
        $customer = Customer::findOrFail($request->customer_id);
        $customer->update($request->all());

        return redirect()->back()->with('success', 
            'Customer was updated successfully!'
        );
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
        if (!Bouncer::allows('manage-customers') &&
            !Bouncer::allows('delete', $user)
            ) {
            abort(403);
        }

        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect()->back()->with('message', 
            'Customer was deleted successfully!'
        );
    }

    public function setTemplateVars(  )
    {
        $variables = new Variables;
        $timezones = $variables->getTimezones();
        $countryList = $variables->getCountriesList();
        $statesList = $variables->getStatesList();
        $businessType = $variables->getBusinessType();

        $merchantList = User::whereHas('roles', function($q){ 
            $q->where('name', 'merchant');
        })->get();

        \View::share('merchantList', $merchantList);
        \View::share('timezones', $timezones);
        \View::share('countryList', $countryList);
        \View::share('statesList', $statesList);
        \View::share('businessType', $businessType);
    }    
}
