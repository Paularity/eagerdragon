<?php

namespace App\Search\Transaction\Filters;

use Carbon\Carbon;
use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class PeriodEndDate implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereDate(
            'created_at', '<=', Carbon::parse($value)->toDateTimeString()
        );
    }
}