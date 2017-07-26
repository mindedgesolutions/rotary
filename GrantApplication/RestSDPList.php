<?php
include("../connection.php");

$arr = array();
$refappno = $_POST["hdnrefappno"];
$grantuserid = $_POST["hdngrantuserid"];
$ADPfacility = implode(",",$_POST["ADPgroup"]);


$restSDPqry = "SELECT * FROM `HSADPList` where id not in (".$ADPfacility.");"; 
$restSDPresult = mysqli_query($link,$restSDPqry);
if($restSDPresult) {
	while($restSDParr= mysqli_fetch_assoc($restSDPresult))
	{
		$restSDP[]=$restSDParr;
	}
}

if(count($restSDP)>0) {
$SDPstr ="Do you agree that, ";
	foreach($restSDP as $SDPval){
	$SDPstr = $SDPstr. $SDPval["facility"].", ";
	}
$SDPstr =rtrim($SDPstr ,',');	
$SDPstr =$SDPstr."are already exist in School.";
}

		$arr["success"] = 1;
		$arr["SDPmsg"] =$SDPstr;
		
echo json_encode($arr);
?>
