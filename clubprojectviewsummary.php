<?php
//include("connection.php");




$dbName='rotary32_teach';
	$dbHost='103.227.62.215';
	$dbUser='mindedgeteach1';
	$dbPass='SuHiNa@1979';

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());

$state = $_GET["state"];
$district = $_GET["district"];
$categoryid = $_GET["categoryid"];

//$sql = "select id,title, outlay, beneficiaryno, projectvenue,img1 from clubproject where img1<>'' and categoryid=" . $categoryid;
$sql = "select id,projdesc,title, beneficiaryno,if(img1_caption is null, '', img1_caption) as img1_caption, img1 from clubproject where img1<>'' and categoryid=" . $categoryid;
if (strlen($state)>1)
{
		$sql = $sql . " and state='" . $state . "'";
}
if (strlen($district)>1)
{
		$sql = $sql . " and district='" . $district . "'";
}
$sql = $sql . " order by submitted desc";


$result1 = mysql_query($sql);

$rslt="";
while ($row = mysql_fetch_assoc($result1)) {
   //$rslt = $rslt . $row["id"] . "|" . $row["title"] . "|" . $row["outlay"] . "|" . $row["beneficiaryno"] . "|" . $row["projectvenue"] . "|" . $row["img1"] . "^";
   $rslt = $rslt . $row["id"] . "|" . $row["projdesc"] . "|" . $row["beneficiaryno"] . "|" . $row["img1_caption"] . "|" . $row["img1"] . "^";
}
echo $rslt;
?>


