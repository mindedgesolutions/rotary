<?php
include("../connection.php");

$arr = array();

$refappno = $_POST["refappno"];


$query = "SELECT `refappno`, `facilityid1`, `facilityid2`, `facilityid3`, `facilityid4`, `facilityid5`, `facilityid6`, `facilityid7`, `facilityid8`, `startmonthyr1`, `startmonthyr2`, `startmonthyr3`, `startmonthyr4`, `startmonthyr5`, `startmonthyr6`, `startmonthyr7`, `startmonthyr8`, `endmonthyr1`, `endmonthyr2`, `endmonthyr3`, `endmonthyr4`, `endmonthyr5`, `endmonthyr6`, `endmonthyr7`, `endmonthyr8`, `responsibles1`, `responsibles2`, `responsibles3`, `responsibles4`, `responsibles5`, `responsibles6`, `responsibles7`, `responsibles8`, `sustain1`, `sustain2` FROM `grantAppAdditionalInfo` WHERE  refappno='".$refappno."';";


$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
