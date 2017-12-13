<?php

namespace App\Search\Transaction;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchTransaction
{
    public static function filter(Request $filters)
    {
        $query = with(new Transaction)->newQuery();

        return static::applyFilterToQuery($filters, $query);
    }

    public static function applyFilterToQuery($filters, $query)
    {
        foreach ($filters->all() as $key => $value) {
            if (!$value) {
                continue;
            }

            $className = str_replace('_', ' ', $key);
            $className = ucwords($className);
            $className = str_replace(' ', '', $className);

            $className = sprintf(
                '%s\\Filters\\%s',
                __namespace__,
                $className
            );

            if (class_exists($className)) {
                $query = $className::apply($query, $value);
            }
        }

        return $query;
    }
}
