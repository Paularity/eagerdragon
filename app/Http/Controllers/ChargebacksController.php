<?php

namespace App\Http\Controllers;

use PDF;
use Zipper;
use App\User;
use App\Chargeback;
use App\Variables;
use App\SupportingDocs;
use App\Transaction;
use App\Mail\ChargebackSendToBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreateChargebackRequest;
use App\Http\Requests\UpdateChargebackRequest;

class ChargebacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setTemplateVars();
        return view('chargeback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTemplateVars();

        return view('chargeback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chargeback::create($request->all());

        return redirect()->back()->with('success', 
            'Chargeback was created successfully!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setTemplateVars();
        $chargeback = Chargeback::findOrFail($id);

        return view('chargeback.show', compact('chargeback'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setTemplateVars();
        $chargeback = Chargeback::findOrFail($id);

        return view('chargeback.edit', compact('chargeback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $chargeback = Chargeback::findOrFail($request['chargeback_id']);
        $chargeback->update($request->all());

        return redirect()->back()->with('success', 
            'Chargeback was updated successfully!'
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
        $chargeback = Chargeback::findOrFail($id);
        $chargeback->delete();

        return redirect()->back()->with('message', 
            'Chargeback was deleted successfully!'
        );
    }

    public function search( Request $request )
    {
        if ($request->merchant_id !== 'all') {
            $chargeback = Chargeback::where('merchant_id', 
                        $request->merchant_id)
                    ->where('processor_id', $request->processor_id);
        } else {
            $chargeback = Chargeback::where('merchant_id', '!=', 'all');
        }

        if (!empty($request->period_start_date) &&
            !empty($request->period_end_date)) {
            $chargeback->whereBetween('created_at', 
                    [date('Y-m-d h:i:s', strtotime($request->period_start_date)), 
                    date('Y-m-d h:i:s', strtotime($request->period_end_date))]);
        }

        if (!empty($request->min_amount_range) &&
            !empty($request->max_amount_range)) {
            $chargeback->whereBetween('amount', 
                [$request->min_amount_range, $request->max_amount_range]);
        }

        if (!empty($request->transaction_id)) {
            $chargeback->where('sale_transaction_id', $request->transaction_id);
        }

        if (!empty($request->firstname)) {
            $chargeback->where('firstname', $request->firstname);
        }

        if (!empty($request->lastname)) {
            $chargeback->where('lastname', $request->lastname);
        }

        if (!empty($request->credit_card_number_last_four)) {
            $chargeback->where('credit_card_number_last_four', 
                $request->credit_card_number_last_four);
        }

        $chargebacks = $chargeback->paginate(10);

        return view('chargeback.search', compact('chargebacks'));
    }

    public function merchant( Request $request )
    {
        $merchant = User::findOrFail($request['id']);

        return $merchant->merchantAccount->processors;
    }

    public function downloadZip( $id )
    {
        $chargeback = Chargeback::findOrFail($id);
        $transaction = Transaction::findOrFail($chargeback->sale_transaction_id);

        PDF::loadView('pdf.layout', compact('transaction', 'chargeback'))
                ->save('pdf/'.$transaction->id.'.pdf');

        $files = glob(public_path('pdf/'.$transaction->id.'.pdf'));
        Zipper::make('transaction/'.$transaction->id.'.zip');

        return response()->download('transaction/'.$transaction->id.'.zip');
    }

    public function sendToBank( $id )
    {
        $chargeback = Chargeback::findOrFail($id);
        $transaction = Transaction::findOrFail($chargeback->sale_transaction_id);
        $files = SupportingDocs::where('chargeback_id', $chargeback->id)->get();

        $send = new ChargebackSendToBank($chargeback, $transaction, $files);

        Mail::to(Auth::user())->send($send);

        return redirect()->back()->with('success', 
            'Successfully send to bank!'
        );
    }

    public function setTemplateVars(  )
    {
        $variables = new Variables;
        $paymentMethod = $variables->getPaymentMethods();
        $transactionType = $variables->getTransactionTypes();
        $expirationMonth = $variables->getExpirationMonth();
        $disputeResult = $variables->getDisputeResultList();
        $statusList = array_flip($variables->getStatusList());
        $cbResponses = $variables->getChargebackResponses();

        $merchantList = User::whereHas('roles', function($q){ 
            $q->where('name', 'merchant');
        })->get();

        \View::share('merchantList', $merchantList);
        \View::share('disputeResult', $disputeResult);
        \View::share('statusList', $statusList);
        \View::share('paymentMethod', $paymentMethod);
        \View::share('transactionType', $transactionType);
        \View::share('expirationMonth', $expirationMonth);
        \View::share('cbResponses', $cbResponses);
    }    

}
