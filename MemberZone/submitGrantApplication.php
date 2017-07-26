<?php
include("connection.php");

$arr = array();

$granttitle = $_POST["txtgranttitle"];
$status = $_POST["txtstatus"];
$belongto = $_POST["txtbelong"];

if($belongto=='Rotary' || $belongto=='Rotaract') {
$district = $_POST["txtRotDistrict"];
}
else if($belongto=='Inner Wheel')
{
$district = $_POST["txtinnerdistrict"];
}

$qualifstatus = $_POST["qualifstatus"];


$getidqry	=	"SELECT MAX(id) as lastid FROM grantApplication;";

$idresult = mysqli_query($link,$getidqry);

if($idresult)
{
		while($row = mysqli_fetch_assoc($idresult))
		{
		$getid[] = $row;
		}
}

$nextid = ($getid[0]["lastid"]+1);


$refappno = 'refno'.$nextid;

$query = "INSERT INTO grantApplication(id,`refappno`,`granttitle`, `applicationstatus`, `belongto`,`district`, `qualifstatus`) VALUES(".$nextid.",'".$refappno."','".$granttitle."','".$status."','".$belongto."','".$district."','".$qualifstatus."')";

//die(json_encode($query));

$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["success"] = 1;
		$arr["msg"] = "Grant Application successfully submited";
		$arr["refno"] = $refappno;
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "There is some problem, please try again.";

}
		
echo json_encode($arr);
?>
