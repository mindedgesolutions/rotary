<?php
include("../connection.php");

$arr = array();
$refappno = $_POST["hdnrefappno"];
$grantuserid = $_POST["hdngrantuserid"];
$granttitle = $_POST["txtgranttitle"];
//$status = $_POST["txtstatus"];
$belongto = $_POST["txtbelong"];

if($belongto=='Rotary' || $belongto=='Rotaract') {
$district = $_POST["txtRotDistrict"];
}
else if($belongto=='Inner Wheel')
{
$district = $_POST["txtinnerdistrict"];
}

$qualifstatus = $_POST["qualifstatus"];


$userinfoqry = "SELECT * FROM registrationForGrantapp WHERE id=$grantuserid;";
//echo json_encode($userinfoqry);
$userinforesult=mysqli_query($link,$userinfoqry);

if($userinforesult)
{
$userinfoarr[] =mysqli_fetch_assoc($userinforesult); 
}

$availqry = "SELECT count(refappno) as avail FROM grantApplication WHERE refappno='".$refappno."';";
$avilresult = mysqli_query($link,$availqry);
if($avilresult) {
$availrow[] = mysqli_fetch_assoc($avilresult);
}

if($availrow[0]["avail"]>0) {
	if($userinfoarr[0]["role"]=='CP') {
	$query = "UPDATE grantApplication SET  `granttitle`='".$granttitle."', `belongto`='".$belongto."',`district`='".$district."', `qualifstatus`='".$qualifstatus."' ,savebyCP='".date('Y-m-d h:m:s')."' WHERE   refappno = '".$refappno."';";
	}
	else
	{
	$query = "UPDATE grantApplication SET  `granttitle`='".$granttitle."', `belongto`='".$belongto."',`district`='".$district."', `qualifstatus`='".$qualifstatus."' ,savebyPCP='".date('Y-m-d h:m:s')."' WHERE   refappno = '".$refappno."';";
	}
}
else
{
if($userinfoarr[0]["role"]=='CP') {
	$query = "INSERT INTO grantApplication(refappno,`granttitle`,`belongto`,`district`,`qualifstatus`,`savebyCP`) VALUES('".$refappno."','".$granttitle."','".$belongto."','".$district."','".$qualifstatus."','".date('Y-m-d h:m:s')."');";
	}
	else
	{
		$query = "INSERT INTO grantApplication(refappno,`granttitle`,`belongto`,`district`,`qualifstatus`,`savebyPCP`) VALUES('".$refappno."','".$granttitle."','".$belongto."','".$district."','".$qualifstatus."','".date('Y-m-d h:m:s')."');";
	}
}


$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["success"] = 1;
		$arr["msg"] = "Grant Application successfully submited";
		$arr["refno"] = $refappno;
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "There is some problem, please try again.";

//$arr["msg"] =$query;
}
		
echo json_encode($arr);
?>
