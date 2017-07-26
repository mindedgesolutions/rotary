<?php
include('include/config.php');

$check = mysql_num_rows(mysql_query("select * from honor_master where email='".$_REQUEST['email']."'"));

if ($check > 0){
	echo 1;
}