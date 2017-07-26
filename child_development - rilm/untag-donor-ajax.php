<?php
include('include/config.php');

$check = mysql_num_rows(mysql_query("select * from temp_untag_details where child_id='".$_REQUEST['child_id']."' and donor_id='".$_REQUEST['donor_id']."'"));

if ($check==0){

	$insertDonor = "insert into temp_untag_details(child_id, donor_id, untagged_by, untagged_on) values('".$_REQUEST['child_id']."', '".$_REQUEST['donor_id']."', '".$_REQUEST['username']."', '".date('Y-m-d')."')";

	mysql_query($insertDonor);
}