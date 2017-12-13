<?php

namespace App\Search\Chargeback;

use App\Chargeback;
use Illuminate\Http\Request;

class SearchChargeback
{
    public static function filter(Request $filters)
    {
        $query = with(new Chargeback())->newQuery();

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
                __NAMESPACE__,
                $className
            );

            if (class_exists($className)) {
                $query = $className::apply($query, $value);
            }
        }

        return $query;
    }
}
