<?php
include("../connection.php");

	
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

//echo  $_GET["type"];
//print_r($_POST);	
//die();
$msg ="";
if(isset($_POST["btnsave"]))
{
$error = 0;
$categoryid = $_POST["chocategory"];
$projtitle = $_POST["txtprojtitle"];
$projdesc = mysqli_real_escape_string($link,$_POST["txtprojdesc"]);
$state = $_POST["chostate"];
$city = $_POST["txtcity"];
$district = $_POST["txtdistrict"];
$club = $_POST["txtclub"];
$projectvenue = $_POST["txtprojvenue"];
$unitsupplied = $_POST["txtunitsupply"];
$beneficiaryno = (trim($_POST["txtbeneficiariesno"])!=''?trim($_POST["txtbeneficiariesno"]):0);
$partnerorg = $_POST["txtpartnerorg"];
$outlay = $_POST["txtoutlay"];
$projectdate = $_POST["txtprojdt"];
$projcontact =mysqli_real_escape_string($link,$_POST["txtprojcontactdetail"]);
$user = $_POST["txtusername"];
$pwd = $_POST["txtpwd"];


 	$isteacherapraisal = ($_POST["chkteacherApraisal"]=='on'?1:0);

 	$apraisalno =(trim($_POST["apraisalno"])!=''?trim($_POST["apraisalno"]):0);

	$isprovideEmployment = ($_POST["chkprovideEmployment"]=='on'?1:0);

	$noofvolunteer = (trim($_POST["noofvolunteer"])!=''?trim($_POST["noofvolunteer"]):0);
	
	$isprovidecomputer = ($_POST["chkprovidecomputer"]=='on'?1:0);

	$noofcomputer = ((trim($_POST["noofcomputer"])!='' && $isprovidecomputer==1)?trim($_POST["noofcomputer"]):0);

	$isprovidekit = ($_POST["chkprovidekit"]=='on'?1:0);

	$noofkit =((trim($_POST["noofkit"])!='' && $isprovidekit==1)?trim($_POST["noofkit"]):0);
	
	$isEstablishElearnCenter = ($_POST["chkElearningCenter"]=='on'?1:0);

	$ispromoteEducationgrp = ($_POST["chkeducationgrp"]=='on'?1:0);

	$ispromoteadultliteracy = ($_POST["chkpromoteadultliteracy"]=='on'?1:0);

	$istrainingtohousewives = ($_POST["chkspecialTraining"]=='on'?1:0);

	$nooftrainedpeople = ((trim($_POST["nooftrainedpeople"])!='' && $istrainingtohousewives==1)?trim($_POST["nooftrainedpeople"]):0);

	$ishelpPrisonerChild = ($_POST["chkhelpPrisonerChild"]=='on'?1:0);

	$noofprisonerchild  = ((trim($_POST["noofprisonerchild"])!='' && $ishelpPrisonerChild==1)?trim($_POST["noofprisonerchild"]):0);

	$ishelpsexworkerschild = ($_POST["chksexworkerschild"]=='on'?1:0);

	$noofsexworkerschild = ((trim($_POST["noofsexworkerschild"])!='' && $ishelpsexworkerschild==1)?trim($_POST["noofsexworkerschild"]):0);

	$ishelpmigrantworkerschild = ($_POST["chkmigrantworkerschild"]=='on'?1:0);

	$noofmigrantworkerschild = ((trim($_POST["noofmigrantworkerschild"])!='' && $ishelpmigrantworkerschild==1)?trim($_POST["noofmigrantworkerschild"]):0);

	$ishelpchildrenatrisk = ($_POST["chkchildrenatrisk"]=='on'?1:0);

	$noofchildrenatrisk = ((trim($_POST["noofchildrenatrisk"])!='' && $ishelpchildrenatrisk==1)?trim($_POST["noofchildrenatrisk"]):0);

	$iseradicatechildlabour = ($_POST["chkeradicatechildlabour"]=='on'?1:0);

	$nooferadicatechildlabour = ((trim($_POST["nooferadicatechildlabour"])!='' && $iseradicatechildlabour==1)?trim($_POST["nooferadicatechildlabour"]):0);
 
	$isback2school = ($_POST["chkback2school"]=='on'?1:0);

	$noofback2schoolchild = ((trim($_POST["noofback2schoolchild"])!='' && $isback2school==1)?trim($_POST["noofback2schoolchild"]):0);

	$ismovitoriusstud = ($_POST["chkmovitoriusstud"]=='on'?1:0);

	$noofmovitoriusstud = ((trim($_POST["noofmovitoriusstud"])!='' && $ismovitoriusstud==1)?trim($_POST["noofmovitoriusstud"]):0);

	$isrenovatedschool = ($_POST["chkrenovatedschool"]=='on'?1:0);

	$noofrenovatedschool = ((trim($_POST["noofrenovatedschool"])!='' && $isrenovatedschool==1)?trim($_POST["noofrenovatedschool"]):0);

	$ispaintedschoolwall = ($_POST["chkpaintedschoolwall"]=='on'?1:0);

	$isrepairedroof	 = ($_POST["chkrepairedroof"]=='on'?1:0);

	$isprovidebench = ($_POST["chkprovidebench"]=='on'?1:0);

	$noofprovidebench = ((trim($_POST["noofprovidebench"])!='' && $isprovidebench==1)?trim($_POST["noofprovidebench"]):0);

	$isrepairedtoilets = ($_POST["chkrepairedtoilets"]=='on'?1:0);
	
	$noofrepairedtoilets = ((trim($_POST["noofrepairedtoilets"])!='' && $isrepairedtoilets==1)?trim($_POST["noofrepairedtoilets"]):0);

	$isprovidebooks = ($_POST["chkprovidebooks"]=='on'?1:0);

	$noofprovidebooks = ((trim($_POST["noofprovidebooks"])!='' && $isprovidebooks==1)?trim($_POST["noofprovidebooks"]):0);
	
	$isprovideuniform = ($_POST["chkprovideuniform"]=='on'?1:0);
	
	$noofprovideuniform = ((trim($_POST["noofprovideuniform"])!='' && $isprovideuniform==1)?trim($_POST["noofprovideuniform"]):0);
 

$img1= $_FILES["uploadimg1"]["name"];
$img2= $_FILES["uploadimg2"]["name"];
$img3= $_FILES["uploadimg3"]["name"];
$img4= $_FILES["uploadimg4"]["name"];


$newimg1 ="";
$newimg2 ="";
$newimg3 ="";
$newimg4 ="";

	if($img1!='')  { 
	$newimg1 = FileNewname($img1,'image1');	 
	if($_FILES["uploadimg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadimg1"]["tmp_name"], "projectupload/" . $newimg1);
		 }
	 }


	if($img2!='')  { 
	$newimg2 = FileNewname($img2,'image2');	 
	if($_FILES["uploadimg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadimg2"]["tmp_name"], "projectupload/" . $newimg2);
		 }
	 }
	 
	if($img3!='')  { 
	$newimg3 = FileNewname($img3,'image3');	 
	if($_FILES["uploadimg3"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadimg3"]["tmp_name"], "projectupload/" . $newimg3);
		 }
	 }
	 
	if($img4!='')  { 
	$newimg4 = FileNewname($img4,'image4');	 
		if($_FILES["uploadimg4"]["error"]==0 ) {
			 move_uploaded_file($_FILES["uploadimg4"]["tmp_name"], "projectupload/" . $newimg4);
		 }
	 }
	 
if($_GET["type"]!='update') {	
	 $query = "INSERT INTO clubproject(categoryid, title, projdesc, state, city, district, club, projectvenue, unitsupplied, beneficiaryno, partnerorg, outlay, projectdate, projcontact, img1, img2, img3, img4,username,pwd,submitted,projectstatus,isteacherapraisal, apraisalno, isprovideEmployment, noofvolunteer, isprovidecomputer, noofcomputer, isprovidekit, noofkit, isEstablishElearnCenter, ispromoteEducationgrp, ispromoteadultliteracy, istrainingtohousewives, nooftrainedpeople, ishelpPrisonerChild, noofprisonerchild, ishelpsexworkerschild, noofsexworkerschild, ishelpmigrantworkerschild, noofmigrantworkerschild, ishelpchildrenatrisk, noofchildrenatrisk, iseradicatechildlabour,  nooferadicatechildlabour, isback2school, noofback2schoolchild, ismovitoriusstud, noofmovitoriusstud, isrenovatedschool, noofrenovatedschool, ispaintedschoolwall, isrepairedroof, isprovidebench, noofprovidebench, isrepairedtoilets,  noofrepairedtoilets, isprovidebooks, noofprovidebooks, isprovideuniform, noofprovideuniform) values(".$categoryid.", '".$projtitle."','".$projdesc."', '".$state."', '".$city."', '".$district."', '".$club."', '".$projectvenue."', ".$unitsupplied.", ".$beneficiaryno.", '".$partnerorg."', '".$outlay."', '".$projectdate."', '".$projcontact."', '".$newimg1."', '".$newimg2."', '".$newimg3."', '".$newimg4."','".$user."','".$pwd."','".date('Y-m-d h:i:s')."',1,".$isteacherapraisal.",".$apraisalno.",".$isprovideEmployment.",".$noofvolunteer.",".$isprovidecomputer.",".$noofcomputer.",".$isprovidekit.",".$noofkit.",".$isEstablishElearnCenter.",".$ispromoteEducationgrp.",".$ispromoteadultliteracy.",".$istrainingtohousewives.",".$nooftrainedpeople.",".$ishelpPrisonerChild.",".$noofprisonerchild.",".$ishelpsexworkerschild.",".$noofsexworkerschild.",".$ishelpmigrantworkerschild.",".$noofmigrantworkerschild.",".$ishelpchildrenatrisk.",".$noofchildrenatrisk.",".$iseradicatechildlabour.",".$nooferadicatechildlabour.",".$isback2school.",".$noofback2schoolchild.",".$ismovitoriusstud.",".$noofmovitoriusstud.",".$isrenovatedschool.",".$noofrenovatedschool.",".$ispaintedschoolwall.",".$isrepairedroof.",".$isprovidebench.",".$noofprovidebench.",".$isrepairedtoilets.",".$noofrepairedtoilets.",".$isprovidebooks.",".$noofprovidebooks.",".$isprovideuniform.",".$noofprovideuniform.");";

//die($query);
		if(mysqli_query($link,$query))
		{
		header("location: index.php?urlmsg=Project Successfully Added.");
		}
	

}
else
{
$query= "UPDATE clubproject SET categoryid=".$categoryid.", title='".$projtitle."',  projdesc='".$projdesc."', state='".$state."', city='".$city."', district='".$district."', club='".$club."', projectvenue='".$projectvenue."', unitsupplied=".$unitsupplied.", beneficiaryno= ".$beneficiaryno.", partnerorg='".$partnerorg."', outlay='".$outlay."', projectdate='".$projectdate."', projcontact='".$projcontact."', img1=(case when '".$newimg1."'<>'' then '".$newimg1."' else img1 end), img2=(case when '".$newimg2."'<>'' then '".$newimg2."' else img2 end), img3=(case when '".$newimg3."'<>'' then '".$newimg3."' else img3 end), img4=(case when '".$newimg4."'<>'' then '".$newimg4."' else img4 end), isteacherapraisal=".$isteacherapraisal.",apraisalno=".$apraisalno.",isprovideEmployment=".$isprovideEmployment.",noofvolunteer=".$noofvolunteer.",isprovidecomputer=".$isprovidecomputer.",noofcomputer=".$noofcomputer.", isprovidekit=".$isprovidekit.",	noofkit=".$noofkit.",isEstablishElearnCenter=".$isEstablishElearnCenter.",ispromoteEducationgrp=".$ispromoteEducationgrp.",ispromoteadultliteracy =".$ispromoteadultliteracy.",istrainingtohousewives=".$istrainingtohousewives.",nooftrainedpeople=".$nooftrainedpeople.", ishelpPrisonerChild =".$ishelpPrisonerChild.",noofprisonerchild  =".$noofprisonerchild.",	ishelpsexworkerschild =".$ishelpsexworkerschild.",noofsexworkerschild=".$noofsexworkerschild.",ishelpmigrantworkerschild =".$ishelpmigrantworkerschild.",noofmigrantworkerschild=".$noofmigrantworkerschild.",ishelpchildrenatrisk=".$ishelpchildrenatrisk.",noofchildrenatrisk =".$noofchildrenatrisk.",iseradicatechildlabour =".$iseradicatechildlabour.",nooferadicatechildlabour=".$nooferadicatechildlabour.",isback2school =".$isback2school.",noofback2schoolchild=".$noofback2schoolchild.",ismovitoriusstud =".$ismovitoriusstud.",noofmovitoriusstud =".$noofmovitoriusstud.",	isrenovatedschool=".$isrenovatedschool.",	noofrenovatedschool =".$noofrenovatedschool.",ispaintedschoolwall=".$ispaintedschoolwall.",isrepairedroof=".$isrepairedroof.",isprovidebench=".$isprovidebench.",noofprovidebench =".$noofprovidebench.",isrepairedtoilets =".$isrepairedtoilets.",noofrepairedtoilets =".$noofrepairedtoilets.",isprovidebooks=".$isprovidebooks.",	noofprovidebooks =".$noofprovidebooks.",isprovideuniform =".$isprovideuniform.",noofprovideuniform =".$noofprovideuniform." where id=".$_GET["id"].";";

//die($query);
		if(mysqli_query($link,$query))
		{
		header("location: index.php?urlmsg=Project Successfully Updated.");
		}

}
	
//die($query); 
		
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Rotary Projects</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />
<!-- FONT -->
<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<!--<link href="../button/style.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="../css/jquery-calendar.css" />

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-calendar.js"></script>

<script>
function validation(){	
	if($.trim($("#chocategory").val())==''){
		alert("Please select category.");
		$("#chocategory").focus();
		return false;
	
	}
	/*if($.trim($("#chosubcategory").val())==''){
		alert("Please select subcategory.");
		$("#chosubcategory").focus();
		return false;
	}*/	
	if($.trim($("#txtprojtitle").val())==''){
		alert("Please enter project title.");
		$("#txtprojtitle").focus();
		return false;
	}

	if($.trim($("#txtprojdesc").val())==''){
		alert("Please enter project description.");
		$("#txtprojdesc").focus();
		return false;
	}
	if($.trim($("#chostate").val())==''){
		alert("Please select state.");
		$("#chostate").focus();
		return false;
	}
	if($.trim($("#txtdistrict").val())==''){
		alert("Please enter district.");
		$("#txtdistrict").focus();
		return false;
	}
	if($.trim($("#txtclub").val())==''){
		alert("Please enter club.");
		$("#txtclub").focus();
		return false;
	}
	
	if(($("#txtdistrict").val()).length !=4) {
				alert("District must be four digit");
				$("#txtdistrict").focus();
				return false;
		}
	
	if($.trim($("#txtprojvenue").val())==''){
		alert("Please enter project venue name.");
		$("#txtprojvenue").focus();
	return false;
	}
	if($.trim($("#txtunitsupply").val())==''){
		alert("Please enter No. of unit supplied.");
		$("#txtunitsupply").focus();
		return false;
	}
	if($.trim($("#txtoutlay").val())==''){
		alert("Please enter outlay.");
		$("#txtoutlay").focus();
		return false;
	}
	if($.trim($("#txtprojdt").val())==''){
		alert("Please enter project date.");
		$("#txtprojdt").focus();
		return false;
	}
	if('<?php echo $_GET["type"] ?>'!='update') {
		if($.trim($("#txtusername").val())==''){
			alert("Please enter username.");
			$("#txtusername").focus();
			return false;
		}
		
		if($.trim($("#txtpwd").val())==''){
			alert("Please enter password for further modification.");
			$("#txtpwd").focus();
			return false;
		}
		if($.trim($("#txtrepwd").val())==''){
			alert("Please enter re-enter password.");
			$("#txtrepwd").focus();
			return false;
		}
		
		if($.trim($("#txtrepwd").val())!='' && $.trim($("#txtpwd").val())!=''){
			if($.trim($("#txtpwd").val())!=$.trim($("#txtrepwd").val())) {
			alert("Password Mis-match.");
				$("#txtrepwd").focus();
				return false;
			}
		}
		checkAvail($("#txtusername").val());
	}
	if(!$('#chkagree').is(':checked')) {
		alert("Please accept declaration.");
		return false;
	}
		
	return true;
}



</script>
<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="categorylist(); districtlist(); goForUpdate('<?php echo $_GET["type"]?>',<?php echo $_GET["id"] ?>) ">
<center>
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("../menu_area.html")?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <?php include("../header_area.html")?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="http://rotaryteach.org/images/h_top_l.png" /></td>
                <td style="background:url(http://rotaryteach.org/images/h_top.png)"></td>
                <td width="8"><img src="http://rotaryteach.org/images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(http://rotaryteach.org/images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                            
                                <h1>Club Project</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                <div style="text-align:left; font-weight:bold; padding:7px 0 0 0"><span style="color:#ff0000">*</span> fields are mandatory.</div>
                                <p class="text">
                                
                                    <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" style="text-align:left">
                                    	<tr>
                                    		<td>
                                    
                                                <div style="text-align:center; margin-bottom:15px">
                                                	<h1 style="text-align:center; color:#CC3300; font-size:18px"><?php echo $msg;?></h1>
                                                </div>
                                    
                                    
                                    			<form name="frm" id="frm" action="" method="post" enctype="multipart/form-data" onsubmit="return validation();openByCategory(categid);">
                                    
                                                    <table border="0" cellpadding="0" cellspacing="5" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
                                                        <tr>
                                                            <td width="33%"><strong>Category <span style="color:#ff0000">*</span></strong></td>
                                                            <td width="3%"><strong>:</strong></td>
                                                            <td width="64%">
                                                            	<select id="chocategory" name="chocategory" onchange="openByCategory(this.value)" ><!--onchange="dispsubcategory(this.value,'')" -->
                                                            		<option value=''>Select</option>                                                            
                                                            </select>
                                                            </td>
                                                        </tr>                                    
                                    
                                                        <!-- <tr>
                                                        <td><strong>Sub Category <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                        <select name="chosubcategory" id="chosubcategory"><option value="">Select</option></select>
                                                        </td>
                                                        </tr>-->
                                                        
                                                        <tr>
                                                            <td valign="top"><strong>Project Title <span style="color:#ff0000">*</span></strong></td>
                                                            <td valign="top"><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" id="txtprojtitle" name="txtprojtitle"  maxlength='250' style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
                                                            </td>
                                                        </tr>  
                                    
                                                        <tr>
                                                            <td valign="top"><strong>Project Description <span style="color:#ff0000">*</span></strong></td>
                                                            <td valign="top"><strong>:</strong></td>
                                                            <td>
                                                            	<textarea id="txtprojdesc" name="txtprojdesc"  maxlength='1000'  rows="5" cols="30" style="width:99%; border:1px solid #CCCCCC"></textarea>
                                                            	<br /><em>(Maximum 1000 Character)</em>
                                                            </td>
                                                        </tr>
                                                
<!--  ======================= Category wise Information ================  -->

<tr id="T" style="display:none">
<td colspan="3">

<table border="0" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; background:#f5f5f5; border:1px solid #CCCCCC; margin-bottom:10px">
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkteacherApraisal" name="chkteacherApraisal" onclick="openContent('chkteacherApraisal','appraisal','apraisalno')"/>  
        	<strong>Appraisal / Evaluation of teachers</strong>
        </td>
    </tr>
    <tr id="appraisal" style="display:none">
        <td width="33%"><strong>No. of teacher appraised / evaluated</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="apraisalno" name="apraisalno" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkprovideEmployment" name="chkprovideEmployment" onclick="openContent('chkprovideEmployment','employment','noofvolunteer')"/> 
        	<strong>Provided contractual Employment of Volunteers</strong>
        </td>
    </tr>
    <tr id="employment" style="display:none">
        <td width="33%"><strong>No. of Volunteer Provided</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofvolunteer" name="noofvolunteer" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
</table> 
                                                 
</td>                                              
</tr>

<tr id="E" style="display:none">
<td colspan="3">
<table border="0" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; background:#f5f5f5; border:1px solid #CCCCCC; margin-bottom:10px">
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkprovidecomputer" name="chkprovidecomputer" onclick="openContent('chkprovidecomputer','providecomputer','noofcomputer')"/> 
            <strong>Computers Provided in Schools</strong>
        </td>
    </tr>
    <tr id="providecomputer" style="display:none">
        <td width="33%"><strong>No. of Computer Provided</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofcomputer" name="noofcomputer" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkprovidekit" name="chkprovidekit" onclick="openContent('chkprovidekit','providekit','noofkit')"/> 
            <strong>Provide E-learning Kits in Schools</strong>
        </td>
    </tr>
    <tr id="providekit" style="display:none">
        <td width="33%"><strong>No. of Kits Provided</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofkit" name="noofkit" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3"  style="color:#333333">
        	<input type="checkbox" id="chkElearningCenter" name="chkElearningCenter" /> 
            <strong>Established E-learning Center in Schools</strong>
        </td>
    </tr>
</table>                                                  
</td>                                              
</tr> 

<tr id="A" style="display:none">
<td colspan="3">
<table border="0" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; background:#f5f5f5; border:1px solid #CCCCCC; margin-bottom:10px">
    <tr>
        <td colspan="3" style="color:#333333"><input type="checkbox" id="chkeducationgrp" name="chkeducationgrp"/> <strong>Promoted formation of self education groups</strong>
    </td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkpromoteadultliteracy" name="chkpromoteadultliteracy"/> <strong>Volunteered in promoting adult literacy</strong>
    	</td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkspecialTraining" name="chkspecialTraining" onclick="openContent('chkspecialTraining','noofpeople','nooftrainedpeople')"/> <strong>Provided Specialized training to housewives and girls living in slum & busties</strong>
    	</td>
    </tr>
    <tr id="noofpeople" style="display:none">
        <td width="33%"><strong>No. of people training provided to</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="nooftrainedpeople" name="nooftrainedpeople" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
</table>                                                  
</td>                                              
</tr>

<tr id="C" style="display:none">
<td colspan="3">
<table border="0" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; background:#f5f5f5; border:1px solid #CCCCCC; margin-bottom:10px">
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkhelpPrisonerChild" name="chkhelpPrisonerChild" onclick="openContent('chkhelpPrisonerChild','prisonerchild','noofprisonerchild')"/> 
        	<strong>Helped in devlopment of children of prisoners</strong>
    	</td>
    </tr>
    <tr id="prisonerchild" style="display:none">
        <td width="33%"><strong>No. of Children</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofprisonerchild" name="noofprisonerchild" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chksexworkerschild" name="chksexworkerschild" onclick="openContent('chksexworkerschild','sexworkerschild','noofsexworkerschild')"/> 
            <strong>Helped in development of children of sex workers</strong>
        </td>
    </tr>
    <tr id="sexworkerschild" style="display:none">
        <td width="33%"><strong>No. of Children</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofsexworkerschild" name="noofsexworkerschild" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkmigrantworkerschild" name="chkmigrantworkerschild" onclick="openContent('chkmigrantworkerschild','migrantworkerschild','noofmigrantworkerschild')"/> 
            <strong>Helped in development of children of migrant workers</strong>
        </td>
    </tr>
    <tr id="migrantworkerschild" style="display:none">
        <td width="33%"><strong>No. of children</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofmigrantworkerschild" name="noofmigrantworkerschild" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkchildrenatrisk" name="chkchildrenatrisk" onclick="openContent('chkchildrenatrisk','childrenatrisk','noofchildrenatrisk')"/> 
            <strong>Helped in development of other children at risk</strong>
        </td>
    </tr>
    <tr id="childrenatrisk" style="display:none">
        <td width="33%"><strong>No. of children</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofchildrenatrisk" name="noofchildrenatrisk" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkeradicatechildlabour" name="chkeradicatechildlabour" onclick="openContent('chkeradicatechildlabour','eradicatechildlabour','nooferadicatechildlabour')"/> 
            <strong>Helped in eradication of child labour</strong>
        </td>
    </tr>
    <tr id="eradicatechildlabour" style="display:none">
        <td width="33%"><strong>No. of children</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="nooferadicatechildlabour" name="nooferadicatechildlabour" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkback2school" name="chkback2school" onclick="openContent('chkback2school','back2school','noofback2schoolchild')"/> 
            <strong>Helped bring school dropouts back to school</strong>
        </td>
    </tr>
    <tr id="back2school" style="display:none">
        <td width="33%"><strong>No. of children</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofback2schoolchild" name="noofback2schoolchild" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkmovitoriusstud" name="chkmovitoriusstud" onclick="openContent('chkmovitoriusstud','movitoriusstud','noofmovitoriusstud')"/> 
            <strong>Provided scholarship to movitorius students</strong>
        </td>
    </tr>
    <tr id="movitoriusstud" style="display:none">
        <td width="33%"><strong>No. of Students</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofmovitoriusstud" name="noofmovitoriusstud" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr> 
</table>                                                  
</td>                                              
</tr>

<tr id="H" style="display:none">
<td colspan="3">
<table border="0" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; background:#f5f5f5; border:1px solid #CCCCCC; margin-bottom:10px">
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkrenovatedschool" name="chkrenovatedschool"  onclick="openContent('chkrenovatedschool','renovatedschool','noofrenovatedschool')"/> 
            <strong>Renovated Schools</strong>
        </td>
    </tr>
    <tr id="renovatedschool" style="display:none">
        <td width="33%"><strong>No. of Schools</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofrenovatedschool" name="noofrenovatedschool" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333"><input type="checkbox" id="chkpaintedschoolwall" name="chkpaintedschoolwall" /> <strong>Painted School Walls</strong></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333"><input type="checkbox" id="chkrepairedroof" name="chkrepairedroof" /> <strong>Repaired roof</strong></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkprovidebench" name="chkprovidebench"  onclick="openContent('chkprovidebench','providebench','noofprovidebench')"/> 
            <strong>Provided Benches and Desks</strong>
        </td>
    </tr>
    <tr id="providebench" style="display:none">
        <td width="33%"><strong>No. of Benches/Desks provided</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofprovidebench" name="noofprovidebench" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
			<input type="checkbox" id="chkrepairedtoilets" name="chkrepairedtoilets"  onclick="openContent('chkrepairedtoilets','repairedtoilets','noofrepairedtoilets')"/> 
			<strong>Repaired / Renovated toilets</strong>
        </td>
    </tr>
    <tr id="repairedtoilets" style="display:none">
        <td width="33%"><strong>No. of toilets repired/renovated</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofrepairedtoilets" name="noofrepairedtoilets" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkprovidebooks" name="chkprovidebooks"  onclick="openContent('chkprovidebooks','providebooks','noofprovidebooks')"/> 
            <strong>Provided Books to the library</strong>
        </td>
    </tr>
    <tr id="providebooks" style="display:none">
        <td width="33%"><strong>No. of Books provided</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofprovidebooks" name="noofprovidebooks" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
    <tr>
        <td colspan="3" style="color:#333333">
        	<input type="checkbox" id="chkprovideuniform" name="chkprovideuniform"  onclick="openContent('chkprovideuniform','provideuniform','noofprovideuniform')"/> 
        	<strong>Provided Uniforms and footwear</strong>
        </td>
    </tr>
    <tr id="provideuniform" style="display:none">
        <td width="33%"><strong>No. of Students provided with</strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%"><input type="text" id="noofprovideuniform" name="noofprovideuniform" style="width:50%;" onKeyPress="inputNumber(event,this.value,false);"/></td>
    </tr>
</table>                                                  
</td>                                              
</tr>

<!--  ======================= Category wise Information ================  -->
 
                
                                                        <tr>
                                                        	<td><strong>State <span style="color:#ff0000">*</span></strong></td>
                                                        	<td><strong>:</strong></td>
                                                        	<td>
                                                                <select id="chostate" name="chostate" style="width:50%; border:1px solid #CCCCCC; line-height:25px; height:25px">
                                                                <option value="">Select</option>
                                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                                <option value="Assam">Assam</option>
                                                                <option value="Bihar">Bihar</option>
                                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                                <option value="Goa">Goa</option>
                                                                <option value="Gujarat">Gujarat</option>
                                                                <option value="Haryana">Haryana</option>
                                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                                <option value="Jharkhand">Jharkhand</option>
                                                                <option value="Karnataka">Karnataka</option>
                                                                <option value="Kerala">Kerala</option>
                                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                                                <option value="Manipur">Manipur</option>
                                                                <option value="Meghalaya">Meghalaya</option>
                                                                <option value="Mizoram">Mizoram</option>
                                                                <option value="Nagaland">Nagaland</option>
                                                                <option value="Orissa">Orissa</option>
                                                                <option value="Punjab">Punjab</option>
                                                                <option value="Rajasthan">Rajasthan</option>
                                                                <option value="Sikkim">Sikkim</option>
                                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                                <option value="Tripura">Tripura</option>
                                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                <option value="Uttarakhand">Uttarakhand</option>
                                                                <option value="West Bengal">West Bengal</option>
                                                                <option value="Union Territories">Union Territories</option>
                                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                                <option value="Chandigarh">Chandigarh</option>
                                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                                <option value="Daman and Diu">Daman and Diu</option>
                                                                <option value="Delhi">Delhi</option>
                                                                <option value="Lakshadweep">Lakshadweep</option>
                                                                <option value="Pondicherry">Pondicherry</option>
                                                                </select>
                                                        	</td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>City / Town / Village</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtcity" id="txtcity" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Rotary District <span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            <select id="txtdistrict" name="txtdistrict" onchange="dispclub(this.value,'')" >
                                                                    <option value="">Select</option>
                                                                </select>
                                                                <!--<input type="text" name="txtdistrict" id="txtdistrict" maxlength="4"  onKeyPress="inputNumber(event,this.value,false);" style="width:10%; border:1px solid #CCCCCC; line-height:20px; height:20px" />-->
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                        	<td><strong>Rotary Club of <span style="color:#ff0000">*</span></strong></td>
                                                        	<td><strong>:</strong></td>                                                        
                                                        	<td>
                                                        		<select id="txtclub" name="txtclub"><option value="">Select</option></select>
                                                        		<!--<input type="text" name="txtclub" id="txtclub" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />-->
                                                        	</td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Project Venue Name <span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtprojvenue" id="txtprojvenue" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>No. of Units Supplied <span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtunitsupply" id="txtunitsupply"  onKeyPress="inputNumber(event,this.value,false);" style="width:25%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>No. of Beneficiaries</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtbeneficiariesno" id="txtbeneficiariesno"  onKeyPress="inputNumber(event,this.value,false);" style="width:25%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Partnering Organization / Agency</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtpartnerorg" id="txtpartnerorg" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Outlay <span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<img src="../images/rupees_icon.jpg" /> <input type="text" name="txtoutlay" id="txtoutlay"  onKeyPress="inputNumber(event,this.value,true);" style="width:22%; border:1px solid #CCCCCC; line-height:20px; height:20px"  />
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Project Date <span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtprojdt" id="txtprojdt"  class="calendarFocus" style="width:20%; border:1px solid #CCCCCC; line-height:20px; height:20px"/> (DD/MM/YYYY)
                                                            </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td valign="top"><strong>Project Contact Details</strong></td>
                                                            <td valign="top"><strong>:</strong></td>
                                                            <td>
                                                            	<textarea id="txtprojcontactdetail" name="txtprojcontactdetail" maxlength='1000' rows="5" cols="30" style="width:99%; border:1px solid #CCCCCC" ></textarea>
                                                            	<br /><em>(Maximum 1000 Character)</em>
                                                            </td>
                                                        </tr>
                                                        <?php if($_GET["type"]=='create') {?>
                                                        <tr>
                                                            <td><strong>Username<span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>
                                                            	<input type="text" name="txtusername" id="txtusername" maxlength="30" onblur="checkAvail(this.value)"/><span id="dispstr" style="color:#FF0000"></span>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><strong>Password for further modification<span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><input type="password" name="txtpwd" id="txtpwd" maxlength="30" /></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><strong>Re-enter Password<span style="color:#ff0000">*</span></strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><input type="password" name="txtrepwd" id="txtrepwd" maxlength="30" /></td>
                                                        </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td><strong>Image1</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><input type="file" name="uploadimg1" id="uploadimg1" onchange="readURL(this);" style="cursor:pointer" /></td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Image2</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><input type="file" name="uploadimg2" id="uploadimg2" onchange="readURL(this);" style="cursor:pointer" /></td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Image3</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><input type="file" name="uploadimg3" id="uploadimg3" onchange="readURL(this);" style="cursor:pointer"  /></td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                            <td><strong>Image4</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><input type="file" name="uploadimg4" id="uploadimg4" onchange="readURL(this);" style="cursor:pointer" /></td>
                                                        </tr>
                                                        
                                                        <tr height="5"><td colspan="3"></td></tr>
                                                        
                                                        <tr>
                                                        	<td></td>
                                                            <td></td>
                                                            <td>
                                                            	<input type="checkbox" name="chkagree" id="chkagree"  />(<strong><em>I agree that the content submitted by me are correct to my knowledge.</em></strong>)
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr height="5"><td colspan="3"></td></tr>
                                                        
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                            	<input type="submit" name="btnsave" value="<?php if($_GET["type"]=='create') { echo "Add Project"; } else { echo "Update Project";} ?>" class="login" />
                                                            </td>
                                                        </tr>
													</table>
                                                
                                                
                                                </form>
                                            
                                            </td>
                                        </tr>
                                    </table> 
                                    
                                </p>                                            
                    
      						</td>
                            <td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("../inner_right.html")?>
                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("../footer_area.html")?>
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(http://rotaryteach.org/images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="http://rotaryteach.org/images/h_bottom_l.png" /></td>
                <td style="background:url(http://rotaryteach.org/images/h_bottom.png)"></td>
                <td width="8"><img src="http://rotaryteach.org/images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>



<script type="text/javascript">


$(document).ready(function () {
$('.calendarFocus').calendar();
});


function categorylist()
{
str ="<option value=''>Select</option>";	
$.ajax({                                      
      url: 'categorylist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["id"]+"'>"+data[i]["category"]+"</option>";
				}
			}			 
				$("#chocategory").empty();
				$("#chocategory").append(str);
		}
	});
}

