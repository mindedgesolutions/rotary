<?php
include("../connection.php");

$approveby = $_POST["hdnapproveby"];
$refappno = $_POST["txtrefno"];
$district = $_POST["txtDistrict"];
$club = $_POST["txtClub"];
$email =$_POST["txtemail"];
$pwd =$_POST["txtpwd"];
$dt = date('d-m-Y');

$arr = array();


if($approveby=='DLCC') {
$chkqry = "SELECT count(id)as avail FROM DLCC WHERE district='".$district."' and club='".$club."' and  email='".$email."' and grantapppwd='".$pwd."';";
}
else if($approveby=='DG') 
{
$chkqry = "SELECT count(id)as avail FROM DG WHERE district='".$district."' and club='".$club."'  and email='".$email."' and grantapppwd='".$pwd."';";
}
else if($approveby=='RILMCEO') 
{
$chkqry = "SELECT count(id)as avail FROM RILM WHERE role='CEO' and district='".$district."' and club='".$club."'  and email='".$email."' and grantapppwd='".$pwd."';";
}
else if($approveby=='RILMCP') 
{
$chkqry = "SELECT count(id)as avail FROM RILM WHERE role='Chairman' and district='".$district."' and club='".$club."'  and email='".$email."' and grantapppwd='".$pwd."';";
}

$chkresult = mysqli_query($link,$chkqry);
if($chkresult) {
$chkarr[]=mysqli_fetch_assoc($chkresult);
}


if($chkarr[0]["avail"]>0) {
if($approveby=='DLCC')
{
$query = "UPDATE grantAppEligible SET approvebyDLCC='Yes',approvedtDLCC='".$dt."'  WHERE refappno='".$refappno."';";
}
else if($approveby=='DG')
{
$query = "UPDATE grantAppEligible SET approvebyDG='Yes', approvedtDG='".$dt."'  WHERE refappno='".$refappno."';";
}
else if($approveby=='RILMCEO')
{
$query = "UPDATE grantAppEligible SET approvebyRILMCEO='Yes', approvedtRILMCEO='".$dt."'  WHERE refappno='".$refappno."';";
}
else if($approveby=='RILMCP')
{
$query = "UPDATE grantAppEligible SET approvebyRILMCP='Yes',approvedtRILMCP='".$dt."'  WHERE refappno='".$refappno."';";
}

$result = mysqli_query($link,$query);
			

if($result) {
		
			if($approveby=='DLCC' || $approveby=='DG') {
			
			$PCQry ="SELECT * FROM RILM WHERE district='".$district."';";
			$PCresult=mysqli_query($link,$PCQry);
			if($PCresult)
			{
				while($resarr=mysqli_fetch_assoc($PCresult)) {
					$PCarr[]=$resarr;
				}
			}
				
				$to  = $PCarr[0]["email"].",".$PCarr[1]["email"];
				$subject = 'Approval Notice of application '.$refappno;
				$message = '<html>';
				$message .= '<body>';
				$message .= '<p>Application no '.$refappno.' is approved by '.$approveby.' of '.$district.' and '.$club.'. This application is waiting for your approval</p>';
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
