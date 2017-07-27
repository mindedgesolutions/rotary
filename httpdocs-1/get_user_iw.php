<?php
include('include/config.php');
$iw = intval($_GET['iw']);
$sql="select DISTINCT `IWclub` from IWDistrictClub WHERE IWdistrict = '".$iw."'";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {
 $data=$row['IWclub'];
 echo '<option value="'.$data.'">'.$data.'</option>';
}
?>