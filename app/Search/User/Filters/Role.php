<?php

namespace App\Search\User\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Role implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereHas('roles', function($q) use ($value) {
            $q->where('name', $value);
        });
    }
}