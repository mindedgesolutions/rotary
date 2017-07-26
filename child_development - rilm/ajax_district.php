<?php
include('include/config.php');
$data=$_GET['id'];

$sql= mysql_query("select DISTINCT `donar_club` from tbl_donar_master where donar_district='$data'");
 echo '<option value="">Select Club</option>';
while($row=mysql_fetch_array($sql))
 {
  $club=$row['donar_club'];
  
  echo '<option value="'.$club.'">'.$club.'</option>';
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////


?>