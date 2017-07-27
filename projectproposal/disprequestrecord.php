<?php
include("../connection.php");

$arr = array();

$projectproposalid =$_POST["id"];

$query = "SELECT ap.*,pp.noofpersonneeded, concat(firstname,' ',if(midname<>'',midname,''),' ',if(lastname<>'',lastname,'')) as  name, rotaryDistrict, rotaryClubname, address FROM `applyforproject` ap JOIN projectproposal pp ON pp.id = ap.projectproposalid JOIN registration rg ON rg.id=ap.volunteerid where projectproposalid=".$projectproposalid.";";

$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
	}
}

		
echo json_encode($arr);
?>
