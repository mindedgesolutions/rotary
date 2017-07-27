<?php
include("../connection.php");

$arr = array();

$projectid = $_POST["choproject"];
$volunteerid = $_POST["txtvolunteerid"];
$volunteeremail = $_POST["txtvolunteeremail"];
$volunteercontact=$_POST["txtvolunteercontact"];

$chkavailqry = "SELECT count(volunteerid) as availcnt FROM applyforproject WHERE projectproposalid=".$projectid." and volunteerid=".$volunteerid.";";

$availresult = mysqli_query($link,$chkavailqry);

if($availresult)
{
		while($availrow = mysqli_fetch_assoc($availresult))
		{
		$availarr[] = $availrow;
		}
}

if($availarr[0]["availcnt"]==0) {
$query = "INSERT INTO applyforproject(`projectproposalid`, `volunteerid`, `email`, `contact`,`applydt`) VALUES(".$projectid.",".$volunteerid.",'".$volunteeremail."','".$volunteercontact."','".date('d-m-Y')."')";

//die($query);
$result = mysqli_query($link,$query);

if($result)
{
	
$projectqry = "SELECT pp.*, concat(rg.firstname,' ',if(rg.midname<>'',rg.midname,''),' ',if(rg.lastname<>'',rg.lastname,'')) as  name, rg.rotaryDistrict,  rg.rotaryClubname FROM projectproposal pp  JOIN applyforproject ap ON ap.projectproposalid=pp.id  JOIN registration rg ON rg.id=ap.volunteerid WHERE pp.id=".$projectid ." and ap.volunteerid=".$volunteerid.";";

$projres = mysqli_query($link,$projectqry);

if($projres)
{
	while($projrow = mysqli_fetch_assoc($projres))
	{
	$projarr[] = $projrow;
	}
}


	$from = $volunteeremail;
	$to= $from.",".$projarr[0]["email"];
	$subject = "Apply for project proposal";
	$header = "From: ".$from."\r\n";
	$body="";
	$body=$body."Name: ".$volunteerinfoarr[0]["name"]."\r\n";	
	$body=$body. "I have apply for ".$projarr[0]["projectname"]." for club ".$projarr[0]["club"];
		$newmsg=rawurldecode($body);
	mail($to,$subject,$newmsg,$header)

		
		$arr["success"] = 1;
		$arr["msg"] = "Successfully Applied.";
		
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "There is some problem, please try again.";

}
}
else {
		$arr["success"] = 0;
		$arr["msg"] = "You have already apply for this project.";

}

		
echo json_encode($arr);
?>
