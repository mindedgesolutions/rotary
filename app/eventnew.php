<?php
	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/


	$dbname="rotary32_teach";
	$host="103.227.62.215";
	$dbuname="mindedgeteach1";
	$dbpass="SuHiNa@1979";

$dbName='rotary32_teach';
$dbHost='103.227.62.215';
$dbUser='mindedgeteach1';
$dbPass='SuHiNa@1979';



	$link=mysqli_connect($host,$dbuname,$dbpass,$dbname) or die("Can not connect DATABASE.");

$usertype = trim($_GET["utype"]);
$rtn="";
$sql = "Select * from mob_dtl where active='Y' and mtype='" .$usertype. "'";
$res = mysqli_query($link,$sql);
$count_nba = mysqli_num_rows($res);
while($data = mysqli_fetch_array($res)){
	extract($data);
	$rtn= $rtn . $mimg . "|" .  $mcaption . "|" . $mshort ."|" . $mlong ."|" . $mlink . "^";
}
echo $rtn;
?>
