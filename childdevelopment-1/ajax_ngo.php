<?php
include('include/config1.php');

$data= $_GET['id'];
$rtn="";
$sql= "Select DISTINCT `center_name` from tbl_admin";
//$rtn='<select name="club" class="form-control" id="club">';
$query = mysql_query($sql);

while($row=mysql_fetch_array($query))
 {
  $club=$row['ngo_name'];
  $rtn = $rtn . $club .'|';
  //$rtn=$rtn  . '<option value="'.$club.'">'.$club.'</option>';        
 }
//$rtn=$rtn . '</select>';
echo $rtn;
///////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
