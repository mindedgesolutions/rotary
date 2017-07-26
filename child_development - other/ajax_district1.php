<?php
include('include/config.php');

$data= $_GET['id'];

$sql= "Select DISTINCT `donar_club` from tbl_donar_master where donar_district = '$id'";
$query = mysql_query($sql);
echo '<option value="">Select Club</option>';
while($row=mysql_fetch_array($query))
 {
  $club=$row['donar_club'];
  
  echo '<option value="'.$club.'">'.$club.'</option>';
 }

///////////////////////////////////////////////////////////////////////////////////////////////////////////


?>