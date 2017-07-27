<?php
include 'include/config.php';

$check = mysql_num_rows(mysql_query("select * from tender_registration_details where login_id='".$_REQUEST['login_id']."'"));

if ($check > 0){

	echo 1;
}