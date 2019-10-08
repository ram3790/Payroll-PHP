<?php

namespace App;

use Carbon\Carbon;

class Payroll
{
    public function calculateDates($y=null)
    {
        if(is_null($y))
        {
            $y = Carbon::now()->year;
        }

        $data = array();

        for ($m = 1; $m < 13; $m++) {
            $data[] = '"' .Carbon::create($y,$m,1)->format('F').'"' .' '.'"' .$this->getExpenseDate(1,$m,$y).'"' .' '. '"' .$this->getExpenseDate(15,$m,$y). '"' . ' ' . '"' .$this->getSalaryDate(0,$m,$y). '"';
        }
        $this->genExport($data,$y);
    }

    public function getSalaryDate($d,$m,$y) 
    {
        if($d == 0){
            $date = Carbon::create($y, $m, 1)->endOfMonth();
        }else{
            $date = Carbon::create($y, $m, $d);
        }

        if($date->isSaturday()){
            // Saturday 
            return $date->subDay(1)->toDateString();
        } elseif($date->isSunday()) {
            // Sunday
            return $date->subDay(2)->toDateString();
        }else{
            //Working day
            return $date->toDateString();
        }
    }

    public function getExpenseDate($d,$m,$y) 
    {
        $date = Carbon::create($y, $m, $d);

        if($date->isSaturday()){
            // Saturday 
            return $date->addDay(2)->toDateString();
        } elseif($date->isSunday()) {
            // Sunday
            return $date->addDay(1)->toDateString();
        }else{
            //Working day
            return $date->toDateString();
        }
    }

    public function genExport($data,$year)
    {
        $file = fopen($year . '.txt', "w");

        $heading = '"Month Name", "1st expenses day", “2nd expenses day”, "Salary day"';
        fwrite($file,$heading);

        foreach($data as $row){
            $line = "\n" . $row;
            fwrite($file,$line);
        }

        fclose($file);

        echo "\n";
        echo "Success, your ". $year .".txt was created!";
        echo "\n";
        echo "\n";
    }
}
