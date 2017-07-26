<?php
include('include/config.php');

$check = mysql_num_rows(mysql_query("select * from tbl_admin where password='".$_REQUEST['txtPassword']."'"));

if ($check > 0){
	echo 1;
}