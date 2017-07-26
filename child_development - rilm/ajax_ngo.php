<?php
include('include/config.php');
$data= $_POST['id'];

$sql= "Select DISTINCT `ngo_name` from tbl_admin where ngo_fk = '$data'";
echo $sql;
$query = mysql_query($sql);
while($row=mysql_fetch_array($query))
 {
  $club=$row['ngo_name'];
  echo '
		<option value="'.$club.'">'.$club.'</option>
		';        
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////


?>