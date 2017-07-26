<?php
include("../connection.php");

	
$grantuserid = $_POST["hdngrantuserid"];
$refappno = $_POST["hdnrefapplicationno"]; 
	function  findexts($filename) {
		$ext1 = split("[/\\.]", $filename) ;
		$n = count($ext1)-1; 
		$exts = $ext1[$n]; 
		return strtoupper($exts);
	}
	
	 function FileNewname($filename,$imgname)
	{
		 
		$dt=date("Y-m-d-h-i-s");
		$newname=$dt.".".strtolower(findexts($filename));
		return $imgname."_".$newname;
	}


$arr = array();


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

$hasclentoilet = $_POST["hasclentoilet"];
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

$bookalmirahexisting=($_POST["bookalmirahexisting"]==''?0:$_POST["bookalmirahexisting"]);
$bookalmirahneed= ($_POST["bookalmirahneed"]==''?0:$_POST["bookalmirahneed"]);
$libalmirahcost= ($_POST["libalmirahcost"]==''?0:$_POST["libalmirahcost"]);

$isgovtprovideuniform= $_POST["isgovtprovideuniform"];
$reasonfornonsupplyuniform= $_POST["reasonfornonsupplyuniform"];
$uniformunitreq= ($_POST["uniformunitreq"]==''?0:$_POST["uniformunitreq"]);
$uniformunitcost= ($_POST["uniformunitcost"]==''?0:$_POST["uniformunitcost"]);
$uniformtotalcost= ($_POST["uniformtotalcost"]==''?0:$_POST["uniformtotalcost"]);
$footwearunitreq= ($_POST["footwearunitreq"]==''?0:$_POST["footwearunitreq"]);
$footwearunitcost= ($_POST["footwearunitcost"]==''?0:$_POST["footwearunitcost"]);

$footweartotalcost= ($_POST["footweartotalcost"]==''?0:$_POST["footweartotalcost"]);
/*$bothunitreq= ($_POST["bothunitreq"]==''?0:$_POST["bothunitreq"]);
$bothunitcost= ($_POST["bothunitcost"]==''?0:$_POST["bothunitcost"]);
$bothtotalcost= ($_POST["bothtotalcost"]==''?0:$_POST["bothtotalcost"]);*/

$isspaceforteacher=$_POST["isspaceforteacher"];
$availspacedetail= $_POST["availspacedetail"];
$facilityinspaceforteacher= $_POST["facilityinspaceforteacher"];
$costforprovidefacility= ($_POST["costforprovidefacility"]==''?0:$_POST["costforprovidefacility"]);
$costforprovidetable= ($_POST["costforprovidetable"]==''?0:$_POST["costforprovidetable"]);

$hasindoorgamefacility =$_POST["hasindoorgamefacility"];
$listindoorgamefacility= $_POST["listindoorgamefacility"];
$reqindoorgamefacility= $_POST["reqindoorgamefacility"];
$costofindoorgamefacility= ($_POST["costofindoorgamefacility"]==''?0:$_POST["costofindoorgamefacility"]);
$costforhappyschool= ($_POST["costforhappyschool"]==''?0:$_POST["costforhappyschool"]);
$administrativecost= ($_POST["administrativecost"]==''?0:$_POST["administrativecost"]);
$totalprojectcost= ($_POST["totalprojectcost"]==''?0:$_POST["totalprojectcost"]);
$clubcontribute= ($_POST["clubcontribute"]==''?0:$_POST["clubcontribute"]);
$othercontribute= ($_POST["othercontribute"]==''?0:$_POST["othercontribute"]);
$RILMcontribute= ($_POST["RILMcontribute"]==''?0:$_POST["RILMcontribute"]);
$totalcontribution= ($_POST["Totalcontribute"]==''?0:$_POST["Totalcontribute"]);

// ================================= image name ===================================================

