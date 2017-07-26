<?php
include('include/config.php');

$query_getData = mysql_query("select * from temp_untag_details where child_id='".$_REQUEST['child_id']."'");
while ($getData = mysql_fetch_array($query_getData)){

	$updateFinal = "delete from tbl_child_selected_tagging where child_id='".$_REQUEST['child_id']."' and donar_id='".$getData['donor_id']."'";

	mysql_query($updateFinal);
}
