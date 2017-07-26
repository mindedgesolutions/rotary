<?php
session_start();
ob_start();
include('include/config.php');
$userid=$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprehensive School Survey Form</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<link href="http://rotaryteach.org/donor/css/CalendarControl.css"
      rel="stylesheet" type="text/css">
<script src="http://rotaryteach.org/donor/js/CalendarControl.js"
        language="javascript"></script>
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
		}
		.help {
    display:none;
    font-size:90%;
}
input:focus + .help {
    display:inline-block;
}
</style>

<style>
.tooltip1 {
    position: relative;
    display: inline-block;
}

.tooltip1 .tooltiptext {
    visibility: hidden;
    width: 350px;
    background-color: #7c7b7a;
    color: #fff;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 110%;
	
}

.tooltip .tooltiptext::after {
    content: " ";
    position: absolute;
    top: 100%; /* At the bottom of the tooltip */
    left: 50%;
    margin-left: -5px;
    border-color: black transparent transparent transparent;
}
.tooltip1:hover .tooltiptext {
    visibility: visible;
	padding:8px;
}
</style>

<script type="text/javascript">
	var url;

function showDistrict(str) {
	//alert("test");
	//var textHolderDistrict = ddMember.options[ddMember.selectedIndex].text
	//document.getElementById("txtMemberName").value = textHolderDistrict;
	
    if (str == "") {
        document.getElementById("ddDistrict").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ddDistrict").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_district_list.php?q="+str,true);
        xmlhttp.send();
    }
}

function showClub(str)
{
	//var textHolderClub = ddDistrict.options[ddDistrict.selectedIndex].text
	//document.getElementById("txtDistrictName").value = textHolderClub;
	
	if (str == "") {
        document.getElementById("ddClub").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ddClub").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_club_list.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error1").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric2(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error2").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric3(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error3").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric4(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error4").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric5(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error5").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric6(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error6").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric7(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error7").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric8(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error8").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric9(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error9").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric10(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error10").style.display = ret ? "none" : "inline";
			return ret;
		}		
function IsNumeric11(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error11").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric12(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error12").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric13(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error13").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric14(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error14").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric15(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error15").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric16(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error16").style.display = ret ? "none" : "inline";
			return ret;
		}			
function checkEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    alert("Please enter a valid email address");
}		
</script>
<script>
function showToiletBoys1(){
		document.getElementById("idA1").style.display="block";
}
function showToiletBoys2(){
		document.getElementById("idA1").style.display="none";
}
function showToiletGirls1(){
		document.getElementById("idB1").style.display="block";
}
function showToiletGirls2(){
		document.getElementById("idB1").style.display="none";
}
function showToiletTeacher1(){
		document.getElementById("idC1").style.display="block";
}
function showToiletTeacher2(){
		document.getElementById("idC1").style.display="none";
}
function showWashStation1(){
		document.getElementById("idWashStation").style.display="block";
}
function showWashStation2(){
		document.getElementById("idWashStation").style.display="none";
}

function showLibBooks1(){
		document.getElementById("idlibBooks").style.display="block";
}
function showLibBooks2(){
		document.getElementById("idlibBooks").style.display="none";
}

function showheadTeacher1(){
		document.getElementById("idheadTeacher").style.display="block";
}
function showheadTeacher2(){
		document.getElementById("idheadTeacher").style.display="none";
}

function showStores1(){
		document.getElementById("idStroes").style.display="block";
}
function showStores2(){
		document.getElementById("idStroes").style.display="none";
}
function showlaboratory1(){
		document.getElementById("idLaboratory").style.display="block";
}
function showlaboratory2(){
		document.getElementById("idLaboratory").style.display="none";
}
function showKitchen1(){
		document.getElementById("idKitchen").style.display="block";
}
function showKitchen2(){
		document.getElementById("idKitchen").style.display="none";
}
function showIndoorGames1(){
		document.getElementById("idIndoorGames").style.display="block";
}
function showIndoorGames2(){
		document.getElementById("idIndoorGames").style.display="none";
}
function showStaffRoom1(){
		document.getElementById("idStaffRoom").style.display="block";
}
function showStaffRoom2(){
		document.getElementById("idStaffRoom").style.display="none";
}
function showeLearning1(){
		document.getElementById("ideLearning").style.display="block";
}
function showeLearning2(){
		document.getElementById("ideLearning").style.display="none";
}
</script>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header> 
	  <!-- Logo Start -->
	  
	  <div class="logo"><a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>
	  <!-- Logo End --> 
	  
	  <!-- Sidebar Navigation Start -->
	  <?php include('include/mainnav.php'); ?>
	  
	  <div class="clearfix"></div>
	  <!-- Sidebar Navigation End --> 
	</header>
	<div class="structure-row alone">
	<div class="right-sec">   
		<header> 
	  <div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
				<?php include('include/child_header.php'); ?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;">Comprehensive School Survey Form for Teacher Support, E-Learning & Happy School (Form No R 1.1)</h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;">Step-4</h5>
				</div>
			</div>
		</div>
		
        <div class="clearfix"></div>
      </header> 
	  
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                       <!-- <div class="col-xs-12"> -->
					   <div class="col-md-2"></div>
					   <div class="col-md-8 sec-box">
                            <div class="sec-box">
                                <!-- <a class="closethis">Close</a> -->
                                <header>
									<center>
										<h4 class="heading">DETAILS OF THE SURVEYED SCHOOL</h4>
										<h5 class="heading">School Infrastructure Details</h5>
									</center>
								</header>
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <div class="table-box">
                                        <table class="table">
                                            
                                            <tbody>
	<form class="form-horizontal" name="frm" id="frm" action="" method="" enctype="multipart/form-data" >	
