<?php
include("../connection.php");

$arr = array();

$grantuserid = $_POST["hdngrantuserid"];

$refappno = $_POST["hdnrefapplicationno"]; 

$hasSMC= $_POST["hasSMC"];
$isSMCwork= $_POST["isSMCwork"];
$isADPprepare= $_POST["isADPprepare"];
$ADPYr = $_POST["txtADPYr"];
if($_POST["ADPgroup"]) {
$ADPfacility = implode(",",$_POST["ADPgroup"]);
}
$schooladdr = $_POST["txtschooladdr"];
$schoolname = $_POST["txtschoolname"];
$addrstate = $_POST["txtState"];
$addrdistrict = $_POST["txtdistrict"];
$village = $_POST["txtvillage"];
$pin = $_POST["txtpin"];
$schooltype =$_POST["schooltype"];

$noofboysstud = ($_POST["txtnoofboysstud"]==''?0:$_POST["txtnoofboysstud"]);
$noofgirlsstud = ($_POST["txtnoofgirlsstud"]==''?0:$_POST["txtnoofgirlsstud"]);
$nooftotalstud = ($_POST["txtnooftotalstud"]==''?0:$_POST["txtnooftotalstud"]);
$noofmaleteach = ($_POST["txtnoofmaleteach"]==''?0:$_POST["txtnoofmaleteach"]);
$nooffemaleteach = ($_POST["txtnooffemaleteach"]==''?0:$_POST["txtnooffemaleteach"]);
$noofheadteach = ($_POST["txtnoofheadteach"]==''?0:$_POST["txtnoofheadteach"]);
$nooftotalteach = ($_POST["txtnooftotalteach"]==''?0:$_POST["txtnooftotalteach"]);
$noofmaletrainedteach = ($_POST["txtnoofmaletrainedteach"]==''?0:$_POST["txtnoofmaletrainedteach"]);
$nooffemaletrainedteach = ($_POST["txtnooffemaletrainedteach"]==''?0:$_POST["txtnooffemaletrainedteach"]);
$istrainedhead = $_POST["istrainedhead"];


$optstructure = $_POST["optstructure"];
$roofdamageextend = $_POST["roofdamageextend"];
$floordamageextend = $_POST["floordamageextend"];
$Wallsdamageextend = $_POST["wallsdamageextend"];
$doordamageextend = $_POST["doordamageextend"];
$noofroom = ($_POST["txtnoofroom"]==''?0:$_POST["txtnoofroom"]);
$noofclassroom = ($_POST["txtnoofclassroom"]==''?0:$_POST["txtnoofclassroom"]);
$isroomforheadteach = $_POST["isroomforheadteach"];
$isroomforteachstaff = $_POST["isroomforteachstaff"];
$isseperatestore= $_POST["isseperatestore"];
$isstorewithheadteacherroom = $_POST["isstorewithheadteacherroom"];
$islaboratory = $_POST["islaboratory"];
$iskitchenformidmeal=$_POST["iskitchenformidmeal"];
$isspaceforeatmeal = $_POST["isspaceforeatmeal"];
$isprovideelectricity = $_POST["isprovideelectricity"];
$isunauthorizedsecure =$_POST["isunauthorizedsecure"];
$isopenplaygrnd =$_POST["isopenplaygrnd"];
$hassportingequip = $_POST["hassportingequip"];
$hasindoorgame = $_POST["hasindoorgame"];
$language1 = $_POST["txt1stlanguage"];
$language2 = $_POST["txt2ndlanguage"];
$language3 = $_POST["txt3rdlanguage"];
$hasheardCCEforstudent = $_POST["hasheardCCEforstudent"];


$isbookletreceived = $_POST["isbookletreceived"];
$isbookletsummarize = $_POST["isbookletsummarize"];
$hasarrangelaggingchild = $_POST["hasarrangelaggingchild"];
$startyrforlaggingchild = $_POST["txtstartyrforlaggingchild"];
$hascomputer = $_POST["hascomputer"];
$noofcomputer = ($_POST["txtnoofcomputer"]==''?0:$_POST["txtnoofcomputer"]);
$haselearning = $_POST["haselearning"];
$elearning = $_POST["txtelearning"];
$ismentalstud = $_POST["ismentalstud"];
$facilityformentalstud = $_POST["txtfacilityformentalstud"];
$willingformentalstud = $_POST["txtwillingformentalstud"];


$userinfoqry = "SELECT * FROM registrationForGrantapp WHERE id=$grantuserid;";
$userinforesult=mysqli_query($link,$userinfoqry);

if($userinforesult)
{
$userinfoarr[] =mysqli_fetch_assoc($userinforesult); 
}

//echo $userinfoarr[0]["role"];

