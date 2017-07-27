<?php
include('include/config.php');
$q = intval($_GET['q']);
$sql="select DISTINCT `club` from districtclub WHERE district = '".$q."'";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result)) {
 $data=$row['club'];
 
 echo '<option value="'.$data.'">'.$data.'</option>';
}
?>