/*
function dispsubcategory(val,setval)
{
//alert("dispsubcategory")
str ="<option value=''>Select</option>";	
var selected="";
	var pars ='categoryid='+val;
$.ajax({                                      
      url: 'subcategorylist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
					if(setval==data[i]["id"]) {
						var selected='selected=selected';
					}
				str = str+"<option value='"+data[i]["id"]+"'" +selected+">"+data[i]["subcategory"]+"</option>";
				}
			}			 
			$("#chosubcategory").empty();
			$("#chosubcategory").append(str);
		}
	});
}
*/
function districtlist()
{
var str = "";
$.ajax({                                      
      url: '../districtlist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["district"]+"'>"+data[i]["district"]+"</option>";
				}
			}			 
			 	$("#txtdistrict").append(str);
		}
	});
}

function dispclub(val,setclubval)
{
	var str = "<option value=''>Select</option>";
	var pars ='dist='+val;
	var selected='';
$.ajax({                                      
      url: '../clublist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
					if(setclubval==data[i]["club"]) {
						selected = 'selected=selected';
					}
				str = str+"<option value='"+data[i]["club"]+"'" +selected+">"+data[i]["club"]+"</option>";
				}
			}
			$("#txtclub").empty();
			$("#txtclub").append(str);			 
		}
	});
}


