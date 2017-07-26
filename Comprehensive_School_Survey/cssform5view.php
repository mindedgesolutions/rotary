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

<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error1").style.display = ret ? "none" : "inline";
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

function showPeTeacher(chkOther)
{
	if(document.getElementById("chkOther").checked)
	{
		document.getElementById("idPeTeacherOther").style.display="block";
	}
	else 
	{
		document.getElementById("idPeTeacherOther").style.display="none";
	}	
}

function showSportsInfraOther(chkOther)
{
	if(document.getElementById("chkSportsInfraOther").checked)
	{
		document.getElementById("idSportsInfraOther").style.display="block";
	}
	else 
	{
		document.getElementById("idSportsInfraOther").style.display="none";
	}	
}
  
function showSportFund(chkOther)
{
	if(document.getElementById("chkSportFundOther").checked)
	{
		document.getElementById("idSportFundOther").style.display="block";
	}
	else 
	{
		document.getElementById("idSportFundOther").style.display="none";
	}	
}
    
function showPromotPEDOther(chkOther)
{
	if(document.getElementById("chkPromotPEDOther").checked)
	{
		document.getElementById("idpromotPED").style.display="block";
	}
	else 
	{
		document.getElementById("idpromotPED").style.display="none";
	}	
}

function showPescribed1()
{
	document.getElementById("idPeSports").style.display="block";
}
function showPescribed2()
{
	document.getElementById("idPeSports").style.display="none";
}

