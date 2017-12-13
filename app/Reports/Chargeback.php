<?php

namespace App\Reports;

use Illuminate\Http\Request;
use App\Chargeback as ChargebackModel;
use App\Search\Chargeback\SearchChargeback;

class Chargeback
{
    public $searchQuery;
    public $chargebackResultsCount;
    public $allChargebacksCount;

    public function __construct(Request $request)
    {
        $this->searchQuery = SearchChargeback::filter($request);
        $this->chargebackResultsCount = with(clone $this->searchQuery)->count();
        $this->allChargebacksCount = ChargebackModel::count();
    }

    public function totalChargebacks()
    {
        $volume = with(clone $this->searchQuery)->sum('amount');

        return $this->calculate($volume, $this->allChargebacksCount);
    }

    public function totalMCChargebacks()
    {
        $count = with(clone $this->searchQuery)
            ->where('credit_card_type', 'mastercard')
            ->count();
        $volume = with(clone $this->searchQuery)
            ->where('credit_card_type', 'mastercard')
            ->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalVisaChargebacks()
    {
        $count = with(clone $this->searchQuery)
            ->where('credit_card_type', 'visa')
            ->count();
        $volume = with(clone $this->searchQuery)
            ->where('credit_card_type', 'visa')
            ->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function totalMotoChargebacks()
    {
        $count = with(clone $this->searchQuery)
            ->where('is_for_moto', 1)
            ->count();
        $volume = with(clone $this->searchQuery)
            ->where('is_for_moto', 1)
            ->sum('amount');

        return $this->calculate($volume, $count);
    }

    public function calculate($volume, $count)
    {
        $percentVolume = '0.00';
        $chargebackPercent = '0.00';

        if ($volume > 0) {
            $percentVolume = ($volume / with(clone $this->searchQuery)
            ->sum('amount')) * 100;
            $percentVolume = number_format($percentVolume, 2);
            $volume = number_format($volume, 2);
        }

        if ($count > 0) {
            $chargebackPercent = ($count / $this->chargebackResultsCount) * 100;
            $chargebackPercent = number_format($chargebackPercent, 2);
        }

        return [
            'volume' => $volume > 0 ? $volume : '0.00',
            'percentVolumn' => $percentVolume,
            'numOfChargeback' => $count,
            'chargebackPercent' => $chargebackPercent,
        ];
    }
}
