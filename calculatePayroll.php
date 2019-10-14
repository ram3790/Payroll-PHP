<?php
require 'vendor/autoload.php';

$payroll = new \App\Payroll($argv[1]);

$payroll->calculateDates();