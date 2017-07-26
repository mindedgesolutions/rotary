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
function checkEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    alert("Please enter a valid email address");
}		
</script>
<script>
function showOthers() {
    var x = document.getElementById("mySelect").value;
	if(x=='Others')
	{
		document.getElementById("idOther").style.display="block";
		document.getElementById("idOthertxt").style.display="block";
		
	}
		
	else
	{
		document.getElementById("idOther").style.display="none";
		document.getElementById("idOthertxt").style.display="none";
	}
		
    //document.getElementById("demo").innerHTML = "You selected: " + x;
}

function schoolMgm1(){
		document.getElementById("idA1").style.display="block";
		document.getElementById("idA2").style.display="block";	
		document.getElementById("idB1").style.display="none";
		document.getElementById("idB2").style.display="none";	
		document.getElementById("idC1").style.display="block";
		document.getElementById("idC2").style.display="block";
}
function schoolMgm2(){
		document.getElementById("idA1").style.display="none";
		document.getElementById("idA2").style.display="none";	
		document.getElementById("idB1").style.display="block";
		document.getElementById("idB2").style.display="block";	
		document.getElementById("idC1").style.display="none";
		document.getElementById("idC2").style.display="none";
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
				<h5 style="color:#ffffff; text-align:right;">Step-3</h5>
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
										<h5 class="heading">Teacher-Student information</h5>
									</center>
								</header>
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <div class="table-box">
                                        <table class="table">
                                            
                                            <tbody>
	<form class="form-horizontal" name="frm" id="frm" action="ins_school_survey_frm3.php" method="post" enctype="multipart/form-data" >			
                                                <tr>												
                                                    <td class="col-md-4">No. of Students :
													<input type="text" id="txtmaxid" name="txtmaxid" readonly style="display:none;" class="form-control" value="<?php echo $_GET['suid']; ?>">
													</td>
                                                    <td class="col-md-8">
														Girls:<input type="text" id="txtNoOfGirls" name="txtNoOfGirls" class="form-control" value="0" maxlength="3" onblur="add1()" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Boys:<input type="text" id="txtNoOfBoys" name="txtNoOfBoys" class="form-control" value="0" maxlength="3" onblur="add1()" required onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Total:<input type="text" id="txtTotalStudent" value="0" name="txtTotalStudent" class="form-control" readonly>
														<script>
															function add1(){
																var x = document.getElementById("txtNoOfGirls").value;
																var y = document.getElementById("txtNoOfBoys").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalStudent").value = z;
																
															}
														</script>
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">No. of Teachers :</td>
                                                    <td class="col-md-8">
														Male:<input type="text" id="txtMale" name="txtMale" class="form-control" value="0" maxlength="3" onblur="add2()" required onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Female:<input type="text" id="txtFemale" name="txtFemale" class="form-control" value="0" maxlength="3" onblur="add2()" required onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Total:<input type="text" id="txtTotalTeacher" name="txtTotalTeacher" class="form-control" readonly>
														<script>
															function add2(){
																var x = document.getElementById("txtMale").value;
																var y = document.getElementById("txtFemale").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalTeacher").value = z;
																
															}
														</script>
													</td>
                                                </tr>
                                                <tr>												
                                                    <td class="col-md-4">No. of Trained Teachers :</td>
                                                    <td class="col-md-8">
														<label >(Trained teachers refer to teachers who took pre-service and in-service training)</label>
														Male:<input type="text" id="txtTrainedMaleTeacher" name="txtTrainedMaleTeacher" class="form-control" value="0" maxlength="3" onblur="add3()" required onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Female:<input type="text" id="txtTrainedFemaleTeacher" name="txtTrainedFemaleTeacher" class="form-control" value="0" maxlength="3" onblur="add3()" required onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Total:<input type="text" id="txtTotalTrainedTeacher" name="txtTotalTrainedTeacher" class="form-control" readonly>
														<script>
															function add3(){
																var x = document.getElementById("txtTrainedMaleTeacher").value;
																var y = document.getElementById("txtTrainedFemaleTeacher").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalTrainedTeacher").value = z;
																
															}
														</script>
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Number of Differently abled students :</td>
                                                    <td class="col-md-8">														
														Male:<input type="text" id="txtNoDisabilityMale" name="txtNoDisabilityMale" class="form-control" value="0" maxlength="3" onblur="add4()" required onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Female:<input type="text" id="txtNoDisabilityFemale" name="txtNoDisabilityFemale" class="form-control" value="0" maxlength="3" onblur="add4()" required onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Total:<input type="text" id="txtTotalDisability" name="txtTotalDisability" class="form-control" readonly>
														<script>
															function add4(){
																var x = document.getElementById("txtNoDisabilityMale").value;
																var y = document.getElementById("txtNoDisabilityFemale").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalDisability").value = z;
																
															}
														</script>
														<label >Mention the number of differently abled students as per the following categories</label><br/>
														Vision:<input type="text" id="txtSeeing" name="txtSeeing" class="form-control" value="0" maxlength="3" required onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Hearing:<input type="text" id="txtHearing" name="txtHearing" class="form-control" value="0" maxlength="3" required onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Speech:<input type="text" id="txtSpeech" name="txtSpeech" class="form-control" value="0" maxlength="3" required onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														 Movement:<input type="text" id="txtMoving" name="txtMoving" class="form-control" value="0" maxlength="3" required onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Mental Retardation:<input type="text" id="txtMentalRetardation" name="txtMentalRetardation" class="form-control" value="0" maxlength="3" required onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span> 
														others:<input type="text" id="txtDisabilityothers" name="txtDisabilityothers" class="form-control" value="0" maxlength="3" required onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>
													</td>
                                                </tr>
                                                
												<tr>
                                                    <td class="col-md-4">Is there any arrangement for supporting the students who have fallen behind their classes during/after school hours?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "slowlearners" id = "yes" value = "yes" />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "slowlearners" id = "no" value = "no" checked />No</label>														
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Is the school agreeable to accept volunteers to conduct co-curricular activities and help such children ?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "curricularActivities" id = "yes" value = "yes" />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "curricularActivities" id = "no" value = "no" checked />No</label>														
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Existence of School Management Committee in Schools.</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "schoolMgm" onchange="schoolMgm1()" id = "yes" value = "yes" />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "schoolMgm" onchange="schoolMgm2()" id = "no" value = "no" checked />No</label>														
                                                    </td>
                                                </tr>
												<!-- A -->
												<tr>
                                                    <td class="col-md-4">
														<table id="idA1" style="display:none;">
															<tr>
																<td>Is the SMC active ?</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idA2" style="display:none;">
															<tr>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "yesnoA1" id = "yes" value = "yes" />Yes</label>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "yesnoA1" id = "no" value = "no" checked />No</label>														
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<!-- B -->
												<tr>
                                                    <td class="col-md-4">
														<table id="idB1" >
															<tr>
																<td>Is there a time frame for constituting the SMC ?</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idB2">
															<tr>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "yesnoB1" id = "yes" value = "yes" />Yes</label>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "yesnoB1" id = "no" value = "no" checked />No</label>	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<!-- C -->
												<tr>
                                                    <td class="col-md-4">
														<table id="idC1" style="display:none;">
															<tr>
																<td>Does the school have a School Development Plan for 2016-2017 ?</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idC2" style="display:none;">
															<tr>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "yesnoC1" id = "yes" value = "yes" />Yes</label>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "yesnoC1" id = "no" value = "no" checked />No</label>	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="submit" class="btn btn-primary" name="submit">Next</button>
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
