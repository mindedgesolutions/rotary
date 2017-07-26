<?php
include('include/config.php');
$data=$_GET['id'];

if($data == 'Inner Wheel'){

$sql=mysql_query("select DISTINCT `IWdistrict` from iwdistrictclub where category='$data'");

while($row=mysql_fetch_array($sql))
 {
  $sub_catagory=$row['IWdistrict'];
  echo '<option value="'.$sub_catagory.'">'.$sub_catagory.'</option>';
 }
}

if($data == 'Rotary Club'){

$sql=mysql_query("select DISTINCT `district` from districtclub_rotary where category='$data'");

while($row=mysql_fetch_array($sql))
 {
  $sub_catagory=$row['district'];
  echo '<option value="'.$sub_catagory.'">'.$sub_catagory.'</option>';
 }
}

if($data == 'Rotaract'){

$sql=mysql_query("select DISTINCT `district` from districtclub_rotaract where category='$data'");

while($row=mysql_fetch_array($sql))
 {
  $sub_catagory=$row['district'];
  echo '<option value="'.$sub_catagory.'">'.$sub_catagory.'</option>';
 }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////


?>