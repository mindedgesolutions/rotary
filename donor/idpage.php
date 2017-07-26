<?php
include('include/config.php');
$email=$_POST['email'];
$query=mysql_query("select donar_id from tbl_donar_master where donar_email='$email' ORDER BY donar_id limit 1");
$result=mysql_fetch_row($query);
echo $result[0];    // echo the name to js function
exit;
?>

