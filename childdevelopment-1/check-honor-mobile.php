<?php
include('include/config.php');

$check = mysql_num_rows(mysql_query("select * from honor_master where mobile_no='".$_REQUEST['mobile_no1']."'"));

if ($check > 0){
	echo 1;
}