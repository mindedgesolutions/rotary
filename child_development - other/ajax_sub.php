<?php
include('include/config.php');

$club = $_GET['club'];
$len = strlen($club);

if($len == 3){
$sql = mysql_query("select `IWclub` from iwdistrictclub where IWdistrict = '$club'");

while($row = mysql_fetch_array($sql))
 {
  $club_list = $row['IWclub'];
  echo '<option value="'.$club_list.'">'.$club_list.'</option>';
 }
}

if($len == 4){
$sql = mysql_query("select `club` from districtclub_rotary where district = '$club'");

while($row = mysql_fetch_array($sql))
 {
  $club_list = $row['club'];
  echo '<option value="'.$club_list.'">'.$club_list.'</option>';
 }
}


 
?>