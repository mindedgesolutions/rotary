<?php


	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/

	$dbName='rotary32_teach';
	$dbHost='103.227.62.215';
	$dbUser='mindedgeteach1';
	$dbPass='SuHiNa@1979';
	
	
	

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());



	$pmobile = trim($_GET["pmobile"]);
	$cpwd = trim($_GET["cpwd"]);


/*if(isset($_GET["btnSave"]))
{*/


$sql = "select * from user_master where user_mobile='" .$pmobile. "' and user_pwd='" .$cpwd. "' LIMIT 1";

//die($query);
$result1 = mysql_query($sql);
$rslt="";
while ($row = mysql_fetch_assoc($result1)) {
   $rslt = $row["Id"] . "|" . $row["user_mobile"] . "|" . $row["user_type"] . "|" . $row["user_emaiil"] . "|" . $row["user_name"];
}
/*while ($row = mysql_fetch_assoc($result1)) {
   $rslt = "ssss";//$row["id"] . "|" . $row["user_mobile"] . "|" . $row["user_type"] . "|" . $row["user_emaiil"];
}*/

echo $rslt;






//}
//die("sas");
//print_r($_FILES);
//echo 'save'
?>
