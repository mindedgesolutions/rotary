<?php
include("../connection.php");
$arr = array();

$status = $_POST["updatestatus"];
$projectid = $_POST["project"];
$volunteerid = $_POST["volunteer"];
/*$status ='Accept';
$projectid =1;
$volunteerid =23;*/

$statusflagqry = "SELECT sum(if(statusflag='yellow',1,0)) as yellow,sum(if(statusflag='red',1,0)) as red FROM `applyforproject` where volunteerid=".$volunteerid.";";
$statusres = mysqli_query($link,$statusflagqry);
if($statusres) {
	while($statusrow = mysqli_fetch_assoc($statusres))
		{
		$statusarr[] = $statusrow;
		}
}
$statusflag ='';
if($status=='Report') {
	if($statusarr[0]['yellow']==0 and $statusarr[0]['red']==0) {
		$statusflag = 'Yellow';
	}
	else if($statusarr[0]['yellow']>0) {
		$statusflag = 'red';
	} 
}

$qryvolunteerinfo = "SELECT ap.*,concat(firstname,' ',if(midname<>'',midname,''),' ',if(lastname<>'',lastname,'')) as  name, pp.email as projectuploademail,pp.projectname,pp.club FROM applyforproject ap JOIN registration rg ON rg.id=ap.volunteerid JOIN projectproposal pp ON pp.id=ap.projectproposalid WHERE projectproposalid=".$projectid." and volunteerid=".$volunteerid.";";
$resvolunteerinfo = mysqli_query($link,$qryvolunteerinfo);
if($resvolunteerinfo) {
	while($volunteerinfo = mysqli_fetch_assoc($resvolunteerinfo))
		{
		$volunteerinfoarr[] = $volunteerinfo;
		}
}




$query = "UPDATE applyforproject SET status='".$status."', statusflag='".$statusflag."' WHERE projectproposalid=".$projectid." and volunteerid=".$volunteerid.";";

//die($query);
$result = mysqli_query($link,$query);

if($result)
{
	$from = $volunteerinfoarr[0]["projectuploademail"];
	$to= $from.",".$volunteerinfoarr[0]["email"];
	$subject = "project proposal";
	$header = "From: ".$from."\r\n";
	$body="";
	$body=$body."Name: ".$volunteerinfoarr[0]["name"]."\r\n";	
	$body=$body. "I have ".$status." for ".$volunteerinfoarr[0]["projectname"]." for club ".$volunteerinfoarr[0]["club"];
		$newmsg=rawurldecode($body);
	

 		
		if( mail($to,$subject,$newmsg,$header)) {

	
		$arr["success"] = 1;
		$arr["msg"] = "Successfully submited";
		}
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "There is some problem, please try again.";

}

		
echo json_encode($arr);
?>