<?php 
			$survey_id=$_GET['id'];
			$sql = "select school_build_stru,status_ele_supply,kept_locked,toilet_for_boys,toilet_for_boys_func,
					toilet_for_boys_non_func,toilet_for_boys_total,toilet_for_girls,toilet_for_girls_func,toilet_for_girls_non_func,
					toilet_for_girls_total,toilet_for_teachers,toilet_for_teachers_func,toilet_for_teachers_non_func,
					toilet_for_teachers_total,drink_water_stu_techer,hand_washing_stn,total_hand_wash_stn,library_with_book,
					library_with_book_no,footwear_per,school_bag_per,uniform_per,no_benches,no_desks,head_teacher,stores_separate,
					laboratory,kitchen_mid_day,indoor_games,staff_room,staff_room_no_chair,staff_room_no_table,e_learning_fac,
					e_learning_func_unit from tbl_school_survey where userid='$userid' and survey_id='$survey_id'";
			
			$result = mysql_query($sql);
			//echo $sql;
			$chk = "checked";
			
			while($row = mysql_fetch_array($result)){
			extract($row);
			
		?>		
                                                <tr>												
                                                    <td class="col-md-4">School Building Structure 
													<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
															<strong><u>School Building Structure</u></strong><br>
																<table style="border:1px solid black; color:#000000">
																	<tr style="border:1px solid black; color:#000000">
																		<td style="border:1px solid black; color:#000000"><b>Particulars</b></td>
																		<td style="border:1px solid black; color:#000000"><center><b>Description</b></center></td>
																	</tr>
																	<tr style="border:1px; color:#000000">
																		<td style="border:1px solid black; color:#000000">Good</td>
																		<td style="border:1px solid black; color:#000000">If the school has a concrete building with proper roof, wall, doors and windows, floor and the building is secure, then rate it as “Good”.</td>
																	</tr>
																	<tr style="border:1px; color:#000000">
																		<td style="border:1px solid black; color:#000000">Average</td>
																		<td style="border:1px solid black; color:#000000">If the school has any partial damage (30-50%) in the building wall, door and windows, floor, roof, then rate is as “Average”.</td>
																	</tr>
																	<tr style="border:1px; color:#000000">
																		<td style="border:1px solid black; color:#000000">Poor</td>
																		<td style="border:1px solid black; color:#000000">If the school has no concrete building, broken floor, no proper roof, doors and windows are missing, and then rate it as “Poor”.</td>
																	</tr>
																</table>
															 </span>
															 </div>
													:</td>
                                                    <td class="col-md-8">
													<input type="text" id="txtmaxid" name="txtmaxid" readonly style="display:none;" class="form-control" value="<?php echo $_GET['suid']; ?>">
														<label class="radio-inline" for = "Good"><input type = "radio" name = "schoolBuildStr" id = "Good" value = "Good" <?php if($school_build_stru=='Good'){echo $chk;} ?> disabled='disabled' />Good</label>
														<label class="radio-inline" for = "Average"><input type = "radio" name = "schoolBuildStr" id = "Average" value = "Average" <?php if($school_build_stru=='Average'){echo $chk;} ?> disabled='disabled' />Average</label>
														<label class="radio-inline" for = "Poor "><input type = "radio" name = "schoolBuildStr" id = "Poor" value = "Poor" <?php if($school_build_stru=='Poor'){echo $chk;} ?> disabled='disabled' />Poor</label>
														
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Status of electricity supply :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "Constant"><input type = "radio" name = "statusEleSup" id = "Constant" value = "Constant" <?php if($status_ele_supply=='Constant'){echo $chk;} ?> disabled='disabled' />Constant</label>
														<label class="radio-inline" for = "Intermittent"><input type = "radio" name = "statusEleSup" id = "Intermittent" value = "Intermittent" <?php if($status_ele_supply=='Intermittent'){echo $chk;} ?> disabled='disabled' />Intermittent</label>
														<label class="radio-inline" for = "Non-existent"><input type = "radio" name = "statusEleSup" id = "Non-existent" value = "Non-existent" <?php if($status_ele_supply=='Non-existent'){echo $chk;} ?> disabled='disabled' />Non-existent</label>
													</td>
                                                </tr>
                                                <tr>												
                                                    <td class="col-md-4">Is the building secure against unauthorized entry during non-school hours?	</td>
                                                    <td class="col-md-8">
														<label >(Rooms are kept locked beyond school hours)</label><br/>
														<label class="radio-inline" for = "yes"><input type = "radio" name = "buildSecure" id = "yes" value = "yes" <?php if($kept_locked=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "buildSecure" id = "no" value = "no" <?php if($kept_locked=='no'){echo $chk;} ?> disabled='disabled' />No</label>
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Availability of adequate and separate toilets for boys and girls :</td>
                                                    <td class="col-md-8">																												
														<label>(Adequate toilet refers to 1 toilet for every 30 to 50 students.)</label><br/><br/>
														<label>a) Toilet for Boys</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "toiletforboys" id = "yes" value = "yes" onchange="showToiletBoys1()" <?php if($toilet_for_boys=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "toiletforboys" id = "no" value = "no" onchange="showToiletBoys2()" <?php if($toilet_for_boys=='no'){echo $chk;} ?> disabled='disabled' />No</label>
														<br/>
														<table id="idA1" style="display:none;">
															<tr>
																<td>
																	How many are Functional :<input type="text" id="txtBoysFunctional" name="txtBoysFunctional" class="form-control" maxlength="3" onblur="add1()" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_boys_func; ?>" readonly />
																	<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	How many are Non Functional :<input type="text" id="txtBoysNonFunctional" name="txtBoysNonFunctional" class="form-control" maxlength="3" onblur="add1()" required onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_boys_non_func; ?>" readonly />
																	<span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	Total:<input type="text" id="txtTotalBoys" name="txtTotalBoys" class="form-control" value="<?php echo $toilet_for_boys_total; ?>" readonly>	
																	<script>
																		function add1(){
																			var x = document.getElementById("txtBoysFunctional").value;
																			var y = document.getElementById("txtBoysNonFunctional").value;
																			var z = parseInt(x) + parseInt(y);
																			document.getElementById("txtTotalBoys").value = z;
																			
																		}
																	</script>
																</td>
															</tr>
														</table>
														<br/>
														<label>b) Toilet for Girls</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "toiletforgirls" id = "yes" value = "yes" onchange="showToiletGirls1()" <?php if($toilet_for_girls=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "toiletforgirls" id = "no" value = "no" onchange="showToiletGirls2()" <?php if($toilet_for_girls=='no'){echo $chk;} ?> disabled='disabled' />No</label>													
														<br/>
														<table id="idB1" style="display:none;">
															<tr>
																<td>
																	How many are Functional :<input type="text" id="txtGirlsFunctional" name="txtGirlsFunctional" class="form-control" maxlength="3" onblur="add2()" required onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_girls_func; ?>" readonly />
																	<span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	How many are Non Functional :<input type="text" id="txtGirlsNonFunctional" name="txtGirlsNonFunctional" class="form-control" maxlength="3" onblur="add2()" required onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_girls_non_func; ?>" readonly />
																	<span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	Total:<input type="text" id="txtTotalGirls" name="txtTotalGirls" class="form-control" value="<?php echo $toilet_for_girls_total; ?>" readonly>	
																	<script>
																		function add2(){
																			var x = document.getElementById("txtGirlsFunctional").value;
																			var y = document.getElementById("txtGirlsNonFunctional").value;
																			var z = parseInt(x) + parseInt(y);
																			document.getElementById("txtTotalGirls").value = z;
																			
																		}
																	</script>
																</td>
															</tr>
														</table>
														<br/>
																	
														<label>c) Toilet for Teachers</label>&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "toiletforteacher" id = "yes" value = "yes" onchange="showToiletTeacher1()" <?php if($toilet_for_teachers=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "toiletforteacher" id = "no" value = "no" onchange="showToiletTeacher2()" <?php if($toilet_for_teachers=='no'){echo $chk;} ?> disabled='disabled' />No</label>	
														<table id="idC1" style="display:none;">
															<tr>
																<td>
																	How many are Functional :<input type="text" id="txtTeacherFunctional" name="txtTeacherFunctional" class="form-control" maxlength="3" onblur="add3()" required onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_teachers_func; ?>" readonly />
																	<span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	How many are Non Functional :<input type="text" id="txtTeacherNonFunctional" name="txtTeacherNonFunctional" class="form-control" maxlength="3" onblur="add3()" required onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_teachers_non_func; ?>" readonly />
																	<span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	Total:<input type="text" id="txtTotalTeachers" name="txtTotalTeachers" class="form-control" value="<?php echo $toilet_for_teachers_total; ?>" readonly>	
																	<script>
																		function add3(){
																			var x = document.getElementById("txtTeacherFunctional").value;
																			var y = document.getElementById("txtTeacherNonFunctional").value;
																			var z = parseInt(x) + parseInt(y);
																			document.getElementById("txtTotalTeachers").value = z;
																		}
																	</script>
																</td>
															</tr>
														</table>
														<br/>
													</td>
                                                </tr>
                                                
												
												<tr>
                                                    <td class="col-md-4">Availability of clean and adequate drinking water for both students and teachers.</td>
                                                    <td class="col-md-8">
														<label>(Adequate drinking water facility refers to 1 water tap for every 10 students.)</label><br/>
														<label class="radio-inline" for = "yes"><input type = "radio" name = "drinkWater" id = "yes" value = "yes" <?php if($drink_water_stu_techer=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "drinkWater" id = "no" value = "no" <?php if($drink_water_stu_techer=='no'){echo $chk;} ?> disabled='disabled' />No</label>														
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Availability of Hand Washing Station</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "washStation" id = "yes" value = "yes" onchange="showWashStation1()" <?php if($hand_washing_stn=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "washStation" id = "no" value = "no" onchange="showWashStation2()" <?php if($hand_washing_stn=='no'){echo $chk;} ?> disabled='disabled' />No</label>														
														
														<table id="idWashStation" style="display:none;">
															<tr>
																<td>
																<br/>
																Total Number of Hand Washing Station :<input type="text" id="txtTotalHandWash" name="txtTotalHandWash" class="form-control" maxlength="3" required onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $total_hand_wash_stn; ?>" readonly />
																	<span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
														</table>
													</td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Facility of Library with Books</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "libBooks" id = "yes" value = "yes" onchange="showLibBooks1()" <?php if($library_with_book=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "libBooks" id = "no" value = "no" onchange="showLibBooks2()" <?php if($library_with_book=='no'){echo $chk;} ?> disabled='disabled' />No</label>														
														
														<table id="idlibBooks" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of Books :<input type="text" id="txtTotalLibBooks" name="txtTotalLibBooks" class="form-control" maxlength="10" required onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $library_with_book_no; ?>" readonly />
																	<span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
														</table>
													</td>
                                                </tr>
										
												<tr>												
                                                    <td class="col-md-4">What percentage of students has ?</td>
                                                    <td class="col-md-8">														
														a) Footwear Percentage(%) :<input type="text" id="txtFootwear" name="txtFootwear" class="form-control" maxlength="2" required onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $footwear_per; ?>" readonly />
																	<span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
														b) School Bag Percentage(%) :<input type="text" id="txtSchoolBag" name="txtSchoolBag" class="form-control" maxlength="2" required onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $school_bag_per; ?>" readonly />
																	<span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
														c) Uniform Percentage(%) <input type="text" id="txtUniform" name="txtUniform" class="form-control" maxlength="2" required onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $uniform_per; ?>" readonly />
																	<span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>														
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Number of benches available in the school :</td>
                                                    <td class="col-md-8">														
														<input type="text" id="txtTotalBenches" name="txtTotalBenches" class="form-control" maxlength="5" required onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $no_benches; ?>" readonly />
																	<span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>													
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Number of desks available in the school :</td>
                                                    <td class="col-md-8">														
														<input type="text" id="txtTotalDesks" name="txtTotalDesks" class="form-control" maxlength="5" required onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $no_desks; ?>" readonly />
																	<span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span>													
													</td>
                                                </tr>

												<tr>												
                                                    <td class="col-md-4">Is there a separate room for ?</td>
                                                    <td class="col-md-8">	
														<label>a) Head Teacher </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "headTeacher" id = "yes" value = "yes" <?php if($head_teacher=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "headTeacher" id = "no" value = "no" <?php if($head_teacher=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<!--
														onchange="showheadTeacher1()"
														onchange="showheadTeacher2()"
														<table id="idheadTeacher" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalChairs" name="txtTotalChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalTables" name="txtTotalTables" class="form-control" required>	
																</td>
															</tr>
														</table> -->
														<br/>
														<label>b) Stores (separate) </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "stores" id = "yes" value = "yes" <?php if($stores_separate=='yes'){echo $chk;} ?> disabled='disabled'  />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "stores" id = "no" value = "no" <?php if($stores_separate=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<!--
														onchange="showStores1()"
														onchange="showStores2()" 
														
														<table id="idStroes" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalStoresChairs" name="txtTotalStoresChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalStoresTables" name="txtTotalStoresTables" class="form-control" required>	
																</td>
															</tr>
														</table> -->
														
														<br/>
														<label>c) Laboratory </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "laboratory" id = "yes" value = "yes" <?php if($laboratory=='yes'){echo $chk;} ?> disabled='disabled'  />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "laboratory" id = "no" value = "no"  <?php if($laboratory=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<!--
														onchange="showlaboratory1()"
														onchange="showlaboratory2()"
														<table id="idLaboratory" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalLaboratoryChairs" name="txtTotalLaboratoryChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalLaboratoryTables" name="txtTotalLaboratoryTables" class="form-control" required>	
																</td>
															</tr>
														</table>-->
														<br/>
																											
														<label>d) Kitchen, only for mid-day meals </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "kitchen" id = "yes" value = "yes" <?php if($kitchen_mid_day=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "kitchen" id = "no" value = "no"  <?php if($kitchen_mid_day=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<!--
														onchange="showKitchen1()"
														onchange="showKitchen2()"
														<table id="idKitchen" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalKitchenChairs" name="txtTotalKitchenChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalKitchenTables" name="txtTotalKitchenTables" class="form-control" required>	
																</td>
															</tr>
														</table>
														-->
														<br/>
														<label>e) Indoor Games </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "IndoorGames" id = "yes" value = "yes" <?php if($indoor_games=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "IndoorGames" id = "no" value = "no"  <?php if($indoor_games=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<!--
														onchange="showIndoorGames1()"
														onchange="showIndoorGames2()"
														<table id="idIndoorGames" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalIndoorGamesChairs" name="txtTotalIndoorGamesChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalIndoorGamesTables" name="txtTotalIndoorGamesTables" class="form-control" required>	
																</td>
															</tr>
														</table>
														-->
														<br/>
												
														<label>f) Other Teachers (Staff Room) </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "StaffRoom" id = "yes" value = "yes" onchange="showStaffRoom1()" <?php if($staff_room=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "StaffRoom" id = "no" value = "no" onchange="showStaffRoom2()" <?php if($staff_room=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<table id="idStaffRoom" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalStaffRoomChairs" name="txtTotalStaffRoomChairs" class="form-control" maxlength="5" required onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $staff_room_no_chair; ?>" readonly />
																	<span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>		
																	Number of tables :<input type="text" id="txtTotalStaffRoomTables" name="txtTotalStaffRoomTables" class="form-control" maxlength="5" required onkeypress="return IsNumeric15(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $staff_room_no_table; ?>" readonly />
																	<span id="error15" style="color: Red; display: none">* Input digits (0 - 9)</span>		
																</td>
															</tr>
														</table>
														
														
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Does the school have E-learning facility ?</td>
                                                    <td class="col-md-8">	
														<label>(E-Learning refers to Projector and software as per state board curriculum in vernacular languages with audio system.)</label><br/>
														<label class="radio-inline" for = "yes"><input type = "radio" name = "eLearning" id = "yes" value = "yes" onchange="showeLearning1()" <?php if($e_learning_fac=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "eLearning" id = "no" value = "no" onchange="showeLearning2()" <?php if($e_learning_fac=='no'){echo $chk;} ?> disabled='disabled' />No</label>																												
														<table id="ideLearning" style="display:none;">
															<tr>
																<td>
																<br/>
																	how many functional units :<input type="text" id="txteLearning" name="txteLearning" class="form-control" maxlength="5" required onkeypress="return IsNumeric16(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $e_learning_func_unit; ?>" readonly />
																	<span id="error16" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<?php
												}
											?>
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="button" class="btn btn-primary" name="submit" onClick="window.location = 'http://rotaryteach.org/Comprehensive_School_Survey/cssform5view.php?id=<?php echo $survey_id; ?>'">Next</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
    </form>   
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-2"></div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
    </div>
	</div>
	<br/>
	<br/>
	<div class="footer clearfix">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</div>
<!-- Wrapper End -->
</body>
</html>
