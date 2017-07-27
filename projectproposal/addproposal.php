<?php
include("../connection.php");

$arr = array();

$district = $_POST["chodistrict"];
$club = $_POST["choclub"];
$projectname = $_POST["txtprojectname"];
$projectloc = $_POST["txtprojectloc"];
$projectaddr = $_POST["txtaddress"];
$city = $_POST["txtcity"];

$state = $_POST["txtstate"];

$projdesc = $_POST["projdesc"];
$neededperson=$_POST["txtnoofperson"];
$reqtime = $_POST["txttime"];
$reqhours = $_POST["txthours"];
/*$uploadedby = $_POST["txtprojectuploadedby"];

$contact=$_POST["txtcontact"];*/
$username = $_POST["txtusername"];
$pwd = $_POST["txtpwd"];
$email= $_POST["txtemail"];
//$projdt=$_POST["txtprojectdate"];
$projdt=date('d-m-Y');

$chkquery = "SELECT count(id) as availcnt FROM projectproposal where username ='".$username."';";

$chkresult = mysqli_query($link,$chkquery);

if($chkresult)
{
		while($row = mysqli_fetch_assoc($chkresult))
		{
		$chkarr[] = $row;
		}
}

if($chkarr[0]["availcnt"]==0)  {

$query = "INSERT INTO projectproposal(`district`, `club`, `projectname`,`projectloc`, `projectaddr`, `city`, `state`,`projectdesc`, username,pwd,email,`submitdt`, `noofpersonneeded`,`reqtime`,`reqhour`) VALUES('".$district."','".$club."','".$projectname."','".$projectloc."','".$projectaddr."','".$city."','".$state."','".$projdesc."','".$username."','".$pwd."','".$email."','".$projdt."',".$neededperson.",".$reqtime.",".$reqhours.")";

//die(json_encode($query));
$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["success"] = 1;
		$arr["msg"] = "Proposal successfully submited";
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "There is some problem, please try again.";

}
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "Username already exist.";

}

		
echo json_encode($arr);
?>
