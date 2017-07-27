<?php
include 'include/config.php';

$check = mysql_num_rows(mysql_query("select * from tender_registration_details where mobile_no='".$_REQUEST['mobile_no1']."' and status='verified'"));

if ($check > 0){

	echo 1;
}