<?php
//session_start();
include("connection.php");


$schooltype = trim($_POST['schooltype'],',');
$schoolname	=  trim($_POST['schoolname'],',');

$schooladdr = trim($_POST['schooladdr'],',');
$city	=  trim($_POST['city'],',');
$state	=	$_POST['state'];

$userid		=	$_POST['userid'];


$arrschooltype = explode(",",$schooltype);
$arrschoolname	=	explode(",",$schoolname);
$arrschooladdr =  explode(",", $schooladdr);
$arrcity	=	explode(",",$city);
$arrstate =  explode(",", $state);

$strqrystring = "INSERT INTO schoolInfo(schooltype,schoolname,schooladdr,city,state,userid) VALUES ";

		for($i=0;$i<count($arrschooltype);$i++)
		{
		
		$strqrystring	=	$strqrystring."('".$arrschooltype[$i]."','". $arrschoolname[$i]."' ,'".$arrschooladdr[$i]."','".$arrcity[$i]."','". $arrstate[$i]."',".$userid."),";

		}
		
				$strqrystring	=	trim($strqrystring,",");
				
	//die(json_encode($strqrystring));		

$result = mysqli_query($link,$strqrystring);


		if($result)
		{
				
					$msg = "Successfully added.";

		}
		
		//echo json_encode($arr);
		echo $msg;
				
?>