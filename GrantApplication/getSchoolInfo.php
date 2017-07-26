<?php
include("../connection.php");

$arr = array();

$refappno = $_POST["refappno"];


$query = "SELECT GI.`refappno`, GI.`hasSMC`, GI.`isSMCwork`, `isADPprepare`, GI.`ADPYr`, `ADPfacility`,schooladdress,`schoolname`, `addrstate`, `addrdistrict`, `village`, `pin`, `schooltype`, `noofboysstud`, `noofgirlsstud`, `nooftotalstud`, `noofmaleteach`, `nooffemaleteach`, `noofheadteach`, `nooftotalteach`, `noofmaletrainedteach`, `nooffemaletrainedteach`, `istrainedhead`, `optstructure`, `roofdamageextend`, `floordamageextend`, `Wallsdamageextend`, `doordamageextend`, `noofroom`, `noofclassroom`, `isroomforheadteach`, `isroomforteachstaff`, `isseperatestore`, `isstorewithheadteacherroom`, `islaboratory`, `iskitchenformidmeal`, `isspaceforeatmeal`, `isprovideelectricity`, `isunauthorizedsecure`, `isopenplaygrnd`, `hassportingequip`, `hasindoorgame`, `language1`, `language2`, `language3`, `hasheardCCEforstudent`, `isbookletreceived`, `isbookletsummarize`, `hasarrangelaggingchild`, `startyrforlaggingchild`, `hascomputer`, `noofcomputer`, `haselearning`, `elearning`, `ismentalstud`, `facilityformentalstud`, `willingformentalstud`,approvebyPCP FROM `grantappSchoolinfo` GI JOIN grantAppEligible GAE ON GAE.refappno=GI.`refappno`  WHERE  GI.refappno='".$refappno."';";


$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
