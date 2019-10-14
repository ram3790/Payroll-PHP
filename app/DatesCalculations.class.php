<?php

namespace App;

use Carbon\Carbon;

class DatesCalculations
{
    public static function getSalaryDate($d,$m,$y) 
    {
        $date = $d == 0 ? Carbon::create($y, $m, 1)->endOfMonth() : Carbon::create($y, $m, $d);

        if ($date->isSaturday()) {
            // Saturday 
            return $date->subDay(1)->toDateString();
        } elseif ($date->isSunday()) {
            // Sunday
            return $date->subDay(2)->toDateString();
        } else {
            //Working day
            return $date->toDateString();
        }
    }

    public static function getExpenseDate($d,$m,$y) 
    {
        $date = Carbon::create($y, $m, $d);

        if ($date->isSaturday()) {
            // Saturday 
            return $date->addDay(2)->toDateString();
        } elseif ($date->isSunday()) {
            // Sunday
            return $date->addDay(1)->toDateString();
        } else {
            //Working day
            return $date->toDateString();
        }
    }
}