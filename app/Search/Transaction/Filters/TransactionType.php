<?php

namespace App\Search\Transaction\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class TransactionType implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('transaction_type', $value);
    }
}