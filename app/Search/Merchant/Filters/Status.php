<?php

namespace App\Search\Merchant\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Status implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->status($value);
    }
}