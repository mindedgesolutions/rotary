<?php
include("../connection.php");

$arr = array();
$refappno = $_POST["hdnrefappno"];
$grantuserid = $_POST["hdngrantuserid"];
$ADPfacility = implode(",",$_POST["ADPgroup"]);

$userinfoqry = "SELECT * FROM registrationForGrantapp WHERE id=$grantuserid;";
//echo json_encode($userinfoqry);
$userinforesult=mysqli_query($link,$userinfoqry);

if($userinforesult)
{
$userinfoarr[] =mysqli_fetch_assoc($userinforesult); 
}


if($userinfoarr[0]["role"]=='CP') {
$query = "UPDATE grantAppEligible SET `HSADPs`='".$ADPfacility."',savebyCP='".date('Y-m-d h:m:s')."' WHERE refappno = '".$refappno."';";
}
else
{
$query = "UPDATE grantAppEligible SET `HSADPs`='".$ADPfacility."',savebyPCP='".date('Y-m-d h:m:s')."' WHERE refappno = '".$refappno."';";
}

$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["success"] = 1;
		$arr["msg"] = "SDP List successfully submited";
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
