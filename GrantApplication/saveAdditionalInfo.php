<?php
include("../connection.php");

$arr = array();

$refappno = $_POST["hdnrefappno"];
$grantuserid = $_POST["hdngrantuserid"];
$facilityid1 = ($_POST["SDP_1"]?$_POST["SDP_1"]:0);
$facilityid2 = ($_POST["SDP_2"]?$_POST["SDP_2"]:0);
$facilityid3 =($_POST["SDP_3"]?$_POST["SDP_3"]:0);
$facilityid4 =($_POST["SDP_4"]?$_POST["SDP_4"]:0);
$facilityid5 =($_POST["SDP_5"]?$_POST["SDP_5"]:0);
$facilityid6 = ($_POST["SDP_6"]?$_POST["SDP_6"]:0);
$facilityid7 = ($_POST["SDP_7"]?$_POST["SDP_7"]:0);
$facilityid8 = ($_POST["SDP_8"]?$_POST["SDP_8"]:0);

$startmonthyr1 = $_POST["startmm1"]."/".$_POST["startyr1"];
$startmonthyr2 = $_POST["startmm2"]."/".$_POST["startyr2"];
$startmonthyr3 = $_POST["startmm3"]."/".$_POST["startyr3"];
$startmonthyr4 = $_POST["startmm4"]."/".$_POST["startyr4"];
$startmonthyr5 = $_POST["startmm5"]."/".$_POST["startyr5"];
$startmonthyr6 = $_POST["startmm6"]."/".$_POST["startyr6"];
$startmonthyr7 = $_POST["startmm7"]."/".$_POST["startyr7"];
$startmonthyr8 = $_POST["startmm8"]."/".$_POST["startyr8"];


$endmonthyr1= $_POST["endmm1"]."/".$_POST["endyr1"];
$endmonthyr2= $_POST["endmm2"]."/".$_POST["endyr2"];
$endmonthyr3= $_POST["endmm3"]."/".$_POST["endyr3"];
$endmonthyr4= $_POST["endmm4"]."/".$_POST["endyr4"];
$endmonthyr5= $_POST["endmm5"]."/".$_POST["endyr5"];
$endmonthyr6= $_POST["endmm6"]."/".$_POST["endyr6"];
$endmonthyr7= $_POST["endmm7"]."/".$_POST["endyr7"];
$endmonthyr8= $_POST["endmm8"]."/".$_POST["endyr8"];

$responsibles1 = $_POST["txtresponsibles1"];
$responsibles2 = $_POST["txtresponsibles2"];
$responsibles3 = $_POST["txtresponsibles3"];
$responsibles4 = $_POST["txtresponsibles4"];
$responsibles5 = $_POST["txtresponsibles5"];
$responsibles6 = $_POST["txtresponsibles6"];
$responsibles7 = $_POST["txtresponsibles7"];
$responsibles8 = $_POST["txtresponsibles8"];
 
$sustain1= $_POST["txtsustain1"];
$sustain2= $_POST["txtsustain2"];



$availqry = "SELECT count(refappno) as avail FROM grantAppAdditionalInfo WHERE refappno='".$refappno."';";
$avilresult = mysqli_query($link,$availqry);
if($avilresult) {
$availrow[] = mysqli_fetch_assoc($avilresult);
}

if($availrow[0]["avail"]>0) {
	$query = "UPDATE grantAppAdditionalInfo SET  facilityid1=".$facilityid1.", facilityid2=".$facilityid2.", facilityid3=".$facilityid3.", facilityid4=".$facilityid4.", facilityid5=".$facilityid5.", facilityid6=".$facilityid6.", facilityid7=".$facilityid7.", facilityid8=".$facilityid8.", startmonthyr1='".$startmonthyr1."', startmonthyr2='".$startmonthyr2."', startmonthyr3='".$startmonthyr3."', startmonthyr4='".$startmonthyr4."', startmonthyr5='".$startmonthyr5."', startmonthyr6='".$startmonthyr6."', startmonthyr7='".$startmonthyr7."', startmonthyr8='".$startmonthyr8."', endmonthyr1='".$endmonthyr1."', endmonthyr2='".$endmonthyr2."', endmonthyr3='".$endmonthyr3."', endmonthyr4='".$endmonthyr4."', endmonthyr5='".$endmonthyr5."', endmonthyr6='".$endmonthyr6."', endmonthyr7='".$endmonthyr7."', endmonthyr8='".$endmonthyr8."', responsibles1='".$responsibles1."', responsibles2='".$responsibles2."', responsibles3='".$responsibles3."', responsibles4='".$responsibles4."', responsibles5='".$responsibles5."', responsibles6='".$responsibles6."', responsibles7='".$responsibles7."', responsibles8='".$responsibles8."', sustain1='".$sustain1."', sustain2='".$sustain2."'  WHERE   refappno = '".$refappno."';";
}
else
{
	$query = "INSERT INTO grantAppAdditionalInfo(refappno,`facilityid1`, `facilityid2`, `facilityid3`, `facilityid4`, `facilityid5`, `facilityid6`, `facilityid7`, `facilityid8`, `startmonthyr1`, `startmonthyr2`, `startmonthyr3`, `startmonthyr4`, `startmonthyr5`, `startmonthyr6`, `startmonthyr7`, `startmonthyr8`, `endmonthyr1`, `endmonthyr2`, `endmonthyr3`, `endmonthyr4`, `endmonthyr5`, `endmonthyr6`, `endmonthyr7`, `endmonthyr8`, `responsibles1`, `responsibles2`, `responsibles3`, `responsibles4`, `responsibles5`, `responsibles6`, `responsibles7`, `responsibles8`, `sustain1`, `sustain2`) VALUES('".$refappno."',".$facilityid1.",".$facilityid2.", ".$facilityid3.", ".$facilityid4.", ".$facilityid5.", ".$facilityid6.", ".$facilityid7.", ".$facilityid8.", '".$startmonthyr1."', '".$startmonthyr2."', '".$startmonthyr3."', '".$startmonthyr4."', '".$startmonthyr5."', '".$startmonthyr6."', '".$startmonthyr7."', '".$startmonthyr8."', '".$endmonthyr1."', '".$endmonthyr2."', '".$endmonthyr3."', '".$endmonthyr4."', '".$endmonthyr5."', '".$endmonthyr6."', '".$endmonthyr7."', '".$endmonthyr8."', '".$responsibles1."', '".$responsibles2."', '".$responsibles3."', '".$responsibles4."', '".$responsibles5."', '".$responsibles6."', '".$responsibles7."', '".$responsibles8."', '".$sustain1."', '".$sustain2."');";
}

$result = mysqli_query($link,$query);

if($result)
{

header("location: grantApplicationIndex.php");
}

?>