$imgroofcost = 	$_FILES["imgroofcost"]["name"];
$imgfloorcost = 	$_FILES["imgfloorcost"]["name"];
$imgwallcost = 	$_FILES["imgwallcost"]["name"];
$imgdoorcost = 	$_FILES["imgdoorcost"]["name"];
$imgpaintcost = 	$_FILES["imgpaintcost"]["name"];
$imgbenchcost = 	$_FILES["imgbenchcost"]["name"];
$imgdeskcost = 	$_FILES["imgdeskcost"]["name"];
$imgbenchdeskcost = 	$_FILES["imgbenchdeskcost"]["name"];
$imgwatersafecost = 	$_FILES["imgwatersafecost"]["name"];
$imgboystoiletcost = 	$_FILES["imgboystoiletcost"]["name"];
$imggirlstoiletcost = 	$_FILES["imggirlstoiletcost"]["name"];
$imgteachtoiletcost = 	$_FILES["imgteachtoiletcost"]["name"];
$imgbookcost = 	$_FILES["imgbookcost"]["name"];
$imgalmirahcost = 	$_FILES["imgalmirahcost"]["name"];
$imguniformcost= 	$_FILES["imguniformcost"]["name"];
$imgfootwearcost= 	$_FILES["imgfootwearcost"]["name"];
$imgspaceprovidecost= 	$_FILES["imgspaceprovidecost"]["name"];
$imgtablecost= 	$_FILES["imgtablecost"]["name"];
$imgindoorgamecost= 	$_FILES["imgindoorgamecost"]["name"];

$newimgroofcost ="" ;
$newimgfloorcost ="" ;
$newimgwallcost ="" ;
$newimgdoorcost ="" ;
$newimgpaintcost ="" ;
$newimgbenchcost ="" ;
$newimgdeskcost ="" ;
$newimgbenchdeskcost ="" ;
$newimgwatersafecost ="" ;
$newimgboystoiletcost ="" ;
$newimggirlstoiletcost ="" ;
$newimgteachtoiletcost ="" ;
$newimgbookcost ="" ;
$newimgalmirahcost ="" ;
$newimguniformcost ="" ;
$newimgfootwearcost ="" ;
$newimgspaceprovidecost ="" ;
$newimgtablecost ="" ;
$newimgindoorgamecost ="" ;

if($imgroofcost!='')  { 
	$newimgroofcost = FileNewname($imgroofcost,$refappno.'imgroofcost');	 
	if($_FILES["imgroofcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgroofcost"]["tmp_name"], "grantAppImgUpload/" . $newimgroofcost);
		 }
	 }

if($imgfloorcost!='')  { 
	$newimgfloorcost = FileNewname($imgfloorcost,$refappno.'imgfloorcost');	 
	if($_FILES["imgfloorcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgfloorcost"]["tmp_name"], "grantAppImgUpload/" . $newimgfloorcost);
		 }
	 }
if($imgwallcost!='')  { 
	$newimgwallcost = FileNewname($imgwallcost,$refappno.'imgwallcost');	 
	if($_FILES["imgwallcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgwallcost"]["tmp_name"], "grantAppImgUpload/" . $newimgwallcost);
		 }
	 }


if($imgdoorcost!='')  { 
	$newimgdoorcost = FileNewname($imgdoorcost,$refappno.'imgdoorcost');	 
	if($_FILES["imgdoorcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgdoorcost"]["tmp_name"], "grantAppImgUpload/" . $newimgdoorcost);
		 }
	 }
if($imgpaintcost!='')  { 
	$newimgpaintcost = FileNewname($imgpaintcost,$refappno.'imgpaintcost');	 
	if($_FILES["imgpaintcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgpaintcost"]["tmp_name"], "grantAppImgUpload/" . $newimgpaintcost);
		 }
	 }
if($imgbenchcost!='')  { 
	$newimgbenchcost = FileNewname($imgdoorcost,$refappno.'imgbenchcost');	 
	if($_FILES["imgbenchcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgbenchcost"]["tmp_name"], "grantAppImgUpload/" . $newimgbenchcost);
		 }
	 }
if($imgdeskcost!='')  { 
	$newimgdeskcost = FileNewname($imgdoorcost,$refappno.'imgdeskcost');	 
	if($_FILES["imgdeskcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgdeskcost"]["tmp_name"], "grantAppImgUpload/" . $newimgdeskcost);
		 }
	 }
	 
if($imgbenchdeskcost!='')  { 
	$newimgbenchdeskcost = FileNewname($imgbenchdeskcost,$refappno.'imgbenchdeskcost');	 
	if($_FILES["imgbenchdeskcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgbenchdeskcost"]["tmp_name"], "grantAppImgUpload/" . $newimgbenchdeskcost);
		 }
	 }
