<?php
include 'include/config.php';

$check = mysql_fetch_array(mysql_query("select otp from tender_registration_details where mobile_no='".$_REQUEST['mobno']."'"));

if ($check['otp']!=$_REQUEST['otp']){

	echo 1;
}