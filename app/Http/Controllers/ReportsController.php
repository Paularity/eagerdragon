<?php

namespace App\Http\Controllers;

use App\User;
use App\Processor;
use App\Variables;
use Carbon\Carbon;
use App\Reports\Chargeback;
use App\Reports\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction as TransactionModel;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setTemplateVars();
        $results = [];

        return view('report.index', compact('results'));
    }

    /**
     * Generate Reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $request->validate([
            'period_start_date' => 'required',
            'period_end_date' => 'required|after:period_start_date',
        ]);

        $startDate = Carbon::parse($request->period_start_date);
        $endDate = Carbon::parse($request->period_end_date);
        $startDateMonth = $startDate->month;
        $startDateYear = $startDate->year;





        $transReport = new Transaction($request);
        $chargebackReport = new Chargeback($request);

        $results['transactions'] = [
            'Total Successful Sales' => $transReport->totalSuccessfulSales(),
            'Total Failed Sales' => $transReport->totalFailedSales(),
            'Total Transactions (Sales)' => $transReport->totalTransactionSales(),
            'Total MC Sales' => $transReport->totalMCSales(),
            'Total Visa Sales' => $transReport->totalVisaSales(),
            'Total Successful Auths' => $transReport->totalSuccessfulAuths(),
            'Total Failed Auths' => $transReport->totalFailedAuths(),
            'Total Auths' => $transReport->totalTransactionAuths(),
            'Total Successful Refunds' => $transReport->totalSuccessfulRefunds(),
            'Total Failed Refunds' => $transReport->totalFailedRefunds(),
            'Total Refunds' => $transReport->totalTransactionRefunds(),
            'Total MC Refunds' => $transReport->totalMCRefunds(),
            'Total Visa Refunds' => $transReport->totalVisaRefunds(),
            'Total MOTO Sales' => $transReport->totalMotoSales(),
            'Total Returns' => $transReport->totalReturns(),
            'Total Transactions (Sales+Refunds+Auths+Captures)' => $transReport
                ->overallTransactionsTotal(),
        ];

        $results['chargebacks'] = [
            'Total Chargebacks' => $chargebackReport->totalChargebacks(),
            'Total MC Chargebacks' => $chargebackReport->totalMCChargebacks(),
            'Total Visa Chargebacks' => $chargebackReport->totalVisaChargebacks(),
            'Total Moto Chargebacks' => $chargebackReport->totalMotoChargebacks(),
        ];

        $oldInputs = $request->all();

        $this->setTemplateVars();

        return view('report.index', compact('results', 'oldInputs'));
    }

    public function setTemplateVars()
    {
        $variables = new Variables();

        $transactionTypes = $variables->getTransactionTypes();
        $currencyList = $variables->supportedCurrnecies();
        $cardTypes = $variables->getCardTypes();
        $recurrings = $variables->recurrings();
        $bins = $variables->bins();
        $mids = [];

        $processors = Processor::all(['id', 'name']);

        $merchants = User::whereHas('roles', function ($q) {
            $q->where('name', 'merchant');
        })->with(['businessInformation' => function ($q) {
            $q->addSelect(['id', 'user_id', 'business_name']);
        }])->get(['id']);

        $agents = User::whereHas('roles', function ($q) {
            $q->where('name', 'agent');
        })->with(['agentAccount' => function ($q) {
            $q->addSelect(['id', 'user_id', 'business_name']);
        }])->get(['id']);

        \View::share('transactionTypes', $transactionTypes);
        \View::share('currencyList', $currencyList);
        \View::share('processors', $processors);
        \View::share('recurrings', $recurrings);
        \View::share('cardTypes', $cardTypes);
        \View::share('merchants', $merchants);
        \View::share('agents', $agents);
        \View::share('bins', $bins);
        \View::share('mids', $mids);
    }
}
