<?php

namespace App\Search\Transaction\Filters;

use App\MerchantAccount;
use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Agent implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        $merchantIds = MerchantAccount::where('affiliate_id', $value)
            ->get(['user_id']);

        return $builder->whereIn('merchant_id', $merchantIds);
    }
}