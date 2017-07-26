<?php
include('include/config.php');
$data=$_GET['id'];

$sql= mysql_query("select DISTINCT `first_name`,`last_name` from tbl_donar_master where donar_club='$data' and donar_email = '' AND first_name !='' AND donar_district != '' AND donar_club != ''");
echo '<option value="">Select Donar</option>';
while($row=mysql_fetch_array($sql))
 {
  $donor_name = $row['first_name'].$row['last_name'];
  echo '<option value="'.$donor_name.'">'.$donor_name.'</option>';
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////


?>