<?php

namespace App\Reports;

use Illuminate\Http\Request;
use App\Transaction as TransactionModel;
use App\Search\Transaction\SearchTransaction;

class Transaction
{
    public $searchQuery;
    public $transactionResultsCount;
    public $allTransactionsCount;

    public function __construct(Request $request)
    {
        $this->searchQuery = SearchTransaction::filter($request);
        $this->transactionResultsCount = with(clone $this->searchQuery)->count();
        $this->allTransactionsCount = TransactionModel::count();
    }

    public function totalVisaSales()
    {
        $count = with(clone $this->searchQuery)->where('credit_card_type', 'visa')
            ->where('transaction_type', 'sales')->count();
        $volume = with(clone $this->searchQuery)->where('credit_card_type', 'visa')
            ->where('transaction_type', 'sales')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalMCSales()
    {
        $count = with(clone $this->searchQuery)->where('credit_card_type', 'mastercard')
            ->where('transaction_type', 'sales')->count();
        $volume = with(clone $this->searchQuery)->where('credit_card_type', 'mastercard')
            ->where('transaction_type', 'sales')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalSuccessfulSales()
    {
        $count = with(clone $this->searchQuery)->where('status', 2)
            ->where('transaction_type', 'sales')->count();
        $volume = with(clone $this->searchQuery)->where('status', 2)
            ->where('transaction_type', 'sales')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalFailedSales()
    {
        $count = with(clone $this->searchQuery)->where('status', 1)
            ->where('transaction_type', 'sales')->count();

        $volume = with(clone $this->searchQuery)->where('status', 1)
            ->where('transaction_type', 'sales')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalTransactionSales()
    {
        $count = with(clone $this->searchQuery)->where('transaction_type', 'sales')
            ->count();
        $volume = with(clone $this->searchQuery)->where('transaction_type', 'sales')
            ->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalSuccessfulAuths()
    {
        $count = with(clone $this->searchQuery)->where('status', 2)
            ->where('transaction_type', 'auth')->count();
        $volume = with(clone $this->searchQuery)->where('status', 2)
            ->where('transaction_type', 'auth')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalFailedAuths()
    {
        $count = with(clone $this->searchQuery)->where('status', 1)
            ->where('transaction_type', 'auth')->count();

        $volume = with(clone $this->searchQuery)->where('status', 1)
            ->where('transaction_type', 'auth')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalTransactionAuths()
    {
        $count = with(clone $this->searchQuery)->where('transaction_type', 'auth')
            ->count();
        $volume = with(clone $this->searchQuery)->where('transaction_type', 'auth')
            ->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalSuccessfulRefunds()
    {
        $count = with(clone $this->searchQuery)->where('status', 2)
            ->where('transaction_type', 'refund')->count();
        $volume = with(clone $this->searchQuery)->where('status', 2)
            ->where('transaction_type', 'refund')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalFailedRefunds()
    {
        $count = with(clone $this->searchQuery)->where('status', 1)
            ->where('transaction_type', 'refund')->count();

        $volume = with(clone $this->searchQuery)->where('status', 1)
            ->where('transaction_type', 'refund')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalTransactionRefunds()
    {
        $count = with(clone $this->searchQuery)->where('transaction_type', 'refund')
            ->count();
        $volume = with(clone $this->searchQuery)->where('transaction_type', 'refund')
            ->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalMCRefunds()
    {
        $count = with(clone $this->searchQuery)->where('credit_card_type', 'mastercard')
            ->where('transaction_type', 'refund')->count();
        $volume = with(clone $this->searchQuery)->where('credit_card_type', 'mastercard')
            ->where('transaction_type', 'refund')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalVisaRefunds()
    {
        $count = with(clone $this->searchQuery)->where('credit_card_type', 'visa')
            ->where('transaction_type', 'refund')->count();
        $volume = with(clone $this->searchQuery)->where('credit_card_type', 'visa')
            ->where('transaction_type', 'refund')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalMotoSales()
    {
        $count = with(clone $this->searchQuery)->where('is_for_moto', 1)
            ->where('transaction_type', 'sales')->count();
        $volume = with(clone $this->searchQuery)->where('is_for_moto', 1)
            ->where('transaction_type', 'sales')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalReturns()
    {
        $count = 0;
        $volume = 0;

        return $this->calculate($volume, $count);
    }

    public function overallTransactionsTotal()
    {
        $count = with(clone $this->searchQuery)->where('transaction_type', 'sales')
            ->orWhere('transaction_type', 'refund')
            ->orWhere('transaction_type', 'auth')
            ->orWhere('transaction_type', 'capture')
            ->count();
        $volume = with(clone $this->searchQuery)->where('transaction_type', 'sales')
            ->orWhere('transaction_type', 'refund')
            ->orWhere('transaction_type', 'auth')
            ->orWhere('transaction_type', 'capture')->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function calculate($volume, $count)
    {
        $percentVolume = '0.00';
        $numOfTraxPercent = '0.00';

        if ($volume > 0) {
            $percentVolume = ($volume / with(clone $this->searchQuery)
            ->sum('amount')) * 100;
            $percentVolume = number_format($percentVolume, 2);
            $volume = number_format($volume, 2);
        }

        if ($count > 0) {
            $numOfTraxPercent = ($count / $this->transactionResultsCount) * 100;
            $numOfTraxPercent = number_format($numOfTraxPercent, 2);
        }

        return [
            'volume' => $volume > 0 ? $volume : '0.00',
            'percentVolumn' => $percentVolume,
            'numOfTrax' => $count,
            'numOfTraxPercent' => $numOfTraxPercent,
        ];
    }
}
