<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use Carbon\Carbon;
use App\Variables;
use App\Processor;
use App\MerchantAccount;
use Illuminate\Http\Request;

class MerchantProcessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MerchantAccount $merchantAccount)
    {
        $processors = $merchantAccount->processors()->get();
        $user = $merchantAccount->user;
        $businessInfo = $user->businessInformation;
        $this->setTemplateVars($user);

        return view('merchant-processor.index',
            compact('merchantAccount', 'processors', 'businessInfo')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MerchantAccount $merchantAccount)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $merchant = $merchantAccount->user;

        if ($merchant->status !== 'active') {
            abort(404);
        }

        if (empty(Processor::first())) {
            return redirect()->back()
                ->with('message', 'No processors found.
                    You must add a processor first!');
        }
        $proc = [];
        foreach ($merchantAccount->processors as $val) {
            $proc[] = $val['id'];
        }

        $processors = Processor::whereNotIn('id', $proc)
                        ->pluck('name', 'id');

        $this->setTemplateVars($merchantAccount->user);

        return view('merchant-processor.create',
            [
                'merchantAccount' => $merchantAccount,
                'merchant' => $merchant,
                'processors' => $processors,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MerchantAccount $merchantAccount)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        if ($merchantAccount->user->status !== 'active') {
            abort(404);
        }

        $this->validate($request, [
            'processor_id' => 'required|exists:processors,id',
        ]);

        $request['password'] = bcrypt($request['password']);

        $merchantAccount->processors()
            ->attach([$request['processor_id'] =>
                $request->except(['processor_id', '_token']),
            ]);

        return redirect()->back()->with(
            'success', 'Merchant Processor was added Successfully!'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantAccount $merchantAccount, $processorId)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $merchantProcessor = $merchantAccount->processors()
            ->where('processor_id', $processorId)->first();
        $merchant = $merchantAccount->user;
        if ($merchantProcessor->pivot->start_date) {
            $merchantProcessor->pivot->start_date = Carbon::parse(
                $merchantProcessor->pivot->start_date
            )->format('m/d/Y');
        }
        $this->setTemplateVars();

        return view('merchant-processor.edit',
            compact('merchantProcessor', 'merchantAccount', 'merchant')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateProcessorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        MerchantAccount $merchantAccount,
        $processorId
        )
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }
        //return $request->all();
        $merchantAccount->processors()
            ->where('processor_id', $processorId)
            ->sync([$processorId =>
                $request->except(['processor_id', '_token', '_method']),
            ]);

        return redirect()->back()->with('success',
            'Processor was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerchantAccount $merchantAccount, $processorId)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $merchantAccount->processors()->detach($processorId);

        return redirect()->back()->with(
            'success', 'Merchant Processor was deleted Successfully!'
        );
    }

    public function setTemplateVars($user = null)
    {
        $variables = new Variables;
        $currencyList = $variables->getCurrencyList();
        $transactionTypes = $variables->getTransactionTypes();
        $paymentMethods = $variables->getPaymentMethods();
        $apiKey = md5(microtime());

        \View::share('businessName', !$user
            ?: $user->businessInformation->business_name
        );
        \View::share('currencyList', $currencyList);
        \View::share('transactionTypes', $transactionTypes);
        \View::share('paymentMethods', $paymentMethods);
        \View::share('apiKey', $apiKey);
    }
}