function openByCategory(categid) {
	
switch (categid) { 
    case '1': 
		$("#chkprovidecomputer,#chkprovidekit,#chkElearningCenter,#chkeducationgrp,#chkspecialTraining, #chkpromoteadultliteracy,#chkhelpPrisonerChild,#chksexworkerschild,#chkmigrantworkerschild,#chkchildrenatrisk,#chkeradicatechildlabour,#chkback2school,#chkmovitoriusstud,#chkrenovatedschool,#chkpaintedschoolwall,#chkrepairedroof,#chkprovidebench,#chkrepairedtoilets,#chkprovidebooks,#chkprovideuniform").attr('checked', false);
		 $("input#noofcomputer, input#noofkit,input#nooftrainedpeople, input#noofprisonerchild, input#noofsexworkerschild, input#noofmigrantworkerschild, input#noofchildrenatrisk, input#nooferadicatechildlabour,input#noofback2schoolchild,input#noofmovitoriusstud, input#noofrenovatedschool,input#noofprovidebench,input#noofrepairedtoilets, input#noofprovidebooks, input#noofprovideuniform").val("");
 		 $("#E").hide();
		 $("#A").hide();
		 $("#C").hide();
		 $("#H").hide();
      	 $("#T").show();
	   
        break;
    case '2': 
		$("input#apraisalno,input#noofvolunteer").val("");
		$("#chkteacherApraisal,#chkprovideEmployment,#chkeducationgrp,#chkspecialTraining, #chkpromoteadultliteracy,#chkhelpPrisonerChild,#chksexworkerschild,#chkmigrantworkerschild,#chkchildrenatrisk,#chkeradicatechildlabour,#chkback2school,#chkmovitoriusstud,#chkrenovatedschool,#chkpaintedschoolwall,#chkrepairedroof,#chkprovidebench,#chkrepairedtoilets,#chkprovidebooks,#chkprovideuniform").attr('checked', false);
		 $("input#apraisalno,input#noofvolunteer,input#nooftrainedpeople, input#noofprisonerchild,input#noofsexworkerschild, input#noofmigrantworkerschild, input#noofchildrenatrisk,input#nooferadicatechildlabour,input#noofback2schoolchild,input#noofmovitoriusstud,input#noofrenovatedschool,input#noofprovidebench,input#noofrepairedtoilets, input#noofprovidebooks,input#noofprovideuniform").val("");
		$("#T").hide(); 
		$("#A").hide();
		$("#C").hide();
		$("#H").hide();
		$("#E").show();
        break;
    case '3': 
	
		$("#chkteacherApraisal,#chkprovideEmployment,#chkprovidecomputer,#chkprovidekit, #chkElearningCenter,#chkhelpPrisonerChild,#chksexworkerschild,#chkmigrantworkerschild,#chkchildrenatrisk,#chkeradicatechildlabour,#chkback2school,#chkmovitoriusstud,#chkrenovatedschool,#chkpaintedschoolwall ,#chkrepairedroof,#chkprovidebench,#chkrepairedtoilets,#chkprovidebooks,#chkprovideuniform").attr('checked', false);
		 $("input#apraisalno,input#noofvolunteer,input#noofcomputer, input#noofkit, input#noofprisonerchild,input#noofsexworkerschild, input#noofmigrantworkerschild, input#noofchildrenatrisk,input#nooferadicatechildlabour,input#noofback2schoolchild,input#noofmovitoriusstud,input#noofrenovatedschool,input#noofprovidebench,input#noofrepairedtoilets, input#noofprovidebooks,input#noofprovideuniform").val("");

		$("#T").hide();
		$("#E").hide();
		$("#C").hide();
		$("#H").hide();
		$("#A").show();
        break;      
    case '4':
	$("#chkteacherApraisal,#chkprovideEmployment,#chkprovidecomputer,#chkprovidekit, #chkElearningCenter,#chkeducationgrp,#chkspecialTraining, #chkpromoteadultliteracy,#chkrenovatedschool,#chkpaintedschoolwall,#chkrepairedroof,#chkprovidebench,#chkrepairedtoilets,#chkprovidebooks,#chkprovideuniform").attr('checked', false);
		 $("input#apraisalno,input#noofvolunteer,input#noofcomputer, input#noofkit,input#nooftrainedpeople, ,input#noofrenovatedschool,input#noofprovidebench,input#noofrepairedtoilets, input#noofprovidebooks,input#noofprovideuniform").val("");
 
		$("#T").hide();
		$("#E").hide();
		$("#A").hide();
		$("#H").hide();
		$("#C").show();
        break;
		case '5': 
		
		$("#chkteacherApraisal,#chkprovideEmployment,#chkprovidecomputer,#chkprovidekit, #chkElearningCenter,#chkeducationgrp,#chkspecialTraining, #chkhelpPrisonerChild,#chkpromoteadultliteracy,#chksexworkerschild,#chkmigrantworkerschild,#chkchildrenatrisk,#chkeradicatechildlabour,#chkback2school,#chkmovitoriusstud").attr('checked', false);
		 $("input#apraisalno,input#noofvolunteer,input#noofcomputer, input#noofkit,input#nooftrainedpeople, input#noofprisonerchild,input#noofsexworkerschild, input#noofmigrantworkerschild, input#noofchildrenatrisk,input#nooferadicatechildlabour,input#noofback2schoolchild,input#noofmovitoriusstud").val("");

		$("#T").hide();
		$("#E").hide();
		$("#A").hide();
		$("#C").hide();
		$("#H").show();
        break;
    default:
	
	$("#chkteacherApraisal,#chkprovideEmployment,#chkprovidecomputer,#chkprovidekit, #chkElearningCenter,#chkeducationgrp,#chkspecialTraining, #chkhelpPrisonerChild,#chkpromoteadultliteracy,#chksexworkerschild,#chkmigrantworkerschild,#chkchildrenatrisk,#chkeradicatechildlabour,#chkback2school,#chkmovitoriusstud,#chkrenovatedschool,#chkpaintedschoolwall,#chkrepairedroof,#chkprovidebench,#chkrepairedtoilets,#chkprovidebooks,#chkprovideuniform").attr('checked', false);
		 $("input#apraisalno,input#noofvolunteer,input#noofcomputer, input#noofkit,input#nooftrainedpeople, input#noofprisonerchild,input#noofsexworkerschild, input#noofmigrantworkerschild, input#noofchildrenatrisk,input#nooferadicatechildlabour,input#noofback2schoolchild,input#noofmovitoriusstud,input#noofrenovatedschool,input#noofprovidebench,input#noofrepairedtoilets, input#noofprovidebooks,input#noofprovideuniform").val("");
		 

		$("#T").hide();
		$("#E").hide();
		$("#A").hide();
		$("#C").hide();
		$("#H").hide();
}
}

