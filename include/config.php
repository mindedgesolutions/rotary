<?php
$host = '103.227.62.215';//'192.185.36.129';
$user = 'mindedgeteach1';
$pass = 'SuHiNa@1979';//'info123';
$database = 'rotary32_teach';

$connect = @mysql_connect($host,$user,$pass);
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}
$database = @mysql_select_db($database);




?>