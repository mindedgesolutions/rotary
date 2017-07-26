<?php
include("../connection.php");

$arr = array();

$refappno = $_POST["refappno"];

//$grantAppuserid = 1;

$query = "SELECT SF.`refappno`, `isneedrepair`, `roofarea`, `rateforroof`, `costforroof`, `floorarea`, `rateforfloor`, `costforfloor`, `wallarea`, `rateforwall`, `costforwall`, `doorarea`, `ratefordoor`, `costfordoor`, `totalcost`, `isneedpaint`, `areaforpaint`, `costforpaint`, `painttype`, `hasbenches`, `existingbench`, `needbench`, `costforbench`, `existingdesk`, `needdesk`, `costfordesk`, `existingbenchdesk`, `needbenchdesk`, `costforbenchdesk`, `hassafewater`, `waterfacility`, `costtomakewatersafe`, `hasgirltoilet`, `urinalforgirls`, `toiletforgirls`, `hasboytoilet`, `urinalforboys`, `toiletforboys`, `hasteachertoilet`, `urinalforteacher`, `toiletforteacher`, `existingboystoilet`, `requireboystoilet`, `boystoiletcost`, `existinggirlstoilet`, `requiregirlstoilet`, `girlstoiletcost`, `existingteachertoilet`, `requireteachertoilet`, `teachertoiletcost`, `totaltoiletcost`, `haslibrary`, `isstuduselibrary`, `libbooktype`, `libbookexisting`, `libbookneed`, `libbookcost`,`bookalmirahexisting`, `bookalmirahneed`, `libalmirahcost`,  `isgovtprovideuniform`, `reasonfornonsupplyuniform`, `uniformunitreq`, `uniformunitcost`, `uniformtotalcost`, `footwearunitreq`, `footwearunitcost`, `footweartotalcost`,  `isspaceforteacher`, `availspacedetail`, `facilityinspaceforteacher`, `costforprovidefacility`,`costforprovidetable`, `hasindoorgamefacility`, `listindoorgamefacility`, `reqindoorgamefacility`, `costofindoorgamefacility`, `costforhappyschool`, `administrativecost`, `totalprojectcost`, `clubcontribute`, `othercontribute`, `RILMcontribute`,`repaireimg1`, `repaireimg2`, `hygienicimg1`, `hygienicimg2`, `waterfacilityimg1`, `waterfacilityimg2`, `libimg1`, `libimg2`, `uniformimg1`, `uniformimg2`, `sportequipimg1`, `sportequipimg2`, `benchimg1`, `benchimg2`, `spaceimg1`, `spaceimg2`,approvebyPCP FROM schoolspecificfeature SF JOIN  grantAppImage GI ON GI.refappno=SF.refappno JOIN grantAppEligible GAE ON GAE.refappno=SF.`refappno`  WHERE  SF.refappno='".$refappno."';";


$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
