<?php
require 'vendor/autoload.php';

$payroll = new \App\Payroll;

$payroll->calculateDates($argv[1]);