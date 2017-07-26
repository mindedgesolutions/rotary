<?php
include('include/config.php');
/*$data= $_GET['id'];

$sql= "select DISTINCT `donar_club` from tbl_donar_master_no_email where donar_district= '$data' and donar_email = '' AND first_name !='' AND donar_district != '' AND donar_club != ''";
$query = mysql_query($sql);
echo '<option value="">Select Club</option>';
while($row=mysql_fetch_array($query))
 {
  $club=$row['donar_club'];
  
  echo '<option value="'.$club.'">'.$club.'</option>';
 }
*////////////////////////////////////////////////////////////////////////////////////////////////////////////

$di= $_GET['di'];

$sql= "Select DISTINCT `donar_club` from tbl_donar_master where donar_district = '$di'";
$query = mysql_query($sql);
echo '<option value="">Select Club</option>';
while($row=mysql_fetch_array($query))
 {
  $club=$row['donar_club'];
  
  echo '<option value="'.$club.'">'.$club.'</option>';
 }?>