<?php

namespace App\Search\Chargeback\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class CreditCardType implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('credit_card_type', $value);
    }
}
