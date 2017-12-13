<?php

namespace App\Search\Merchant\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Firstname implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('firstname', 'like', '%'.$value.'%');
    }
}