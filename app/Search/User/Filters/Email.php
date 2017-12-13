<?php

namespace App\Search\User\Filters;

use App\Search\Contract\SearchFilter;
use Illuminate\Database\Eloquent\Builder;

class Email implements SearchFilter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('email', 'like', '%'.$value.'%');
    }
}