function openContent(chkboxid,contentid,textfieldid) {
	//alert(contentid)
$("#"+textfieldid).val('');	
$("#"+contentid).toggle();
if($("#"+chkboxid).is(":checked")) {
$("#"+contentid).show();
}
else
{
$("#"+contentid).hide();
	
}
}

function inputNumber(e,val,allowdecimal)
{
    var key=(window.event) ? event.keyCode : e.charCode || 0;
	
	if(allowdecimal==true)
	{
		if(key==0 || key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57))
	    {	
		    if(key==46)
		    {
			    if(val.indexOf(".")!=-1)
			    {
				    if(window.event)
				    {
					    event.returnValue=false
				    }
				    else
				    {
					    e.preventDefault()
				    }
			    }
		    }
	    }      
	    else
	    {
		    if(window.event)
		    {
			    event.returnValue=false
		    }
		    else
		    {
			    e.preventDefault()
		    }
	    }
	}
	else
	{
		if(key==0 || key == 8 || key == 9 || (key >= 48 && key <= 57))
		{	
			
		}      
		else
		{
			if(window.event)
			{
				event.returnValue=false
			}
			else
			{
				e.preventDefault()
			}
		}
	}
}


function goForUpdate(type,id) {
//$('#clubprojfrm').show();	
if(type=='update') {
		var pars ='projid='+id;
		
	$.ajax({                                      
		  url: 'getproject.php',                     
		  data: pars,
		  type:"post",
			dataType: 'json',
			success: function(data)         
			{
				if(data.length>0)
				{
					//alert(JSON.stringify(data))
					//categorylist();
					$('#chocategory').val(data[0]["categoryid"]);
					openByCategory(data[0]["categoryid"])
					
					//$('#chocategory').val(data[0]["categoryid"]).attr("selected", "selected");
					//dispsubcategory(data[0]["categoryid"],data[0]["subcategoryid"]);
					
					$('#txtprojtitle').val(data[0]["title"]);
					$('#txtprojdesc').val(data[0]["projdesc"]);

					if(data[0]["isteacherapraisal"]==1) {
					$('#chkteacherApraisal').attr('checked','checked');
					openContent('chkteacherApraisal','appraisal','apraisalno');
				 	$('#apraisalno').val(data[0]["apraisalno"]);
					}
					if(data[0]["isprovideEmployment"]==1) {
					$('#chkprovideEmployment').attr('checked','checked');
					openContent('chkprovideEmployment','employment','noofvolunteer')
					$('#noofvolunteer').val(data[0]["noofvolunteer"]);
					}
	
					if(data[0]["isprovidecomputer"]==1) {
					$('#chkprovidecomputer').attr('checked','checked');
					openContent('chkprovidecomputer','providecomputer','noofcomputer')
					$('#noofcomputer').val(data[0]["noofcomputer"]);
					}
					
					if(data[0]["isprovidekit"]==1) {
					$('#chkprovidekit').attr('checked','checked');
					openContent('chkprovidekit','providekit','noofkit')
					$('#noofkit').val(data[0]["noofkit"]);
					}
					if(data[0]["isEstablishElearnCenter"]==1) {
					$('#chkElearningCenter').attr('checked','checked');
					}
					
					if(data[0]["ispromoteEducationgrp"]==1) {
					$('#chkeducationgrp').attr('checked','checked');
					}
					if(data[0]["ispromoteadultliteracy"]==1) {
					$('#chkpromoteadultliteracy').attr('checked','checked');
					}
					if(data[0]["istrainingtohousewives"]==1) {
					$('#chkspecialTraining').attr('checked','checked');
					openContent('chkspecialTraining','noofpeople','nooftrainedpeople')
					$('#nooftrainedpeople').val(data[0]["nooftrainedpeople"]);
					}
					if(data[0]["ishelpPrisonerChild"]==1) {
					$('#chkhelpPrisonerChild').attr('checked','checked');
					openContent('chkhelpPrisonerChild','prisonerchild','noofprisonerchild')
					$('#noofprisonerchild').val(data[0]["noofprisonerchild"]);
					}
					if(data[0]["ishelpsexworkerschild"]==1) {
					$('#chksexworkerschild').attr('checked','checked');
					openContent('chksexworkerschild','sexworkerschild','noofsexworkerschild')
					$('#noofsexworkerschild').val(data[0]["noofsexworkerschild"]);
					}
					if(data[0]["ishelpmigrantworkerschild"]==1) {
					$('#chkmigrantworkerschild').attr('checked','checked');
					openContent('chkmigrantworkerschild','migrantworkerschild','noofmigrantworkerschild')
					$('#noofmigrantworkerschild').val(data[0]["noofmigrantworkerschild"]);
					}
					
					if(data[0]["ishelpchildrenatrisk"]==1) {
					$('#chkchildrenatrisk').attr('checked','checked');
					openContent('chkchildrenatrisk','childrenatrisk','noofchildrenatrisk')
					$('#noofchildrenatrisk').val(data[0]["noofchildrenatrisk"]);
					}
					
					if(data[0]["iseradicatechildlabour"]==1) {
					$('#chkeradicatechildlabour').attr('checked','checked');
					openContent('chkeradicatechildlabour','eradicatechildlabour','nooferadicatechildlabour')
					$('#nooferadicatechildlabour').val(data[0]["nooferadicatechildlabour"]);
					}
					if(data[0]["isback2school"]==1) {
					$('#chkback2school').attr('checked','checked');
					openContent('chkback2school','back2school','noofback2schoolchild')
					$('#noofback2schoolchild').val(data[0]["noofback2schoolchild"]);
					}
					if(data[0]["ismovitoriusstud"]==1) {
					$('#chkmovitoriusstud').attr('checked','checked');
					openContent('chkmovitoriusstud','movitoriusstud','noofmovitoriusstud')
					$('#noofmovitoriusstud').val(data[0]["noofmovitoriusstud"]);
					}
					if(data[0]["isrenovatedschool"]==1) {
					$('#chkrenovatedschool').attr('checked','checked');
					openContent('chkrenovatedschool','renovatedschool','noofrenovatedschool')
					$('#noofrenovatedschool').val(data[0]["noofrenovatedschool"]);
					}
					if(data[0]["ispaintedschoolwall"]==1) {
					$('#chkpaintedschoolwall').attr('checked','checked');
					}
					if(data[0]["isrepairedroof"]==1) {
					$('#chkrepairedroof').attr('checked','checked');
					}
					if(data[0]["isprovidebench"]==1) {
					$('#chkprovidebench').attr('checked','checked');
					openContent('chkprovidebench','providebench','noofprovidebench')
					$('#noofprovidebench').val(data[0]["noofprovidebench"]);
					}
					if(data[0]["isrepairedtoilets"]==1) {
					$('#chkrepairedtoilets').attr('checked','checked');
					openContent('chkrepairedtoilets','repairedtoilets','noofrepairedtoilets')
					$('#noofrepairedtoilets').val(data[0]["noofrepairedtoilets"]);
					}
					if(data[0]["isprovidebooks"]==1) {
					$('#chkprovidebooks').attr('checked','checked');
					openContent('chkprovidebooks','providebooks','noofprovidebooks')
					$('#noofprovidebooks').val(data[0]["noofprovidebooks"]);
					}
					if(data[0]["isprovideuniform"]==1) {
					$('#chkprovideuniform').attr('checked','checked');
					openContent('chkprovideuniform','provideuniform','noofprovideuniform')
					$('#noofprovideuniform').val(data[0]["noofprovideuniform"]);
					}
					
					$('#chostate').val(data[0]["state"]);
					$('#txtcity').val(data[0]["city"]);
					$('#txtdistrict').val(data[0]["district"]);
					dispclub(data[0]["district"],data[0]["club"]);
					
					//$('#txtclub').val(data[0]["club"]);
					$('#txtprojvenue').val(data[0]["projectvenue"]);
					$('#txtunitsupply').val(data[0]["unitsupplied"]);
					$('#txtbeneficiariesno').val(data[0]["beneficiaryno"]);
					$('#txtpartnerorg').val(data[0]["partnerorg"]);
					$('#txtoutlay').val(data[0]["outlay"]);
					$('#txtprojdt').val(data[0]["projectdate"]);
					$('#txtprojcontactdetail').val(data[0]["projcontact"]);
				}			 
			}
		});
	}
}


