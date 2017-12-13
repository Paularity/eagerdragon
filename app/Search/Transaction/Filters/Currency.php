<?php

namespace App\Search\Transaction\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Currency implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('currency', $value);
    }
}