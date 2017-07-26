<?php
include("../connection.php");

$approveby = $_POST["hdnapproveby"];
$refappno = $_POST["txtrefno"];
$arr = array();

$dt = date('d-m-Y');

if($approveby=='CP') {
$chkqry = "SELECT count(id)as avail FROM registrationForGrantapp WHERE district='".$_POST["txtDistrict"]."' and club='".$_POST["txtClub"]."' and  contactemail='".$_POST["txtemail"]."' and password='".$_POST["txtpwd"]."' and role='CP';";
}
else
{
$chkqry = "SELECT count(id)as avail FROM registrationForGrantapp WHERE district='".$_POST["txtDistrict"]."' and club='".$_POST["txtClub"]."' and refappno='".$refappno."' and contactemail='".$_POST["txtemail"]."' and password='".$_POST["txtpwd"]."' and role='PCP';";
}

$chkresult = mysqli_query($link,$chkqry);
if($chkresult) {
$chkarr[]=mysqli_fetch_assoc($chkresult);
}


if($chkarr[0]["avail"]>0) {
if($approveby=='CP')
{
$query = "UPDATE grantAppEligible SET approvebyCP='Yes' ,approvedtCP='".$dt."'  WHERE refappno='".$refappno."';";
}
else if($approveby=='PCP')
{
$query = "UPDATE grantAppEligible SET approvebyPCP='Yes', approvedtPCP='".$dt."'  WHERE refappno='".$refappno."';";
}


$result = mysqli_query($link,$query);
			

if($result) {
			
			$PCQry ="SELECT district, club,contactname,contactemail FROM registrationForGrantapp WHERE district='".$_POST["txtDistrict"]."' and club='".$_POST["txtClub"]."' and role='CP';";
			$PCresult=mysqli_query($link,$PCQry);
			if($PCresult)
			{
			$PCarr[]=mysqli_fetch_assoc($PCresult);
			}
				if($approveby=='PCP') {
				$to  = $PCarr[0]["contactemail"];
				$subject = 'Approval Notice of application '.$refappno;
				$message = '<html>';
				$message .= '<body>';
				$message .= '<p>Application no '.$refappno.' is approved by primary contact parson. This application is waiting for your approval</p>';
				$message .= '</body>';
				$message .= '</html>';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
		
					mail($to, $subject, $message, $headers);
				}
				if($approveby=='CP') {
				
				$DGDLCCqry = "SELECT DG.email as dgemail, DLCC.email as dlccemail FROM DG JOIN DLCC ON DG.district=DLCC.district WHERE DG.district='".$_POST["txtDistrict"]."';";
								
				$DGDLCCresult = mysqli_query($link,$DGDLCCqry);
				if($DGDLCCresult) {
				$DGDLCCarr[]=mysqli_fetch_assoc($DGDLCCresult);
				}

				$to  = $DGDLCCarr[0]["dlccemail"].",".$DGDLCCarr[0]["dgemail"];
				$subject = 'Approval Notice of application '.$refappno;
				$message = '<html>';
				$message .= '<body>';
				$message .= '<p>Application no '.$refappno.' is approved by Club President. This application is waiting for your approval</p>';
				$message .= '</body>';
				$message .= '</html>';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
		
					mail($to, $subject, $message, $headers);
			}
			$arr["status"]=1;
			$arr["msg"]="Application Successfuly Approved.";
		}

	}
		else
		{
				$arr["status"]=0;
			$arr["msg"]="Invalid Email or Password!";
			

		}

echo json_encode($arr);		
?>