$availqry = "SELECT count(refappno) as avail FROM grantappSchoolinfo WHERE refappno='".$refappno."';";
$avilresult = mysqli_query($link,$availqry);
if($avilresult) {
$availrow[] = mysqli_fetch_assoc($avilresult);
}
if($availrow[0]["avail"]>0) {
	if($userinfoarr[0]["role"]=='CP') 
	$saveby = "savebyCP='".date('Y-m-d h:m:s')."'";
	else
	$saveby = "savebyPCP='".date('Y-m-d h:m:s')."'";

$query = "UPDATE grantappSchoolinfo SET hasSMC = '".$hasSMC."',isSMCwork='".$isSMCwork."',isADPprepare = '".$isADPprepare."',ADPYr = '".$ADPYr."',ADPfacility='".$ADPfacility."',schooladdress = '".$schooladdr."',schoolname='". $schoolname."',addrstate = '".$addrstate."',addrdistrict = '".$addrdistrict."', village = '".$village."',pin='".$pin."',schooltype = '".$schooltype."', noofboysstud = ".$noofboysstud.",noofgirlsstud=".$noofgirlsstud.",nooftotalstud=".$nooftotalstud.",noofmaleteach=".$noofmaleteach.", nooffemaleteach=".$nooffemaleteach.", noofheadteach= ".$noofheadteach.",nooftotalteach=".$nooftotalteach.", noofmaletrainedteach=".$noofmaletrainedteach.",nooffemaletrainedteach=".$nooffemaletrainedteach .",istrainedhead='".$istrainedhead ."',optstructure = '".$optstructure."', roofdamageextend ='".$roofdamageextend ."',floordamageextend='".$floordamageextend."',Wallsdamageextend='".$Wallsdamageextend."',doordamageextend='".$doordamageextend."',noofroom=".$noofroom.",noofclassroom=".$noofclassroom.",isroomforheadteach='".$isroomforheadteach."',isroomforteachstaff='".$isroomforteachstaff."',isseperatestore='".$isseperatestore."',isstorewithheadteacherroom='".$isstorewithheadteacherroom ."',islaboratory='".$islaboratory."',iskitchenformidmeal='".$iskitchenformidmeal."',isspaceforeatmeal='".$isspaceforeatmeal."',isprovideelectricity='".$isprovideelectricity."',isunauthorizedsecure='".$isunauthorizedsecure."',isopenplaygrnd='".$isopenplaygrnd."',hassportingequip='".$hassportingequip ."',hasindoorgame='".$hasindoorgame ."',language1='".$language1."',language2='".$language2."',language3='".$language3."',hasheardCCEforstudent='".$hasheardCCEforstudent."',isbookletreceived='".$isbookletreceived."',isbookletsummarize='".$isbookletsummarize."',hasarrangelaggingchild='".$hasarrangelaggingchild."',startyrforlaggingchild='".$startyrforlaggingchild ."',hascomputer='".$hascomputer ."',noofcomputer=".$noofcomputer." ,haselearning='".$haselearning."', elearning='".$elearning."',ismentalstud='".$ismentalstud."',facilityformentalstud='".$facilityformentalstud."',willingformentalstud='".$willingformentalstud."',".$saveby." WHERE refappno='".$refappno."';";
}
else
{
if($userinfoarr[0]["role"]=='CP')
	$saveby = "savebyCP";
	else
	$saveby = "savebyPCP";

$query = "INSERT INTO grantappSchoolinfo(`refappno`, `hasSMC`, `isSMCwork`, `isADPprepare`, `ADPYr`, `ADPfacility`, `schooladdress`,`schoolname`, `addrstate`, `addrdistrict`, `village`, `pin`, `schooltype`, `noofboysstud`, `noofgirlsstud`, `nooftotalstud`, `noofmaleteach`, `nooffemaleteach`, `noofheadteach`, `nooftotalteach`, `noofmaletrainedteach`, `nooffemaletrainedteach`, `istrainedhead`, `optstructure`, `roofdamageextend`, `floordamageextend`, `Wallsdamageextend`, `doordamageextend`, `noofroom`, `noofclassroom`, `isroomforheadteach`, `isroomforteachstaff`, `isseperatestore`, `isstorewithheadteacherroom`, `islaboratory`, `iskitchenformidmeal`, `isspaceforeatmeal`, `isprovideelectricity`, `isunauthorizedsecure`, `isopenplaygrnd`, `hassportingequip`, `hasindoorgame`, `language1`, `language2`, `language3`, `hasheardCCEforstudent`, `isbookletreceived`, `isbookletsummarize`, `hasarrangelaggingchild`, `startyrforlaggingchild`, `hascomputer`, `noofcomputer`, `haselearning`, `elearning`, `ismentalstud`, `facilityformentalstud`, `willingformentalstud`, `savebyCP`) VALUES('".$refappno."','".$hasSMC."','".$isSMCwork."','".$isADPprepare."','".$ADPYr."','".$ADPfacility."','".$schooladdr."','". $schoolname."','".$addrstate."','".$addrdistrict."', '".$village."','".$pin."','".$schooltype."',".$noofboysstud.",".$noofgirlsstud.",".$nooftotalstud.",".$noofmaleteach.", ".$nooffemaleteach.", ".$noofheadteach.",".$nooftotalteach.", ".$noofmaletrainedteach.",".$nooffemaletrainedteach .",'".$istrainedhead ."','".$optstructure."','".$roofdamageextend ."','".$floordamageextend."','".$Wallsdamageextend."','".$doordamageextend."',".$noofroom.",".$noofclassroom.",'".$isroomforheadteach."','".$isroomforteachstaff."','".$isseperatestore."','".$isstorewithheadteacherroom ."','".$islaboratory."','".$iskitchenformidmeal."','".$isspaceforeatmeal."','".$isprovideelectricity."','".$isunauthorizedsecure."','".$isopenplaygrnd."','".$hassportingequip ."','".$hasindoorgame ."','".$language1."','".$language2."','".$language3."','".$hasheardCCEforstudent."','".$isbookletreceived."','".$isbookletsummarize."','".$hasarrangelaggingchild."','".$startyrforlaggingchild ."','".$hascomputer ."',".$noofcomputer." ,'".$haselearning."', '".$elearning."','".$ismentalstud."','".$facilityformentalstud."','".$willingformentalstud."','".date('Y-m-d h:m:s')."');";


}

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
//		
echo json_encode($arr);
?>
