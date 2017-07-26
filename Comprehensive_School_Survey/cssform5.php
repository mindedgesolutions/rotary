<?php
session_start();
ob_start();
include('include/config.php');
$_SESSION['uid'];
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
			<form class="form-horizontal" name="frm" id="frm" action="ins_school_survey_frm5.php" method="post" enctype="multipart/form-data" >	
                                                
												
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
																<td><input type = "radio" name = "row1" id = "none1" value = "none" checked /></td>
																<td><input type = "radio" name = "row1" id = "row1per1" value = "per1" /></td>
																<td><input type = "radio" name = "row1" id = "row1per2" value = "per2" /></td>
																<td><input type = "radio" name = "row1" id = "row1per3" value = "per3" /></td>
																<td><input type = "radio" name = "row1" id = "row1per4" value = "per4" /></td>
																<td><input type = "radio" name = "row1" id = "row1per4more" value = "per4more" /></td>
															</tr>
															<tr>
																<td>6th ­ 10th class</td>
																<td><input type = "radio" name = "row2" id = "none2" value = "none" checked /></td>
																<td><input type = "radio" name = "row2" id = "row2per1" value = "per1" /></td>
																<td><input type = "radio" name = "row2" id = "row2per2" value = "per2" /></td>
																<td><input type = "radio" name = "row2" id = "row2per3" value = "per3" /></td>
																<td><input type = "radio" name = "row2" id = "row2per4" value = "per4" /></td>
																<td><input type = "radio" name = "row2" id = "row2per4more" value = "per4more" /></td>
															</tr>
															<tr>
																<td>11th ­ 12th class</td>
																<td><input type = "radio" name = "row3" id = "none3" value = "none" checked /></td>
																<td><input type = "radio" name = "row3" id = "row3per1" value = "per1" /></td>
																<td><input type = "radio" name = "row3" id = "row3per2" value = "per2" /></td>
																<td><input type = "radio" name = "row3" id = "row3per3" value = "per3" /></td>
																<td><input type = "radio" name = "row3" id = "row3per4" value = "per4" /></td>
																<td><input type = "radio" name = "row3" id = "row3per4more" value = "per4more" /></td>
															</tr>
														</table>
														
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">No. of PE teachers :</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:25%;"><label class="radio-inline" for = "None"><input type = "radio" name = "peTeacher" id = "None" value = "None" onchange="showOther1()" checked />None</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "One"><input type = "radio" name = "peTeacher" id = "One" value = "One" onchange="showOther1()" />One</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "onetwo"><input type = "radio" name = "peTeacher" id = "onetwo" value = "1 - 2" onchange="showOther1()" />1 - 2</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "Other"><input type = "radio" name = "peTeacher" id = "Other" value = "Other" onchange="showOther2()" />Other</label></td>
															</tr>
														</table>
														
														<br/>
														<table id="idpeTeacher" style="display:none;">
															<tr>
																<td>
																	Other :<input type="text" id="txtpeOther" name="txtpeOther" class="form-control">	
																</td>
															</tr>
														</table>													 
													</td>
                                                </tr>
                                                <tr>												
                                                    <td class="col-md-4">What is the educational qualification of  PE teacher :</td>
                                                    <td class="col-md-8">
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Graduate">
														&nbsp;Graduate &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Post Graduate">
														&nbsp;Post Graduate &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Retired Sport Player">
														&nbsp;Retired Sport Player <br/>
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Diploma in Sports">
														&nbsp;Diploma in Sports &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Bachelor in Physical Education">
														&nbsp;Bachelor in Physical Education &nbsp;&nbsp;
														<input type="checkbox" name="edu_qua_peTeacher[]" value="Other" id="chkOther" onclick="showPeTeacher(this)">
														&nbsp;Other
														<table id="idPeTeacherOther" style="display:none;">
															<tr>
																<td>
																	Other :<input type="text" id="txtPeTeacherOther" name="txtPeTeacherOther" class="form-control">	
																</td>
															</tr>
														</table>
														
													</td>
                                                </tr>
												
                                                
												<tr>
                                                    <td class="col-md-4">Does the school follow any prescribed curriculum of PE/Sports ?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports" id = "yes" value = "yes" onchange="showPescribed1()" />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "peSports" id = "no" value = "no" onchange="showPescribed2()" checked />No</label>
														<table id="idPeSports" style="display:none;">
															<tr>
																<td>
																	who has prescribed it :<input type="text" id="txtPeSports" name="txtPeSports" class="form-control" >	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">What sports are played in the school (you may select more than one option)</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Athletics">&nbsp;Athletics</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Kho-Kho">&nbsp;Kho-Kho</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Kabaddi">&nbsp;Kabaddi</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Volleyball">&nbsp;Volleyball</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Judo">&nbsp;Judo</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Handball">&nbsp;Handball</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Football">&nbsp;Football</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Skating">&nbsp;Skating</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Table tennis">&nbsp;Table tennis</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Lawn tennis">&nbsp;Lawn tennis</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Badminton">&nbsp;Badminton</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Basketball">&nbsp;Basketball</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Wrestling">&nbsp;Wrestling</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Hockey">&nbsp;Hockey</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Yoga">&nbsp;Yoga</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Chess">&nbsp;Chess</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Carom">&nbsp;Carom</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Gymnastics">&nbsp;Gymnastics</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">What sports infrastructure available at the school ?</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="sportInfra[]" value="One Playground">&nbsp;One Playground</td>
																<td style="width:50%"><input type="checkbox" name="sportInfra[]" value="Separate playground for all sports">&nbsp;Separate playground for all sports</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="sportInfra[]" value="Room for indoor sports">&nbsp;Room for indoor sports</td>
																<td><input type="checkbox" name="sportInfra[]" value="All equipment for sports">&nbsp;All equipment for sports</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sportInfra[]" value="Gym">&nbsp;Gym</td>
																<td><input type="checkbox" name="sportInfra[]" id="chkSportsInfraOther" onclick="showSportsInfraOther(this)" value="Others">&nbsp;Others
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
																<td><label class="radio-inline" for = "Less than 1 lac"><input type = "radio" name = "sportPhy" id = "Less_than_1_lac" value = "Less than 1 lac" checked />Less than 1 lac</label></td>
																<td><label class="radio-inline" for = "Up to 5 lacs"><input type = "radio" name = "sportPhy" id = "Up_to_5_lacs" value = "Up to 5 lacs" />Up to 5 lacs</label></td>
															</tr>
															<tr>
																<td><label class="radio-inline" for = "5 lac ­ 10 lacs"><input type = "radio" name = "sportPhy" id = "5_lac_10_lacs" value = "5 lac ­ 10 lacs" />5 lac ­ 10 lacs</label></td>
																<td><label class="radio-inline" for = "More than 10 lac"><input type = "radio" name = "sportPhy" id = "More_than_10_lac" value = "More than 10 lac" />More than 10 lac</label></td>
															</tr>
															<tr>
																<td><label class="radio-inline" for = "No Budget for PE and sports"><input type = "radio" name = "sportPhy" id = "No_Budget_for_PE_and_sports" value = "No Budget for PE and sports" />No Budget for PE and sports</label></td>
																<td></td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Select the major challenges faced in promoting PED in school</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="promotPED[]" value="Availability of fund">&nbsp;Availability of fund</td>
																<td style="width:50%"><input type="checkbox" name="promotPED[]" value="Lack of interest in students">&nbsp;Lack of interest in students</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of interest in parents">&nbsp;Lack of interest in parents</td>
																<td><input type="checkbox" name="promotPED[]" value="Lack of availability of space/playground">&nbsp;Lack of availability of space/playground</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of infrastructure">&nbsp;Lack of infrastructure</td>
																<td><input type="checkbox" name="promotPED[]" value="Impact academics in negative manner">&nbsp;Impact academics in negative manner
																</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of Trained PE teachers">&nbsp;Lack of Trained PE teachers</td>
																<td><input type="checkbox" name="promotPED[]" id="chkPromotPEDOther" onclick="showPromotPEDOther(this)" value="Others">&nbsp;Others
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
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports" id = "yes" value = "yes" />Yes</label>															
																</td>
																<td style="width:35%;">
																	<label class="radio-inline" for = "no"><input type = "radio" name = "peSports" id = "no" value = "no" checked />No</label>														
																</td>
																<td style="width:30%;">
																	<label class="radio-inline" for = "maybe"><input type = "radio" name = "peSports" id = "maybe" value = "maybe" />Maybe</label>														
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>												
												<tr>
                                                    <td class="col-md-4">Who fund sport activities in schools</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="sportfund[]" value="Self-funded">&nbsp;Self-funded</td>
																<td style="width:50%"><input type="checkbox" name="sportfund[]" value="Government funded">&nbsp;Government funded</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="sportfund[]" value="Trust funded">&nbsp;Trust funded</td>
																<td><input type="checkbox" name="sportfund[]" value="NGO funded">&nbsp;NGO funded</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sportfund[]" value="Corporate">&nbsp;Corporate</td>
																<td><input type="checkbox" name="sportfund[]" id="chkSportFundOther" onclick="showSportFund(this)" value="Others">&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idSportFundOther" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportFundOther" name="txtSportFundOther" class="form-control" >	
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
														<textarea class="form-control" rows="5" id="otherInfo" name="otherInfo" ></textarea>
                                                    </td>
                                                </tr>
													
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
