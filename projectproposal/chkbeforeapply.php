<?php
include("../connection.php");

$arr = array();

$volunteerid =23; // $_POST["txtvolunteerid"];

$chkavailqry = "SELECT count(projectproposalid) as chkcnt FROM applyforproject WHERE volunteerid=".$volunteerid." and statusflag='Red';";

$availresult = mysqli_query($link,$chkavailqry);

if($availresult)
{
		while($availrow = mysqli_fetch_assoc($availresult))
		{
		$availarr[] = $availrow;
		}
}

if($availarr[0]["chkcnt"]==1) {
		$arr["success"] = 0;
		$arr["msg"] = "You have red flag in other project so you are not allow to apply.";

}
else {
		$arr["success"] =1;
		$arr["msg"] = "";

}

		
echo json_encode($arr);
?>
