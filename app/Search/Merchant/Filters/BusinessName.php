<?php

namespace App\Search\Merchant\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class BusinessName implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereHas('businessInformation',
            function($q) use ($value) {
                $q->where('business_name', 'like', '%'.$value.'%');
        });
    }
}