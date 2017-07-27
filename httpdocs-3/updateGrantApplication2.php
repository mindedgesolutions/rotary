<?php
include("connection.php");

$arr = array();

$refappno = $_POST["hdnrefapplicationno"]; 

$isneedrepair = $_POST["isneedrepair"];

$roofarea=($_POST["roofarea"]==''?0:$_POST["roofarea"]);
$rateforroof=($_POST["rateforroof"]==''?0:$_POST["rateforroof"]);
$costforroof=($_POST["costforroof"]==''?0:$_POST["costforroof"]);

$floorarea= ($_POST["floorarea"]==''?0:$_POST["floorarea"]);
$rateforfloor=($_POST["rateforfloor"]==''?0:$_POST["rateforfloor"]);
$costforfloor= ($_POST["costforfloor"]==''?0:$_POST["costforfloor"]);
$wallarea= ($_POST["wallarea"]==''?0:$_POST["wallarea"]);
$rateforwall=($_POST["rateforwall"]==''?0:$_POST["rateforwall"]);
$costforwall= ($_POST["costforwall"]==''?0:$_POST["costforwall"]);
$doorarea= ($_POST["doorarea"]==''?0:$_POST["doorarea"]);
$ratefordoor= ($_POST["ratefordoor"]==''?0:$_POST["ratefordoor"]);
$costfordoor=($_POST["costfordoor"]==''?0:$_POST["costfordoor"]);
$totalcost= ($_POST["totalcost"]==''?0:$_POST["totalcost"]);
$isneedpaint = $_POST["isneedpaint"];

$areaforpaint= ($_POST["txtareaforpaint"]==''?0:$_POST["txtareaforpaint"]);
$costforpaint= ($_POST["txtcostforpaint"]==''?0:$_POST["txtcostforpaint"]);
$painttype= $_POST["txtpainttype"];
$hasbenches = $_POST["hasbenches"];

$existingbench= ($_POST["txtexistingbench"]==''?0:$_POST["txtexistingbench"]);
$needbench= ($_POST["txtneedbench"]==''?0:$_POST["txtneedbench"]);

$costforbench= ($_POST["txtcostforbench"]==''?0:$_POST["txtcostforbench"]);
$existingdesk= ($_POST["txtexistingdesk"]==''?0:$_POST["txtexistingdesk"]);
$needdesk= ($_POST["txtneeddesk"]==''?0:$_POST["txtneeddesk"]);
$costfordesk= ($_POST["txtcostfordesk"]==''?0:$_POST["txtcostfordesk"]);
$existingbenchdesk= ($_POST["txtexistingbenchdesk"]==''?0:$_POST["txtexistingbenchdesk"]);
$needbenchdesk= ($_POST["txtneedbenchdesk"]==''?0:$_POST["txtneedbenchdesk"]);
$costforbenchdesk= ($_POST["txtcostforbenchdesk"]==''?0:$_POST["txtcostforbenchdesk"]);

$hassafewater = $_POST["hassafewater"];
$waterfacility=$_POST["txtwaterfacility"];
$costtomakewatersafe= ($_POST["txtcosttomakewatersafe"]==''?0:$_POST["txtcosttomakewatersafe"]);

$hasgirltoilet = $_POST["hasgirltoilet"];
$urinalforgirls= ($_POST["txturinalforgirls"]==''?0:$_POST["txturinalforgirls"]);
$toiletforgirls= ($_POST["txttoiletforgirls"]==''?0:$_POST["txttoiletforgirls"]);

$hasboytoilet = $_POST["hasboytoilet"];
$urinalforboys= ($_POST["txturinalforboys"]==''?0:$_POST["txturinalforboys"]);
$toiletforboys= ($_POST["txttoiletforboys"]==''?0:$_POST["txttoiletforboys"]);

