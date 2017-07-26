<?php
include('include/config.php');

$getDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card where child_id='".$_REQUEST['response_child']."'"));

echo $getDet['child_dob'].'|'.$getDet['child_gender'];