function readURL(input) {
var fileExtallow = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if (input.files && input.files[0]) {
			
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
				var filesize = (input.files[0].size)/1024;
				var ext =input.files[0].type.split('/').pop();
			
				if(filesize>500)
				{
				alert("Image size must be less than 500kb.");
				$("#"+input.id).val('');
				return false;
				}
				if($.inArray(ext,fileExtallow) == -1) 
				{
				alert("Image type allow only jpeg, jpg, png, gif, bmp");
				$("#"+input.id).val('');
				return false;
				}
            }
        }
		
function checkAvail(val)
{
var pars ='user='+val;
var str="";
$.ajax({                                      
      url: 'chkUsername.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
		
				if(data[0]["cnt"]>0) {
				str =str+"Username already exist!";
				}
			}	
				$('#dispstr').html(str);
			if(str!='') {		 
				return false;
				}
		}

	});
}		
	
/*function Formsubmit()
{
	var $indexform = $('#frm');
	var pars=new FormData($('#frm')[0]);
	$.ajax({                                      
      url: 'SaveClubProject.php',                     
      data:pars, 
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.status==1)
			{
				alert(data.msg)
			}			 
		}
	});

}*/
/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

/*$('#uploadImg1').bind('change', function() {

  //this.files[0].size gets the size of your file.
  alert(this.files[0].size);

});*/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});
</script>


<script type="text/javascript">
	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
</script>


</body>
</html>