$hasteachertoilet = $_POST["hasteachertoilet"];
$urinalforteacher= ($_POST["txturinalforteacher"]==''?0:$_POST["txturinalforteacher"]);
$toiletforteacher= ($_POST["txttoiletforteacher"]==''?0:$_POST["txttoiletforteacher"]);
$existingboystoilet= ($_POST["txtexistingboystoilet"]==''?0:$_POST["txtexistingboystoilet"]);
$requireboystoilet= ($_POST["txtrequireboystoilet"]==''?0:$_POST["txtrequireboystoilet"]);
$boystoiletcost= ($_POST["txtboystoiletcost"]==''?0:$_POST["txtboystoiletcost"]);
$existinggirlstoilet= ($_POST["txtexistinggirlstoilet"]==''?0:$_POST["txtexistinggirlstoilet"]);
$requiregirlstoilet= ($_POST["txtrequiregirlstoilet"]==''?0: $_POST["txtrequiregirlstoilet"]);
$girlstoiletcost= ($_POST["txtgirlstoiletcost"]==''?0:$_POST["txtgirlstoiletcost"]);
$existingteachertoilet= ($_POST["txtexistingteachertoilet"]==''?0:$_POST["txtexistingteachertoilet"]);
$requireteachertoilet= ($_POST["txtrequireteachertoilet"]==''?0:$_POST["txtrequireteachertoilet"]);
$teachertoiletcost= ($_POST["txtteachertoiletcost"]==''?0:$_POST["txtteachertoiletcost"]);
$totaltoiletcost= ($_POST["txttotaltoiletcost"]==''?0:$_POST["txttotaltoiletcost"]);

$haslibrary = $_POST["haslibrary"];
$isstuduselibrary =$_POST["isstuduselibrary"];
$libbooktype=$_POST["libbooktype"];
$libbookexisting=($_POST["libbookexisting"]==''?0:$_POST["libbookexisting"]);
$libbookneed= ($_POST["libbookneed"]==''?0:$_POST["libbookneed"]);
$libbookcost= ($_POST["libbookcost"]==''?0:$_POST["libbookcost"]);

$isgovtprovideuniform= $_POST["isgovtprovideuniform"];
$reasonfornonsupplyuniform= $_POST["reasonfornonsupplyuniform"];
$uniformunitreq= ($_POST["uniformunitreq"]==''?0:$_POST["uniformunitreq"]);
$uniformunitcost= ($_POST["uniformunitcost"]==''?0:$_POST["uniformunitcost"]);
$uniformtotalcost= ($_POST["uniformtotalcost"]==''?0:$_POST["uniformtotalcost"]);
$footwearunitreq= ($_POST["footwearunitreq"]==''?0:$_POST["footwearunitreq"]);
$footwearunitcost= ($_POST["footwearunitcost"]==''?0:$_POST["footwearunitcost"]);

$footweartotalcost= ($_POST["footweartotalcost"]==''?0:$_POST["footweartotalcost"]);
$bothunitreq= ($_POST["bothunitreq"]==''?0:$_POST["bothunitreq"]);
$bothunitcost= ($_POST["bothunitcost"]==''?0:$_POST["bothunitcost"]);
$bothtotalcost= ($_POST["bothtotalcost"]==''?0:$_POST["bothtotalcost"]);

$isspaceforteacher=$_POST["isspaceforteacher"];
$availspacedetail= $_POST["availspacedetail"];
$facilityinspaceforteacher= $_POST["facilityinspaceforteacher"];
$costforprovidefacility= ($_POST["costforprovidefacility"]==''?0:$_POST["costforprovidefacility"]);

$hasindoorgamefacility =$_POST["hasindoorgamefacility"];
$listindoorgamefacility= $_POST["listindoorgamefacility"];
$reqindoorgamefacility= $_POST["reqindoorgamefacility"];
$costofindoorgamefacility= ($_POST["costofindoorgamefacility"]==''?0:$_POST["costofindoorgamefacility"]);
$costforhappyschool= ($_POST["costforhappyschool"]==''?0:$_POST["costforhappyschool"]);



