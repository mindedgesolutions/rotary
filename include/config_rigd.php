<?php
/*$host = '127.0.0.1';
$user = 'root';
$pass = '';
$database = 'rotary32_grant';*/

$host = '192.185.36.129';
$user = 'rotary32_grant2';
$pass = 'info123';
$database = 'rotary32_grant';

$connect = @mysql_connect($host,$user,$pass);
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}
$database = @mysql_select_db($database);
?>