<?php
session_start();
include("../connection.php");

/*$district = $_POST["district"];
$club = $_POST["club"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$refappno = $_POST["refappno"];*/
$arr = array();
$district='5000';
$club='test club';
$email='amit@servicedesktop.com';
$pwd='yLQRtNOu';
$refappno = 'HS000014';
		
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
				if($availresult[0]["refappno"]==$refappno) {
					$arr["status"] = 1;
					$arr["msg"] = "";
					$arr["data"]= $availresult;
				
				}
				else {
					$arr["status"] = 0;
					$arr["msg"] = "Invalid User";
				
				}
			}
			else {
			
				$arr["status"] = 1;
				$arr["msg"] = "";
				$arr["data"]= $availresult;
			}
				
			}

echo json_encode($arr);	
		
?>
