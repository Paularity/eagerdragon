<?php

namespace App\Search\Contract;

use Illuminate\Database\Eloquent\Builder;

interface SearchFilter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value);
}