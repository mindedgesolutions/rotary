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
</script>
<script>
function goBack() {
    //window.history.back();
	window.location.href="cssform1.php?flag=y&suid='.$highest_id.'";
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
				<h5 style="color:#ffffff; text-align:right;">Step-2</h5>
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
										<h5 class="heading">General information</h5>
									</center>
								</header>
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <div class="table-box">
                                        <table class="table">
                                            
                                            <tbody>
	<form class="form-horizontal" name="frm" id="frm" action="ins_school_survey_frm2.php" method="POST" enctype="multipart/form-data" >			
                                                <tr>
												
													
                                                    <td class="col-md-4">Name :</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtmaxid" name="txtmaxid" readonly  class="form-control" value="<?php echo $_GET['suid']; ?>">
														<input type="text" id="txtSchoolName" name="txtSchoolName" class="form-control">
													</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="col-md-4">UDISE No :</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtudiseno" name="txtudiseno" class="form-control">																
                                                    </td>
													
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Name of Head Teacher/Principal :</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtSchoolHead" name="txtSchoolHead" class="form-control">
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Phone Number :</td>
                                                    <td class="col-md-8">
														<input class="form-control" type="text" id="txtSchoolPhoneNo" name="txtSchoolPhoneNo" maxlength="10" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Email id :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolEmailID" name="txtSchoolEmailID" onblur="checkEmail(this.value)">  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Address :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolAddress" name="txtSchoolAddress" >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">State :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolState" name="txtSchoolState" >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Pin Code :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolPin" name="txtSchoolPin" >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Website (if any) :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolWebsite" name="txtSchoolWebsite" >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">School Category :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "Primary"><input type = "radio" name = "schoolcat" id = "Primary" value = "Primary" checked />Primary (up to V)</label>&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "innerwheel"><input type = "radio" name = "schoolcat" id = "Elementary" value = "Elementary" />Elementary (up to VIII)</label></br>
														<label class="radio-inline" for = "rotaract"><input type = "radio" name = "schoolcat" id = "Secondary" value = "Secondary"  />Secondary (up to X)</label>
														<label class="radio-inline" for = "rotaract"><input type = "radio" name = "schoolcat" id = "SeniorSecondary" value = "SeniorSecondary" />Senior Secondary (up to XII)</label>
													 
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Type of School :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "Girls"><input type = "radio" name = "schooltype" id = "schoolTypeGirls" value = "Girls" checked />Girls</label>&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "Boys"><input type = "radio" name = "schooltype" id = "schoolTypeBoys" value = "Boys" />Boys</label>
														<label class="radio-inline" for = "Co-Educational"><input type = "radio" name = "schooltype" id = "schoolTypeCoEdu" value = "Co-Educational"  />Co-Educational</label>
																											 
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Medium of Instruction :</td>
                                                    <td class="col-md-8">
													<select class="form-control" id="mySelect" name="mySelect" onchange="showOthers()">
														<option value="-1">Select Language</option>
														<option value="Assamese">Assamese</option>
														<option value="Bengali">Bengali</option>
														<option value="Gujarati">Gujarati</option>
														<option value="Hindi">Hindi</option>
														<option value="Kannada">Kannada</option>
														<option value="Kashmiri">Kashmiri</option>
														<option value="Konkani">Konkani</option>
														<option value="Malayalam">Malayalam</option>
														<option value="Manipuri">Manipuri</option>
														<option value="Marathi">Marathi</option>
														<option value="Nepalese">Nepalese</option>
														<option value="Odia">Odia</option>
														<option value="Punjabi">Punjabi</option>
														<option value="Sanskrit">Sanskrit</option>
														<option value="Sindhi">Sindhi</option>
														<option value="Tamil">Tamil</option>
														<option value="Telugu">Telugu</option>
														<option value="Urdu">Urdu</option>
														<option value="English">English</option>
														<option value="Bodo">Bodo</option>
														<option value="Mising">Mising</option>
														<option value="Dogri">Dogri</option>
														<option value="Khasi">Khasi</option>
														<option value="Garo">Garo</option>
														<option value="Mizo">Mizo</option>
														<option value="Bhutia">Bhutia</option>
														<option value="Lepcha">Lepcha</option>
														<option value="Limboo">Limboo</option>
														<option value="Others">Others</option>
													</select>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">
														<table id="idOther" style="display:none;">
															<tr>
																<td>Other Medium of Instruction :</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idOthertxt" style="display:none;">
															<tr>
																<td><input class="form-control" type="text" id="txtOtherMedIns" name="txtOtherMedIns">  </td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">
														<div class="form-group has-error" align="right">
                                                            
                                                        </div>
													</td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
															<button class="btn btn-primary" name="back" onClick="window.location = 'http://rotaryteach.org/Comprehensive_School_Survey/cssform1.php?flag=y&suid=<?php echo $_GET['suid']; ?>&userid=<?php echo $userid; ?>'">Back</button>
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
