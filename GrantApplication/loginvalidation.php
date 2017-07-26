<?php
session_start();
include("../connection.php");

$district = $_POST["district"];
$club = $_POST["club"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$arr = array();

		
			$availchk = "SELECT count(id) as availid, id, refappno,role, allowtoaccess from registrationForGrantapp WHERE district='".$district."' and club='".$club."' and contactemail='".$email."' and password='".$pwd."';";
			
//die($availchk);			
			$cpavialresult = mysqli_query($link,$availchk);
			if($cpavialresult) {
				$availresult[] = mysqli_fetch_assoc($cpavialresult);
			}
			if($availresult[0]["availid"]==0) {
				$arr["status"] = 0;
				$arr["msg"] = "Invalid Email or Password";
			}
			else
			{
			if($availresult[0]["role"]=='PCP') {
			if($availresult[0]["allowtoaccess"]!='Yes') {
				$arr["status"] = 0;
				$arr["msg"] = "You don't have permission to proceed. Please wait.";
			
			
			}
			}
			else {
			
				$arr["status"] = 1;
				$arr["msg"] = "";
				$_SESSION["grantAppuserid"]= $availresult[0]["id"];
				$grantAppuserid  =$_SESSION["grantAppuserid"];
				$arr["data"]= $availresult;
			}
				
			}

echo json_encode($arr);	
		
?>