$query = "UPDATE schoolspecificfeature SET isneedrepair='".$isneedrepair."', roofarea = ".$roofarea.",rateforroof = ".$rateforroof.",costforroof=".$costforroof.",floorarea=".$floorarea.",rateforfloor=".$rateforfloor.",costforfloor= ".$costforfloor.",wallarea=".$wallarea.",rateforwall = ".$rateforwall.",costforwall=".$costforwall.",doorarea =".$doorarea.",ratefordoor=".$ratefordoor.",costfordoor=".$costfordoor.",totalcost=".$totalcost.",isneedpaint='".$isneedpaint."',areaforpaint=".$areaforpaint.",costforpaint=".$costforpaint.",painttype='".$painttype."',hasbenches='".$hasbenches."',existingbench=".$existingbench.",needbench=".$needbench.",costforbench=".$costforbench.",existingdesk = ".$existingdesk.",needdesk=".$needdesk.",costfordesk=".$costfordesk.",existingbenchdesk=".$existingbenchdesk.",needbenchdesk=".$needbenchdesk.",costforbenchdesk=".$costforbenchdesk.",hassafewater='".$hassafewater."',waterfacility='".$waterfacility."',costtomakewatersafe=".$costtomakewatersafe.",hasgirltoilet='".$hasgirltoilet."',urinalforgirls=".$urinalforgirls.",toiletforgirls=".$toiletforgirls.",hasboytoilet='".$hasboytoilet."',urinalforboys=".$urinalforboys.",toiletforboys=".$toiletforboys.",hasteachertoilet='".$hasteachertoilet."',urinalforteacher=".$urinalforteacher.",
toiletforteacher=".$toiletforteacher.",existingboystoilet=".$existingboystoilet.",requireboystoilet=".$requireboystoilet.",boystoiletcost=".$boystoiletcost.",existinggirlstoilet= ".$existinggirlstoilet.",requiregirlstoilet=".$requiregirlstoilet.",girlstoiletcost=".$girlstoiletcost.", existingteachertoilet=".$existingteachertoilet.",requireteachertoilet=".$requireteachertoilet.",teachertoiletcost=".$teachertoiletcost.",totaltoiletcost=".$totaltoiletcost.",haslibrary='".$haslibrary."',isstuduselibrary ='".$isstuduselibrary."',libbooktype='".$libbooktype."',libbookexisting=".$libbookexisting.",libbookneed=".$libbookneed.",libbookcost=".$libbookcost.",isgovtprovideuniform='".$isgovtprovideuniform."',reasonfornonsupplyuniform='".$reasonfornonsupplyuniform."',uniformunitreq=".$uniformunitreq.",uniformunitcost=".$uniformunitcost.",uniformtotalcost=".$uniformtotalcost.",footwearunitreq=".$footwearunitreq.",footwearunitcost=".$footwearunitcost.",
footweartotalcost=".$footweartotalcost.",bothunitreq=".$bothunitreq.",bothunitcost=".$bothunitcost.",bothtotalcost=".$bothtotalcost.",isspaceforteacher='".$isspaceforteacher."',availspacedetail='".$availspacedetail."',facilityinspaceforteacher='".$facilityinspaceforteacher."',costforprovidefacility=".$costforprovidefacility.",hasindoorgamefacility='".$hasindoorgamefacility."',listindoorgamefacility='".$listindoorgamefacility."',reqindoorgamefacility='".$reqindoorgamefacility."',costofindoorgamefacility=".$costofindoorgamefacility.",costforhappyschool=".$costforhappyschool." WHERE refappno='".$refappno."';"; 

//die(json_encode($query));

$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["success"] = 1;
		$arr["msg"] = "School Information for Grant Application successfully submited";
		$arr["refno"] = $refappno;
}
else
{
		$arr["success"] = 0;
		$arr["msg"] = "There is some problem, please try again.";

}
		
echo json_encode($arr);
?>
