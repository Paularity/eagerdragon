<?php

namespace App\Search\Transaction\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Processor implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('processor_id', $value);
    }
}