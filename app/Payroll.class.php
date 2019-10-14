<?php

namespace App;

use Carbon\Carbon;

class Payroll Extends DatesCalculations
{
    private $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function calculateDates()
    {
        $this->year = is_null($this->year) ? Carbon::now()->year : $this->year;

        $data = array();

        for ($m = 1; $m < 13; $m++) {
            $data[$m]['months'] = '"'.Carbon::create($this->year,$m,1)->format('F').'" ';
            $data[$m]['firstExpenseDates'] = '"'.DatesCalculations::getExpenseDate(1,$m,$this->year).'" ';
            $data[$m]['secondExpenseDates'] = '"'.DatesCalculations::getExpenseDate(15,$m,$this->year).'" ';
            $data[$m]['salaryDates'] = '"'.DatesCalculations::getSalaryDate(0,$m,$this->year). '"';
        }

        $heading = '"Month Name", "1st Expenses Day", “2nd Expenses Day”, "Salary Day"';

        $this->genExport($data,$heading);
    }

    public function genExport($data,$heading)
    {
        $file = fopen($this->year . '.txt', "w");

        fwrite($file,$heading);

        foreach($data as $k => $v)
        {
            $line = "\n" . $v["months"] . $v["firstExpenseDates"] . $v['secondExpenseDates'] . $v['salaryDates'];
            fwrite($file,$line);
        }

        fclose($file);

        echo "\n";
        echo "Success, your ". $this->year.".txt was created!";
        echo "\n";
        echo "\n";
    }
}
