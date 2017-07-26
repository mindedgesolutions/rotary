<?php
//include("connection.php");



$dbName='rotary32_teach';
	$dbHost='103.227.62.215';
	$dbUser='mindedgeteach1';
	$dbPass='SuHiNa@1979';

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());


$sql = "SELECT distinct district_code as dist FROM all_district_club order by 1";
$result1 = mysql_query($sql);
//$teacher = mysql_num_rows($result1);
$rslt="";
while ($row = mysql_fetch_assoc($result1)) {
   $rslt = $rslt . $row["dist"] . "|";
}
echo $rslt;
?>


