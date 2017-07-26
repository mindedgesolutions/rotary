<?php
include('include/config.php');

$date = date('Y-m-d', strtotime($_REQUEST['date']));

$explode = explode('-', $date);

$month = date('F', strtotime($date));
$year = $explode[0];

echo $month.'-'.$year;