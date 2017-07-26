<?php
include("../connection.php");

$arr = array();
$email = $_POST["email"];
$refappno = $_POST["refappno"];
$district = $_POST["district"];
$club = $_POST["club"];


$chkqry = "SELECT * FROM registrationForGrantapp WHERE district='".$district."' and club='".$club."' and contactemail='".$email."';";

$result = mysqli_query($link,$chkqry);
	if($result)
	{
		while($row = mysqli_fetch_assoc($result)){
		$qryresultarr[]=$row;
		}
	}
	
	if(count($qryresultarr)>0) {
	for($i=0; $i<=count($qryresultarr); $i++){
		if($qryresultarr[$i]["refappno"]==$refappno){
					$to  = $qryresultarr[$i]["contactemail"];
					$subject = 'Get Password for Grant Application.';
					$message = '<html>';
					$message .= '<body>';
					$message .= '<p>Password for '.$refappno.' is '.$qryresultarr[$i]["password"].'</p>';
					$message .= '</body>';
					$message .= '</html>';
					
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
					
					if(mail($to, $subject, $message, $headers)) {
					$arr["status"] = 1;
					$arr["msg"] = "Password has sent to your email";
					}
			}
			else if($qryresultarr[$i]["role"]=='CP')
			{
					$to  = $qryresultarr[$i]["contactemail"];
					$subject = 'Get Password for Grant Application.';
					$message = '<html>';
					$message .= '<body>';
					$message .= '<p>Password for '.$refappno.' is '.$qryresultarr[$i]["password"].'</p>';
					$message .= '</body>';
					$message .= '</html>';
					
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
					
					if(mail($to, $subject, $message, $headers)) {
					$arr["status"] = 1;
					$arr["msg"] = "Password has sent to your email";
					}
			
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
