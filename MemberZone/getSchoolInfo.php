<?php
include("connection.php");

$arr = array();

$refapplicationno = $_POST["refno"];


$query = "SELECT `refappno`, `hasSMC`, `isSMCwork`, `isADPprepare`, `ADPYr`, `ADPfacility`,`schoolname`, `addrstate`, `addrdistrict`, `village`, `pin`, `schooltype`, `noofboysstud`, `noofgirlsstud`, `nooftotalstud`, `noofmaleteach`, `nooffemaleteach`, `noofheadteach`, `nooftotalteach`, `noofmaletrainedteach`, `nooffemaletrainedteach`, `istrainedhead`, `optstructure`, `roofdamageextend`, `floordamageextend`, `Wallsdamageextend`, `doordamageextend`, `noofroom`, `noofclassroom`, `isroomforheadteach`, `isroomforteachstaff`, `isseperatestore`, `isstorewithheadteacherroom`, `islaboratory`, `iskitchenformidmeal`, `isspaceforeatmeal`, `isprovideelectricity`, `isunauthorizedsecure`, `isopenplaygrnd`, `hassportingequip`, `hasindoorgame`, `language1`, `language2`, `language3`, `hasheardCCEforstudent`, `isbookletreceived`, `isbookletsummarize`, `hasarrangelaggingchild`, `startyrforlaggingchild`, `hascomputer`, `noofcomputer`, `haselearning`, `elearning`, `ismentalstud`, `facilityformentalstud`, `willingformentalstud` FROM `grantappSchoolinfo` WHERE  refappno='".$refapplicationno."';";


$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