function showOther1()
{
	document.getElementById("idpeTeacher").style.display="none";
}
function showOther2()
{
	document.getElementById("idpeTeacher").style.display="block";
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
				<h5 style="color:#ffffff; text-align:right;">Step-5</h5>
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
										<h5 class="heading">Status of Physical Education</h5>
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
			$sql = "select pe_period_upto5th,pe_period_upto10th,pe_period_upto12th,no_pe_teacher,no_pe_teacher_other,
					edu_quali_pe_teacher,edu_quali_pe_teacher_other,curriculum_pe_sports,who_has_prescrib_it,
					sports_played_in_school,sports_infra,sports_infra_other,spend_on_sports,maj_chall_faced_ped,
					maj_chall_faced_ped_other,promote_phy_edu,who_fund_sport_act,who_fund_sport_act_other,
					any_other_info_not_covered from tbl_school_survey where userid='$userid' and survey_id='$survey_id'";
			
			$result = mysql_query($sql);
			//echo $sql;
			$chk = "checked";
			
			while($row = mysql_fetch_array($result)){
			extract($row);
			
		?>		                                               
												
												
												<tr>												
                                                    <td class="col-md-4">How many PE period are conducted in a week ?</td>
                                                    <td class="col-md-8">
													<input type="text" id="txtmaxid" name="txtmaxid" readonly style="display:none;" class="form-control" value="<?php echo $_GET['suid']; ?>">
														<table>
															<tr>
																<td style="width:25%;"></td>
																<td style="width:12%;">None</td>
																<td style="width:12%;">1 per week</td>
																<td style="width:12%;">2 per week</td>
																<td style="width:12%;">3 per week</td>
																<td style="width:12%;">4 per week</td>
																<td style="width:15%;">More then 4 per week</td>
															</tr>
															<tr>
																<td>Upto 5th class</td>
																<td><input type = "radio" name = "row1" id = "none1" value = "none" <?php if($pe_period_upto5th=='none'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row1" id = "row1per1" value = "per1" <?php if($pe_period_upto5th=='per1'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row1" id = "row1per2" value = "per2" <?php if($pe_period_upto5th=='per2'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row1" id = "row1per3" value = "per3" <?php if($pe_period_upto5th=='per3'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row1" id = "row1per4" value = "per4" <?php if($pe_period_upto5th=='per4'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row1" id = "row1per4more" value = "per4more" <?php if($pe_period_upto5th=='per4more'){echo $chk;} ?> disabled='disabled' /></td>
															</tr>
															<tr>
																<td>6th ­ 10th class</td>
																<td><input type = "radio" name = "row2" id = "none2" value = "none" <?php if($pe_period_upto10th=='none'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row2" id = "row2per1" value = "per1" <?php if($pe_period_upto10th=='per1'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row2" id = "row2per2" value = "per2" <?php if($pe_period_upto10th=='per2'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row2" id = "row2per3" value = "per3" <?php if($pe_period_upto10th=='per3'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row2" id = "row2per4" value = "per4" <?php if($pe_period_upto10th=='per4'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row2" id = "row2per4more" value = "per4more" <?php if($pe_period_upto10th=='per4more'){echo $chk;} ?> disabled='disabled' /></td>
															</tr>
															<tr>
																<td>11th ­ 12th class</td>
																<td><input type = "radio" name = "row3" id = "none3" value = "none" <?php if($pe_period_upto12th=='none'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row3" id = "row3per1" value = "per1" <?php if($pe_period_upto12th=='per1'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row3" id = "row3per2" value = "per2" <?php if($pe_period_upto12th=='per2'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row3" id = "row3per3" value = "per3" <?php if($pe_period_upto12th=='per3'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row3" id = "row3per4" value = "per4" <?php if($pe_period_upto12th=='per4'){echo $chk;} ?> disabled='disabled' /></td>
																<td><input type = "radio" name = "row3" id = "row3per4more" value = "per4more" <?php if($pe_period_upto12th=='per4more'){echo $chk;} ?> disabled='disabled' /></td>
															</tr>
														</table>
														
													</td>
                                                </tr>
				
												<tr>												
                                                    <td class="col-md-4">No. of PE teachers :</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:25%;"><label class="radio-inline" for = "None"><input type = "radio" name = "peTeacher" id = "None" value = "None" onchange="showOther1()" <?php if($no_pe_teacher=='None'){echo $chk;} ?> disabled='disabled'  />None</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "One"><input type = "radio" name = "peTeacher" id = "One" value = "One" onchange="showOther1()" <?php if($no_pe_teacher=='One'){echo $chk;} ?> disabled='disabled' />One</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "onetwo"><input type = "radio" name = "peTeacher" id = "onetwo" value = "1 - 2" onchange="showOther1()" <?php if($no_pe_teacher=='1 ­ 2'){echo $chk;} ?> disabled='disabled' />1 - 2</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "Other"><input type = "radio" name = "peTeacher" id = "Other" value = "Other" onchange="showOther2()" <?php if($no_pe_teacher=='Other'){echo $chk;} ?> disabled='disabled' />Other</label></td>
															</tr>
														</table>
														
														<br/>
														<table id="idpeTeacher" <?php if($no_pe_teacher=='Other') { ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
															<tr>
																<td>
																	Other :<input type="text" id="txtpeOther" name="txtpeOther" class="form-control" value="<?php echo $no_pe_teacher_other; ?>" readonly>	
																</td>
															</tr>
														</table>													 
													</td>
                                                </tr>
                                           
												<tr>												
                                                    <td class="col-md-4">What is the educational qualification of  PE teacher :</td>
                                                    <td class="col-md-8">
														<textarea rows="1" col="150" class="form-control" id="txtedu" name="txtedu" readonly ><?php echo $edu_quali_pe_teacher; echo ','; echo $edu_quali_pe_teacher_other; ?></textarea><br/>
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Graduate" disabled >
														&nbsp;Graduate &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Post Graduate" disabled>
														&nbsp;Post Graduate &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Retired Sport Player" disabled>
														&nbsp;Retired Sport Player <br/>
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Diploma in Sports" disabled>
														&nbsp;Diploma in Sports &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Bachelor in Physical Education" disabled>
														&nbsp;Bachelor in Physical Education &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Other" id="chkOther" onclick="showPeTeacher(this)" disabled>
														&nbsp;Other
														<table id="idPeTeacherOther" style="display:none;">
															<tr>
																<td>
																	Other :<input type="text" id="txtPeTeacherOther" name="txtPeTeacherOther" class="form-control" value="<?php echo $edu_quali_pe_teacher_other; ?>"  readonly >	
																</td>
															</tr>
														</table>
														
													</td>
                                                </tr>
                                                
												<tr>
                                                    <td class="col-md-4">Does the school follow any prescribed curriculum of PE/Sports ?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports" id = "yes" value = "yes" onchange="showPescribed1()" <?php if($curriculum_pe_sports=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "peSports" id = "no" value = "no" onchange="showPescribed2()" <?php if($curriculum_pe_sports=='no'){echo $chk;} ?> disabled='disabled' />No</label>
														<table id="idPeSports" style="display:none;">
															<tr>
																<td>
																	who has prescribed it :<input type="text" id="txtPeSports" name="txtPeSports" class="form-control" value="<?php echo $who_has_prescrib_it; ?>"  readonly >	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
							
												<tr>
                                                    <td class="col-md-4">What sports are played in the school (you may select more than one option)</td>
                                                    <td class="col-md-8">
														<textarea rows="1" col="150" class="form-control" id="txtSport" name="txtSport" readonly ><?php echo $sports_played_in_school; ?></textarea>
														<table>
															<tr>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Athletics" disabled >&nbsp;Athletics</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Kho-Kho" disabled >&nbsp;Kho-Kho</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Kabaddi" disabled >&nbsp;Kabaddi</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Volleyball" disabled >&nbsp;Volleyball</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Judo" disabled>&nbsp;Judo</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Handball" disabled>&nbsp;Handball</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Football" disabled >&nbsp;Football</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Skating" disabled >&nbsp;Skating</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Table tennis" disabled >&nbsp;Table tennis</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Lawn tennis" disabled >&nbsp;Lawn tennis</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Badminton" disabled >&nbsp;Badminton</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Basketball" disabled >&nbsp;Basketball</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Wrestling" disabled >&nbsp;Wrestling</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Hockey" disabled >&nbsp;Hockey</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Yoga" disabled >&nbsp;Yoga</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Chess" disabled >&nbsp;Chess</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Carom" disabled >&nbsp;Carom</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Gymnastics" disabled>&nbsp;Gymnastics</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">What sports infrastructure available at the school ?</td>
                                                    <td class="col-md-8">
														<textarea rows="1" col="150" class="form-control" id="txtSportInfra" name="txtSportInfra" readonly ><?php echo $sports_infra; echo ','; echo $sports_infra_other; ?></textarea>
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="sportInfra[]" value="One Playground" disabled >&nbsp;One Playground</td>
																<td style="width:50%"><input type="checkbox" name="sportInfra[]" value="Separate playground for all sports" disabled>&nbsp;Separate playground for all sports</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="sportInfra[]" value="Room for indoor sports" disabled >&nbsp;Room for indoor sports</td>
																<td><input type="checkbox" name="sportInfra[]" value="All equipment for sports" disabled >&nbsp;All equipment for sports</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sportInfra[]" value="Gym" disabled>&nbsp;Gym</td>
																<td><input type="checkbox" name="sportInfra[]" id="chkSportsInfraOther" onclick="showSportsInfraOther(this)" value="Others" disabled >&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idSportsInfraOther" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportsInfraOther" name="txtSportsInfraOther" class="form-control" >	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
																	
												<tr>
                                                    <td class="col-md-4">How much has the school spend on sport & physical education development of student annually</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td><label class="radio-inline" for = "Less than 1 lac"><input type = "radio" name = "sportPhy" id = "Less_than_1_lac" value = "Less than 1 lac" <?php if($spend_on_sports=='Less than 1 lac'){echo $chk;} ?> disabled='disabled' />Less than 1 lac</label></td>
																<td><label class="radio-inline" for = "Up to 5 lacs"><input type = "radio" name = "sportPhy" id = "Up_to_5_lacs" value = "Up to 5 lacs" <?php if($spend_on_sports=='Up to 5 lacs'){echo $chk;} ?> disabled='disabled' />Up to 5 lacs</label></td>
															</tr>
															<tr>
																<td><label class="radio-inline" for = "5 lac ­ 10 lacs"><input type = "radio" name = "sportPhy" id = "5_lac_10_lacs" value = "5 lac ­ 10 lacs" <?php if($spend_on_sports=='5 lac ­ 10 lacs'){echo $chk;} ?> disabled='disabled' />5 lac ­ 10 lacs</label></td>
																<td><label class="radio-inline" for = "More than 10 lac"><input type = "radio" name = "sportPhy" id = "More_than_10_lac" value = "More than 10 lac" <?php if($spend_on_sports=='More than 10 lac'){echo $chk;} ?> disabled='disabled' />More than 10 lac</label></td>
															</tr>
															<tr>
																<td><label class="radio-inline" for = "No Budget for PE and sports"><input type = "radio" name = "sportPhy" id = "No_Budget_for_PE_and_sports" value = "No Budget for PE and sports" <?php if($spend_on_sports=='No Budget for PE and sports'){echo $chk;} ?> disabled='disabled' />No Budget for PE and sports</label></td>
																<td></td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Select the major challenges faced in promoting PED in school</td>
                                                    <td class="col-md-8">
													<textarea rows="1" col="150" class="form-control" id="txtMajChangFace" name="txtMajChangFace" readonly ><?php echo $maj_chall_faced_ped; echo ','; echo $maj_chall_faced_ped_other; ?></textarea>
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="promotPED[]" value="Availability of fund" disabled >&nbsp;Availability of fund</td>
																<td style="width:50%"><input type="checkbox" name="promotPED[]" value="Lack of interest in students" disabled >&nbsp;Lack of interest in students</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of interest in parents" disabled >&nbsp;Lack of interest in parents</td>
																<td><input type="checkbox" name="promotPED[]" value="Lack of availability of space/playground" disabled >&nbsp;Lack of availability of space/playground</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of infrastructure" disabled >&nbsp;Lack of infrastructure</td>
																<td><input type="checkbox" name="promotPED[]" value="Impact academics in negative manner" disabled >&nbsp;Impact academics in negative manner
																</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of Trained PE teachers" disabled >&nbsp;Lack of Trained PE teachers</td>
																<td><input type="checkbox" name="promotPED[]" id="chkPromotPEDOther" onclick="showPromotPEDOther(this)" value="Others" disabled >&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idpromotPED" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportsInfraOther" name="txtSportsInfraOther" class="form-control">	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">If the challenges suggested by you are addressed by external agency are you willing to promote physical education in school</td>
                                                    <td class="col-md-8">
														<table id="idPeSports">
															<tr>
																<td style="width:35%;">
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports" id = "yes" value = "yes" <?php if($promote_phy_edu=='yes'){echo $chk;} ?> disabled='disabled' />Yes</label>															
																</td>
																<td style="width:35%;">
																	<label class="radio-inline" for = "no"><input type = "radio" name = "peSports" id = "no" value = "no" <?php if($promote_phy_edu=='no'){echo $chk;} ?> disabled='disabled' />No</label>														
																</td>
																<td style="width:30%;">
																	<label class="radio-inline" for = "maybe"><input type = "radio" name = "peSports" id = "maybe" value = "maybe" <?php if($promote_phy_edu=='maybe'){echo $chk;} ?> disabled='disabled' />Maybe</label>														
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>												
												<tr>
                                                    <td class="col-md-4">Who fund sport activities in schools</td>
                                                    <td class="col-md-8">
													<textarea rows="1" col="150" class="form-control" id="txtFundSport" name="txtFundSport" readonly ><?php echo $who_fund_sport_act; echo ','; echo $who_fund_sport_act_other; ?></textarea>
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="sportfund[]" value="Self-funded" disabled >&nbsp;Self-funded</td>
																<td style="width:50%"><input type="checkbox" name="sportfund[]" value="Government funded" disabled >&nbsp;Government funded</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="sportfund[]" value="Trust funded" disabled >&nbsp;Trust funded</td>
																<td><input type="checkbox" name="sportfund[]" value="NGO funded" disabled >&nbsp;NGO funded</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sportfund[]" value="Corporate" disabled >&nbsp;Corporate</td>
																<td><input type="checkbox" name="sportfund[]" id="chkSportFundOther" onclick="showSportFund(this)" value="Others" disabled >&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idSportFundOther" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportFundOther" name="txtSportFundOther" class="form-control" readonly >	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Any other information that is important but not covered above</td>
                                                    <td class="col-md-8">
														<textarea class="form-control" rows="5" id="otherInfo" name="otherInfo" readonly ><?php echo $any_other_info_not_covered; ?></textarea>
                                                    </td>
                                                </tr>
												<?php
												}
											?>	
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="button" class="btn btn-primary" name="submit" onClick="window.location = 'http://rotaryteach.org/Comprehensive_School_Survey/dashboard.php'">End</button>
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
