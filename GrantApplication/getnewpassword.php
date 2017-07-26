<?php
include("../connection.php");

$arr = array();
$email = $_POST["email"];
$refappno = $_POST["refappno"];
$district = $_POST["district"];
$club = $_POST["club"];
$oldpassword = $_POST["oldpwd"];
$newpassword = $_POST["newpwd"];


/*$email = 'sanjuchou27@gmail.com';
$refappno = 'HS000001';
$district = '2980';
$club = 'Adirampattinam';
$oldpassword = 'dDsSN3Jr';
$newpassword = 'aaaa';*/



$chkqry = "SELECT * FROM registrationForGrantapp WHERE district='".$district."' and club='".$club."' and contactemail='".$email."' and password='".$oldpassword."';";

$result = mysqli_query($link,$chkqry);
	if($result)
	{
		while($row = mysqli_fetch_assoc($result)){
		$qryresultarr[]=$row;
		}
	}
	
	if(count($qryresultarr)>0) {
		$updtquery = "UPDATE registrationForGrantapp SET password='".$newpassword."' WHERE  district='".$district."' and club='".$club."' and contactemail='".$email."' and password='".$oldpassword."';";
			$updtresult = mysqli_query($link,$updtquery);
					if($updtresult)
					{	
							$to  = $qryresultarr[0]["contactemail"];
							$subject = 'Password has been changed for Grant Application.';
							$message = '<html>';
							$message .= '<body>';
							$message .= '<p>Your New Password for'.$refappno.' is '.$newpassword.'</p>';
							$message .= '</body>';
							$message .= '</html>';
							
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
							
							if(mail($to, $subject, $message, $headers)) {
							$arr["status"] = 1;
							$arr["msg"] = "Password has been changed";
							}
					
						}	
				}
		else
		{
			$arr["status"] = 0;
			$arr["msg"] = "Record against this email is not found";
		}

echo json_encode($arr);
?>
