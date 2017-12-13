<?php

namespace App\Search\User;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchUser
{
    public static function filter(Request $filters)
    {
        $query = with(new User)->newQuery()->where('id', '<>', Auth::user()->id);

        return static::applyFilterToQuery($filters, $query)->paginate(10);
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
