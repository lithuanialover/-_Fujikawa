<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

$date = new DateTime();
//$date = new DateTime('1999-11-02 05:27:42');
echo $date->format('Y-m-d H:i:s');

$dt = Carbon::now();
echo $dt->year;

$dt = Carbon::now();
echo $dt->month;

$dt = Carbon::now();
echo $dt->day;

$dt = Carbon::now();
echo $dt->hour;

$dt = Carbon::now();
echo $dt->minute;

$dt = Carbon::now();
echo $dt->second;