if($imgwatersafecost!='')  { 
	$newimgwatersafecost = FileNewname($imgwatersafecost,$refappno.'imgwatersafecost');	 
	if($_FILES["imgwatersafecost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgwatersafecost"]["tmp_name"], "grantAppImgUpload/" . $newimgwatersafecost);
		 }
	 }
if($imgboystoiletcost!='')  { 
	$newimgboystoiletcost = FileNewname($imgboystoiletcost,$refappno.'imgboystoiletcost');	 
	if($_FILES["imgboystoiletcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgboystoiletcost"]["tmp_name"], "grantAppImgUpload/" . $newimgboystoiletcost);
		 }
	 }
if($imggirlstoiletcost!='')  { 
	$newimggirlstoiletcost = FileNewname($imggirlstoiletcost,$refappno.'imggirlstoiletcost');	 
	if($_FILES["imggirlstoiletcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imggirlstoiletcost"]["tmp_name"], "grantAppImgUpload/" . $newimggirlstoiletcost);
		 }
	 }
if($imgteachtoiletcost!='')  { 
	$newimgteachtoiletcost = FileNewname($imgteachtoiletcost,$refappno.'imgdoorcost');	 
	if($_FILES["imgteachtoiletcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgteachtoiletcost"]["tmp_name"], "grantAppImgUpload/" . $newimgteachtoiletcost);
		 }
	 }
if($imgbookcost!='')  { 
	$newimgbookcost = FileNewname($imgbookcost,$refappno.'imgbookcost');	 
	if($_FILES["imgbookcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgbookcost"]["tmp_name"], "grantAppImgUpload/" . $newimgbookcost);
		 }
	 }

if($imgalmirahcost!='')  { 
	$newimgalmirahcost = FileNewname($imgalmirahcost,$refappno.'imgalmirahcost');	 
	if($_FILES["imgalmirahcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgalmirahcost"]["tmp_name"], "grantAppImgUpload/" . $newimgalmirahcost);
		 }
	 }
if($imguniformcost!='')  { 
	$newimguniformcost = FileNewname($imguniformcost,$refappno.'imguniformcost');	 
	if($_FILES["imguniformcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imguniformcost"]["tmp_name"], "grantAppImgUpload/" . $newimguniformcost);
		 }
	 }
if($imgfootwearcost!='')  { 
	$newimgfootwearcost = FileNewname($imgfootwearcost,$refappno.'imgfootwearcost');	 
	if($_FILES["imgfootwearcost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgfootwearcost"]["tmp_name"], "grantAppImgUpload/" . $newimgfootwearcost);
		 }
	 }
if($imgspaceprovidecost!='')  { 
	$newimgspaceprovidecost = FileNewname($imgspaceprovidecost,$refappno.'imgspaceprovidecost');	 
	if($_FILES["imgspaceprovidecost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgspaceprovidecost"]["tmp_name"], "grantAppImgUpload/" . $newimgspaceprovidecost);
		 }
	 }
if($imgtablecost!='')  { 
	$newimgtablecost = FileNewname($imgtablecost,$refappno.'imgtablecost');	 
	if($_FILES["imgtablecost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgtablecost"]["tmp_name"], "grantAppImgUpload/" . $newimgtablecost);
		 }
	 }
if($imgindoorgamecost!='')  { 
	$newimgindoorgamecost = FileNewname($imgindoorgamecost,$refappno.'imgindoorgamecost');	 
	if($_FILES["imgindoorgamecost"]["error"]==0 ) {
		 move_uploaded_file($_FILES["imgindoorgamecost"]["tmp_name"], "grantAppImgUpload/" . $newimgindoorgamecost);
		 }
	 }

$repaire1= $_FILES["repaireimg1"]["name"];
$repaire2= $_FILES["repaireimg2"]["name"];
$hygienic1= $_FILES["hygienicimg1"]["name"];
$hygienic2= $_FILES["hygienicimg2"]["name"];
$waterfacility1= $_FILES["waterfacilityimg1"]["name"];
$waterfacility2= $_FILES["waterfacilityimg2"]["name"];
$lib1= $_FILES["libimg1"]["name"];
$lib2= $_FILES["libimg2"]["name"];
$uniform1= $_FILES["uniformimg1"]["name"];
$uniform2= $_FILES["uniformimg2"]["name"];
$sportequip1= $_FILES["sportequipimg1"]["name"];
$sportequip2= $_FILES["sportequipimg2"]["name"];
$bench1= $_FILES["benchimg1"]["name"];
$bench2= $_FILES["benchimg2"]["name"];
$space1= $_FILES["spaceimg1"]["name"];
$space2= $_FILES["spaceimg2"]["name"];




