<?php
include("../connection.php");

$refappno = $_GET["refappno"];

$checkqry = "SELECT * FROM registrationForGrantapp WHERE  refappno='".$refappno."' and role='PCP';";
		$chkresult = mysqli_query($link,$checkqry);
		if($chkresult) {
		$chkrow[]=mysqli_fetch_assoc($chkresult);
		}


	if(count($chkrow)>0) {
		$updtqry = "UPDATE registrationForGrantapp SET allowtoaccess='Yes' WHERE refappno='".$refappno."' and role='PCP';";
		$result = mysqli_query($link,$updtqry);
		if($result) {
		
		$to  = $chkrow[0]["contactemail"];
			$subject = 'Get Password for Grant Application.';
			$message = '<html>';
			$message .= '<body>';
			$message .= '<p>Your Password for '.$refappno.' is '.$chkrow[0]["password"].'</p>';
			$message .= '</body>';
			$message .= '</html>';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
	
				mail($to, $subject, $message, $headers);
		
		
		header("location: thankstoallow.html");
		}
	}
?>
