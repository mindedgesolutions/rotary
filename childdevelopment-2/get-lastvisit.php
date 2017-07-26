<?php
include('include/config.php');

$lastDate = mysql_fetch_array(mysql_query("select current_visit_month from asha_kiran_center_rating where ngo='".$_REQUEST['ngo']."' and center='".$_REQUEST['center_name']."' order by id desc"));

if ($lastDate['current_visit_month']==''){

	$last_visit = 'N/A';
}else{

	$last_visit = $lastDate['current_visit_month'];
}

echo $last_visit;