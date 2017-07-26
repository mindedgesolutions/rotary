<?php
include('include/config.php');

$check = mysql_num_rows(mysql_query("select * from temp_untag_details where child_id='".$_REQUEST['child_id']."' and donor_id='".$_REQUEST['donor_id']."'"));

if ($check > 0){

	$deleteDonor = "delete from temp_untag_details where child_id='".$_REQUEST['child_id']."' and donor_id='".$_REQUEST['donor_id']."'";

	mysql_query($deleteDonor);
}