$newrepaire1 ="";
$newrepaire2 ="";
$newhygienic1 ="";
$newhygienic2 ="";
$newwaterfacility1 ="";
$newwaterfacility2 ="";
$newlib1 ="";
$newlib2 ="";
$newuniform1 ="";
$newuniform2 ="";
$newsportequip1 ="";
$newsportequip2 ="";
$newbench1 ="";
$newbench2 ="";
$newspace1 ="";
$newspace2 ="";

if($repaire1!='')  { 
	$newrepaire1 = FileNewname($repaire1,$refappno.'repaireimg1');	 
	if($_FILES["repaireimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["repaireimg1"]["tmp_name"], "grantAppImgUpload/" . $newrepaire1);
		 }
	 }
if($repaire2!='')  { 
	$newrepaire2 = FileNewname($repaire2,$refappno.'repaireimg2');	 
	if($_FILES["repaireimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["repaireimg2"]["tmp_name"], "grantAppImgUpload/" . $newrepaire2);
		 }
	 }

if($hygienic1!='')  { 
	$newhygienic1 = FileNewname($hygienic1,$refappno.'hygienicimg1');	 
	if($_FILES["hygienicimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["hygienicimg1"]["tmp_name"], "grantAppImgUpload/" . $newhygienic1);
		 }
	 }
if($hygienic2!='')  { 
	$newhygienic2 = FileNewname($hygienic2,$refappno.'hygienicimg2');	 
	if($_FILES["hygienicimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["hygienicimg2"]["tmp_name"], "grantAppImgUpload/" . $newhygienic2);
		 }
	 }
if($waterfacility1!='')  { 
	$newwaterfacility1 = FileNewname($waterfacility1,$refappno.'waterfacilityimg1');	 
	if($_FILES["waterfacilityimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["waterfacilityimg1"]["tmp_name"], "grantAppImgUpload/" . $newwaterfacility1);
		 }
	 }
if($waterfacility2!='')  { 
	$newwaterfacility2 = FileNewname($waterfacility2,$refappno.'waterfacilityimg2');	 
	if($_FILES["waterfacilityimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["waterfacilityimg2"]["tmp_name"], "grantAppImgUpload/" . $newwaterfacility2);
		 }
	 }
if($lib1!='')  { 
	$newlib1 = FileNewname($lib1,$refappno.'libimg1');	 
	if($_FILES["libimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["libimg1"]["tmp_name"], "grantAppImgUpload/" . $newlib1);
		 }
	 }
if($lib2!='')  { 
	$newlib2 = FileNewname($lib2,$refappno.'libimg2');	 
	if($_FILES["libimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["libimg2"]["tmp_name"], "grantAppImgUpload/" . $newlib2);
		 }
	 }
if($uniform1!='')  { 
	$newuniform1 = FileNewname($uniform1,$refappno.'uniformimg1');	 
	if($_FILES["uniformimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uniformimg1"]["tmp_name"], "grantAppImgUpload/" . $newuniform1);
		 }
	 }

if($uniform2!='')  { 
	$newuniform2 = FileNewname($uniform2,$refappno.'uniformimg2');	 
	if($_FILES["uniformimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uniformimg2"]["tmp_name"], "grantAppImgUpload/" . $newuniform2);
		 }
	 }
if($sportequip1!='')  { 
	$newsportequip1 = FileNewname($sportequip1,$refappno.'sportequipimg1');	 
	if($_FILES["sportequipimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["sportequipimg1"]["tmp_name"], "grantAppImgUpload/" . $newsportequip1);
		 }
	 }
if($sportequip2!='')  { 
	$newsportequip2 = FileNewname($sportequip2,$refappno.'sportequipimg2');	 
	if($_FILES["sportequipimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["sportequipimg2"]["tmp_name"], "grantAppImgUpload/" . $newsportequip2);
		 }
	 }

if($bench1!='')  { 
	$newbench1 = FileNewname($bench1,$refappno.'benchimg1');	 
	if($_FILES["benchimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["benchimg1"]["tmp_name"], "grantAppImgUpload/" . $newbench1);
		 }
	 }
if($bench2!='')  { 
	$newbench2 = FileNewname($bench2,'benchimg2');	 
	if($_FILES["benchimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["benchimg2"]["tmp_name"], "grantAppImgUpload/" . $newbench2);
		 }
	 }
if($space1!='')  { 
	$newspace1 = FileNewname($space1,$refappno.'spaceimg1');	 
	if($_FILES["spaceimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["spaceimg1"]["tmp_name"], "grantAppImgUpload/" . $newspace1);
		 }
	 }
if($space2!='')  { 
	$newspace2 = FileNewname($space2,$refappno.'spaceimg2');	 
	if($_FILES["spaceimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["spaceimg2"]["tmp_name"], "grantAppImgUpload/" . $newspace2);
		 }
	 }

// ================================= image name ===================================================



$userinfoqry = "SELECT * FROM registrationForGrantapp WHERE id=$grantuserid;";
$userinforesult=mysqli_query($link,$userinfoqry);

if($userinforesult)
{
$userinfoarr[] =mysqli_fetch_assoc($userinforesult); 
}


$availqry = "SELECT count(refappno) as avail FROM schoolspecificfeature WHERE refappno='".$refappno."';";
$avilresult = mysqli_query($link,$availqry);
if($avilresult) {
$availrow[] = mysqli_fetch_assoc($avilresult);
}

if($availrow[0]["avail"]>0) {
	if($userinfoarr[0]["role"]=='CP') 
	$saveby = "savebyCP='".date('Y-m-d h:m:s')."'";
	else
	$saveby = "savebyPCP='".date('Y-m-d h:m:s')."'";
$query = "UPDATE schoolspecificfeature SET isneedrepair='".$isneedrepair."', roofarea = ".$roofarea.",rateforroof = ".$rateforroof.",costforroof=".$costforroof.",floorarea=".$floorarea.",rateforfloor=".$rateforfloor.",costforfloor= ".$costforfloor.",wallarea=".$wallarea.",rateforwall = ".$rateforwall.",costforwall=".$costforwall.",doorarea =".$doorarea.",ratefordoor=".$ratefordoor.",costfordoor=".$costfordoor.",totalcost=".$totalcost.",isneedpaint='".$isneedpaint."',areaforpaint=".$areaforpaint.",costforpaint=".$costforpaint.",painttype='".$painttype."',hasbenches='".$hasbenches."',existingbench=".$existingbench.",needbench=".$needbench.",costforbench=".$costforbench.",existingdesk = ".$existingdesk.",needdesk=".$needdesk.",costfordesk=".$costfordesk.",existingbenchdesk=".$existingbenchdesk.",needbenchdesk=".$needbenchdesk.",costforbenchdesk=".$costforbenchdesk.",hassafewater='".$hassafewater."',waterfacility='".$waterfacility."',costtomakewatersafe=".$costtomakewatersafe.",hasclentoilet = '".$hasclentoilet."',hasgirltoilet='".$hasgirltoilet."',urinalforgirls=".$urinalforgirls.",toiletforgirls=".$toiletforgirls.",hasboytoilet='".$hasboytoilet."',urinalforboys=".$urinalforboys.",toiletforboys=".$toiletforboys.",hasteachertoilet='".$hasteachertoilet."',urinalforteacher=".$urinalforteacher.",toiletforteacher=".$toiletforteacher.",existingboystoilet=".$existingboystoilet.",requireboystoilet=".$requireboystoilet.",boystoiletcost=".$boystoiletcost.",existinggirlstoilet= ".$existinggirlstoilet.",requiregirlstoilet=".$requiregirlstoilet.",girlstoiletcost=".$girlstoiletcost.", existingteachertoilet=".$existingteachertoilet.",requireteachertoilet=".$requireteachertoilet.",teachertoiletcost=".$teachertoiletcost.",totaltoiletcost=".$totaltoiletcost.",haslibrary='".$haslibrary."',isstuduselibrary ='".$isstuduselibrary."',libbooktype='".$libbooktype."',libbookexisting=".$libbookexisting.",libbookneed=".$libbookneed.",libbookcost=".$libbookcost.",bookalmirahexisting=".$bookalmirahexisting.",bookalmirahneed=".$bookalmirahneed.",libalmirahcost=".$libalmirahcost.",isgovtprovideuniform='".$isgovtprovideuniform."',reasonfornonsupplyuniform='".$reasonfornonsupplyuniform."',uniformunitreq=".$uniformunitreq.",uniformunitcost=".$uniformunitcost.",uniformtotalcost=".$uniformtotalcost.",footwearunitreq=".$footwearunitreq.",footwearunitcost=".$footwearunitcost.",footweartotalcost=".$footweartotalcost.",isspaceforteacher='".$isspaceforteacher."',availspacedetail='".$availspacedetail."',facilityinspaceforteacher='".$facilityinspaceforteacher."',costforprovidefacility=".$costforprovidefacility.",costforprovidetable=".$costforprovidetable.",hasindoorgamefacility='".$hasindoorgamefacility."',reqindoorgamefacility='".$reqindoorgamefacility."',costofindoorgamefacility=".$costofindoorgamefacility.",costforhappyschool='".$costforhappyschool."',administrativecost='".$administrativecost."',totalprojectcost='".$totalprojectcost."',clubcontribute='".$clubcontribute."', othercontribute='".$othercontribute."', RILMcontribute='".$RILMcontribute."',totalcontribution='".$totalcontribution."',".$saveby." WHERE refappno='".$refappno."';"; 
}

else
{
if($userinfoarr[0]["role"]=='CP') 
	$saveby = "savebyCP";
	else
	$saveby = "savebyPCP";
$query = "INSERT INTO schoolspecificfeature (`refappno`,`isneedrepair`, `roofarea`, `rateforroof`, `costforroof`, `floorarea`, `rateforfloor`, `costforfloor`, `wallarea`, `rateforwall`, `costforwall`, `doorarea`, `ratefordoor`, `costfordoor`, `totalcost`, `isneedpaint`, `areaforpaint`, `costforpaint`, `painttype`, `hasbenches`, `existingbench`, `needbench`, `costforbench`, `existingdesk`, `needdesk`, `costfordesk`, `existingbenchdesk`, `needbenchdesk`, `costforbenchdesk`, `hassafewater`, `waterfacility`, `costtomakewatersafe`,`hasclentoilet`, `hasgirltoilet`, `urinalforgirls`, `toiletforgirls`, `hasboytoilet`, `urinalforboys`, `toiletforboys`, `hasteachertoilet`, `urinalforteacher`, `toiletforteacher`, `existingboystoilet`, `requireboystoilet`, `boystoiletcost`, `existinggirlstoilet`, `requiregirlstoilet`, `girlstoiletcost`, `existingteachertoilet`, `requireteachertoilet`, `teachertoiletcost`, `totaltoiletcost`, `haslibrary`, `isstuduselibrary`, `libbooktype`, `libbookexisting`, `libbookneed`, `libbookcost`,`bookalmirahexisting`,`bookalmirahneed`,`libalmirahcost`, `isgovtprovideuniform`, `reasonfornonsupplyuniform`, `uniformunitreq`, `uniformunitcost`, `uniformtotalcost`, `footwearunitreq`, `footwearunitcost`, `footweartotalcost`, `isspaceforteacher`, `availspacedetail`, `facilityinspaceforteacher`, `costforprovidefacility`,`costforprovidetable`, `hasindoorgamefacility`, `reqindoorgamefacility`, `costofindoorgamefacility`, `costforhappyschool`,`administrativecost`,`totalprojectcost`,`clubcontribute`, `othercontribute`, `RILMcontribute`,`totalcontribution`, ".$saveby.") VALUES('".$refappno."','".$isneedrepair."',".$roofarea.",".$rateforroof.",".$costforroof.",".$floorarea.",".$rateforfloor.",".$costforfloor.",".$wallarea.",".$rateforwall.",".$costforwall.",".$doorarea.",".$ratefordoor.",".$costfordoor.",".$totalcost.",'".$isneedpaint."',".$areaforpaint.",".$costforpaint.",'".$painttype."','".$hasbenches."',".$existingbench.",".$needbench.",".$costforbench.",".$existingdesk.",".$needdesk.",".$costfordesk.",".$existingbenchdesk.",".$needbenchdesk.",".$costforbenchdesk.",'".$hassafewater."','".$waterfacility."',".$costtomakewatersafe.",'".$hasclentoilet."','".$hasgirltoilet."',".$urinalforgirls.",".$toiletforgirls.",'".$hasboytoilet."',".$urinalforboys.",".$toiletforboys.",'".$hasteachertoilet."',".$urinalforteacher.",".$toiletforteacher.",".$existingboystoilet.",".$requireboystoilet.",".$boystoiletcost.",".$existinggirlstoilet.",".$requiregirlstoilet.",".$girlstoiletcost.",".$existingteachertoilet.",".$requireteachertoilet.",".$teachertoiletcost.",".$totaltoiletcost.",'".$haslibrary."','".$isstuduselibrary."','".$libbooktype."',".$libbookexisting.",".$libbookneed.",".$libbookcost.",".$bookalmirahexisting.",".$bookalmirahneed.",".$libalmirahcost.",'".$isgovtprovideuniform."','".$reasonfornonsupplyuniform."',".$uniformunitreq.",".$uniformunitcost.",".$uniformtotalcost.",".$footwearunitreq.",".$footwearunitcost.",".$footweartotalcost.",'".$isspaceforteacher."','".$availspacedetail."','".$facilityinspaceforteacher."',".$costforprovidefacility.",".$costforprovidetable.",'".$hasindoorgamefacility."','".$reqindoorgamefacility."',".$costofindoorgamefacility.",'".$costforhappyschool."','".$administrativecost."','".$totalprojectcost."','".$clubcontribute."', '".$othercontribute."', '".RILMcontribute."','".$totalcontribution."','".date('Y-m-d h:m:s')."');";
}



	//die($query);


//die(json_encode($query));

$result = mysqli_query($link,$query);

if($result)
{

	$imgavailqry = "SELECT count(refappno) as imgavail FROM grantAppImage WHERE refappno='".$refappno."';";
	$imgavilresult = mysqli_query($link,$imgavailqry);
	if($imgavilresult) {
	$imgavailrow[] = mysqli_fetch_assoc($imgavilresult);
	}

	if($imgavailrow[0]["imgavail"]>0) {
		$imgquery = "UPDATE  grantAppImage SET repaireimg1=if('".$newrepaire1."'<>'','".$newrepaire1."',repaireimg1), repaireimg2=if('".$newrepaire2."'<>'','".$newrepaire2."',repaireimg2), hygienicimg1=if('".$newhygienic1."'<>'','".$newhygienic1."',hygienicimg1), hygienicimg2=if('".$newhygienic2."'<>'','".$newhygienic2."',hygienicimg2), waterfacilityimg1=if('".$newwaterfacility1."'<>'','".$newwaterfacility1."',waterfacilityimg1), waterfacilityimg2=if('".$newwaterfacility2."'<>'','".$newwaterfacility2."',waterfacilityimg2), libimg1=if('".$newlib1."'<>'','".$newlib1."',libimg1), libimg2=if('".$newlib2."'<>'','".$newlib2."',libimg2), uniformimg1=if('".$newuniform1."'<>'','".$newuniform1."',uniformimg1), uniformimg2=if('".$newuniform2."'<>'','".$newuniform2."',uniformimg2), sportequipimg1=if('".$newsportequip1."'<>'','".$newsportequip1."',sportequipimg1), sportequipimg2=if('".$newsportequip2."'<>'','".$newsportequip2."',sportequipimg2), benchimg1=if('".$newbench1."'<>'','".$newbench1."',benchimg1), benchimg2=if('".$newbench2."'<>'','".$newbench2."',benchimg2), spaceimg1=if('".$newspace1."'<>'','".$newspace1."',spaceimg1), spaceimg2=if('".$newspace2."'<>'','".$newspace2."',spaceimg2), imgroofcost=if('".$newimgroofcost."'<>'','".$newimgroofcost."',imgroofcost), imgfloorcost=if('".$newimgfloorcost."'<>'','".$newimgfloorcost."',imgfloorcost), imgwallcost=if('".$newimgwallcost."'<>'','".$newimgwallcost."',imgwallcost), imgdoorcost=if('".$newimgdoorcost."'<>'','".$newimgdoorcost."',imgdoorcost), imgpaintcost=if('".$newimgpaintcost."'<>'','".$newimgpaintcost."',imgpaintcost), imgbenchcost=if('".$newimgbenchcost."'<>'','".$newimgbenchcost."',imgbenchcost), imgdeskcost=if('".$newimgdeskcost."'<>'','".$newimgdeskcost."',imgdeskcost), imgbenchdeskcost=if('".$newimgbenchdeskcost."'<>'','".$newimgbenchdeskcost."',imgbenchdeskcost), imgwatersafecost=if('".$newimgwatersafecost."'<>'','".$newimgwatersafecost."',imgwatersafecost), imgboystoiletcost=if('".$newimgboystoiletcost."'<>'','".$newimgboystoiletcost."',imgboystoiletcost), imggirlstoiletcost=if('".$newimggirlstoiletcost."'<>'','".$newimggirlstoiletcost."',imggirlstoiletcost), imgteachtoiletcost=if('".$newimgteachtoiletcost."'<>'','".$newimgteachtoiletcost."',imgteachtoiletcost), imgbookcost=if('".$newimgbookcost."'<>'','".$newimgbookcost."',imgbookcost), imgalmirahcost=if('".$newimgalmirahcost."'<>'','".$newimgalmirahcost."',imgalmirahcost), imguniformcost=if('".$newimguniformcost."'<>'','".$newimguniformcost."',imguniformcost), imgfootwearcost=if('".$newimgfootwearcost."'<>'','".$newimgfootwearcost."',imgfootwearcost), imgspaceprovidecost=if('".$newimgspaceprovidecost."'<>'','".$newimgspaceprovidecost."',imgspaceprovidecost), imgtablecost=if('".$newimgtablecost."'<>'','".$newimgtablecost."',imgtablecost), imgindoorgamecost=if('".$newimgindoorgamecost."'<>'','".$newimgindoorgamecost."',imgindoorgamecost) WHERE refappno='".$refappno."';";
	}
	else {
	$imgquery = "INSERT INTO grantAppImage(`refappno`, `repaireimg1`, `repaireimg2`, `hygienicimg1`, `hygienicimg2`, `waterfacilityimg1`, `waterfacilityimg2`, `libimg1`, `libimg2`, `uniformimg1`, `uniformimg2`, `sportequipimg1`, `sportequipimg2`, `benchimg1`, `benchimg2`, `spaceimg1`, `spaceimg2`,`imgroofcost`, `imgfloorcost`, `imgwallcost`, `imgdoorcost`, `imgpaintcost`, `imgbenchcost`, `imgdeskcost`, `imgbenchdeskcost`, `imgwatersafecost`, `imgboystoiletcost`, `imggirlstoiletcost`, `imgteachtoiletcost`, `imgbookcost`, `imgalmirahcost`, `imguniformcost`, `imgfootwearcost`, `imgspaceprovidecost`, `imgtablecost`, `imgindoorgamecost`) VALUES ('".$refappno."','".$newrepaire1."','".$newrepaire2."','".$newhygienic1."','".$newhygienic2."','".$newwaterfacility1."','".$newwaterfacility2."','".$newlib1."','".$newlib2."','".$newuniform1."','".$newuniform2."','".$newsportequip1."','".$newsportequip2."','".$newbench1."','".$newbench2."','".$newspace1."','".$newspace2."','".$newimgroofcost."', '".$newimgfloorcost."', '".$newimgwallcost."', '".$newimgdoorcost."', '".$newimgpaintcost."', '".$newimgbenchcost."', '".$newimgdeskcost."', '".$newimgbenchdeskcost."', '".$newimgwatersafecost."', '".$newimgboystoiletcost."', '".$newimggirlstoiletcost."', '".$newimgteachtoiletcost."', '".$newimgbookcost."', '".$newimgalmirahcost."', '".$newimguniformcost."', '".$newimgfootwearcost."', '".$newimgspaceprovidecost."', '".$newimgtablecost."', '".$newimgindoorgamecost."');";
	}
	
		$imgqueryresult = mysqli_query($link,$imgquery);
	if($imgqueryresult) {
		header("Location: AdditionInfo.php?refappno=".$refappno);
		}
}
?>


