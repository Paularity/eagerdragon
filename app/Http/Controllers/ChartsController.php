<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction as TransactionModel;

class ChartsController extends Controller
{
    public function index()
    {
        $monthLabels = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ];

        $labels = [];
        TransactionModel::select(
            DB::raw('count(id) as `data`'),
            DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        )
        ->groupby('year', 'month')
        ->get();

        $labels[] = sprintf('%s %s', $monthLabels[$startDateMonth], $startDateYear);

        $diffMonths = $startDate->diffInMonths($endDate);

        for ($i = 1; $i <= $diffMonths; $i++) {
            $startDateMonth++;
            if ($startDateMonth > 12) {
                $startDateMonth = 1;
                $startDateYear += 1;
            }

            $labels[] = sprintf('%s %s', $monthLabels[$startDateMonth], $startDateYear);
        }
        return $labels;

        TransactionModel::select('id', 'created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('M Y');
            });
    }
}
