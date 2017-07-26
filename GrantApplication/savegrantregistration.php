<?php
include("../connection.php");
/*print_r($_POST);
exit();*/
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$belongto=$_POST["hdnbelongto"];

$district=$_POST["txtdistrict"];
$club = $_POST["txtClub"];
$contactname = $_POST["txtcontactname"];
$contactemail=$_POST["txtcontactemail"];
$pcpwd  = randomPassword();

$cpname = $_POST["txtcpname"];
$cpemail = $_POST["txtcpemail"];

$cppwd  = randomPassword();

	if($_POST["hdntype"]=='New') {
			$getidqry	=	"SELECT MAX(appno) as lastappno FROM registrationForGrantapp;";
			$idresult = mysqli_query($link,$getidqry);
			
			if($idresult)
			{
					$getid[] = mysqli_fetch_assoc($idresult);
			}
			$nextappno = ($getid[0]["lastappno"]+1);
			$refappno = 'HS'.str_pad($nextappno,6,0,STR_PAD_LEFT);
			
			$chkavailCPqry = "SELECT * FROM registrationForGrantapp WHERE  district='".$district."' and club='".$club."' and belongto='".$belongto."' and role='CP';";
			$cpavialresult = mysqli_query($link,$chkavailCPqry);
			if($cpavialresult) {
				$CPavailresult[]= mysqli_fetch_assoc($cpavialresult);
			}
			
			$query ="";
			
			if($contactname!='' && $contactemail!='') {
				$query = "INSERT INTO registrationForGrantapp(belongto,appno,`refappno`,`district`, `club`,`role`, `contactname`,  `contactemail`, `password`,`allowtoaccess`) VALUES('".$belongto."',$nextappno,'".$refappno."','".$district."','".$club."','PCP','".$contactname."','".$contactemail."','".$pcpwd."','No');";
				}
		$result = mysqli_query($link,$query);
		
			if(count($CPavailresult)==0 && ($cpname!='' && $cpemail!='')){						
				$cpquery ="INSERT INTO registrationForGrantapp(belongto,`district`, `club`,`role`, `contactname`,  `contactemail`, `password`,`allowtoaccess`) VALUES('".$belongto."','".$district."','".$club."','CP','".$cpname."','".$cpemail."','".$cppwd."','Yes');";
				}
			else if(count($CPavailresult)>0 && ($cpname!='' && $cpemail!='') && $CPavailresult[0]["password"]=='')
			{
				$cpquery ="UPDATE  registrationForGrantapp SET `contactname`='".$cpname."',  `contactemail`='".$cpemail."', `password`='".$cppwd."' WHERE id=".$CPavailresult[0]["id"].";";
			
			}
			if($cpquery!='') {
		$cpresult = mysqli_query($link,$cpquery);
		}
			//die(mysqli_error($link));
			
	//	if($query!='') {	
			if($result )
			{
				$grantAppquery = "INSERT INTO grantAppEligible(`refappno`,`belongto`,`district`, `club`) VALUES('".$refappno."','".$belongto."','".$district."','".$club."')";
				$grantAppresult = mysqli_query($link,$grantAppquery);
				if($grantAppresult) {
					$mailinfoquery = "SELECT * FROM registrationForGrantapp WHERE district='".$district."' and  club='".$club."'";
					$mailinforesult = mysqli_query($link,$mailinfoquery);
					if($mailinforesult){
					while($row=mysqli_fetch_assoc($mailinforesult)) {
					$mailinfoarr[]=$row;
					}
					}
					for($i=0; $i<count($mailinfoarr); $i++ )
					{
						if($mailinfoarr[$i]["role"]=='CP') 
						{
						
						$to  = $mailinfoarr[$i]["contactemail"];
						$subject = 'Password for Grant Application';
						$message = '<html>';
						$message .= '<body>';
						$message .= '<p>Your Password for '.$refappno.' is '.$mailinfoarr[$i]["password"].'</p>';
						$message .= '<p>The Primary Contact for this application is waiting for your approval to access it. Please click on given link to allow him.&nbsp;<a href="http://www.rotaryteach.org/GrantApplication/allowtoaccess.php?refappno='.$refappno.'">ALLOW</a></p>';
						$message .= '</body>';
						$message .= '</html>';
						
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: RILM Grant Application' . "\r\n";
				
							mail($to, $subject, $message, $headers);
						}
					}
				}
				
				header("location: ThankYou.php");

			}
		//}
}
 else if($_POST["hdntype"]=='Existing')
	{
		$refappno = $_POST["hdnrefappno"];
		$getinfoquery = "SELECT * FROM registrationForGrantapp WHERE refappno = '".$refappno."'";
		
		$inforesult = mysqli_query($link,$getinfoquery);
		if($inforesult){
		$infoarr[]=mysqli_fetch_assoc($inforesult);
		}
		
		$appno = $infoarr[0]['appno'];
		if($cpname!='' && $cpemail!='') {
				$query ="INSERT INTO registrationForGrantapp(belongto,`district`, `club`,`role`, `contactname`,  `contactemail`, `password`,`allowtoaccess`) VALUES('".$belongto."','".$district."','".$club."','CP','".$cpname."','".$cpemail."','".$cppwd."','Yes');";
			$result = mysqli_query($link,$query);
			if($result) {
					$mailinfoquery = "SELECT * FROM registrationForGrantapp WHERE district='".$district."' and  club='".$club."' and belongto='".$belongto."'" ;
					$mailinforesult = mysqli_query($link,$mailinfoquery);
					if($mailinforesult){
					while($row=mysqli_fetch_assoc($mailinforesult)) {
					$mailinfoarr[]=$row;
					}
					}
					for($i=0; $i<count($mailinfoarr); $i++ )
					{
						if($mailinfoarr[$i]["role"]=='CP') 
						{
								$to  = $mailinfoarr[$i]["contactemail"];
								$subject = 'Password for Grant Application.';
								$message = '<html>';
								$message .= '<body>';
								$message .= '<p>Password for '.$refappno.' is '.$mailinfoarr[$i]["password"].'</p>';
								$message .= '<p>The Primary Contact for this application is waiting for your approval to access it. Please click on given link to allow him.&nbsp;<a href="http://www.rotaryteach.org/GrantApplication/allowtoaccess.php?refappno='.$refappno.'">ALLOW</a></p>';
								$message .= '</body>';
								$message .= '</html>';
								
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= 'From: RILM Grant Application' . "\r\n";
						
									mail($to, $subject, $message, $headers);
						}
					}
				}
				
				}
header("location: ThankYou.php");
			}

				
				
?>
