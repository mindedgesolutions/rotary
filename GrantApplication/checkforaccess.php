<?php
session_start();
include("../connection.php");

$district = $_POST["district"];
$club = $_POST["club"];
$refappno = $_POST["refappno"];
$arr = array();

$checkapproveqry = "SELECT * FROM grantAppEligible WHERE  refappno='".$refappno."';";
		$chkapproveresult = mysqli_query($link,$checkapproveqry);
		if($chkapproveresult) {
		$approverow[]=mysqli_fetch_assoc($chkapproveresult);
		}


	if($approverow[0]["approvebyPCP"]=='Yes') {
		$arr["status"] = 2;
		$arr["msg"] = "";
	}
	else
	{
		$chkquery = "SELECT count(id) as avail FROM registrationForGrantapp WHERE district='".$district."' and club='".$club."' and role='CP';";
		$chkresult = mysqli_query($link,$chkquery);
		if($chkresult) {
		$row[]=mysqli_fetch_assoc($chkresult);
		}
		
			if($row[0]["avail"]==0){
				$arr["status"] = 0;
				$arr["msg"] = "Please complete registration.";
			}			
			else
			{
				$arr["status"] = 1;
				$arr["msg"] = "";
			}
	}		

echo json_encode($arr);	
		
?>
